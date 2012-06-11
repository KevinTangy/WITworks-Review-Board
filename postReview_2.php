
<?php include( "checkSession.php" ); ?>
	
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		
		<style media="screen" type="text/css">
			.defaultText { width: 300px; }
			.defaultTextActive { color: #a1a1a1; font-style: italic; }
		</style>
		
		<script src='http://jquery.com/src/jquery-latest.js' type="text/javascript"></script>
		<script src="js/checkStars.js" type="text/javascript"></script>
		<script src='js/jquery.raty.js' type="text/javascript"></script>
		<script src='js/jquery.defaultText.js' type="text/javascript"></script>
		<script src='js/jquery.validate.js' type="text/javascript"></script>
		
		<script>
			$( document ).ready( function()
			{
				$( "#reviewForm" ).validate();
			} );
		</script>
		
		<title>WITworks Review Board - Post a Co-op Review</title>
		
		<?php include( "header.php" ); ?>
	</head>

	<?php $thisPage="post"; include( "nav.php" ); ?>
	
	<body>
	<div id="content-container">
    <br><br><br>
		
	<h3>Post a Co-op Review</h3>
    
	<FORM action="prInsert.php" method="post" NAME="reviewForm" id="reviewForm" onSubmit="return checkStars( this.form );">
		<b> * Company/Employer Name:</b><br>
		
			<?php
				// if user came to post page from company page, auto fill company name and disable selection
				
				// database connection settings
				include( 'config.php' );
					
				if ( isset( $_GET[ 'company' ] ) )
				{
					$company = @$_GET[ 'company' ]; //this is the string they searched for

					// Build SQL Query
					$query = "SELECT * FROM Company WHERE CompanyName = '" . mysql_real_escape_string( $company ) . "'";
	
					$result = mysql_query( $query ) or die( mysql_error() );
	
					echo '<select name="company_name" class="required" size=1>';
					echo '<option value="' . mysql_real_escape_string( $company ) . '" selected>' . $company . '</option>';
					echo '</select> * <BR>';
				}
				else
				{
					echo '<select name="company_name" id="company_name" class="required" size=1>';
					echo '<option value="" disabled="disabled" selected>Select a company/employer below</option>';
					
					$result = mysql_query( "SELECT CompanyName FROM Company ORDER BY CompanyName ASC");
					while( $row = mysql_fetch_array( $result ) ) //loops through each row of returned table
					{
						echo '<option value="' . $row[0] . '">' . $row[0] . '</option>';
					}
					
					echo '<option value="" disabled="disabled"></option>';
					echo '<option value="OTHER_COMPANY">OTHER (Enter the name below)</option>';
					echo '</select>';
					
					echo '<BR id="break"><BR id="break">';
					echo '<b id="other_company_name_title"> * OTHER Company/Employer Name:</b><br id="break2">';
					echo '<INPUT NAME="other_company_name" TYPE="text" SIZE="30" MAXLENGTH="30" id="other_company_name" placeholder="ACME Corporation" class="required"><br id="break3">';
					
					echo '<script type="text/javascript">';
					echo '	$( function()';
					echo '	{';
					echo '		$( "#company_name" ).ready( function()';
					echo '		{';
					echo '			$( "#break" ).hide();';
					echo '			$( "#break2" ).hide();';
					echo '			$( "#break3" ).hide();';
					echo '			$( "#other_company_name_title" ).hide();';
					echo '			$( "#other_company_name" ).hide();';
					echo '		} );';
					echo '		$( "#company_name" ).change( function()';
					echo '		{';
					echo '			if ( $( "#company_name" ).val() != "OTHER_COMPANY" )';
					echo '			{';
					echo '				$( "#break" ).hide();';
					echo '				$( "#break2" ).hide();';
					echo '				$( "#break3" ).hide();';
					echo '				$( "#other_company_name_title" ).hide();';
					echo '				$( "#other_company_name" ).hide();';
					echo '			}';
					echo '			else';
					echo '			{';
					echo '				$( "#break" ).show();';
					echo '				$( "#break2" ).show();';
					echo '				$( "#break3" ).show();';
					echo '				$( "#other_company_name_title" ).show();';
					echo '				$( "#other_company_name" ).show();';
					echo '			}';
					echo '		} );';
					echo '		$( "#resetForm" ).click( function()';
					echo '		{';
					echo '			$( "#break" ).hide();';
					echo '			$( "#break2" ).hide();';
					echo '			$( "#break3" ).hide();';
					echo '			$( "#other_company_name_title" ).hide();';
					echo '			$( "#other_company_name" ).hide();';
					echo '		} );';
					echo '	} );';
					echo '</script>';
				}
			?>
			
		<BR>
		
		<b> * Co-op Title:</b><br>
		<INPUT NAME="title" TYPE="text" SIZE="30" MAXLENGTH="30" id="title" placeholder="Coffee Slave" class="required">
		<BR><BR>
			
		<b> * Co-op Course Number:</b><br>
			<select name="course_num" class="required" size=1>
				<option value="" disabled="disabled" selected>Select a course number below</option>
				<option value="COOP300">COOP300</option>
				<option value="COOP400">COOP400</option>
				<option value="COOP500">COOP500</option>
				<option value="COOP600">COOP600</option>
			</select>
		<BR><BR>
		
		<b> * Tell us what you did...</b><br>
			<textarea name="desc" type="text" id="desc" placeholder="I was responsible for all the awesomeness!" class="required"></textarea>
		<BR><BR>
		
		<b> * So, what did you think of it?</b><br>
			<textarea name="review" type="text" id="review" placeholder="This was the best co-op EVER!" class="required"></textarea>
		<BR><BR>
		
		<b> * Overall Rating:</b>
		<br>
		<div class="stars" id="stars"></div>
		<script type="text/javascript">
			$('#stars').raty({
				cancel:		true,
				path:		'images/',
				cancelOff:	'cancel-off-big.png',
				cancelOn:	'cancel-on-big.png',
				starOff:	'star-off-big.png',
				starOn:		'star-on-big.png',
				width:		168,
				//scoreName:	'oScore'
			});
		</script>
		<br>
		<b> * Culture Rating:</b>
		<br>
		<div class="stars" id="stars1"></div>
		<script type="text/javascript">
			$('#stars1').raty({
				cancel:		true,
				path:		'images/',
				cancelOff:	'cancel-off-big.png',
				cancelOn:	'cancel-on-big.png',
				starOff:	'star-off-big.png',
				starOn:		'star-on-big.png',
				width:		168,
				scoreName:	'cScore'
			});
		</script>
		<br>
		<b> * Experience Rating:</b> 
		<br>
		<div class="stars" id="stars2"></div>
		<script type="text/javascript">
			$('#stars2').raty({
				cancel:		true,
				path:		'images/',
				cancelOff:	'cancel-off-big.png',
				cancelOn:	'cancel-on-big.png',
				starOff:	'star-off-big.png',
				starOn:		'star-on-big.png',
				width:		168,
				scoreName:	'eScore'
			});
		</script>
		<br>
		<b> * Management Rating:</b>
		<br>
		<div class="stars" id="stars3"></div>
		<script type="text/javascript">
			$('#stars3').raty({
				cancel:		true,
				path:		'images/',
				cancelOff:	'cancel-off-big.png',
				cancelOn:	'cancel-on-big.png',
				starOff:	'star-off-big.png',
				starOn:		'star-on-big.png',
				width:		168,
				scoreName:	'mScore'
			});
		</script>
		
		<BR><BR><BR>
		
		<INPUT TYPE="submit" VALUE="Post!" /> <!--onClick="return checkForm( this.form )"-->
		<!-- <INPUT TYPE="button" VALUE="Post!" onClick="return checkStars( this.form ); this.form.submit();" /> -->
		<input type="button" value="Reset Form" onclick="this.form.reset(); $( '.stars' ).raty( 'cancel' );" id="resetForm"/>
    </FORM> 
	
	
    <br>
	</body>

	<?php include( "footer.php" ); ?>
	</div>
</html>




