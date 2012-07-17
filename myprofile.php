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
			<div class="row-fluid">
				<div class="span3">
					 <div class="well sidebar-nav">
						<ul class="nav nav-list">
						  <li class="nav-header">My Profile</li>
						  <li class="active"><a href="myProfile.php">Personal Information</a></li>
						  <li><a href="changePassword.php">Change Password</a></li>
						  <li><a href="myReviews.php">My Reviews</a></li>
						  <li><a href="#">Inbox</a></li>
						</ul>
					</div><!--/.well -->
				</div><!--/span-->
			
				<div class="span9">
					<div class="hero-unit">
						<?php
							include( "config.php" );
				
							$query = "SELECT * FROM Student JOIN Login WHERE Student.StudentID = Login.StudentID AND username = '" . $_SESSION[ "username" ] . "'";
				
							$result = mysql_query( $query ) or die(mysql_error());
							$row = mysql_fetch_array( $result );
				
							echo '<h2>' . $row[ 2 ] . ' ' . $row[ 1 ] . '</h2><br>Student ID:<br><b>'. $row[ 0 ] .  '</b><br><br>Email Address:<br><b>' . $row[ 3 ] . '</b><br><br>Major:<br><b>' . $row[ 5 ]. '</b><br><br>Expected Year of Graduation:<br><b>' . $row[ 4 ] . '</b><br>';
						?>
					</div>
				</div>
	
			</div><!--/row-->
		</div><!--/.fluid-container-->
	</div><!--/wrapper-->

	<?php include( "footer.php" ); ?>
	<?php include( "js.php" ); ?>
	</body>