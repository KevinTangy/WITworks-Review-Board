
<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	include( "checkSession.php" );
?>


<html>

	<head>
		<link rel="stylesheet" type="text/css" href="accordion.css" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="stylesheet" type="text/css" href="validationEngine.jquery.css"/>
		<script src='http://jquery.com/src/jquery-latest.js' type="text/javascript"></script>
		<script src="/accordian.js" type="text/javascript"> </script>
		<script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
		
		<script>
			$( document ).ready( function()
			{
				$( "#contactForm" ).validationEngine();
			} );
		</script>
	
		<title>WITworks Review Board - Help and FAQ</title>
	</head>
	
    <body>
		<?php include( "header.php" ); ?>
		
		<div id="page">
        <div id="nonFooter">
		
		<?php $thisPage="help"; include( "nav.php" ); ?>
		
		<div id="content-container">
  	
		<br><br><h3> Need Some Help? </h3>
		
		<div id="accordionwrapper">
		
		<div class="accordionButton"> 1) What is WITworks Review Board? </div>
			<div class="accordionContent"> <p>WITworks Review Board is a CO-OP review site where students can post and read reviews about their 
		own and fellow students experiences in the field. This site allows new students to get an idea of what is out 
		there and what students thought of it. </p> 
			</div>
		<div class="accordionButton">  2) How do I post? </div>
			<div class="accordionContent"> <p>There are two ways to post a review:<br><br>
	      1) You can click on the Post tab in the Navigation Bar. This will take you directly to the Post page 
		     where you can fill in the required boxes, select ratings and then hit the “Post” button. 
			 <br><br>
		  2) You can click on the Search tab in the Navigation Bar. This will take you to a page with the list of majors  
		     that are offered at Wentworth. You can click on the major and it will expand to a list of companies that have been worked at. 
		     You can click on the desired company, scroll to the bottom of the company page and then click the “Post a Review” button. 
		     It will take you to a page where you will fill in the required boxes, select 1-5 star rating(s) and then hit the “Post” button.</p> 
			</div>
		<div class="accordionButton"> 3) Who can post? Do I need to be a Wentworth Student to post a review? </div>
			<div class="accordionContent"><p>This website is strictly for registered students of Wentworth Institute of Technology. In order to log in, your username will be the 
		   username from your email and your password will be set to the default password until changed using the “Change Password” option in the “My profile” page.<br><br>
           Example: <br>
           Username: doej (email: doej@wit.edu) <br>
           Password: *****</p>
			</div>
		<div class="accordionButton"> 4) How do you calculate for the top 5 companies?</div>
			<div class="accordionContent"><p>The way it calculates that it’s a top company is actually done with simple math. To find out who has the highest rating is determined by adding
			up all the stars and then diving by the number of reviews. Thus the 5 companies with the highest number of starts are the top 5.</p>
			</div>
		<div class="accordionButton"> 5) How do I change my password? What if I forgot my password </div> 
			<div class="accordionContent"><p>To change your password, you click on the “My Profile” tab on the Navigation Bar. Then you enter your current password, then your new password 
		   and then you confirm the new password. If you forgot your password, on the Login page, there is a link to a change your password page. Once on 
		   the page, you enter your Wentworth email, and a randomly generated password is then emailed to you.</p>
			</div>
		<div class="accordionButton">6) How do I search for a company?</div>	
			<div class="accordionContent"><p>To search for a company you first need to click on the Search tab on the Navigation Bar which will bring you to the Search page. Once on the search page, 
		   there are two options: <br><br>
           1) You can either type in the search box a company name and it will pull the closest match to your search. <br><br>
           2) You can search through the majors by clicking on the major to expand the list of companies and select the one you are looking for.</p>
			</div>		
		<div class="accordionButton"> 7) What if I can't find my company in the list of companies? </div>
			<div class="accordionContent"><p>If you are searching for your company to post a review but do not see it, you will need to add it. To do this, click on the Post Tab to go directly to 
		   the Post page. Then in the Company drop down box, scroll to the bottom and select “Other”. A new box will appear on the page below for you to manually
		   enter the company name. Just make sure that you spell the company’s name right! Then continue on and finish the post form and post the review. 
		   Then if you go back to the Search page, the company that you just added should now be listed.</p>
			</div>
			
		</div>
			
		
		<!--This enables the user to contact the admins for additional questions-->
		
		<?php

			$sysmail = "parroj@wit.edu";
			$from = $_SESSION['username'] . '@wit.edu';

			if ($_POST['sendmessage'])
			{
				//checks if the user entered an actual message
				if(!isset($_POST['message']))
				{
					$messages = "Please enter a message!<br>";
				}
				elseif(mail($sysmail, stripslashes(trim($_POST['subject'])), stripslashes(trim($_POST['message'])), "From: " . $from . "\r\n"))
				{
					$messages = "Thanks for your message someone will get back to you shortly.<br>";
				}
				else {
						$messages = "There was an error in submitting your email, please try again.<br>";
					 }
			}
		?>
		
		<div id="contact">
		<br><br><h2> Still Need Help? Contact Us! </h2>
			
			<form action="" method="post" id="contactForm">
			<span style="color:white; font-weight:bold;"><?php echo $messages; ?></span>
				  <table border="0">
					<tr>
					  <td valign="top"><strong>Message Subject : </strong></td>
					  <td valign="top"><input type="ext" id="subject" name="subject" size="50" class="validate[required,minSize[4]]" /></td>
					</tr>
					<tr>
					  <td valign="top"><strong>Your Message </strong></td>
					  <td valign="top"><textarea name="message" cols="50" rows="10" id="message" class="validate[required,minSize[4]]"></textarea></td>
					</tr>
					<tr>
					  <td colspan="2" valign="top"><div align="right">
						  <input type="submit" value="Send Message">
						</div></td>
					</tr>
				  </table>
				  <input type="hidden" name="sendmessage" value="1">
			</form>
		</div>		
		
		</div>
		</div>
		</div>
		
		<?php include( "footer.php" ); ?>
		
	</body>
	
</html>
