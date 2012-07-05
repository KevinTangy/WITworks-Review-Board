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
	
	include( "header.php" );
?>
	
	
	<body>
	
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="login.php">WITworks Review Board</a>
			</div>
		</div>
	</div>

	<div class="wrapper">
		<div class="container">
			<center>
			<br>
			<h3>forgot password?  (NOT WORKING)</h3>
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
					<tr><td>&nbsp;</td><td><input type="submit" value="Submit" disabled></td></tr>
				</table>
			</form>
			<br>
			<center>
		</div> <!-- /container -->
		<div class="push"></div>
	</div> <!-- /wrapper -->
	
	<?php include( "footer.php" ); ?>

	<?php include( "js.php" ); ?>

	</body>


</html>
