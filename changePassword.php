<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	include( "checkSession.php" );
?>

	<?php include( "header.php" ); ?>
	<link rel="stylesheet" type="text/css" href="validationEngine.jquery.css"/>
		<script src='http://jquery.com/src/jquery-latest.js' type="text/javascript"></script>
		<script src='js/jquery.raty.js' type="text/javascript"></script>
		<script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	
	<script>
			$( document ).ready( function()
			{
				$( "#passwordReset" ).validationEngine();
			} );
	</script>
	
	
	<body>

	<?php $thisPage = "about"; include( "nav.php" ); ?>

	<div class="wrapper">
		<div class="container">
			<div class="row-fluid">
				<div class="span3">
					 <div class="well sidebar-nav">
						<ul class="nav nav-list">
						  <li class="nav-header">My Profile</li>
						  <li><a href="myProfile.php">Personal Information</a></li>
						  <li class="active"><a href="changePassword.php">Change Password</a></li>
						  <li><a href="myReviews.php">My Reviews</a></li>
						  <li><a href="#">Inbox</a></li>
						</ul>
					</div><!--/.well -->
				</div><!--/span-->
			
				<div class="span9">
					<div class="hero-unit">
						<form method="POST" name="passwordReset" id="passwordReset">
							<?php // directions or success/error message
								if ( $message != NULL )
									echo "<font color='white'><h3>" . $message . "</h3></font>";
								else
									echo "<h3>Change your password below.</h3>";
							?>
							Current Password:<br><input class="validate[required]" type="password" name="old_password" id="old_password" size="20" data-prompt-position="centerRight"><br><br><br>
							New Password:<br><input class="validate[required]" type="password" name="password1" id="password1" size="20" data-prompt-position="centerRight"><br><br>
							Confirm Password:<br><input class="validate[required,equals[password1]]" type="password" name="password2" id="password2" size="20" data-prompt-position="centerRight"><br><br>
							<input type="submit" value="Submit">
							<input type="reset" name="reset" Value="Reset">
						</form>
					</div>
				</div>
	
			</div><!--/row-->
		</div><!--/.fluid-container-->
	</div><!--/wrapper-->

	<?php include( "footer.php" ); ?>
	<?php include( "js.php" ); ?>
	
	</body>