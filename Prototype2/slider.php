<!DOCTYPE html>
<html>

<head>
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
	#slider { width: 300px; height: 400px; }
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

	

	<!-- Simple AnythingSlider -->

	<ul id="slider">

		<li><img src="images/slideshow/1.png" alt=""></li>

		<li><img src="images/slideshow/2.png" alt=""></li>

		<li><img src="images/slideshow/3.png" alt=""></li>

		<li><img src="images/slideshow/4.png" alt=""></li>

	</ul>

	<!-- END AnythingSlider -->

</body>

</html>