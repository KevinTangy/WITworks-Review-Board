	
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		
		<title>WITworks Review Board - Login</title>
		
		<?php include( "header.php" ); ?>
		<script src='js/jquery.validate.js' type="text/javascript"></script>
	</head>

	
	<body>
		<div id="content-container">
			<center>
		
				<h3>forgot password?</h3>
				<h4>Enter your email to get a randomly generated password.<h4>
				<br>
			
				<table border="0">
					<form method="POST" action="reset.php">
					<tr><td>Email:</td><td><input type="text" name="email" size="20"></td></tr>
					<tr><td>&nbsp;</td><td><input type="submit" name="submit" value="Submit"></td></tr>
					</form>
				</table>
				<br>

			</center>
	</body>

	
	<?php include( "footer.php" ); ?>
	</div>
</html>
