
<?php
	include( "checkSession.php" );
	if ( !( include( "checkAdmin.php" ) ) )
		header( "Location: home.php" );
?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
			
		<title>WITworks Review Board - Administration</title>
		
	</head>
	
	<body>
		<?php include( "header.php" ); ?>
		
	<div id="page">
        <div id="nonFooter">
		
		<?php $thisPage="admin"; include( "nav.php" ); ?>
		
			<div id="content-container">
				<br><br><br>
					<h3>Top 10 Companies</h3>
					<div id="reportsbox">	
						<?php
							// database connection settings
							include( 'config.php' );
							
							
						
							// Build SQL Query - this queries for the top 10 companies - a top company is decided by overall stars (rating, culture, experience, and management) divided by the numbre of reviews written for that company
							$query = "SELECT Company.CompanyID, Company.CompanyName, Reviews.ReviewID, Rating, Culture, Experience, Management, SUM(Rating+Culture+Experience+Management) as SUMTOTAL, SUM(Rating+Culture+Experience+Management)/count(Student_Reviews.ReviewID) as DIVIDETOTAL  FROM Company, Reviews, Student_Reviews WHERE Company.CompanyID = Student_Reviews.CompanyID and Reviews.ReviewID = Student_Reviews.ReviewID group by Student_Reviews.CompanyID order by DIVIDETOTAL DESC Limit 10";
							$result = mysql_query( $query ) or die( mysql_error() );
								
								// loop through results array and output each review
								
								$counter = 1;
									
								while( $row = mysql_fetch_array( $result ) )
								{
									
									echo '<div id="reports" onclick="location.href=\'viewCompany.php?company=' . urlencode( $row[ 1 ] ) . '\';" style="cursor: pointer;">';
									echo "<br>" . $row[ 1 ] . "</font><br>";
									
									echo '</div>';					
									$counter++;
								}
							
						?>
		
		
	
	
				</div>
				<br><br>
				<h3>Number of Reviews Per Major</h3> <br>
					
					<?php
						//this queries each major name along with the total number of reviews written for each major.
						$query = "select Major.MajorName, count(Student_Reviews.StudentReviewID) from Student_Reviews, Major where Student_Reviews.MajorID=Major.MajorID group by Student_Reviews.MajorID";
						$result = mysql_query( $query ) or die( mysql_error() );
						//Table starting tag and header cells
						echo "<table border='1' border-radius='15px'><tr><th>Major</th><th>Number of Reviews</th></tr>";
						while($row = mysql_fetch_array($result)){
						   //Display the results in different cells
						   echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td></tr>";
						}
						//Table closing tag
						echo "</table>";
					?>
				
			</div>
				
	</body>
	</div>
	</div>
	<?php include( "footer.php" ); ?>
	
	
</html>