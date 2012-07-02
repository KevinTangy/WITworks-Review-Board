
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>s3Slider jQuery plugin</title>

<!-- CSS -->

<style type="text/css" media="screen">

#slider {

    width: 410px; /* important to be same as image width */

    height: 300px; /* important to be same as image height */

    position: relative; /* important */

	overflow: hidden; /* important */

}

#sliderContent {

    width: 410px; /* important to be same as image width or wider */

    position: absolute;

	top: 0;

	margin-left: 0;

}

.sliderImage {

    float: left;

    position: relative;

	display: none;

}

.sliderImage span {

    position: absolute;

	font: 10px/15px Arial, Helvetica, sans-serif;

    padding: 10px 13px;

    width: 384px;

    background-color: #000;

    filter: alpha(opacity=70);

    -moz-opacity: 0.7;

	-khtml-opacity: 0.7;

    opacity: 0.7;

    color: #fff;

    display: none;

}

.clear {

	clear: both;

}

.sliderImage span strong {

    font-size: 14px;

}

.top {

	top: 0;

	left: 0;

}

.bottom {

	bottom: 0;

    left: 0;

}

ul { list-style-type: none;}

</style>

<!-- JavaScripts-->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script type="text/javascript" src="s3Slider.js"></script>

<script type="text/javascript">

    $(document).ready(function() {

        $('#slider').s3Slider({

            timeOut: 3000

        });

    });

</script>

</head>



<body>

	<?php
		// Build SQL Query
		$query = "SELECT CompanyName, Company.CompanyID, Reviews.ReviewID, Rating, Culture, Experience, Management, SUM(Rating

			+Culture+Experience+Management) as TOTAL FROM Company, Reviews, Student_Reviews WHERE Company.CompanyID 

			= Student_Reviews.CompanyID and Reviews.ReviewID = Student_Reviews.ReviewID group by 

			Student_Reviews.CompanyID ORDER BY TOTAL DESC LIMIT 0,5";
		$result = mysql_query( $query ) or die( mysql_error() );
		
		
	
	

   // echo '<p>Click picture to go to the company page.</p>';

    echo '<div id="slider">';
        echo '<ul id="sliderContent">';

        /*
            echo '<li class="sliderImage">';
               echo '<a href="http://wit.edu/career-services/prospective/"><img src="images/slideshow/5.png" alt="1" /></a>';
               echo '<span class="top"><strong>Career Services Home Page</strong><br /></span>';
            echo '</li>';
         */
            
       	    echo '<li class="sliderImage">';
               echo '<a href="http://wit.edu/career-services/prospective/"><img src="images/slideshow/5.png" alt="1" /></a>';
               echo '<span class="top"><strong>Career Services Home Page</strong><br /></span>';
            echo '</li>';
            
            while( $row = mysql_fetch_array( $result ) )
            {
		    echo '<li class="sliderImage">';
			echo '<a href="http://www.ktang.profrusso.com/viewCompany.php?company=' . $row[0] . '"><img src="images/logos/' . $row[1] . '.png" alt="2" /></a>';
			echo '<span class="top"><strong>' . $row[0] . '</strong><br /></span>';
		    echo '</li>';
            }
            
            echo '<div class="clear sliderImage"></div>';
        echo '</ul>';
    echo '</div>';

    ?>



</body>

</html>

