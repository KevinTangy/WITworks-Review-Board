<?php
	// initialize session
	session_start();

	// delete current session
	unset( $_SESSION[ "username" ] );
	// delete all session variables, including disclaimer acceptance
	session_destroy();

	// redirect to login page
	header( 'Location: login.php' );
?>