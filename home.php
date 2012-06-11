
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
		<title>WITworks Review Board - Home</title>
	</head>
	
	<body>
		<?php include( "header.php" ); ?>
		
		<div id="page">
        <div id="nonFooter">
		
		<?php $thisPage="home"; include( "nav.php" ); ?>
		
		<div id="content-container">
		<br><br>
		
			<center>
			
				<?php
					include( "config.php" );
					
					$queryFName = "SELECT firstname FROM Student JOIN Login WHERE Login.StudentID = Student.StudentID AND username = '" . $_SESSION[ "username" ] . "'";
					
					$result = mysql_query( $queryFName ) or die(mysql_error());
					$fname = mysql_fetch_array( $result );
					
					echo '<br><font size="4">Welcome, ' . $fname[ 0 ] . '!</font>';
				?>
				
				<br><br>
				<table>
					<tr>
						<td width="400" rowspan="3">
							<?php
								echo '<p align="center"><b><font size="5">Most Recent Reviews</font></b></p>';
								include( "displayRecentReviews.php" );
							?>
						</td>
						<td width="400" align="center" valign="top">
							<?php
								echo '<p align="center"><b><font size="5">Top 5 Companies</font></b></p>';
								include( "sliderjuwelenetrial.php" );
							?>
						</td> 
					</tr>
					<tr>
						<td align="center" valign="top">
							<br><br> <p align="center"><b><h2>Career Services Twitter Feed</h2></b><p>
							<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
							<script>
							new TWTR.Widget({
							version: 2,
							type: 'profile',
							rpp: 6,
							interval: 30000,
							width: 350,
							height: 400,
							theme: {
							shell: {
							background: '#333333',
							color: '#cfb43b'
							},
							tweets: {
							background: '#000000',
							color: '#ffffff',
							links: '#cfb43b'
							}
							},
							features: {
							scrollbar: false,
							loop: false,
							live: true,
							behavior: 'all'
							}
							}).render().setUser('WITCareerServ').start();
							</script>
						</td>
					</tr>
				</table>
			</center>
		
		<br><br>
	
		</div>
		<div class="clearer"></div>
		</div>
		</div>
	
	<?php include( "footer.php" ); ?>
	
	</body>
</html>

