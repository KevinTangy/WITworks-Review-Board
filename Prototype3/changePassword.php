
<?php
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
		
		if( $oldPassword != $currentPassword ) //if the users input in the "Current password" field does not match the current password in the database
		{
			$message .= "Current password is incorrect. No changes were made.";
		}
		else
		{
			if ( $pw1 != $pw2 )//if the new password and new password confirmation fields dont match
			{
				$message .= "The new password fields do not match. Please try again.";
			}
			else //form validated, new password is hashed and changed in the database
			{
				$newPw = hash( 'sha512', $pw1 ); 
				
				if ( mysql_query( "UPDATE Login SET Password='$newPw' WHERE UserName = '$UserName'" ) )
					$message .= "Your new password has been set!";
				else
					$message .= "Password was not reset. Please try again or contact an administrator for assistance.";
			}
		}
		
		// close mysql database connection 
		mysql_close( mysql_connect( $hostname, $username, $password ) );
	}
?>
