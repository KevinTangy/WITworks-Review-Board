<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	include( "checkSession.php" );
?>

	<?php include( "header.php" ); ?>
	
	
	<body>

	<?php $thisPage = "about"; include( "nav.php" ); ?>

	<div class="wrapper">
		<div class="container">
		
			<div class="page-header">
				<h1>About WITworks Review Board</h1>
			</div>
			<p>WITworks Review Board is a web application which is designed by students for you, the students. The idea behind it is to a have completely centralized location for all your co-op needs. The application allows you to not only post reviews on your own experiences; but also if you are a newer student looking for co-ops or an upper classman looking for a potential job, it can give you a sense of what jobs are out that you can potentially apply for. As long as you are a registered student at Wentworth Institute of Technology, you will be able to access this site.</p>
		</div>
	</div>
	
	<?php include( "footer.php" ); ?>
	<?php include( "js.php" ); ?>

	</body>