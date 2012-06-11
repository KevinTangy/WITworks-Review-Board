
<?php
	// initialize session
	session_start();
	
	// if user manually attempts to reach this page, redirect to home
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	if ( !isset( $_GET[ 'company' ] ) )
	{
		header( "Location: home.php" );
	}
	else if ( !isset( $_SESSION[ "username" ] ) && isset( $_SESSION[ "disclaimer" ] ) )
	{
		header( "Location: login.php" );
	}
	else if ( !isset( $_SESSION[ "disclaimer" ] ) )
	{
		header( "Location: splash.php" );
	}
	
	
	
	// database connection settings
	include( 'config.php' );
		
	// Build SQL Query
	$query = "SELECT Reviews.JobPosition,Reviews.JobDescription,Reviews.CoopReview,Reviews.Rating,Student_Reviews.Date,Student_Reviews.Time,Student.ExpectedGradYear,Student.MajorID,Reviews.CourseID FROM Student_Reviews JOIN Reviews JOIN Company JOIN Student WHERE Student_Reviews.CompanyID = Company.CompanyID AND Company.CompanyName = '" . mysql_real_escape_string( $companyName ) . "' AND Student_Reviews.ReviewID = Reviews.ReviewID AND Student_Reviews.StudentID = Student.StudentID ORDER BY Date DESC, Time DESC";
	$result = mysql_query( $query ) or die( mysql_error() );
		
	// loop through results array and output each review
	if ( mysql_num_rows( $result ) != 0 )
	{				
		$counter = 1;
		
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
		
			echo '<div id="reviewpost">';
			
			$phpdate = strtotime( $row[ 4 ] ) + 10800;
			$date = date( 'F j, Y', $phpdate );
			$phptime = strtotime( $row[ 5 ] ) + 10800;
			$time = date( 'g:i:s A', $phptime );
			
			echo "<br><br><b>Rating:</b> " . $star_rating . "<br><b>Co-op Title:<br></b>" . $row[ 0 ] . "<br><br><b> Co-op Course Number: </b><br>" . $row[ 8 ] . "<br><br><b> Job Description: </b><br>" . $row[ 1 ] . "<br><br><b>Comments: </b><br>" . $row[ 2 ] . "<br><br><br> - Class of  " . $row[ 7 ] . " " . $row[ 6 ] . "<br><font size=\"2\">Posted at " . $time . " on " . $date . "</font><br><br><br><br>";
			echo '</div>';
			
			$counter++;
		}
	}
	else
	{
		echo '<h3>';
		echo  "No reviews yet for " . $companyName . "! :(";
		echo '</h3>';
	}
	
?>