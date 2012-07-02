
<?php
	// session check
	include( "checkSession.php" );
	
	// attempt change password or return error
	include( 'changePassword.php' );
?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
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
		
		<title>WITworks Review Board - My Profile</title>
	</head>
	
	
	<body>
		<?php include( "header.php" ); ?>
		
		<div id="page">
        <div id="nonFooter">
		
		<?php $thisPage="profile"; include( "nav.php" ); ?>
		
		<div id="content-container">
        <br><br>
			
			<table>
				<tr>
					<td width="400" align="center" valign="top"> 
						<?php
							include( "config.php" );
				
							$query = "SELECT * FROM Student JOIN Login WHERE Student.StudentID = Login.StudentID AND username = '" . $_SESSION[ "username" ] . "'";
				
							$result = mysql_query( $query ) or die(mysql_error());
							$row = mysql_fetch_array( $result );
				
							echo '<br><h1>' . $row[ 2 ] . ' ' . $row[ 1 ] . '</h1>Student ID:<br><b>'. $row[ 0 ] .  '</b><br><br>Email Address:<br><b>' . $row[ 3 ] . '</b><br><br>Major:<br><b>' . $row[ 5 ]. '</b><br><br>Expected Year of Graduation:<br><b>' . $row[ 4 ] . '</b><br>';
						?>
						
						<br><br><br><br>
						
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
						
					</td>
					
					<td width="500" valign="top" border=1>
						<?php
							// database connection settings
							include( 'config.php' );
		
							// Build SQL Query
							$query = "SELECT Reviews.JobPosition,Reviews.JobDescription,Reviews.CoopReview,Reviews.Rating,Student_Reviews.Date,Student_Reviews.Time,Student.ExpectedGradYear,Student.MajorID,Reviews.CourseID,Company.CompanyName FROM Student_Reviews JOIN Reviews JOIN Company JOIN Student JOIN Login WHERE Student_Reviews.CompanyID = Company.CompanyID AND Login.StudentID = Student.StudentID AND username = '" . $_SESSION[ "username" ] . "' AND Student_Reviews.ReviewID = Reviews.ReviewID AND Student_Reviews.StudentID = Student.StudentID ORDER BY Date DESC, Time DESC";
							$result = mysql_query( $query ) or die( mysql_error() );
							
							// loop through results array and output each review
							if ( mysql_num_rows( $result ) != 0 )
							{				
								$counter = 1;
								echo "<br><br><h2> My Reviews </h2>";
								while( $row = mysql_fetch_array( $result ) )
								{
									$star_rating = 
									"<div id=\"review_stars_" . $counter . "\"></div>
										<script type=\"text/javascript\">
												$('#review_stars_" . $counter . "').raty({
												start:		" . $row[ 3 ] . ",
												readOnly:	true,
												cancel:		false,
												path:		'images/',
												cancelOff:	'cancel-off-big.png',
												cancelOn:	'cancel-on-big.png',
												starOff:	'star-off-big.png',
												starOn:		'star-on-big.png',
												width:		168
											});
										</script>";
		
									echo '<div id="myreviewpost" onclick="location.href=\'viewCompany.php?company=' . urlencode( $row[ 9 ] ) . '\';" style="cursor: pointer;">';
			
									$phpdate = strtotime( $row[ 4 ] ) + 10800;
									$date = date( 'F j, Y', $phpdate );
									$phptime = strtotime( $row[ 5 ] ) + 10800;
									$time = date( 'g:i:s A', $phptime );
			
									echo "<br><br><b>Company/Employer:</b><br>" . $row[ 9 ] . "<br><br><b>Rating:</b> " . $star_rating . "<br><b>Co-op Title:<br></b>" . $row[ 0 ] . "<br><br><b> Co-op Course Number: </b><br>" . $row[ 8 ] . "<br><br><b> Job Description: </b><br>" . $row[ 1 ] . "<br><br><b>Comments: </b><br>" . $row[ 2 ] . "<br><br><br> - Class of  " . $row[ 7 ] . " " . $row[ 6 ] . "<br><font size=\"2\">Posted at " . $time . " on " . $date . "</font><br><br><br><br>";
									echo '</div>';
			
									$counter++;
								}
							}
							else
							{
								echo "<br><br>\n<h3>You haven't made any reviews yet! :(</h3>";
							}
						?>
					</td>
				</tr>
			</table>
		
		</div>
		</div>
		</div>
	
		<?php include( "footer.php" ); ?>
		
	</body>
</html>

