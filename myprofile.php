<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	include( "checkSession.php" );
?>

	<?php include( "header.php" ); ?>
	
	
	<body>

	<?php $thisPage = "about"; include( "nav.php" ); ?>

	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span3">
				 <div class="well sidebar-nav">
					<ul class="nav nav-list">
					  <li class="nav-header">Sidebar</li>
					  <li class="active"><a href="#">Link</a></li>
					  <li><a href="#">Link</a></li>
					  <li><a href="#">Link</a></li>
					  <li><a href="#">Link</a></li>
					  <li class="nav-header">Sidebar</li>
					  <li><a href="#">Link</a></li>
					  <li><a href="#">Link</a></li>
					  <li><a href="#">Link</a></li>
					  <li><a href="#">Link</a></li>
					  <li><a href="#">Link</a></li>
					  <li><a href="#">Link</a></li>
					  <li class="nav-header">Sidebar</li>
					  <li><a href="#">Link</a></li>
					  <li><a href="#">Link</a></li>
					  <li><a href="#">Link</a></li>
					</ul>
				</div><!--/.well -->
			</div><!--/span-->
		
			<div class="span9">
				<div class="hero-unit">
					<h1>Hello, world!</h1>
					<p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
					<p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
				 </div>
			</div>
	
       </div><!--/row-->
	
		<?php include( "footer.php" ); ?>
		<?php include( "js.php" ); ?>
	</div><!--/.fluid-container-->

	</body>