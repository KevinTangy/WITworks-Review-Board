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
				<div class="span12" style="padding-bottom:20px;">
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
							<button type="submit" class="btn btn-success" data-loading-text="Logging in...">Sign in!</button>
							<input type="button" class="btn btn-info" onclick="this.form.reset(); $( 'span' ).remove( '.help-block' ); $( '.control-group' ).removeClass( 'success' ).removeClass( 'error' );" value="Reset fields">
							<p class="help-block"><a href="iforgot.php">forgot your password?</a></p>
						</fieldset>
					</form>
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
