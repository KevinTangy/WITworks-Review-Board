<?php
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