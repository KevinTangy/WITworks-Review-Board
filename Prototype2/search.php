
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
		<script type="text/javascript" src="js/CollapsibleLists.js"></script>
		
		
		<title>WITworks Review Board</title>
		<?php include( "header.php" ); ?>
	</head>
	
	<?php $thisPage="search"; include( "nav.php" ); ?>
	
	<body>
        <br><br><br>
		
		<div id="content-container">
			Search by Company Name
			
			<?php
				if ( $_GET[ "NOPE" ] == "1" )
				{
					echo( "<font color='red'><br><br><b> No matches found. Please try again~ </b></font><br><br>" );
				}
			?>
			
			<form name="form" action="searchCompany.php" method="get">
				<input type="text" name="company" size="40" placeholder="e.g. AIR Worldwide" />
				<input type="submit" name="Submit" value="Search" />
			</form>
			
			<?php include( "companyTree.php" ); ?>
		
		</div>

	</body>
    
    <br><br>
	
	<?php include( "footer.php" ); ?>
	
	<script>CollapsibleLists.apply();</script>
	
	
	
</html>

