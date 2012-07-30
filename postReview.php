<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	include( "checkSession.php" );

	include( "header.php" );
?>

	
	<body>

	<?php
		$thisPage = "post";
		include( "nav.php" );
		include( "js.php" );
		echo
			'<script src="js/jquery.validate.min.js"></script>
			<script src="js/validateReviewForm.js"></script>
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
					<h2>Posting Guidelines</h2><br>
						<p>
							<i class="icon-exclamation-sign"></i> Please use professional language when posting reviews <br>
							<i class="icon-exclamation-sign"></i> Comment Sections has to be at least 140 characters<br>
							<i class="icon-exclamation-sign"></i> Don't forget to rate the company<br>
							<i class="icon-exclamation-sign"></i> Make sure to fill in ALL FIELDS<br>
						</p>
					<br><br>
					<h2>Ratings Guidelines</h2><br>
						<p>
							<i class="icon-info-sign"></i> <b>Overall Rating:</b> How was your overall experience?<br>
							<i class="icon-info-sign"></i> <b>Culture Rating:</b> How was the office environment?<br>
							<i class="icon-info-sign"></i> <b>Experience Rating:</b> Did you learn a lot at this CO-OP?<br>
							<i class="icon-info-sign"></i> <b>Management Rating:</b> How was your supervisor?<br>
						</p>
				</div>

				<div class="span8">
					<form class="form-horizontal" action="prInsert.php" method="post" name="reviewForm" id="reviewForm">
						<fieldset>
							<div class="control-group">
								<label class="control-label" for="company_name">Company/Employer</label>
								<div class="controls">
									<select class="input-xxlarge" id="company_name" name="company_name">
										<?php				
											// database connection settings
											include( 'config.php' );
								
											// checks for GET variable (user navigated from company page)
											if ( isset( $_GET[ 'company' ] ) )
											{
												$company = @$_GET[ 'company' ]; // this is the string they searched for

												// Build SQL Query
												$query = "SELECT CompanyName FROM Company WHERE CompanyName = '" . mysql_real_escape_string( $company ) . "'";
												$result = mysql_fetch_array( mysql_query( $query ) );
											}
								
											// creates dropdown based on if user navigated from company page or not
											// if user came to post page from company page, auto fill company name and disable selection
											if ( isset( $_GET[ 'company' ] ) && $result != NULL )
											{
												echo '<option value="' . mysql_real_escape_string( $company ) . '" selected>' . $company . '</option>';
												echo '</select>
													</div>
												</div>';
											}
											else
											{
												echo '<option value="" disabled="disabled" selected>Select a company/employer below</option>';
									
												$result = mysql_query( "SELECT CompanyName FROM Company ORDER BY CompanyName ASC" );
												while( $row = mysql_fetch_array( $result ) ) //loops through each row of returned table
												{
													echo '<option value="' . $row[0] . '">' . $row[0] . '</option>';
												}
									
												echo '<option value="" disabled="disabled"></option>';
												echo '<option value="OTHER_COMPANY">OTHER (Enter the name below)</option>';
												echo '</select>
													</div>
												</div>';
									
												//echo '<BR id="break"><BR id="break">';
												echo '<div class="control-group other_company">
														<label class="control-label" for="other_company_name">OTHER</label>
															<div class="controls">
																<input type="text" class="input-xlarge" id="other_company_name" name="other_company_name" placeholder="">
															</div>
														</div>';
												echo '<script type="text/javascript">
														$( function()
														{
															$( "#company_name" ).ready( function()
															{
																$( ".other_company" ).hide();
															} );
															$( "#company_name" ).change( function()
															{
																if ( $( "#company_name" ).val() != "OTHER_COMPANY" )
																{
																	$( ".other_company" ).hide();
																}
																else
																{
																	$( ".other_company" ).show();
																}
															} );
															$( "#resetForm" ).click( function()
															{
																$( ".other_company" ).hide();
															} );
														} );
													</script>';
											}
										?>

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
									<i class="icon-question-sign" rel="tooltip" title="You must write at least 140 characters!"></i>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="review">
									So, how was it?
								</label>
								<div class="controls">
									<textarea class="input-xlarge" id="review" rows="8" style="width: 100%;"></textarea>
									<span id="charCurrent2" style="font-size: 16px; font-weight: bold; background: #EEE; display: inline-block; padding: 3px; margin: 0 0 12px; line-height: 1; color: #555;">0</span>
									<i class="icon-question-sign" rel="tooltip" title="You must write at least 140 characters!"></i>
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
		            			<input type="button" class="btn btn-info" onclick="this.form.reset(); $( '.stars' ).raty( 'cancel' ); $( '#charCurrent1' ).html( parseInt( 0 ) ); $( '#charCurrent2' ).html( parseInt( 0 ) );" id="resetForm" value="Reset form">
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
