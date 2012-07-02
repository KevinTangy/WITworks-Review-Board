
<?php
	// session check
	include( "checkSession.php" );

	// search for company or return error message
	include( "searchCompany.php" );
?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="stylesheet" type="text/css" href="validationEngine.jquery.css"/>
		<script src='js/CollapsibleLists.js' type="text/javascript"></script>
		<script src='http://jquery.com/src/jquery-latest.js' type="text/javascript"></script>
		<script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
		
		<script>
			$( document ).ready( function()
			{
				$( "#searchCompany" ).validationEngine();
			} );
		</script>
		
		<title>WITworks Review Board - Search Companies</title>		
	</head>
	
	<body>
		<?php include( "header.php" ); ?>
		
		<div id="page">
        <div id="nonFooter">
		
		<?php $thisPage="search"; include( "nav.php" ); ?>
		
		<div id="content-container">
        <br><br><br>
		
			<h3>Search by Company Name</h3>
			
			<form name="searchCompany" id="searchCompany" method="POST">
				<input type="text" name="company" id="company" size="40" placeholder="e.g. AIR Worldwide" class="validate[required]" data-prompt-position="topRight" />
				<input type="submit" name="Submit" value="Search" />
			</form>
			
			<?php
				echo "<font color='white'><b>" . $message . "</b></font><br>";
			?>
			
			<br><br>
			
			<?php include( "companyTree.php" ); ?>

		</div>
		</div>
		</div>
	
		<?php include( "footer.php" ); ?>
		
	</body>
	
	<script>CollapsibleLists.apply();</script>
	
</html>
