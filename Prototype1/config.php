
<?php
	$hostname = 'mysql.ktang.profrusso.com';
	$dbname = 'ktangdb';
	$username = 'ktang';
	$password = 'wittang';
	
	mysql_connect( $hostname, $username, $password ) or DIE( 'MySQL connection failed!' );
	mysql_select_db( $dbname ) or DIE( 'Database not available!' );
?>

