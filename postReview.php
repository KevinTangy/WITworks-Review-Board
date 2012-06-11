
<?php
	include( "checkSession.php" );
?>
	
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="stylesheet" type="text/css" href="validationEngine.jquery.css"/>
		<script src='http://jquery.com/src/jquery-latest.js' type="text/javascript"></script>
		<script src="js/checkStars.js" type="text/javascript"></script>
		<script src="js/checkStarsForm.js" type="text/javascript"></script>
		<script src='js/jquery.raty.js' type="text/javascript"></script>
		<script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
		
		<script>
			$( document ).ready( function()
			{
				$( "#reviewForm" ).validationEngine();
			} );
		</script>
		
		<title>WITworks Review Board - Post Co-op Review</title>
		
	</head>
	
	<body>
		<?php include( "header.php" ); ?>
		
		<div id="page">
        <div id="nonFooter">
		
		<?php $thisPage="post"; include( "nav.php" ); ?>
		
		<div id="content-container">
		<br><br><br>
		
		<h3>Post a Co-op Review</h3>
		<table>
			<tr>
				<td>
					<FORM action="prInsert.php" method="post" NAME="reviewForm" id="reviewForm" onSubmit="return checkStarsForm();">
						<b>Company/Employer Name:</b><br>
		
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
								echo '<select name="company_name" class="validate[required]" size=1>';
								echo '<option value="' . mysql_real_escape_string( $company ) . '" selected>' . $company . '</option>';
								echo '</select><BR>';
							}
							else
							{
								echo '<select name="company_name" id="company_name" class="validate[required]" size=1>';
								echo '<option value="" disabled="disabled" selected>Select a company/employer below</option>';
					
								$result = mysql_query( "SELECT CompanyName FROM Company ORDER BY CompanyName ASC" );
								while( $row = mysql_fetch_array( $result ) ) //loops through each row of returned table
								{
									echo '<option value="' . $row[0] . '">' . $row[0] . '</option>';
								}
					
								echo '<option value="" disabled="disabled"></option>';
								echo '<option value="OTHER_COMPANY">OTHER (Enter the name below)</option>';
								echo '</select>';
					
								echo '<BR id="break"><BR id="break">';
								echo '<b id="other_company_name_title">OTHER Company/Employer Name:</b><br id="break2">';
								echo '<INPUT NAME="other_company_name" TYPE="text" SIZE="50" MAXLENGTH="50" id="other_company_name" class="validate[required,minSize[4]]"><br id="break3">';
					
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
						<b>Co-op Title:</b><br>
						<INPUT NAME="title" TYPE="text" SIZE="30" MAXLENGTH="30" id="title" class="validate[required,minSize[4]]">
						<BR><BR>
			
						<b>Co-op Course Number:</b><br>
						<select name="course_num" id="course_num" class="validate[required]" size=1>
							<option value="" disabled="disabled" selected>Select a course number below</option>
							<option value="COOP300">COOP300</option>
							<option value="COOP400">COOP400</option>
							<option value="COOP500">COOP500</option>
							<option value="COOP600">COOP600</option>
						</select>
						<BR><BR>
		
						<b>Tell us what you did...</b><br>
						<textarea name="desc" type="text" id="desc" class="validate[required,minSize[140]]"></textarea>
						<BR><BR>
		
						<b>So, what did you think of it?</b><br>
						<textarea name="review" type="text" id="review" class="validate[required,minSize[140]]"></textarea>
						<BR><BR>
		
						<b>Overall Rating:</b>
						<br>
						<div class="stars" id="oStars"></div>
						<script type="text/javascript">
							$('#oStars').raty({
								cancel:		true,
								path:		'images/',
								cancelOff:	'cancel-off-big.png',
								cancelOn:	'cancel-on-big.png',
								starOff:	'star-off-big.png',
								starOn:		'star-on-big.png',
								width:		168,
							});
						</script>
						<br>
						<b>Culture Rating:</b>
						<br>
						<div class="stars" id="cStars"></div>
						<script type="text/javascript">
							$('#cStars').raty({
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
						<b>Experience Rating:</b> 
						<br>
						<div class="stars" id="eStars"></div>
						<script type="text/javascript">
							$('#eStars').raty({
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
						<b>Management Rating:</b>
						<br>
						<div class="stars" id="mStars"></div>
						<script type="text/javascript">
							$('#mStars').raty({
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
		
						<INPUT TYPE="submit" VALUE="Post!" />
						<input type="button" value="Reset Form" onclick="this.form.reset(); $( '.stars' ).raty( 'cancel' );" id="resetForm"/>
					</FORM> 
	
				</td>
				<td>
					<img src="/images/postingtip.png">
					<br><br><br><br>
					<img src="/images/ratingtip.png">
					<br><br>
				</td>
			</tr>
		</table>
	
		<br>
	
		</div>
		</div>
		</div>
	
		<?php include( "footer.php" ); ?>
		
	</body>
	
</html>
