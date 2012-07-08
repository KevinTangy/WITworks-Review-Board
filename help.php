<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	include( "checkSession.php" );
?>

	<?php include( "header.php" ); ?>
	
	
	<body>

	<?php $thisPage = "help"; include( "nav.php" ); ?>

	<div class="wrapper">
		<div class="container">
		
			<div class="page-header">
				<h1>Need Some Help?</h1>
			</div>
	
			<div class="accordion" id="accordion2">
				<div class="accordion-group">
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
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
							How do I post?
						</a>
					</div>
					<div id="collapseTwo" class="accordion-body collapse">
						<div class="accordion-inner">
							There are two ways to post a review:<br><br>
							1) You can click on the Post tab in the Navigation Bar. This will take you directly to the Post page 
							where you can fill in the required boxes, select ratings and then hit the “Post” button. 
							<br><br>
							2) You can click on the Search tab in the Navigation Bar. This will take you to a page with the list of majors that are offered at Wentworth. You can click on the major and it will expand to a list of companies that have been worked at. You can click on the desired company, scroll to the bottom of the company page and then click the “Post a Review” button. It will take you to a page where you will fill in the required boxes, select 1-5 star rating(s) and then hit the “Post” button.
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
							Who can post? Do I need to be a Wentworth Student to post a review?
						</a>
					</div>
					<div id="collapseThree" class="accordion-body collapse">
						<div class="accordion-inner">
							This website is strictly for registered students of Wentworth Institute of Technology. In order to log in, your username will be the username from your email and your password will be set to the default password until changed using the “Change Password” option in the “My profile” page.<br><br>
							Example: <br>
							Username: doej (email: doej@wit.edu) <br>
							Password: *****
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
							How do you calculate for the top 5 companies?
						</a>
					</div>
					<div id="collapseFour" class="accordion-body collapse">
						<div class="accordion-inner">
							The way it calculates that it’s a top company is actually done with simple math. To find out who has the highest rating is determined by adding up all the stars and then diving by the number of reviews. Thus the 5 companies with the highest number of starts are the top 5.
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
							How do I change my password? What if I forget my password?
						</a>
					</div>
					<div id="collapseFive" class="accordion-body collapse">
						<div class="accordion-inner">
							To change your password, you click on the “My Profile” tab on the Navigation Bar. Then you enter your current password, then your new password and then you confirm the new password. If you forgot your password, on the Login page, there is a link to a change your password page. Once on the page, you enter your Wentworth email, and a randomly generated password is then emailed to you.
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix">
							How do I search for a company?
						</a>
					</div>
					<div id="collapseSix" class="accordion-body collapse">
						<div class="accordion-inner">
							To search for a company you first need to click on the Search tab on the Navigation Bar which will bring you to the Search page. Once on the search page, there are two options: <br><br>
							1) You can either type in the search box a company name and it will pull the closest match to your search. <br><br>
							2) You can search through the majors by clicking on the major to expand the list of companies and select the one you are looking for.
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSeven">
							What if I can't find my company in the list of companies?
						</a>
					</div>
					<div id="collapseSeven" class="accordion-body collapse">
						<div class="accordion-inner">
							If you are searching for your company to post a review but do not see it, you will need to add it. To do this, click on the Post Tab to go directly to the Post page. Then in the Company drop down box, scroll to the bottom and select “Other”. A new box will appear on the page below for you to manually enter the company name. Just make sure that you spell the company’s name right! Then continue on and finish the post form and post the review. Then if you go back to the Search page, the company that you just added should now be listed.
						</div>
					</div>
				</div>
			</div>
			
			<!--This enables the user to contact the admins for additional questions-->
			<?php
				$sysmail = "tangk2@wit.edu";
				$from = $_SESSION[ 'username' ] . '@wit.edu';

				if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" )
				{
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
						<button class="btn btn-success" type="submit">Send message</button>
						<button class="btn btn-info" type="reset">Reset fields</button>
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
