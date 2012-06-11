<?php
	include( "checkSession.php" );

	include( "config.php" );

	$un = $_SESSION[ 'username' ]; 

	if ( $_POST[ 'id' ] )
	{
		$id = $_POST[ 'id' ];
		$id = mysql_real_escape_string( $id );

		$sql = "UPDATE Reviews SET Flagged = 1 WHERE ReviewID ='$id'";
		mysql_query( $sql );

		echo '<img src="images/flag_red.png"/>';
		echo "<script> alert( 'Thank you for your input. This review has been flagged.'); </script>";
	}
?>