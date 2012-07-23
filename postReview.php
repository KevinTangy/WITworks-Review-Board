<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	include( "checkSession.php" );
?>

	<?php include( "header.php" ); ?>
	
	
	<body>

	<?php
		$thisPage = "post";
		include( "nav.php" );
		include( "js.php" );
		echo
			'<script src="js/jquery.validate.min.js"></script>
			<script src="js/jquery.raty.min.js"></script>
			<script src="js/jquery.textchange.js"></script>';
	?>

	<div class="wrapper">
		<div class="container">
			<div class="page-header">
				<h1>Post a Co-op Review</h1>
			</div>

			<div class="row">
				<div class="span4" style="padding-bottom: 20px;">
					<h2>Posting Guidelines</h2>
					<p>
						-Please use professional Language when posting reiews
						- Job Description and the Comment Section has to be at 
						  lesat 140 characters
						-Don't forget to rate the company!
						-Make sure to fill in ALL FIELDS!  
					</p>
					<p>
					<h2>Ratings:</h2>
						<p>
						Overal Rating:
						-How was your overall experience?
						
						Culture Rating:
						-How was teh office environment?
						
						Experience Rating:
						-Did you learn a lot at this CO-OP?
						
						Management Rating:
						-How were the people that you worked with?
						</p>
					</p>
				</div>

				<div class="span8">
					<form class="form-horizontal" action="prInsert.php" method="post" name="reviewForm" id="reviewForm">
						<fieldset>
							<div class="control-group">
								<label class="control-label" for="company_name">Company/Employer</label>
								<div class="controls">
									<select class="input-xlarge" id="company_name">
										<option value="" disabled="disabled" selected>Select a company/employer below</option>
										<option>Kaspersky Lab</option>
		                				<option>AIR Worldwide</option>
		                				<option>Wayfair</option>
		                				<option>Bain Capital</option>
		                				<option>EMC</option>
		              				</select>
		              			</div>
		              		</div>

		          			<div class="control-group">
								<label class="control-label" for="title">Co-op Title</label>
								<div class="controls">
									<input type="text" class="input-large" id="title" placeholder="">
		           				</div>
		            		</div>

		            		<div class="control-group">
		            			<label class="control-label" for="course_num">Co-op Course Number</label>
		            			<div class="controls">
									<select class="input-large" id="course_num">
										<option value="" disabled="disabled" selected>Select a course number below</option>
										<option value="COOP300">COOP300</option>
										<option value="COOP400">COOP400</option>
										<option value="COOP500">COOP500</option>
										<option value="COOP600">COOP600</option>
									</select>
								</div>
							</div>

							<script type="text/javascript">
								$( document ).ready( function() {
									$( "#desc" ).bind( "textchange", function ( event, previousText ) {
										$( "#charCurrent1" ).html( parseInt( $(this).val().length ) );
									} );
									$( "#review" ).bind( "textchange", function ( event, previousText ) {
										$( "#charCurrent2" ).html( parseInt( $(this).val().length ) );
									} );
									$( "[ rel=tooltip ]" ).tooltip( { "placement":"right" } );
								} );
							</script>
							<div class="control-group">
								<label class="control-label" for="desc">
									Tell us what you did.
								</label>
								<div class="controls">
									<textarea class="input-xlarge" id="desc" rows="8" style="width: 100%;"></textarea>
									<span id="charCurrent1" style="font-size: 16px; font-weight: bold; background: #EEE; display: inline-block; padding: 3px; margin: 0 0 12px; line-height: 1; color: #555;">0</span>
									<i class="icon-question-sign" rel="tooltip" title="You need to write at least 140 characters!"></i>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="review">
									So, how was it?
								</label>
								<div class="controls">
									<textarea class="input-xlarge" id="review" rows="8" style="width: 100%;"></textarea>
									<span id="charCurrent2" style="font-size: 16px; font-weight: bold; background: #EEE; display: inline-block; padding: 3px; margin: 0 0 12px; line-height: 1; color: #555;">0</span>
									<i class="icon-question-sign" rel="tooltip" title="You need to write at least 140 characters!"></i>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="oStars">Overall Rating</label>
								<div class="controls">
									<div class="stars" id="oStars"></div>
										<script type="text/javascript">
											$('#oStars').raty({
												cancel:		true,
												path:		'img/raty/',
												cancelOff:	'cancel-off-big.png',
												cancelOn:	'cancel-on-big.png',
												starOff:	'star-off-big.png',
												starOn:		'star-on-big.png',
												width:		168,
											});
										</script>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="cStars">Culture Rating</label>
								<div class="controls">
									<div class="stars" id="cStars"></div>
										<script type="text/javascript">
											$('#cStars').raty({
												cancel:		true,
												path:		'img/raty/',
												cancelOff:	'cancel-off-big.png',
												cancelOn:	'cancel-on-big.png',
												starOff:	'star-off-big.png',
												starOn:		'star-on-big.png',
												width:		168,
											});
										</script>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="eStars">Experience Rating</label>
								<div class="controls">
									<div class="stars" id="eStars"></div>
										<script type="text/javascript">
											$('#eStars').raty({
												cancel:		true,
												path:		'img/raty/',
												cancelOff:	'cancel-off-big.png',
												cancelOn:	'cancel-on-big.png',
												starOff:	'star-off-big.png',
												starOn:		'star-on-big.png',
												width:		168,
											});
										</script>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="mStars">Management Rating</label>
								<div class="controls">
									<div class="stars" id="mStars"></div>
										<script type="text/javascript">
											$('#mStars').raty({
												cancel:		true,
												path:		'img/raty/',
												cancelOff:	'cancel-off-big.png',
												cancelOn:	'cancel-on-big.png',
												starOff:	'star-off-big.png',
												starOn:		'star-on-big.png',
												width:		168,
											});
										</script>
								</div>
							</div>

							<br>

							<div class="form-actions">
		            			<button type="submit" class="btn btn-primary" disabled>Post!</button>
		            			<button class="btn btn-info" type="reset">Reset form</button>
							</div>
						</fieldset>
					</form>

				</div>
			</div>
		</div> <!-- /container -->
		<div class="push"></div>
	</div> <!-- /wrapper -->
	
	<?php include( "footer.php" ); ?>

	</body>


</html>
