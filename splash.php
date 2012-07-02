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

		<hr>

		<?php include( "footer.php" ); ?>

		</div> <!-- /container -->

		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap-transition.js"></script>
		<script src="js/bootstrap-alert.js"></script>
		<script src="js/bootstrap-modal.js"></script>
		<script src="js/bootstrap-dropdown.js"></script>
		<script src="js/bootstrap-scrollspy.js"></script>
		<script src="js/bootstrap-tab.js"></script>
		<script src="js/bootstrap-tooltip.js"></script>
		<script src="js/bootstrap-popover.js"></script>
		<script src="js/bootstrap-button.js"></script>
		<script src="js/bootstrap-collapse.js"></script>
		<script src="js/bootstrap-carousel.js"></script>
		<script src="js/bootstrap-typeahead.js"></script>

	</body>


</html>
