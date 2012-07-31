<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	include( "checkSession.php" );
?>

	<?php include( "header.php" ); ?>
	
	
	<body>

	<?php $thisPage = "admin"; include( "nav.php" ); ?>

	<div class="wrapper">
		<div class="container">
			<div class="row-fluid">
					
					<div class="span3">
						 <div class="well sidebar-nav">
							<ul class="nav nav-list">
							  <li class="nav-header">Administrator Dashboard</li>
							  <li><a href="admin.php">Reports and Statistics</li>
							  <li class="active"><a href="editCompany.php">Edit Company Information</a></li>
							  <li><a href="addStudent.php">Add Students</a></li>
							  <li><a href="monitorPosts">Monitor Posts</a></li>
							</ul>
						</div><!--/.well -->
					</div><!--/span-->
			
					<div class="span9">
							
							<div class="page-header"><h3>Edit Company Form</h3></div>
							* Be careful with this form! Select the company you want to edit and change ONLY the fields you want to update. 
							<br><br>

							<FORM action="editCompanyDB.php" method="post" NAME="CompanyEdit" id="CompanyEdit">
								<b>Company/Employer Name:</b><br>
								
									<?php
										// if user came to post page from company page, auto fill company name and disable selection
										
										// database connection settings
										include( 'config.php' );
											
										if ( isset( $_GET[ 'company' ] ) )
										{
											$company = @$_GET[ 'company' ]; //this is the string they searched for

											// Build SQL Query - this will query for all company information WHERE the company name matches the company name passed via HTML form data
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
											
											$result = mysql_query( "SELECT CompanyName FROM Company ORDER BY CompanyName ASC"); //queries for all company names, sorted alphabetically
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
									<b>Company URL:</b><br>
									<INPUT class="defaultText" NAME="company_url" TYPE="text" SIZE="30" MAXLENGTH="30" value = "" id="title" placeholder="http://www.example.com">
									<BR><BR>
								
									<b>Company Description:</b><br>
									<textarea class="defaultText" name="company_description" type="text" id="review" placeholder="Company Description"></textarea>
									<BR>
									<input type="submit" value="Submit">
							</FORM>
						
						
					</div><!--/span9-->
	
			
			</div><!--/rowfluid-->			
		</div><!--/-container-->
	</div><!--/wrapper-->
	
	<?php include( "footer.php" ); ?>
	<?php include( "js.php" ); ?>
				
	</body>

</html>
