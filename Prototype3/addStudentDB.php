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
										
			//Assign values of fields passed by addStudent.php to variables.
			$firstName = @$_POST['firstname'] ; //the new users first name
			$lastName = @$_POST['lastname'] ; //the new users last name
			$studentID = @$_POST['studentid'] ; //the new users student ID
			$emailAddress = @$_POST['email'] ; //the new users email address
			$year = @$_POST['year'] ; //the new users Year of Grad
			$majorID = @$_POST['majorID'] ; //the new users major ID
			$password = 'Password1';
			//hashes the new password using SHA 512
			$password_H = hash('sha512', $password);
			
			//separates email address into two variables one for username, one for domain
			$emailArray=split("@",$emailAddress); //returns 3 element array
			$userName = $emailArray[0];
			$domain = $emailArray[2];
			
			
			// Build SQL Query - this will give us the full name of the new students major (given the Major ID submitted through the form) in order to insert into the database correctly
			$query = "SELECT MajorName FROM Major WHERE MajorID = '$majorID'";
										
			$result = mysql_query( $query ) or die( mysql_error() ); 
										
			$row = mysql_fetch_array( $result );
			
			//inserts Student Information
			$insertStudent = mysql_query( "INSERT INTO Student( StudentID, LastName, FirstName, EmailAddress, ExpectedGradYear, MajorID ) 
				VALUES( '$studentID', '$lastName', '$firstName', '$emailAddress', '$year', '$majorID' )" ) or die( mysql_error() );
			//inserts student LOGIN information
			$insertLogin = mysql_query( "INSERT INTO Login( UserName, Password, StudentID ) VALUES( '$userName', '$password_H', '$studentID' )") or die( mysql_error() );
			
			$website = $_SERVER[ "HTTP_HOST" ];
			
			//The email body of the message we will be sending
			$emailBody = date( 'F j, Y', strtotime( "now" ) + 10800 ) . "\n\nDear " . $firstName . " " . $lastName . ":\n\nYour newly created WITworks Review Board account is waiting!  Your username is " . $userName . " and your password is password is: " . $password . "\n\nLogin at the site below:\nhttp://" . $website . ""; //this is the body of the email sent to the new users email address
				
			//sends the email notification of a password change
			if ( mail( $emailAddress, 'Your New WITworks Review Board Account', $emailBody, 'From: WITworks Review Board <noreply@WITworksReviewBoard.com>' ) ) //send email to, email subject, email body, sender address
			{ 
				//successfully sent email
				echo("<p>Account successfully created. <br><br><a href='admin.php'>Click here</a> to return to the Admin page.</p>");
			} 
			else 
			{
				//somethings broken, email delivery failed
				echo("<p>Email delivery failed, please contact an administrator.</p>");
			}
			
			
		?>
	</body>
	<?php include( "footer.php" ); ?>
</html>