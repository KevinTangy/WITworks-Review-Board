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
				<a class="brand" href="login.php">WITworks Review Board</a>
			</div>
		</div>
	</div>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span12" style="padding-bottom:20px;">
					<form id="reset-form" method="POST" action="">
						<fieldset>
						<div class="page-header"><h2>forgot password?</h2></div>
							<?php
								if ( $foo != null )
									echo $foo;
								else
									echo "<h4>Enter your email to get a randomly generated password.<h4><br>";
							?>
							<div class="control-group">
								<div class="controls">
									<input type="email" name="email" placeholder="Email Address">
								</div>
							</div>
							<button class="btn btn-info" type="submit">Submit</button>
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
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('input').hover(function()
			{
				$(this).popover('show')
			} );
			
			$("#reset-form").validate(
			{
				rules:
				{
					email:
					{
						required: true,
						email: true
					}
				},
				messages:
				{
					email:
					{
						required: "We need your email address to reset your password",
						email: "Your email address must be in the format of name@domain.com"
					}
				},
			
				errorClass: "help-block",
				errorElement: "span",

				highlight: function(element, errorClass, validClass)
				{
					$(element).parents('.control-group').removeClass('success');
					$(element).parents('.control-group').addClass('error');
				},
				unhighlight: function(element, errorClass, validClass)
				{
					$(element).parents('.control-group').removeClass('error');
					$(element).parents('.control-group').addClass('success');
				}
			} );
		} );
	</script>

	</body>


</html>
