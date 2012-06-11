
<?php
	// initialize session
	session_start();
	
	// if user is already logged in, redirect to homepage
	if ( isset( $_SESSION[ "username" ] ) )
	{
		header( "Location: home.php" );
	}
	// if user has already accepted the disclaimer but has not logged in, redirect to login
	else if ( isset( $_SESSION[ "disclaimer" ] ) )
	{
		header( "Location: login.php" );
	}
?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>WITworks Review Board - Disclaimer</title>
		<?php include( "header.php" ); ?>
  	</head>
    
  	<body
		<br><br>
		
		<div id="content-container">
				<center>
					<textarea id="splash" readonly>All reviews posted are based on personal experiences. They do not reflect the views of the respective company or of Wentworth Institute of Technology.</textarea>
					
					<br>	
					<form id="form1" action="submit.php" method="post">
						<input type="radio" name="disclaimer" value="agree"> I Agree<br>
						<input type="radio" name="disclaimer" value="disagree" CHECKED> I Do NOT Agree<br>
						<input type="submit" name="submit" value="Submit">
					</form>
					</center>
				</p>
		</div>
        
	</body>
    
    <?php include( "footer.php" ); ?>
    
</html>

<!--NOTES*********************************

everything will be in some sort of DIV tag combo once we get CSS going
**I agree redirect needs to be changed to whatever our homepage file will be
-->
