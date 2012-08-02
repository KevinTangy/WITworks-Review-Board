<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	include( "checkSession.php" );
	
	include( "header.php" );
?>

	
	<body>

	<?php $thisPage = "help"; include( "nav.php" ); ?>

	<div class="wrapper">
		<div class="container">
		
			<div class="page-header">
				<h1>Need Some Help?</h1>
			</div>
	
			<div class="accordion" id="accordion2">
			<!--	<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
							What is WITworks Review Board?
						</a>
					</div>
					<div id="collapseOne" class="accordion-body collapse">
						<div class="accordion-inner">
							WITworks Review Board (WRB) is a CO-OP review site where students can post and read reviews about their own and fellow students experiences in the field. This site allows new students to get an idea of what is out there and what students thought of it. 
						</div> 
					</div> 
				</div> -->
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
							How do I post a review?
						</a>
					</div>
					<div id="collapseOne" class="accordion-body collapse">
						<div class="accordion-inner">
							There are two ways to post a review:<br><br>
							1) The simplest way is to click "Post" up in the Navigation Bar. This will take you directly to the Post page where you can fill in the required boxes, select ratings and then hit the POST button. 
							<br><br>
							2) The second option is you can search for a specific company in the Search box and then navigate to the company home page and post a review. Same as above, make sure that you fill in the required boxes, select ratings and then hit the POST button.
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
							Who can post? Do I need to be a Wentworth student to post a review?
						</a>
					</div>
					<div id="collapseTwo" class="accordion-body collapse">
						<div class="accordion-inner">
							This website is strictly for registered students of Wentworth Institute of Technology. In order to log in, your username will be the username from your email and your password will be set to the default password until changed using the CHANGE PASSWORD option in the MY PROFILE page.<br><br>
							Example: <br>
							Username: doej (email: doej@wit.edu) <br>
							Password: *****
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
							How do I change my password? What if I forgot my password?
						</a>
					</div>
					<div id="collapseThree" class="accordion-body collapse">
						<div class="accordion-inner">
							To change your password, you click on the My Profile tab on the Navigation Bar. Then you enter your current password, then your new password and then you confirm the new password. If you forgot your password, on the Login page, there is a link to a change your password page. Once on the page, you enter your Wentworth email, and a randomly generated password is then emailed to you.
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
							How do I search for a company?
						</a>
					</div>
					<div id="collapseFour" class="accordion-body collapse">
						<div class="accordion-inner">
							You can search for a company in a few different ways.  <br><br>
							1) You can either type in the search box a company name and it will pull a list of companies that match your search. <br><br>
							2) You can simply click on the search icon in the search box and then navigate through the collapsible list of majors till you find the company you are looking for or one that interests you.
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
							What if I can't find my company in the list of companies?
						</a>
					</div>
					<div id="collapseFive" class="accordion-body collapse">
						<div class="accordion-inner">
							If you are searching for your company to post a review but do not see it, you will need to add it. To do this, click on Post in the navigation bar to go directly to the Post page. Then check the box that says "Company not listed above?". You will then see a new box appear for you to enter your company name. At this point you can then continue with the post page. After you post, go back and search for your company and you will now see it in the list of companies.
						</div>
					</div>
				</div>
			</div>
			
			<!--This enables the user to contact the admins for additional questions-->
			<?php
				if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" )
				{
					$sysmail = "tangk2@wit.edu";
					$from = $_SESSION[ 'username' ] . '@wit.edu';
					if( mail( $sysmail, stripslashes( trim( $_POST['subject'] ) ), stripslashes( trim( $_POST[ 'message' ] ) ), 'From: ' . $from . PHP_EOL ) )
					{
						$message = '<div class="row"><div class="span5" style="text-align:center"><div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">&times;</a>Thanks for contacting us! Someone will get back to you shortly.</div></div></div>';
					}
					else
					{
						$message = '<div class="row"><div class="span5" style="text-align:center"><div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">&times;</a>There was an error in submitting your message... Please try again~</div></div></div>';
					}
				}
			?>
			<section id="contact">
				<div class="page-header">
					<h2>Still Need Help? Contact Us!</h2>
				</div>
				
				<form id="contact-form" method="POST" action="">
					<fieldset>
						<?php echo $message; ?>
						<div class="control-group">
							<div class="controls">
								<input type="text" name="subject" placeholder="Subject">
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<textarea class="input-xxlarge" name="message" rows="7" placeholder="Type your comment, question, or message here!"></textarea>
							</div>
						</div>
						<button class="btn btn-success" type="submit" <?php if ( $_SESSION[ 'username' ] == "demo" ) echo 'disabled'; ?>>Send message</button>
						<input type="button" class="btn btn-info" onclick="this.form.reset(); $( 'span' ).remove( '.help-inline' ); $( '.control-group' ).removeClass( 'success' ).removeClass( 'error' );" id="resetForm" value="Reset form">
					</fieldset>
				</form>
			</section>	
	
		</div> <!-- /container -->
		<div class="push"></div>
	</div> <!-- /wrapper -->
	
	<?php include( "footer.php" ); ?>

	<?php include( "js.php" ); ?>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/validateContactForm.js"></script>

	</body>


</html>
