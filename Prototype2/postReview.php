
<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	if ( !isset( $_SESSION[ "username" ] ) && isset( $_SESSION[ "disclaimer" ] ) )
	{
		header( "Location: login.php" );
	}
	else if ( !isset( $_SESSION[ "disclaimer" ] ) )
	{
		header( "Location: splash.php" );
	}
?>
	
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		
		<style media="screen" type="text/css">
			.defaultText { width: 300px; }
			.defaultTextActive { color: #a1a1a1; font-style: italic; }
		</style>
		
		<script src='http://jquery.com/src/jquery-latest.js' type="text/javascript"></script>
		<script src="js/checkForm.js" type="text/javascript"></script>
		<script src='js/jquery.raty.js' type="text/javascript"></script>
		<script src='js/jquery.defaultText.js' type="text/javascript"></script>
		
		<title>WITworks Review Board - Post a Co-op Review</title>
		
		<?php include( "header.php" ); ?>
	</head>

	<?php $thisPage="post"; include( "nav.php" ); ?>
	
	<body>
    <br><br><br>
	<div id="content-container">
	
	<h3>Post a Co-op Review</h3>
    
	<FORM action="prInsert.php" method="post" NAME="reviewForm" id="reviewForm">
		<b>Company/Employer Name:</b><br>
		
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
	
					echo '<select name="company_name" size=1>';
					echo '<option value="' . mysql_real_escape_string( $company ) . '" selected>' . $company . '</option>';
					echo '</select><BR>';
				}
				else
				{
					echo '<select name="company_name" id="company_name" size=1>';
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
					echo '<b id="other_company_name_title">OTHER Company/Employer Name:</b><br id="break2">';
					echo '<INPUT class="defaultText" NAME="other_company_name" TYPE="text" SIZE="30" MAXLENGTH="30" id="other_company_name" placeholder="ACME Corporation"><br id="break3">';
					
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
		<INPUT class="defaultText" NAME="title" TYPE="text" SIZE="30" MAXLENGTH="30" id="title" placeholder="Coffee Slave">
		<BR><BR>
			
		<b>Co-op Course Number:</b><br>
			<select name="course_num" size=1>
				<option value="" disabled="disabled" selected>Select a course number below</option>
				<option value="COOP300">COOP300</option>
				<option value="COOP400">COOP400</option>
				<option value="COOP500">COOP500</option>
				<option value="COOP600">COOP600</option>
			</select>
		<BR><BR>
		
		<b>Tell us what you did...</b><br>
			<textarea class="defaultText" name="desc" type="text" id="desc" placeholder="I was responsible for all the awesomeness!"></textarea>
		<BR><BR>
		
		<b>So, what did you think of it?</b><br>
			<textarea class="defaultText" name="review" type="text" id="review" placeholder="This was the best co-op EVER!"></textarea>
		<BR><BR>
		
		<b>Overall Rating:</b>
		<br>
		<div id="stars"></div>
		<script type="text/javascript">
			$('#stars').raty({
				cancel:		true,
				path:		'images/',
				cancelOff:	'cancel-off-big.png',
				cancelOn:	'cancel-on-big.png',
				starOff:	'star-off-big.png',
				starOn:		'star-on-big.png',
				width:		168
			});
		</script>
		
		<BR><BR><BR>
		
		<INPUT TYPE="submit" VALUE="Post!" onClick="return checkForm( this.form )"/>
		<input type="button" value="Reset Form" onclick="this.form.reset(); $( '#stars' ).raty( 'cancel', true )" id="resetForm"/>
    </FORM>
	
	
    <br>

	</div>
	</body>

	
	<?php include( "footer.php" ); ?>
	
</html>




