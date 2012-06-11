
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
		<title>WITworks Review Board</title>
		<?php include( "header.php" ); ?>
	</head>
	
	<body>
		<?php include( "nav.php" ); ?>
        <br><br><br>
		
		<div id="content-container">
			<center>
				<table border="1">
					<tr>
						<td width="400">
							<img src="/images/recentreviewsplaceholder.jpg">
						</td>
						<td width="400">
							<img src="/images/featuredstudent.jpg">
						</td>
					</tr>
				</table>
			</center>
		</div>
	</body>
    
    <br><br>
	
	<?php include( "footer.php" ); ?>
	
</html>

