<?php
	// initialize session
	session_start();

	if( $_SERVER[ "REQUEST_METHOD" ] == "POST" )
	{
		// database connection settings
		include( 'config.php' );
	
		// get username/password from db according to user input
		$un = $_POST[ 'username' ];
		$pw = $_POST[ 'password' ];
		// retrieve username and password from database, make sure username/password is passed safely to db, hash password before checking in db
		$login = mysql_query( "SELECT * FROM Login WHERE ( username = '" . mysql_real_escape_string( $un ) . "') and ( password = '" . mysql_real_escape_string( hash( "sha512", $pw ) ) . "' )" );
	
		// check username and password match
		if ( mysql_num_rows( $login ) == 1 )
		{
			// set username session variable
			$_SESSION[ 'username' ] = $un;
			// login successful, redirect to homepage
			header( 'Location: home.php' );
		}
		else
		{
			// invalid login, redirect back to login page;
			$error = "<span><font color='white'><b> Incorrect credentials. Please try again~ </b></font></span><br><br>";
		}
	}
?>