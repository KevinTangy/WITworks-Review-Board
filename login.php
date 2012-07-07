
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
				<a class="brand" href="login.php">WITworks Review Board</a>
			</div>
		</div>
	</div>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span5" style="padding-bottom:20px;">
					<form id="login-form" method="POST" action="">
						<fieldset>
						<div class="page-header"><h2>User Login</h2></div>
						<?php echo $error; ?>
							<div class="control-group">
								<div class="controls">
									<input type="text" name="username" placeholder="Username">
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<input type="password" name="password" placeholder="Password">
								</div>
							</div>
							<button class="btn btn-success" type="submit">Sign in</button>
							<button class="btn btn-info" type="reset">Reset fields</button>
							<span class="help-block"><a href="iforgot.php">forgot your password?</a></span>
						</fieldset>
					</form>
				</div>
				<div class="span6">
					<div class="page-header"><h2>What is WRB?</h2></div>
					<p>WITworks Review Board is a web application which is designed by students for you, the students. The idea behind it is to a have completely centralized location for all your co-op needs. The application allows you to not only post reviews on your own experiences; but also if you are a newer student looking for co-ops or an upper classman looking for a potential job, it can give you a sense of what jobs are out that you can potentially apply for. As long as you are a registered student at Wentworth Institute of Technology, you will be able to access this site.</p>
				</div>
			</div>
		</div> <!-- /container -->
		<div class="push"></div>
	</div> <!-- /wrapper -->
	
	<?php include( "footer.php" ); ?>

	<?php include( "js.php" ); ?>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/validateLogin.js"></script>

	</body>


</html>
