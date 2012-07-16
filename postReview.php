<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	include( "checkSession.php" );
?>

	<?php include( "header.php" ); ?>
	
	
	<body>

	<?php $thisPage = "post"; include( "nav.php" ); ?>

	<div class="wrapper">
		<div class="container">
		
			<div class="page-header">
				<h1>Post a Co-op Review</h1>
			</div>
	
			
	
		</div> <!-- /container -->
		<div class="push"></div>
	</div> <!-- /wrapper -->
	
	<?php include( "footer.php" ); ?>

	<?php include( "js.php" ); ?>
	<script src="js/jquery.validate.min.js"></script>

	</body>


</html>
