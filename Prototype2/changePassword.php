<html>
	<head>	
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>WITworks Review Board - Forgot Password</title>	
		<?php include( "header.php" ); ?>
	</head>
	<body align="center">
		<?php
		
			// initialize session
			session_start();
			
			// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
			if ( !isset( $_SESSION[ "username" ] ) && isset( $_SESSION[ "disclaimer" ] ) )
			{
				header( "Location: login.php" );
			}
			else if ( !isset( $_SESSION[ "disclaimer" ] ) )
			{
				header( "Location: splash.php" );
			}
		
			// database connection settings
			include( 'config.php' );
			
			$UserName = $_SESSION['username']; //username of the account you're changing the password for
										
			// Build SQL Query --- returns username and hashed password
			$query = "SELECT UserName, Password FROM Student join Login WHERE Student.StudentID = Login.StudentID AND UserName = '$UserName'";							
			$result = mysql_query($query) or die(mysql_error()); 						
			$row = mysql_fetch_array($result);
			
			$oldPassword = hash('sha512', $_POST['old_password']); //this is the field where the user confirms their current password, to be compared with $currentPassword
			$currentPassword = $row[1]; //currently set Password for the user.
			$pw1 = $_POST['password1'] ; //this is the first password they entered.
			$pw2 = $_POST['password2'] ; //this is the second password they entered.
			
			
			
			if($oldPassword != $currentPassword)
			{
				echo 'Your current Password does not match our records, no changes made. Click <a href="myProfile.php">here</a> to return to your profile page.';
			}
			else
			{
				if($pw1 != $pw2)
				{
					echo 'Your new password fields do not match, please try again.';
				}
				else
				{
					$newPw = hash('sha512', $pw1); 
					
					mysql_query( "UPDATE Login SET Password='$newPw' WHERE UserName= '$UserName' " );
					echo '<br><br>Your password has been set. Click <a href="myProfile.php">here</a> to return to your profile page.<br><br>';
				}
			}
			
			//echo 'Nothing really happened this dont even work yet suckaaa';
			
			//close mysql database connection 
			mysql_close(mysql_connect( $hostname, $username, $password ));
			
			
		?>
	</body>
	<?php include( "footer.php" ); ?>
</html>
