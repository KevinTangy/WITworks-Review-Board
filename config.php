<?php 
	// config file with server credentials and database connection, used in all components requiring db interactivity
	
	// choose mysql server based on current server where the site is loading from
	switch( $_SERVER[ 'HTTP_HOST' ] ) 
	{ 
		case 'www.ktang.profrusso.com':
			$hostname = 'mysql.ktang.profrusso.com';
			$dbname = 'ktangdb';
			$username = '';
			$password = '';
			break; 
		case 'witworksreviewboard.com': 
			$hostname = 'localhost';
			$dbname = 'ktangdb';
			$username = '';
			$password = ''; 
			break; 
	}
	
	// connect to db or return errors
	mysql_connect( $hostname, $username, $password ) or DIE( "Can't connect to MySQL database!" );
	mysql_select_db( $dbname ) or DIE( "Can't select database!" );
?>
