
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
		</div> <!-- /container -->
		<div class="push"></div>
	</div> <!-- /wrapper -->
	
	<?php include( "footer.php" ); ?>

	<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap-transition.js"></script>
	<script src="js/bootstrap-alert.js"></script>
	<script src="js/bootstrap-modal.js"></script>
	<script src="js/bootstrap-dropdown.js"></script>
	<script src="js/bootstrap-scrollspy.js"></script>
	<script src="js/bootstrap-tab.js"></script>
	<script src="js/bootstrap-tooltip.js"></script>
	<script src="js/bootstrap-popover.js"></script>
	<script src="js/bootstrap-button.js"></script>
	<script src="js/bootstrap-collapse.js"></script>
	<script src="js/bootstrap-carousel.js"></script>
	<script src="js/bootstrap-typeahead.js"></script>

	</body>


</html>
