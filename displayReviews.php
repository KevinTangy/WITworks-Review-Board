
<?php
	// initialize session
	session_start();
	
	// if user manually attempts to reach this page, redirect to home
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	if ( !isset( $_GET[ 'company' ] ) )
	{
		header( "Location: home.php" );
	}
	
	include( "checkSession.php" );
	
	
	// database connection settings
	include( 'config.php' );
		
	// Build SQL Query - grabs all review data to be posted on company pages. this queries for the job position, job description, the students review, the rating, the date, time, expected year of graduation, major, course id, and the different ratings given
	$query = "SELECT Reviews.JobPosition,Reviews.JobDescription,Reviews.CoopReview,Reviews.Rating,Student_Reviews.Date,Student_Reviews.Time,Student.ExpectedGradYear,Student.MajorID,Reviews.CourseID,Reviews.Culture,Reviews.Experience,Reviews.Management,Reviews.ReviewID FROM Student_Reviews JOIN Reviews JOIN Company JOIN Student WHERE Student_Reviews.CompanyID = Company.CompanyID AND Company.CompanyName = '" . mysql_real_escape_string( $companyName ) . "' AND Student_Reviews.ReviewID = Reviews.ReviewID AND Student_Reviews.StudentID = Student.StudentID ORDER BY Date DESC, Time DESC";
	$result = mysql_query( $query ) or die( mysql_error() );
		
	// loop through results array and output each review
	if ( mysql_num_rows( $result ) != 0 )
	{				
		$counter = 1;
		
		while( $row = mysql_fetch_array( $result ) )
		{
			echo '<div id="reviewpost">';
			
			$overall_rating = 
				"<div id=\"overall_stars_" . $counter . "\"></div>
				<script type=\"text/javascript\">
					$('#overall_stars_" . $counter . "').raty({
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

			$culture_rating = 
				"<div id=\"culture_stars_" . $counter . "\"></div>
				<script type=\"text/javascript\">
					$('#culture_stars_" . $counter . "').raty({
						start:		" . $row[ 9 ] . ",
						readOnly:	true,
						cancel:		false,
						path:		'images/',
						cancelOff:	'cancel-off.png',
						cancelOn:	'cancel-on.png',
						starOff:	'star-off.png',
						starOn:		'star-on.png'
					});
				</script>";	

			$experience_rating = 
				"<div id=\"experience_stars_" . $counter . "\"></div>
				<script type=\"text/javascript\">
					$('#experience_stars_" . $counter . "').raty({
						start:		" . $row[ 10 ] . ",
						readOnly:	true,
						cancel:		false,
						path:		'images/',
						cancelOff:	'cancel-off.png',
						cancelOn:	'cancel-on.png',
						starOff:	'star-off.png',
						starOn:		'star-on.png'
					});
				</script>";	

			$management_rating = 
				"<div id=\"management_stars_" . $counter . "\"></div>
				<script type=\"text/javascript\">
					$('#management_stars_" . $counter . "').raty({
						start:		" . $row[ 11 ] . ",
						readOnly:	true,
						cancel:		false,
						path:		'images/',
						cancelOff:	'cancel-off.png',
						cancelOn:	'cancel-on.png',
						starOff:	'star-off.png',
						starOn:		'star-on.png'
					});
				</script>";					
			
			$phpdate = strtotime( $row[ 4 ] ) + 10800;
			$date = date( 'F j, Y', $phpdate );
			$phptime = strtotime( $row[ 5 ] ) + 10800;
			$time = date( 'g:i:s A', $phptime );
			
			echo "<br><br><b>Overall Rating:</b> " . $overall_rating . "<br><b>Culture:</b> " . $culture_rating . "<br><b>Experience:</b> " . $experience_rating . "<br><b>Management:</b> " . $management_rating . "<br><b>Co-op Title:<br></b>" . $row[ 0 ] . "<br><br><b> Co-op Course Number: </b><br>" . $row[ 8 ] . "<br><br><b> Job Description: </b><br>" . $row[ 1 ] . "<br><br><b>Comments: </b><br>" . $row[ 2 ] . "<br><br><br> - Class of  " . $row[ 7 ] . " " . $row[ 6 ] . "<br><font size=\"2\">Posted at " . $time . " on " . $date . "</font><br><br>";
			
			// like/dislike and flagging components
			$arr = mysql_fetch_array( mysql_query( "SELECT LIKES,DISLIKES FROM Reviews WHERE ReviewID ='" . $row[ 12 ]. "'" ) );
			$l = $arr[ 'LIKES' ];
			$d = $arr[ 'DISLIKES' ];
			echo
				'<div class="like"><a href="" class="vote" id="' . $row[ 12 ] . '" name="like"><img src="images/likeup_green.png"/>Like <b>' . $l . '</b></a></div>
				<div class="dislike"><a href="" class="vote" id="' . $row[ 12 ] . '" name="dislike"><img src="images/likedown_red.png"/> <b>' . $d . '</b></a></div>
				<div class="flag"><a href="" class="vote" id="' . $row[ 12 ] . '" name="flag"><img src="images/flag_red.png" alt="Flag review as inappropriate"/></a></div>';
			
			echo '<br><br></div>';
			
			$counter++;
		}
	}
	else //if there are no reviews posted for the company yet, a message is displayed
	{
		echo "<br><br></h3>No reviews yet for " . $companyName . "! :(</h3>";
	}
?>
