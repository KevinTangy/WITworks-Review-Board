<?php
	include( "checkSession.php" );
	if ( !( include( "checkAdmin.php" ) ) )
		header( "Location: home.php" );
		
	
	if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" )
	{
		// initialize session
		session_start();
	
		// database connection settings
		include( 'config.php' );
		
		$arr = explode( " ", $_POST[ 'aod' ] );
		$id = $arr[ 3 ];
		$aod = $arr[ 0 ];

		if ( $aod == "Approve" )
		{	
			// Build SQL Query  
			$query = "UPDATE Reviews SET Flagged = 0 WHERE ReviewID ='$id'";
			$result = mysql_query( $query ) or die( mysql_error() );
			
			echo "<script> alert( 'Review ID " . $id . " has been APPROVED! Page will now refresh...' ); </script>";
		}
		else if ( $aod == "Delete" )
		{	
			// Build SQL Query  
			$query = "DELETE FROM Reviews WHERE ReviewID ='$id'";
			$result = mysql_query( $query ) or die( mysql_error() );
			
			echo "<script> alert( 'Review ID " . $id . " has been DELETED! Page will now refresh...' ); </script>";
		}
		
		header( "refresh:5;url=monitorPosts.php" );
	}
?>

	<?php include( "header.php" ); ?>
	
	
	<body>

	<?php $thisPage = "admin"; include( "nav.php" ); ?>

	<div class="wrapper">
		<div class="container">
			<div class="row-fluid">
					
					<div class="span3">
						 <div class="well sidebar-nav">
							<ul class="nav nav-list">
							  <li class="nav-header">Administrator Dashboard</li>
							  <li><a href="admin.php">Reports and Statistics</li>
							  <li><a href="editCompany.php">Edit Company Information</a></li>
							  <li><a href="addStudent.php">Add Students</a></li>
							  <li class="active"><a href="monitorPosts">Monitor Posts</a></li>
							</ul>
						</div><!--/.well -->
					</div><!--/span-->
			
					<div class="span9">
						<div class="hero-unit">
							
								<h3>Flagged Reviews</h3>

								<?php
									// database connection settings
									include( 'config.php' );
											
									// Build SQL Query
									$query = "SELECT CompanyName, LastName, FirstName, EmailAddress, JobPosition, JobDescription, CoopReview, Date, Time, EmailAddress, Reviews.ReviewID from Student, Reviews, Student_Reviews, Company where Student.StudentID=Student_Reviews.StudentID and Reviews.ReviewID=Student_Reviews.ReviewID and Company.CompanyID=Student_Reviews.CompanyID and Flagged=1";
									$result = mysql_query( $query ) or die( mysql_error() );
									
									// loop through results array and output each review
									if ( mysql_num_rows( $result ) != 0 )
									{				
										$counter = 1;
							
										while( $row = mysql_fetch_array( $result ) )
										{
											echo '<div id="reviewpost">';
								
											/*$overall_rating = 
												"<div id=\"overall_stars_" . $counter . "\"></div>
												<script type=\"text/javascript\">
													$('#overall_stars_" . $counter . "').raty({
														start:		" . $row[ 5 ] . ",
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
														start:		" . $row[ 6 ] . ",
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
														start:		" . $row[ 7 ] . ",
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
														start:		" . $row[ 8 ] . ",
														readOnly:	true,
														cancel:		false,
														path:		'images/',
														cancelOff:	'cancel-off.png',
														cancelOn:	'cancel-on.png',
														starOff:	'star-off.png',
														starOn:		'star-on.png'
													});
												</script>";			*/		
											
											$phpdate = strtotime( $row[ 7 ] ) + 10800;
											$date = date( 'F j, Y', $phpdate );
											$phptime = strtotime( $row[ 8 ] ) + 10800;
											$time = date( 'g:i:s A', $phptime );
											
											echo "<br><br><b>Company: </b>". $row[ 0 ] ."<br><br><b>Co-op Title:<br></b>" . $row[ 4 ] . "<br><br><b> Job Description: </b><br>" . $row[ 5 ] . "<br><br><b>Comments: </b><br>" . $row[ 6 ] . "<br><br><br> Posted by: <b>" . $row[ 2 ] . " " . $row[ 1 ] . "</b>  (<a href='mailto:" . $row[9] . "'>" . $row[ 9 ] . "</a>) <br><font size=\"2\">Posted at " . $time . " on " . $date . "</font><br><br><br>";
											
											// approve/delete controls
											echo
											'<form name="aodbuttons" method ="post">
												<input type="submit" name="aod" value="Approve Review ID ' . $row[ 10 ] . '">
												<input type="submit" name="aod" value="Delete Review ID ' . $row[ 10 ] . '">
											</form>';
									
											echo '</div>';
											
											$counter++;
										}
									}
									else
									{
										echo '<br><p align="center"><h3> No reviews have been flagged. <em>This is good.</em> </h3></p><br>';
									}
									?>
						
						</div><!--/herounit-->
					</div><!--/span9-->
	
			
			</div><!--/rowfluid-->			
		</div><!--/-container-->
	</div><!--/wrapper-->
	
	<?php include( "footer.php" ); ?>
	<?php include( "js.php" ); ?>
				
	</body>