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
	
	// Build SQL Query - grabs all review data to be posted on company pages. this queries for the job position, job description, the students review, the rating, the date, time, expected year of graduation, major, course id, and the different ratings given
	$query = "SELECT Reviews.JobPosition,Reviews.JobDescription,Reviews.CoopReview,Reviews.Rating,Student_Reviews.Date,Student_Reviews.Time,Student.ExpectedGradYear,Student.MajorID,Reviews.CourseID,Reviews.Culture,Reviews.Experience,Reviews.Management,Reviews.ReviewID FROM Student_Reviews JOIN Reviews JOIN Company JOIN Student WHERE Student_Reviews.CompanyID = Company.CompanyID AND Company.CompanyName = '" . mysql_real_escape_string( $companyName ) . "' AND Student_Reviews.ReviewID = Reviews.ReviewID AND Student_Reviews.StudentID = Student.StudentID ORDER BY Date DESC, Time DESC";
	$result = mysql_query( $query ) or die( mysql_error() );
		
	// loop through results array and output each review
	if ( mysql_num_rows( $result ) != 0 )
	{				
		$counter = 1;
		
		while( $row = mysql_fetch_array( $result ) )
		{
			echo '<div id="reviewpost"><div class="row">';
			
			$overall_rating = 
				"<div class=\"span3\" style=\"padding-bottom: 15px;\"><b>Overall Rating:</b> <div id=\"overall_stars_" . $counter . "\"></div>
				<script type=\"text/javascript\">
					$('#overall_stars_" . $counter . "').raty({
						score:		" . $row[ 3 ] . ",
						readOnly:	true,
						cancel:		false,
						path:		'img/raty/',
						cancelOff:	'cancel-off-big.png',
						cancelOn:	'cancel-on-big.png',
						starOff:	'star-off-big.png',
						starOn:		'star-on-big.png',
						width:		168
					});
				</script>
				</div>";

			$culture_rating = 
				"<div class=\"span2\"><b>Culture:</b> <div id=\"culture_stars_" . $counter . "\"></div>
				<script type=\"text/javascript\">
					$('#culture_stars_" . $counter . "').raty({
						score:		" . $row[ 9 ] . ",
						readOnly:	true,
						cancel:		false,
						path:		'img/raty/',
						cancelOff:	'cancel-off.png',
						cancelOn:	'cancel-on.png',
						starOff:	'star-off.png',
						starOn:		'star-on.png'
					});
				</script>
				</div>";	

			$experience_rating = 
				"<div class=\"span2\"><b>Experience:</b> <div id=\"experience_stars_" . $counter . "\"></div>
				<script type=\"text/javascript\">
					$('#experience_stars_" . $counter . "').raty({
						score:		" . $row[ 10 ] . ",
						readOnly:	true,
						cancel:		false,
						path:		'img/raty/',
						cancelOff:	'cancel-off.png',
						cancelOn:	'cancel-on.png',
						starOff:	'star-off.png',
						starOn:		'star-on.png'
					});
				</script>
				</div>";	

			$management_rating = 
				"<div class=\"span2\"><b>Management:</b> <div id=\"management_stars_" . $counter . "\"></div>
				<script type=\"text/javascript\">
					$('#management_stars_" . $counter . "').raty({
						score:		" . $row[ 11 ] . ",
						readOnly:	true,
						cancel:		false,
						path:		'img/raty/',
						cancelOff:	'cancel-off.png',
						cancelOn:	'cancel-on.png',
						starOff:	'star-off.png',
						starOn:		'star-on.png'
					});
				</script>
				</div>";					
			
			$phpdate = strtotime( $row[ 4 ] );
			$date = date( 'F j, Y', $phpdate );
			$phptime = strtotime( $row[ 5 ] );
			$time = date( 'g:i:s A', $phptime );
			
			echo "<br>" . $overall_rating . $culture_rating . $experience_rating . $management_rating . "</div>";
			
			echo "<div class=\"row\"><div class=\"span5\" style=\"padding-bottom: 15px;\"><b>Co-op Title:<br></b>" . $row[ 0 ] . "</div><div class=\"span4\" style=\"padding-bottom: 15px;\"><b>Co-op Course Number: </b><br>" . $row[ 8 ] . "</div></div>";
			
			echo "<b>Job Description: </b><br>" . $row[ 1 ] . "<br><br><b>Comments: </b><br>" . $row[ 2 ] . "<br><br>";

			echo "<div class=\"row\"><div class=\"span3\">- Class of  " . $row[ 7 ] . " " . $row[ 6 ] . "</div><span style=\"float:right; font-size: x-small;\">Posted at " . $time . " on " . $date . "</span></div>";
			
			// like/dislike and flagging components
			$arr = mysql_fetch_array( mysql_query( "SELECT LIKES,DISLIKES FROM Reviews WHERE ReviewID ='" . $row[ 12 ]. "'" ) );
			$l = $arr[ 'LIKES' ];
			$d = $arr[ 'DISLIKES' ];
				
			echo
				'<div class="row" style="padding-top: 15px;">
					<div class="btn-group span3">
						<button href="#" class="vote btn btn-mini btn-success" id="' . $row[ 12 ] . '" name="like" rel="tooltip" title="I like this"><i class="icon-thumbs-up icon-white"></i> Like <b>' . $l . '</b></button>
						<button href="#" class="vote btn btn-mini btn-danger" id="' . $row[ 12 ] . '" name="dislike" rel="tooltip" title="I dislike this"><i class="icon-thumbs-down icon-white"></i> <b>' . $d . '</b></button>
					</div>
					<div style="float:right;">
						<button data-toggle="modal" href="#cModal" class="btn btn-mini btn-info" id="contact" name="contact" rel="tooltip" title="Contact reviewer"><i class="icon-envelope icon-white"></i></button>
						<button href="#" class="vote btn btn-mini" id="' . $row[ 12 ] . '" name="flag" rel="tooltip" title="Flag review as inappropriate"><i class="icon-flag"></i></button>
					</div>
				</div>';

			include( "contactReviewer.php" );
				
			echo
				'<div class="modal hide fade" id="likeModal">
  					<div class="modal-header">
  						<button type="button" class="close" data-dismiss="modal">×</button>
    					<h3>Nope. Don\'t think so.</h3>
  					</div>
  					<div class="modal-body">
    					<p>You\'ve already liked/disliked this review!</p>
  					</div>
  					<div class="modal-footer">
    					<a href="#" class="btn" data-dismiss="modal">OK</a>
					</div>
				</div>';
			echo
				'<div class="modal hide fade" id="dislikeModal">
  					<div class="modal-header">
  						<button type="button" class="close" data-dismiss="modal">×</button>
    					<h3>Nope. Don\'t think so.</h3>
  					</div>
  					<div class="modal-body">
    					<p>You\'ve already liked/disliked this review!</p>
  					</div>
  					<div class="modal-footer">
    					<a href="#" class="btn" data-dismiss="modal">OK</a>
					</div>
				</div>';
			echo
				'<div class="modal hide fade" id="flagModal">
  					<div class="modal-header">
  						<button type="button" class="close" data-dismiss="modal">×</button>
    					<h3>Report review as inappropriate</h3>
  					</div>
  					<div class="modal-body">
    					<p>Thank you for your input.  The review has been flagged.</p>
  					</div>
  					<div class="modal-footer">
    					<a href="#" class="btn" data-dismiss="modal">OK</a>
					</div>
				</div>';
			
			echo '<br></div><hr>';
			
			$counter++;
		}
	}
	else //if there are no reviews posted for the company yet, a message is displayed
	{
		echo "<br><br><h3 style='text-align: center;'>No reviews yet for " . $companyName . "!  :(</h3>";
	}
?>