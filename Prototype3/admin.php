
<?php
	include( "checkSession.php" );
	if ( !( include( "checkAdmin.php" ) ) )
		header( "Location: home.php" );
?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		
		<script src='http://jquery.com/src/jquery-latest.js' type="text/javascript"></script>
		<script src="js/checkForm.js" type="text/javascript"></script>
		<script src='js/jquery.raty.js' type="text/javascript"></script>
		<script src='js/jquery.defaultText.js' type="text/javascript"></script>
		
		<title>WITworks Review Board - Administration</title>
		
	</head>
	
	<body>
		<?php include( "header.php" ); ?>
		
		<div id="page">
        <div id="nonFooter">
		
		<?php $thisPage="admin"; include( "nav.php" ); ?>
		
		<div id="content-container">
    <br><br><br>
	
	<h3>Administrator Options</h3>
	
					<table>
					<tr>
						<td width="400">
							> <a href ="reports.php"> Reports and Stats </a>
							<br>
							> <a href ="editCompany.php"> Edit Company </a>
							<br>
							> <a href ="addStudent.php"> Add Student </a>
							<br>
							> <a href ="monitorPosts.php"> Monitor Posts </a>
						</td> 
					</tr>
				</table>
	
	</div>
		</div>
		</div>
	
		<?php include( "footer.php" ); ?>
		
	</body>
	
</html>

	