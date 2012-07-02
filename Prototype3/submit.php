<?php
	// initialize session
	session_start();
	
	if ( $_POST[ 'disclaimer' ] == "agree" )
	{
		// set disclaimer session variable
		$_SESSION[ 'disclaimer' ] = $_POST[ 'disclaimer' ];
		header( "Location: login.php" );
	}
	else // if( $_POST['disclaimer'] == "disagree" )
	{
		header( "Location: http://wit.edu" );
	}
?>
