<!DOCTYPE html>
<html>

<head>
<?php include( "config.php" ); ?>
	<meta charset="utf-8">

	<title>AnythingSlider Simple Demo</title>
	
	<!-- jQuery (required) -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>

		<!-- Anything Slider -->
	<link rel="stylesheet" href="anythingslider.css">
	<script src="js/jquery.anythingslider.js"></script>

	<!-- Define slider dimensions here -->
	<style>
	#slider { width: 350px; height: 250px; }
	</style>

	<!-- AnythingSlider initialization -->
	<script>
		// DOM Ready
		$(function(){
			$('#slider').anythingSlider();
		});
	</script>

	<!-- Older IE stylesheet, to reposition navigation arrows, added AFTER the theme stylesheet -->
	<!--[if lte IE 7]>
	<link rel="stylesheet" href="css/anythingslider-ie.css" type="text/css" media="screen" />
	<![endif]-->
</head>

<body id="simple">

<?php
		// Build SQL Query
		$query = "SELECT CompanyName, Company.CompanyID, Reviews.ReviewID, Rating, Culture, Experience, Management, SUM(Rating

			+Culture+Experience+Management)  as SUMTOTAL, SUM(Rating+Culture+Experience+Management)/count(Student_Reviews.ReviewID) as DIVIDETOTAL  FROM Company, Reviews, Student_Reviews 
			
			WHERE Company.CompanyID = Student_Reviews.CompanyID and Reviews.ReviewID = Student_Reviews.ReviewID group by 

			Student_Reviews.CompanyID ORDER BY DIVIDETOTAL DESC LIMIT 0,5";
		$result = mysql_query( $query ) or die( mysql_error() );
	

	$website = $_SERVER[ "HTTP_HOST" ];

	echo'<ul id="slider">';
      
	  while( $row = mysql_fetch_array( $result ) )
        {
			echo '<a href="http://' . $website . '/viewCompany.php?company=' . $row[0] . '"><img src="images/logos/' . $row[1] . '.png" alt="2" /></a>';
		}

	echo'</ul>';

	
?>
</body>


</html>