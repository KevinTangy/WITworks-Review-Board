
<!--[if lte IE 9]>
	<script type="text/javascript">
		alert( "You are using Internet Explorer 9 or below.  This website may not work as expected.  Please go download and install a BETTER browser like Chrome or Firefox.  Have a nice day!" );
	</script>
<![endif]-->

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>WITworks Review Board - Disclaimer</title>
  	</head>
    
  	<body>
		<?php include( "header.php" ); ?>
		
		<div id="page">
        <div id="nonFooter">
		
		<div id="content-container">
			<br><br>
			<center>
			
			<textarea id="splash" readonly>All reviews posted are based on personal experiences. They do not reflect the views of the respective company or of Wentworth Institute of Technology.  All posts are monitored and will be removed if found to be unprofessional.</textarea>
				
			<br><br>
			<form id="form1" action="submit.php" method="post">
				<input type="radio" name="disclaimer" value="agree"> I Agree<br>
				<input type="radio" name="disclaimer" value="disagree" CHECKED> I Do NOT Agree<br><br>
				<input type="submit" name="submit" value="Submit">
			</form>
				
			</center>
		</div>
		</div>
		</div>
	
		<?php include( "footer.php" ); ?>
		
	</body>
    
</html>
