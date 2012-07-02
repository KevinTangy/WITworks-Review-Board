<html>
	<head>	
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>WITworks Review Board - Forgot Password</title>	
		<?php include( "header.php" ); ?>
	</head>
	<body align="center">
		<?php
		
			// database connection settings
			include( 'config.php' );
										
			$emailAddress = @$_POST['email'] ; //this is the string they searched for
			
			$emailArray=split("@",$emailAddress); //returns 3 element array
			$UserName = $emailArray[0];
			$domain = $emailArray[2];
										
			// Build SQL Query
			$query = "SELECT * FROM Student WHERE EmailAddress = '$emailAddress'";
										
			$result = mysql_query( $query ) or die( mysql_error() ); 
										
			$row = mysql_fetch_array( $result );
			
			if( $row[3] == $emailAddress )
			{
				//generate new Password
				include( 'gen.php' );
				$newPw = generatePassword();
				
				$nameQuery = mysql_query( "SELECT FirstName, LastName FROM Login JOIN Student WHERE Login.StudentID = Student.StudentID AND Login.UserName = '$UserName'") or die( mysql_error() );
				$nameRow = mysql_fetch_array( $nameQuery );
				
				$emailBody = date( 'F j, Y', strtotime( "now" ) + 10800 ) . "\n\nDear " . $nameRow[ 0 ] . " " . $nameRow[ 1 ] . ":\n\nYour password has been reset.  Your new password is: " . $newPw . "\n\nLogin at the site below:\nhttp://www.ktang.profrusso.com"; //this is the body of the email sent to the user who is resetting their PW
				
				$newPw = hash('sha512', $newPw); //hash the password with SHA512
				
				mysql_query( "UPDATE Login SET Password='$newPw' WHERE UserName='$UserName'" ); //this query updates the password field in the Login table with the users $newPw
				
				//password reset confirmation
				echo '<br><br>Password has been reset for user ' . $UserName;
				
				//sends the email notification of a password change
				if ( mail( $emailAddress, 'Password Reset', $emailBody, 'From: WITworks Review Board <noreply@WITworksReviewBoard.com>' ) ) //send email to, email subject, email body, sender address
				{ 
					//successfully sent email
					echo("<p>An email has been sent with your new password. <br><br>Please click the header above to go back to the login page.</p>");
				} 
				else 
				{
					//somethings broken, email delivery failed
					echo("<p>Email delivery failed, please contact an administrator.</p>");
				}
			}
			else
			{
				echo("<p>Email Address not found in our records. <br><br>Please click the header above to go back to the login page.</p>");

			}
			
			//close mysql database connection 
			mysql_close(mysql_connect( $hostname, $username, $password ));
			
			
		?>
	</body>
	<?php include( "footer.php" ); ?>
</html>
