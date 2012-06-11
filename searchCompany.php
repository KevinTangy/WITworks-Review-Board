
<?php
	if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" )
	{
		// initialize session
		session_start();
	
		// database connection settings
		include( 'config.php' );
	
		$searchString = @$_POST[ 'company' ] ; //this is the string they searched for
	
		// Build SQL Query  
		$query = "SELECT * FROM Company WHERE CompanyName LIKE '" . mysql_real_escape_string( $searchString ) . "%'";
	
		$result = mysql_query( $query ) or die( mysql_error() );
	
		if ( mysql_num_rows( $result ) == 0 )
		{
			$message = "No matches found. Please try again~";
		}
		else
		{
			header( "Location: viewCompany.php?company=" . urlencode( $searchString ) );
		}
	}
?>
