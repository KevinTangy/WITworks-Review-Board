<?php
	if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" )
	{
		$query1 = "select EmailAddress from Student_Reviews join Student where Student_Reviews.StudentID = Student.StudentID and ReviewID = '" . $row[ 12 ] . "'";
		$rowA1 = mysql_query( $query1 ) or die( mysql_error() );
		$row1 = mysql_fetch_array( $rowA1 );
		$to = $row1[ 0 ];

		$query2 = "select EmailAddress from Student join Login where Student.StudentID = Login.StudentID and UserName = '" . $_SESSION[ 'username' ] . "'";
		$rowA2 = mysql_query( $query2 ) or die( mysql_error() );
		$row2 = mysql_fetch_array( $rowA2 );
		$from = $row2[ 0 ];

		$subject = "[WITworks Review Board] " . $from . " is contacting you about " . $companyName;
		$msg = stripslashes( trim( $_POST[ 'message' ] ) );

		if( mail( $to, $subject, $msg, 'From: ' . $from . PHP_EOL ) && mail( $from, "Copy of your sent message from WRB", $msg, 'From: WITworks Review Board <noreply@WITworksReviewBoard.com>' ) )
		{
			echo 
				'<div class="modal hide fade" id="cModalSuccess">
  					<div class="modal-header">
  						<button type="button" class="close" data-dismiss="modal">×</button>
    					<h3>Success!</h3>
  					</div>
  					<div class="modal-body">
    					<p>Your message was submitted! Look for a copy in your inbox.</p>
  					</div>
  					<div class="modal-footer">
    					<a href="#" class="btn" data-dismiss="modal">OK</a>
					</div>
				</div>
				<script type="text/javascript">
					$( "#cModalSuccess" ).modal( "show" );
				</script>';
		}
		else
		{
			echo 
				'<div class="modal hide fade" id="cModalFail">
  					<div class="modal-header">
  						<button type="button" class="close" data-dismiss="modal">×</button>
    					<h3>Ruh roh!</h3>
  					</div>
  					<div class="modal-body">
    					<p>There was an error in submitting your message!  Please try again~</p>
  					</div>
  					<div class="modal-footer">
    					<a href="#" class="btn" data-dismiss="modal">OK</a>
					</div>
				</div>
				<script type="text/javascript">
					$( "#cModalFail" ).modal( "show" );
				</script>';
		}
	}

	echo '
		<div class="modal hide fade" id="cModal">
			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal">×</button>
   				<h3>Contact the student reviewer</h3>
  			</div>
  			<div class="modal-body">
   				<p>Have a question for the reviewer or want to find out more about their experience at this company?  Contact them with the form below.  Keep the following in mind:
  					<ul>
						<li><b>The student reviewer may choose <em>not</em> to respond, so don\'t hold your breath for a response!</b></li>
						<li>Your WIT email will be visible to the student.</li>
						<li>Your message to the student will not be saved on our server.</li>
						<li>You will receive a confirmation email with a copy of your message.</li>
					</ul>
    			</p>
    			<br>

    			<form id="contactReviewer-form" method="POST" action="">
					<fieldset>
						<div class="control-group">
							<div class="controls">
								<textarea class="input-xlarge" style="width:520px;" name="message" rows="7" placeholder="Type your questions or responses to the reviewer here.  Keep in mind that they may choose not to respond back..."></textarea>
							</div>
						</div>
						<button class="btn btn-success" type="submit" '; if ( $_SESSION[ 'username' ] == "demo" ) echo 'disabled'; echo '>Send message</button>
						<button class="btn btn-info" type="reset">Reset fields</button>
					</fieldset>
				</form>

			</div>
	  		<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Cancel</a>
			</div>
		</div>';
?>