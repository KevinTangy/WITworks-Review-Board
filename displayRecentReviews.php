<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	include( "checkSession.php" );
	
	// database connection settings
	include( 'config.php' );
		
	// Build SQL Query - queries for all of the data we are going to output for a recent review (company name, the students rating, the actual co-op review text, the date, time, and year of graduation of the student)
	$query = "SELECT CompanyName, Rating,CoopReview,Date, Time,ExpectedGradYear,Student.MajorID FROM Student_Reviews JOIN Reviews JOIN Company JOIN Student WHERE Student_Reviews.CompanyID = Company.CompanyID AND Student_Reviews.ReviewID = Reviews.ReviewID AND Student_Reviews.StudentID = Student.StudentID ORDER BY Date DESC, Time DESC LIMIT 1";
	$result = mysql_query( $query ) or die( mysql_error() );
		
	// loop through results array and output each review
		
	$counter = 1;
		
	while( $row = mysql_fetch_array( $result ) )
	{
		$star_rating = 
				"<div id=\"review_stars_" . $counter . "\"></div>
				<script type=\"text/javascript\">
					$('#review_stars_" . $counter . "').raty({
						score:		" . $row[ 1 ] . ",
						readOnly:	true,
						cancel:		false,
						path:		'img/raty/',
						cancelOff:	'cancel-off-big.png',
						cancelOn:	'cancel-on-big.png',
						starOff:	'star-off-big.png',
						starOn:		'star-on-big.png',
						width:		168
					});
				</script>";
				
		echo '<div id="recentreviewpost">';
		
		$phpdate = strtotime( $row[ 3 ] );
		$date = date( 'F j, Y', $phpdate );
		$phptime = strtotime( $row[ 4 ] );
		$time = date( 'g:i:s A', $phptime );
		
		echo "<b>Company Name: </b>" . $row[ 0 ] . "<br><br>" . $star_rating . "<br><b>Coop Review: </b><br>" . $row[ 2 ] . "<br><br> - Class of  " . $row[ 6 ] . " " . $row[ 5 ] . "<br><font size=\"2\">Posted at " . $time . " on " . $date . "</font><br><br>";
		echo '<a class="btn" href="viewCompany.php?company=' . urlencode( $row[ 0 ] ) . '">Read more »</a>';
		echo '</div>';
		
		$counter++;
	}
		
?>