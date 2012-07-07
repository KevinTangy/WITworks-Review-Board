<?php
	// initialize session
	session_start();
	
	if( $_REQUEST[ 'disclaimer' ] == "I Agree" )
	{
		// set disclaimer session variable
		$_SESSION[ 'disclaimer' ] = "agree";
		header( "Location: login.php" );
	}
	else
	{
		header( "Location: http://wit.edu" );
	}
?>
