<?php
	// initialize session
	session_start();

	// redirect user when they try to access the root of the site, ie. witworksreviewboard.com
	if ( !isset( $_SESSION[ "username" ] ) )
	{
		if ( isset( $_SESSION[ "disclaimer" ] ) )
		{
			header( "Location: login.php" );
		}
		else
		{
			header( "Location: splash.php" );
		}
	}
?>