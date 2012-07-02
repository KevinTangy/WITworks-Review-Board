
<?php
	// initialize session
	session_start();

	// redirect user based on if they are logged in and/or have accepted disclaimer
	if ( isset( $_SESSION[ "username" ] ) )
	{
		header( "Location: home.php" );
	}
	else if ( !isset( $_SESSION[ "disclaimer" ] ) )
	{
		header( "Location: splash.php" );
	}
	
	// validate the login and return error or redirect to homepage
	include( 'checkCredentials.php' );
?>
	
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>WITworks Review Board - Login</title>
	</head>

	<body>
		<?php include( "header.php" ); ?>
		
		<div id="page">
        <div id="nonFooter">
		
		<div id="content-container">
			<center>
			<br>
			<h3>User Login</h3>
			<br>
    
			<?php // invalid login error message
				echo $error;
			?>
    
			<table border="0">
				<form method="POST" action="">
					<tr><td>Username:</td><td><input type="text" name="username" size="20"></td></tr>
					<tr><td>Password:</td><td><input type="password" name="password" size="20"></td></tr>
					<tr><td>&nbsp;</td><td><input type="submit" name="submit" value="Login"></td></tr>
					<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
					<tr><td>&nbsp;</td><td><a href="iForgot.php">forgot password?</a></td></tr>
				</form>
			</table>
			<br>

			</center>
			
		</div>
		</div>
		</div>
	
		<?php include( "footer.php" ); ?>
		
	</body>
	
</html>
