<?php
	// initialize session
	session_start();

	include( "checkSession.php" );

	if ( !( include( "checkAdmin.php" ) ) )
		header( "Location: home.php" );

	include( "header.php" );

	// database connection settings
	include( 'config.php' );
?>
	
	
	<body>

	<?php $thisPage = "admin"; include( "nav.php" ); ?>

	<div class="wrapper">
		<div class="container">
			<br>
			<div class="row-fluid">
					<div class="span3">
						 <div class="well sidebar-nav">
							<ul class="nav nav-pills nav-stacked">
							  <li class="nav-header">Admin Dashboard</li>
							  <li class="active"><a href="admin.php">Reports and Statistics</a></li>
							  <li><a href="editCompany.php">Edit Company Information</a></li>
							  <li><a href="addStudent.php">Add Students</a></li>
							  <li><a href="monitorPosts.php">Monitor Posts</a></li>
							</ul>
						</div><!--/.well -->
					</div><!--/span-->
					
					
					
					
						<div class="span3">
							<center><div class="page-header"><h1>Total Reviews </h1></div>
								<div class="admin">
							
									<?php
										//this query counts the number of reviews in the DB
										$query = "SELECT COUNT( StudentReviewID ) FROM Student_Reviews";
										$result = mysql_query( $query ) or die( mysql_error() );
										//Table starting tag and header cells
												
											while($row = mysql_fetch_array($result)){
											   //Display the results in different cells
											  echo "" . $row[0] . "";
												}
												
									?>
								</div><!--admin-->
							<div class="page-header"><h1>Total Students </h1></div>
								<div class="admin">
									<?php
										//this query counts the number of reviews in the DB
										$query = "SELECT COUNT( StudentID ) FROM Student";
										$result = mysql_query( $query ) or die( mysql_error() );
										//Table starting tag and header cells
												
											while($row = mysql_fetch_array($result)){
											   //Display the results in different cells
											  echo "" . $row[0] . "";
												}
												
									?>
								</div><!--admin-->
						</center>	
						</div><!--/span3-->
					
						<div class="span3">
							
								<div class="page-header"><h3>Top 5 Highest Rated Companies</h3></div>
												
												<?php
													
																
													// Build SQL Query - this queries for the top 5 companies - a top company is decided by overall stars (rating, culture, experience, and management) divided by the numbre of reviews written for that company
													$query = "SELECT Company.CompanyID, Company.CompanyName, Reviews.ReviewID, Rating, Culture, Experience, Management, SUM(Rating+Culture+Experience+Management) as SUMTOTAL, SUM(Rating+Culture+Experience+Management)/count(Student_Reviews.ReviewID) as DIVIDETOTAL  FROM Company, Reviews, Student_Reviews WHERE Company.CompanyID = Student_Reviews.CompanyID and Reviews.ReviewID = Student_Reviews.ReviewID group by Student_Reviews.CompanyID order by DIVIDETOTAL DESC Limit 5";
													$result = mysql_query( $query ) or die( mysql_error() );
														
														// loop through results array and output each review
														
														$counter = 1;
															
														while( $row = mysql_fetch_array( $result ) )
														{
															
															echo '<table class="table table-striped table-condensed"><div onclick="location.href=\'viewCompany.php?company=' . urlencode( $row[ 1 ] ) . '\';" style="cursor: pointer;">';
															echo "" . $row[ 1 ] . "<br>";
															
															echo '</table>';					
															$counter++;
														}		
												?>
							
						</div><!--/span3-->
				
						
					
						<div class="span3">
							
								<div class="page-header"><h3>Top 5 Lowest Rated Companies</h3></div>
												
												<?php
													
																
													// Build SQL Query - this queries for the top 5 companies - a top company is decided by overall stars (rating, culture, experience, and management) divided by the numbre of reviews written for that company
													$query = "SELECT Company.CompanyID, Company.CompanyName, Reviews.ReviewID, Rating, Culture, Experience, Management, SUM(Rating+Culture+Experience+Management) as SUMTOTAL, SUM(Rating+Culture+Experience+Management)/count(Student_Reviews.ReviewID) as DIVIDETOTAL  FROM Company, Reviews, Student_Reviews WHERE Company.CompanyID = Student_Reviews.CompanyID and Reviews.ReviewID = Student_Reviews.ReviewID group by Student_Reviews.CompanyID order by DIVIDETOTAL ASC Limit 5";
													$result = mysql_query( $query ) or die( mysql_error() );
														
														// loop through results array and output each review
														
														$counter = 1;
															
														while( $row = mysql_fetch_array( $result ) )
														{
															
															echo '<table class="table table-striped table-condensed"><div onclick="location.href=\'viewCompany.php?company=' . urlencode( $row[ 1 ] ) . '\';" style="cursor: pointer;">';
															echo "" . $row[ 1 ] . "<br>";
															
															echo "</table>";					
															$counter++;
														}		
												?>
						
						
						</div><!--/span3-->
						
						
			</div><!--/rowfluid-->			
			
			
			
			
			
			<div class="row">			
							<div class="span9">
								<div class="span9 offset3">
								
								<img class="splitter" src="/img/grey_out.png">	
									
										
										
										<br><br>
										<h3>Number of Reviews Per Major</h3> <br>
										<?php
											//this queries each major name along with the total number of reviews written for each major.
											$query = "select Major.MajorName, count(Student_Reviews.StudentReviewID) from Student_Reviews, Major where Student_Reviews.MajorID=Major.MajorID group by Student_Reviews.MajorID";
											$result = mysql_query( $query ) or die( mysql_error() );
											//Table starting tag and header cells
											echo '<table class="table table-striped table-condensed"><tr><th>Major</th><th>Number of Reviews</th></tr>';
											while($row = mysql_fetch_array($result)){
											   //Display the results in different cells
											   echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td></tr>";
											}
											//Table closing tag
											echo "</table>";
										?>
									
									
								</div><!--/span9offset3-->
							</div><!--/span9-->
							
	
			
			</div><!--/row-->	


			<div class="row">			
							<div class="span12">
								<!--<div class="span9 offset3">-->
								
								<img class="splitter" src="/img/grey_out.png">	
									
										
										
										<br><br>
										<h3>Reviews from Past 7 Days</h3> <br>
										<?php
											//this queries shows reviews from past 7 days - max 10
											$query = "select Date, Time, LastName, FirstName, EmailAddress, Student_Reviews.MajorID, CompanyName, CoopReview, Rating FROM Student_Reviews INNER JOIN Reviews on Student_Reviews.ReviewID=Reviews.ReviewID INNER JOIN Company on Company.CompanyID=Student_Reviews.CompanyID INNER JOIN Student on Student_Reviews.StudentID=Student.StudentID WHERE Date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) ORDER BY Date desc limit 10";
											$result = mysql_query( $query ) or die( mysql_error() );
											//Table starting tag and header cells
											echo '<table class="table table-striped table-condensed"><tr><th>Date</th><th>Time</th><th>Student Name</th><th>Email Address</th><th>Major</th><th>Company Name</th><th>Coop Review</th><th>Rating</th></tr>';
											while($row = mysql_fetch_array($result)){
											   //Display the results in different cells
											   echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[3] . ' ' . $row[2] . "</td><td><a href=\"mailto:$row[4]\">" . $row[4] . "</td><td>" . $row[5] . "</td><td>" . $row[6] . "</td><td>" . $row[7] . "</td><td>" . $row[8] . "</td></tr>";
											}
											//Table closing tag
											echo "</table>";
										?>
									
									
								<!--</div>/span9offset3-->
							</div><!--/span9-->
			</div><!--/row-->	
			
		</div><!--/-container-->
		<div class="push"></div>
	</div><!--/wrapper-->
	
	<?php include( "footer.php" ); ?>
	<?php include( "js.php" ); ?>
				
	</body>

</html>
