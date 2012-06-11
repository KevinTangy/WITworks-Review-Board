
<?php
	// initialize session
	session_start();
	
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
		$_SESSION[ 'username' ] = $_POST[ 'username' ];
		// redirect to homepage
		header( 'Location: home.php' );
	}
	else
	{
		// redirect to login page
		header( 'Location: login.php?NOPE=1' );
	}
	
	
	
	
	
	
	//if ( isset( $_POST[ 'login' ] ) )
	//{
	//
	//	$url = $_SERVER[ 'HTTP_REFERER' ];
	//	$username = $_POST[ 'username' ];
	//	$password = $_POST[ 'password' ];
	//	$query_pass = "SELECT password FROM accounts WHERE username = '" . $username . "'";
	//	$db_pass = mysql_query( $query_pass, $dbconn );
	//	$db_pass = mysql_fetch_array( $db_pass );
	//	$password =  hash( "sha512", $password );
	//	
	//	if( $db_pass[ 0 ] == $password )
	//	{
	//		$_SESSION[ 'username' ] = $username;
	//		//echo $_SESSION['uname'];
	//		header('Location: ' . $url);
	//	}
	//	else
	//	{
	//		$fail = '<span style="background-color:maroon;color:white;"> Incorrect credentials. Please try again. </span>';
	//	}
	//
	//}
	
?>