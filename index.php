<?php
	// initialize session
	session_start();

	// redirect user based on if they are logged in and/or have accepted disclaimer
	if ( isset( $_SESSION[ "username" ] ) )
	{
		header( "Location: home.php" );
	}
	else if ( isset( $_SESSION[ "disclaimer" ] ) )
	{
		header( "Location: login.php" );
	}
	else
	{
		header( "Location: splash.php" );
	}
?>