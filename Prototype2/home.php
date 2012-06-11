
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

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<script src='http://jquery.com/src/jquery-latest.js' type="text/javascript"></script>
		<script src='js/jquery.raty.js' type="text/javascript"></script>
		<title>WITworks Review Board</title>
		<?php include( "header.php" ); ?>
	</head>
	
	<?php $thisPage="home"; include( "nav.php" ); ?>
	
	<body>
        <br><br>
		
		<div id="content-container">
			<center>
			
				<?php
					include( "config.php" );
					
					$queryFName = "SELECT firstname FROM Student JOIN Login WHERE Login.StudentID = Student.StudentID AND username = '" . $_SESSION[ "username" ] . "'";
					
					$result = mysql_query( $queryFName ) or die(mysql_error());
					$fname = mysql_fetch_array( $result );
					
					echo '<p align="left"><font size="4">Welcome, ' . $fname[ 0 ] . '!</font></p>';
				?>
				
				<br>
				<table>
					<tr>
						<td width="400">
							<?php
								echo '<br><b><p align="center"><font size="5"> Most Recent Reviews </font></p></b><br>';
								include( "displayRecentReviews.php" );
							?> 
						</td>
						<td width="450" align="center" valign="top">
							<?php
							echo '<br><b><p align="center"><font size="5"> Featured Student </font></p></b><br>';
							include("slider.php");
							?>
							<!--<img src="/images/featuredstudent.jpg"> -->
						</td> 
					</tr>
				</table>
			</center>
		</div>
	</body>
    
    <br><br>
	
	<?php include( "footer.php" ); ?>
	
</html>

