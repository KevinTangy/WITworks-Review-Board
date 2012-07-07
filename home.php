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
?>

	<?php include( "header.php" ); ?>
	
	
	<body>

	<?php $thisPage = "home"; include( "nav.php" ); ?>

	<div class="wrapper">
		<div class="container">
			<!-- page header, welcome message -->
			<div class="page-header">
				<h1>Welcome, <?php echo $name[ 0 ]; ?>!</h1>
			</div>
	
			<!-- Main carousel (slider) unit -->
			<div id="myCarousel" class="carousel slide">
				<div class="carousel-inner">
					<div class="item active">
						<img src="img/01.jpg" alt="">
						<div class="carousel-caption">
							<h4>First Thumbnail label</h4>
							<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
						</div>
					</div>
					<div class="item">
						<img src="img/02.jpg" alt="">
						<div class="carousel-caption">
							<h4>Second Thumbnail label</h4>
							<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
						</div>
					</div>
					<div class="item">
						<img src="img/03.jpg" alt="">
						<div class="carousel-caption">
							<h4>Third Thumbnail label</h4>
							<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
						</div>
					</div>
				</div>
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>
			
			<hr>
			
			<!-- page header, news/announcements -->
			<div class="page-header">
				<h2>Annoucements</h2>
				<h3>March 14, 2013</h3>
					<p>WIT's Career Fair will be in Tansey Gym from 12 to 5 PM.  Be there or be squared!</p>
				<h3>October 25, 2012</h3>
					<p>Mock Interview Day will be in Watson Auditorium from 12 to 5 PM.  Be there or be squared!</p>
			</div>
			
			<!-- Example row of columns -->
			<div class="row">
				<div class="span4">
					<h2>Heading</h2>
					<p>Messaging disk, recursive coordinated pulse dithering controller or pc. Logarithmic potentiometer transmission high developer, boolean, gigabyte supporting system development backbone. Silicon debugged developer data cascading cable messaging reducer digital silicon messaging.</p>
					<p><a class="btn" href="#">View details &raquo;</a></p>
				</div>
				<div class="span4">
					<h2>Heading</h2>
					<p>Floating-point partitioned, developer bridgeware prototype, connectivity adaptive phaselock proxy partitioned, deviation resistor high, audio. Logistically transistorized, floating-point solution bypass interface mainframe led generator converter. Pc transmission partitioned or, pulse echo. </p>
					<p><a class="btn" href="#">View details &raquo;</a></p>
				</div>
				<div class="span4">
					<h2>Heading</h2>
					<p>Floating-point partitioned, developer bridgeware prototype, connectivity adaptive phaselock proxy partitioned, deviation resistor high, audio. Logistically transistorized, floating-point solution bypass interface mainframe led generator converter. Pc transmission partitioned or, pulse echo. </p>
					<p><a class="btn" href="#">View details &raquo;</a></p>
				</div>
			</div>
			
			<hr>
			
			<!-- Example row of columns -->
			<div class="row">
				<div class="span4">
					<h2>Heading</h2>
					<p>Audio broadband debugged internet, read-only services, reducer, fragmentation developer. Device device, metafile extended element, audio integral kilohertz logarithmic. Harmonic metafile servicing generator record technician integer. Internet adaptive ethernet software encapsulated services reducer silicon port proxy. Logistically logarithmic, dithering interface transponder read-only deviation record.</p>
					<p><a class="btn" href="#">View details &raquo;</a></p>
				</div>
				<div class="span4">
					<h2>Heading</h2>
					<p>Audio broadband debugged internet, read-only services, reducer, fragmentation developer. Device device, metafile extended element, audio integral kilohertz logarithmic. Harmonic metafile servicing generator record technician integer. Internet adaptive ethernet software encapsulated services reducer silicon port proxy. Logistically logarithmic, dithering interface transponder read-only deviation record.</p>
					<p><a class="btn" href="#">View details &raquo;</a></p>
				</div>
				<div class="span4">
					<h2>Heading</h2>
					<p>Floating-point partitioned, developer bridgeware prototype, connectivity adaptive phaselock proxy partitioned, deviation resistor high, audio. Logistically transistorized, floating-point solution bypass interface mainframe led generator converter. Pc transmission partitioned or, pulse echo.</p>
					<p><a class="btn" href="#">View details &raquo;</a></p>
				</div>
			</div>
	
		</div> <!-- /container -->
		<div class="push"></div>
	</div> <!-- /wrapper -->
	
	<?php include( "footer.php" ); ?>

	<?php include( "js.php" ); ?>

	</body>


</html>
