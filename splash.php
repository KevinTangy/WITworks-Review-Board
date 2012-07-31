	<?php include( "header.php" ); ?>
	
	
	<body>
	
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="splash.php">WITworks Review Board</a>
			</div>
		</div>
	</div>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span12">
					<div class="page-header"><h2>Disclaimer</h2></div><br>
					<div class="controls">
						<textarea class="input-xxlarge" id="disclaimer" rows="5">All reviews posted are based on personal experiences. They do not reflect the views of the respective company or of Wentworth Institute of Technology.  All posts are monitored and will be removed if found to be unprofessional.</textarea><br>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="span12">
					<form class="form-vertical" name="disclaimer" action="submitDisclaimer.php">
						<input type="submit" name="disclaimer" class="btn btn-info" value="I Agree">
						<input type="submit" name="disclaimer" class="btn btn-danger" value="I Do NOT Agree">
					</form>
				</div>
			</div>
		</div> <!-- /container -->
		<div class="push"></div>
	</div> <!-- /wrapper -->
	
	<?php include( "footer.php" ); ?>

	</body>


</html>
