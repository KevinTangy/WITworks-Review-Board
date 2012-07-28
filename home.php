<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	if ( !isset( $_SESSION[ "username" ] ) && isset( $_SESSION[ "disclaimer" ] ) )
	{
		header( "Location: login.php" );
	}
	else if ( !isset( $_SESSION[ "disclaimer" ] ) )
	{
		header( "Location: splash.php" );
	}
	
	include( "header.php" );
?>
	
	
	<body>

	<?php $thisPage = "home"; include( "nav.php" ); ?>

	<div class="wrapper">
		<div class="container">
			<!-- page header, welcome message -->
				<br>
				<h1>Welcome, <?php echo $name[ 0 ]; ?>!</h1>
				<br>
				<img class="splitter" src="/img/grey_out.png">
	
			<div class="row">
				<div class="span8">
					<!-- Main carousel (slider) unit -->
					<div id="myCarousel" class="carousel slide">
						<div class="carousel-inner">
							<div class="item active">
								<img src="img/01.jpg" alt="">
								<div class="carousel-caption">
									<h4>Top Employer - Kaspersky Lab USA</h4>
									<a href="http://usa.kaspersky.com/"><img src="img/01.jpg" alt=""></a>
									<p>Kaspersky Lab is one of the fastest growing IT security companies worldwide.</p>
								</div>
							</div>
							<div class="item">
								<a href="http://wit.edu/career-services/prospective/"><img src="img/02.jpg" alt=""></a>
								<div class="carousel-caption">
									<h4>Wentworth Institute of Technology</h4>
									<p>Click to visit Wentworth's CO-OP site.</p>
								</div>
							</div>
							<div class="item">
								<img src="img/02.jpg" alt="">
								<div class="carousel-caption">
								<a href="http://wit.edu/career-services/prospective/"><img src="img/02.jpg" alt=""></a>
									<h4>Wentworth Institute of Technology</h4>
									<p>Click to visit Wentworth's CO-OP site.</p>
								</div>
							</div>
						</div>
						<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
					</div>
				</div>
				
				<div class="span4">
				<!-- page header, news/announcements -->
					<div class="page-header">
						<h2>Announcements</h2>
					</div>
						<h3>March 14, 2013</h3>
							<p>WIT's Career Fair will be in Tansey Gym from 12 to 5 PM.  Be there or be squared!</p>
						<h3>October 25, 2012</h3>
							<p>Mock Interview Day will be in Watson Auditorium from 12 to 5 PM.  Be there or be squared!</p>	
				</div>
			</div>
			<br>
			<br>
			<img class="splitter" src="/img/grey_out.png">
			
			
			
			
			
			<!-- Example row of columns -->
			<div class="row">
				<div class="span4">
					<center><img src="img/wrb.png" alt=""></center>
					<h2>WRB</h2>
					<p class="sub-heading">We're here to help you.</p>
					<p>WITworks Review Board is a web application which is designed by students just for you! This application is a completely centralized location for all your co-op needs. It allows you to not only post reviews on your own experiences but will also give you a sense of what jobs are out there that you can potentially apply for.</p>
					<p><a class="btn" href="about.php">Learn more &raquo;</a></p>
				</div>
				<div class="span4">
					<center><img src="img/bubbles.png" alt=""></center>
					<h2>Most Recent Review</h2>
					<p class="sub-heading">Just a sneak peek.</p>
					<?php include  'displayRecentReviews.php' ?>		
				</div>
				<!-- Twitter Page-->
				<div class="span4">
					<center><img src="img/twitter.png" alt=""></center>
					
						<h2>Career Services Twitter</h2>
						<p class="sub-heading">Stay in the loop.</p>
					
					<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
					<script>
						new TWTR.Widget({
							version: 2,
							type: 'profile',
							rpp: 4,
							interval: 30000,
							width: 'auto',
							height: 250,
							theme: {
							shell: {
							background: '#ffffff' , <!--old color: '#333333'-->
							color: '#ff0202'  <!--old color: '#cfb43b'-->
							},
							tweets: {
							background: '#ffffff',
							color: '#000000',
							links: '#ff0202' <!--old color: '#cfb43b'-->
							}
							},
							features: {
							scrollbar: true,
							loop: false,
							live: true,
							behavior: 'all'
							}
							}).render().setUser('WITCareerServ').start();
					</script>
				</div>
				</div>
			</div>
			
			<hr>
			
			
	
		</div> <!-- /container -->
		<div class="push"></div>
	</div> <!-- /wrapper -->
	
	<?php include( "footer.php" ); ?>

	<?php include( "js.php" ); ?>

	</body>


</html>
