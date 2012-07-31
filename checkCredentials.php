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
			// invalid login
			$error = '<div class="row"><div class="span12" style="text-align:center"><div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">&times;</a>Incorrect credentials! Please try again~</div></div></div>';
		}
	}
?>