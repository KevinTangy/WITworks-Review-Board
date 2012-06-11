
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
?>
	
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>WITworks Review Board - Login</title>
		<?php include( "header.php" ); ?>
	</head>

	<body>
		<div id="content-container">
			<center>
	
			<h3>User Login</h3>
			<br>
    
			<?php // incorrect login error message, get rid of this once jquery validation is implemented
				if ( $_GET[ "NOPE" ] == "1" )
				{
					echo( "<font color='white'><b> Incorrect credentials. Please try again~ </b></font><br><br>" );
				}
			?>
    
			<table border="0">
				<form method="POST" action="checkCredentials.php">
					<tr><td>Username:</td><td><input type="text" name="username" size="20"></td></tr>
					<tr><td>Password:</td><td><input type="password" name="password" size="20"></td></tr>
					<tr><td>&nbsp;</td><td><input type="submit" name="submit" value="Login"></td></tr>
					<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
					<tr><td>&nbsp;</td><td><a href="iforgot.php">forgot password?</a></td></tr>
				</form>
			</table>
			<br>

			</center>
			
			<?php include( "footer.php" ); ?>
			
		</div>
	</body>
	
</html>
