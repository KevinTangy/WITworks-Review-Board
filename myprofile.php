<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	include( "checkSession.php" );
	
	include( "header.php" );
?>
	
	
	<body>

	<?php $thisPage = "about"; include( "nav.php" ); ?>

	<div class="wrapper">
		<div class="container">
			<br>
			<div class="row-fluid">
				<div class="span4">
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
			
				<div class="span8">
					<div class="well">
						<?php
							include( "config.php" );
				
							$query = "SELECT * FROM Student JOIN Login WHERE Student.StudentID = Login.StudentID AND username = '" . $_SESSION[ "username" ] . "'";
				
							$result = mysql_query( $query ) or die(mysql_error());
							$row = mysql_fetch_array( $result );
				
							echo
								'<div class="page-header">
									<h2 style="text-align: center;">' . $row[ 2 ] . ' ' . $row[ 1 ] . '</h2>
								</div>
								<table style="empty-cells: show;">
									<tbody>
										<tr>
											<td>Student ID:</td>
											<td>&nbsp;</td>
											<td><b>' . $row[ 0 ] . '</b></td>
										</tr>
										<tr>&nbsp;</tr>
										<tr>
											<td>Email Address:</td>
											<td>&nbsp;</td>
											<td><b>' . $row[ 3 ] . '</b></td>
										</tr>
										<tr>&nbsp;</tr>
										<tr>
											<td>Major:</td>
											<td>&nbsp;</td>
											<td><b>' . $row[ 5 ] . '</b></td>
										</tr>
										<tr>&nbsp;</tr>
										<tr>
											<td>Expected Year of Graduation:</td>
											<td>&nbsp;</td>
											<td><b>' . $row[ 4 ] . '</b></td>
										</tr>
									</tbody>
								</table>';
						?>
					</div>
				</div>
	
			</div><!--/row-->
		</div><!--/.fluid-container-->
		<div class="push"></div>
	</div><!--/wrapper-->

	<?php include( "footer.php" ); ?>
	
	<?php include( "js.php" ); ?>
	
	</body>
	
	
</html>
