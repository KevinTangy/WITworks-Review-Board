
<?php
	if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" )
	{
		// database connection settings
		include( 'config.php' );
	
		$emailAddress = mysql_real_escape_string( $_POST['email'] ); //this is the string they entered
		
		$emailArray = split( "@", $emailAddress ); //returns 3 element array
		$UserName = $emailArray[0];
								
		// Build SQL Query
		$query = "SELECT * FROM Student WHERE EmailAddress = '$emailAddress'";				
		$result = mysql_query( $query ) or die( mysql_error() );
		$row = mysql_fetch_array( $result );
	
		if( $row[ 3 ] == $emailAddress )
		{
			// generate new Password
			include( 'gen.php' );
			$newPw = generatePassword();
		
			$nameQuery = mysql_query( "SELECT FirstName, LastName FROM Login JOIN Student WHERE Login.StudentID = Student.StudentID AND Login.UserName = '$UserName'") or die( mysql_error() );
			$nameRow = mysql_fetch_array( $nameQuery );
			
			$website = $_SERVER[ "HTTP_HOST" ];
			
			// this is the body of the email sent to the user who is resetting their PW	
			$emailBody = date( 'F j, Y', strtotime( "now" ) + 10800 ) . "\n\nDear " . $nameRow[ 0 ] . " " . $nameRow[ 1 ] . ":\n\nYour password has been reset.  Your new password is: " . $newPw . "\n\nLogin at the site below:\nhttp://" . $website . ""; 
				
			$newPw = hash( 'sha512', $newPw ); //hash the password with SHA512
			
			// this query updates the password field in the Login table with the users $newPw and creates the reset confirmation if query is successful
			if ( mysql_query( "UPDATE Login SET Password='$newPw' WHERE UserName='$UserName'" ) )
			{
				$message = "Password has been reset for user \"" . $UserName . "\".";
				
				// sends the email notification of a password change, contains email to, email subject, email body, sender address
				if ( mail( $emailAddress, 'Password Reset', $emailBody, 'From: WITworks Review Board <noreply@WITworksReviewBoard.com>' ) )
				{ 
					// successfully sent email
					$message .= "<br>An email has been sent with your new password.<br>Please click the header above to go back to the login page.";
				}
				else 
				{
					// something broke, email delivery failed
					$message .= "<br>...but email delivery failed. Please contact an administrator for assistance.";
				}
			}
			else
			{
				$message = "Password was not reset for user " . $UserName . ". Please contact an administrator for assistance.";
			}
		}
		else
		{
			$message = "No user was found with the email address you entered.";
		}
	
		// close mysql database connection 
		mysql_close( mysql_connect( $hostname, $username, $password ) );
	}
?>
