
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
	
	// validate email and send generated password or return error
	include( 'reset.php' );
?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="stylesheet" type="text/css" href="validationEngine.jquery.css"/>
		<script src='http://jquery.com/src/jquery-latest.js' type="text/javascript"></script>
		<script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
		
		<script>
			$( document ).ready( function()
			{
				$( "#resetPass" ).validationEngine();
			} );
		</script>
		
		<title>WITworks Review Board - Reset Password</title>
	</head>
	
	<body>
		<?php include( "header.php" ); ?>
		
		<div id="page">
        <div id="nonFooter">
		
		<div id="content-container">
			<center>
			<br>
			
			<h3>forgot password?</h3>
			
			<?php // directions or success/error message
				if ( $message != NULL )
					echo "<h4>" . $message . "<h4>";
				else
					echo "<h4>Enter your email to get a randomly generated password.<h4>";
			?>
			
			<br>
			
			<form name="resetPass" id="resetPass" method="POST">
				<table border="0">
					<tr><td>Email:</td><td><input class="validate[required,custom[email]]" type="text" name="email" id="email" size="20"></td></tr>
					<tr><td>&nbsp;</td><td><input type="submit" value="Submit"></td></tr>
				</table>
			</form>
			<br>
			
			<center>
		</div>
		</div>
		</div>
	
		<?php include( "footer.php" ); ?>
		
	</body>
</html>
