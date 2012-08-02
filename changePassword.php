<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	include( "checkSession.php" );
	
	include( "header.php" );

	if( $_SERVER[ "REQUEST_METHOD" ] == "POST" )
	{		
		// database connection settings
		include( 'config.php' );
		
		$UserName = $_SESSION[ 'username' ]; // username of the account you're changing the password for
		
		// Build SQL Query --- returns username and hashed password
		$query = "SELECT UserName, Password FROM Student join Login WHERE Student.StudentID = Login.StudentID AND UserName = '$UserName'";						
		$result = mysql_query( $query ) or die( mysql_error() ); 						
		$row = mysql_fetch_array( $result );
		
		$oldPassword = hash( 'sha512', $_POST[ 'old_password' ] ); // this is the field where the user confirms their current password, to be compared with $currentPassword
		$currentPassword = $row[ 1 ]; // currently set Password for the user
		$pw1 = mysql_real_escape_string( $_POST[ 'password1' ] ); // this is the first password they entered
		$pw2 = mysql_real_escape_string( $_POST[ 'password2' ] ); // this is the second password they entered
		
		$message = "";
		$alert = "";
		
		if( $oldPassword != $currentPassword ) //if the users input in the "Current password" field does not match the current password in the database
		{
			$alert = "error";
			$message .= "Current password is incorrect. No changes were made.";
		}
		else
		{
			if ( $pw1 != $pw2 )//if the new password and new password confirmation fields dont match
			{
				$alert = "error";
				$message .= "The new password fields do not match. Please try again.";
			}
			else //form validated, new password is hashed and changed in the database
			{
				$newPw = hash( 'sha512', $pw1 ); 
				
				if ( mysql_query( "UPDATE Login SET Password='$newPw' WHERE UserName = '$UserName'" ) )
				{
					$alert = "success";
					$message .= "Your new password has been set!";
				}
				else
				{
					$alert = "error";
					$message .= "Password was not reset. Please try again or contact an administrator for assistance.";
				}
			}
		}

		$foo = '<div class="row"><div class="span9" style="text-align:center"><div class="alert alert-' . $alert . '"><a class="close" data-dismiss="alert" href="#">&times;</a>' . $message . '</div></div></div>';
		
		// close mysql database connection 
		mysql_close( mysql_connect( $hostname, $username, $password ) );
	}
?>

	
	<body>

	<?php $thisPage = "changepw"; include( "nav.php" ); ?>

	<div class="wrapper">
		<div class="container">
			<br>
			<div class="row-fluid">
				<div class="span3">
					 <div class="well sidebar-nav">
						<ul class="nav nav-pills nav-stacked">
						  <li class="nav-header">My Profile</li>
						  <li><a href="myProfile.php">My Info</a></li>
						  <li class="active"><a href="changePassword.php">Change Password</a></li>
						  <li><a href="myReviews.php">My Reviews</a></li>
						</ul>
					</div><!--/.well -->
				</div><!--/span-->
			
				<div class="span9">
					<div class="hero-unit">
						<form class="form-vertical" method="POST" name="changepw-form" id="changepw-form">
							<fieldset>
							<h2>Change your password below</h2><hr>
							<?php echo $foo; ?>
								<div class="control-group">
									<div class="controls">
										<input type="password" name="old_password" id="old_password" placeholder="Current password">
									</div>
								</div>
								<br>
								<div class="control-group">
									<div class="controls">
										<input type="password" name="password1" id="password1" placeholder="New password">
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<input type="password" name="password2" id="password2" placeholder="Confirm new password">
									</div>
								</div>
							<br>
							<button type="submit" class="btn btn-success" data-loading-text="Hold up..." <?php if ( $_SESSION[ 'username' ] == "demo" ) echo 'disabled'; ?>>Submit</button>
							<input type="button" class="btn btn-info" onclick="this.form.reset(); $( 'span' ).remove( '.help-block' ); $( '.control-group' ).removeClass( 'success' ).removeClass( 'error' );" value="Reset fields">
						</form>
					</div>
				</div>
	
			</div><!--/row-->
		</div><!--/.fluid-container-->
		<div class="push"></div>
	</div><!--/wrapper-->

	<?php include( "footer.php" ); ?>
	<?php include( "js.php" ); ?>
	<script src="js/jquery.validate.min.js"></script>
	<script type="text/javascript">
		$( document ).ready( function()
		{
			$( "#changepw-form" ).validate(
			{
				rules:
				{
					old_password:
					{
						required: true,
						minlength: 8
					},
					password1:
					{
						required: true,
						minlength: 8
					},
					password2:
					{
						equalTo: "#password1",
					}
				},
				messages:
				{

				},
			
				errorClass: "help-block",
				errorElement: "span",
				highlight: function( element, errorClass, validClass )
				{
					$(element).parents( '.control-group' ).removeClass( 'success' );
					$(element).parents( '.control-group' ).addClass( 'error' );
				},
				unhighlight: function( element, errorClass, validClass )
				{
					$( element ).parents( '.control-group' ).removeClass( 'error' );
					$( element ).parents( '.control-group' ).addClass( 'success' );
				}
			} );
		} );
	</script>
	
	</body>


</html>
