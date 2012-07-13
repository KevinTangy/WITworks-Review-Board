<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	include( "checkSession.php" );
?>

	<?php include( "header.php" ); ?>
	
	
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
						  <li><a href="changePassword.php">Change Password</a></li>
						  <li class="active"><a href="myReviews.php">My Reviews</a></li>
						  <li><a href="#">Inbox</a></li>
						</ul>
					</div><!--/.well -->
				</div><!--/span-->
			
				<div class="span9">
					<div class="hero-unit">
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
					</div>
				</div>
	
			</div><!--/row-->
	
			<?php include( "footer.php" ); ?>
			<?php include( "js.php" ); ?>
		</div><!--/.fluid-container-->
	</div><!--/wrapper-->

	</body>