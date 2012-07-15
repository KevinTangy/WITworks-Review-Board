<html>
	<head>	
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>WITworks Review Board - Forgot Password</title>	
		<?php include( "header.php" ); ?>
	</head>
	<body align="center">
		<?php
		
			// database connection settings
			include( 'config.php' );
										

			$companyName = @$_POST['company_name'] ; //the name of the company we are editing
			$newCompanyURL = @$_POST['company_url'] ; //the company's new URL
			$newCompanyDescription = @$_POST['company_description'] ; //the company's new description

			
			
			// Build SQL Query - this queries for all companys with a name matching the $companyName variable passed via HTML form data (should be one result - there are no duplicate company names in the database
			$query = "SELECT * FROM Company WHERE CompanyName = '$companyName'";
										
			$result = mysql_query( $query ) or die( mysql_error() ); 
										
			$row = mysql_fetch_array( $result );
			
			
			echo 'Company Entry updated!<br><br>';
			
			echo '<b>Old URL:</b> ' . $row[2] . '<br><b>New URL:</b> ' . $newCompanyURL . '<br><br>';
			echo '<b>Old Description:</b> ' . $row[3] . '<br><b>New Description:</b> ' . $newCompanyDescription . '<br><br>';
			
			
			if($newCompanyURL != null) //if the admin enters text into the new company URL form, update the company URL with the query below
			{
				mysql_query( "UPDATE Company SET CompanyWebsite='$newCompanyURL' WHERE CompanyName='$companyName'" ); //this query updates the password field in the Login table with the users $newPw
			}	
			if($newCompanyDescription != null) //if the admin enters text into the new company description box, update the database with the new description with the query below.
			{
				mysql_query( "UPDATE Company SET CompanyDescription='$newCompanyDescription' WHERE CompanyName='$companyName'" ); //this query updates the password field in the Login table with the users $newPw
			}	
			
			
		?>
	</body> 
	
	<?php include( "footer.php" ); ?>
</html>
