	<?php include( "header.php" ); ?>
	
	
	<body>
	
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="splash.php">WITworks Review Board</a>
			</div>
		</div>
	</div>

	<div class="wrapper">
		<div class="container">
			<center>
				<textarea id="splash" readonly>All reviews posted are based on personal experiences. They do not reflect the views of the respective company or of Wentworth Institute of Technology.  All posts are monitored and will be removed if found to be unprofessional.</textarea>
				<br><br>
				<form id="form1" action="submitDisclaimer.php" method="post">
					<input type="radio" name="disclaimer" value="agree"> I Agree<br>
					<input type="radio" name="disclaimer" value="disagree" CHECKED> I Do NOT Agree<br><br>
					<input type="submit" name="submit" value="Submit">
				</form>
			</center>
		</div> <!-- /container -->
		<div class="push"></div>
	</div> <!-- /wrapper -->
	
	<?php include( "footer.php" ); ?>

	</body>


</html>
