<?php
	include( "checkSession.php" );

	include( "config.php" );

	$un = $_SESSION[ 'username' ]; 

	if ( $_POST[ 'id' ] )
	{
		$id = $_POST[ 'id' ];
		$id = mysql_real_escape_string( $id );

		$user_sql = mysql_query( "SELECT username FROM Likes_by_User WHERE ReviewID = '$id' and username ='$un'");
		$count = mysql_num_rows( $user_sql );

		if ( $count == 0 )
		{
			$sql = "UPDATE Reviews SET LIKES = LIKES+1 WHERE ReviewID ='$id'";
			mysql_query( $sql );

			$sql_in = "INSERT INTO Likes_by_User( ReviewID, username ) values( '$id','$un' )";
			mysql_query( $sql_in );
		}
		else
		{
			//echo "<script> alert( 'You have already liked/disliked this review!'); </script>";
			$error = 
				'<script type="text/javascript">
					$( document ).ready( function() {
    					$( "#likeModal" ).modal( "toggle" );
    				} );
					$( document ).ready( function() {
    					$( "[ rel=tooltip ]" ).tooltip( "hide" );
    				} );
				</script>';
		}

		$result = mysql_query( "SELECT LIKES FROM Reviews WHERE ReviewID ='$id'" );
		$row = mysql_fetch_array( $result );
		$likes = $row[ 'LIKES' ];
		echo '<i class="icon-thumbs-up icon-white"></i> Like <b>' . $likes . '</b>' . $error;
	}
?>