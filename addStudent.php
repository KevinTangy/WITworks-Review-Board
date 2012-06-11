
<?php
	include( "checkSession.php" );
	if ( !( include( "checkAdmin.php" ) ) )
		header( "Location: home.php" );
?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		
		<title>WITworks Review Board - Add Student</title>
		
	</head>
	
	<body>
		<?php include( "header.php" ); ?>
		
		<div id="page">
        <div id="nonFooter">
		
		<?php $thisPage="admin"; include( "nav.php" ); ?>
		
		<div id="content-container">	
    <br><br><br>

    <h3>Student Entry Form</h3>
	
	<!-- Entry Form for Student -->
	<FORM action="addStudentDB.php" method="post" NAME="StudentEntry" id="StudentEntry">
		
		<?php
			// database connection settings
			include( 'config.php' );			
		?>

		<!-- Entry Field For Student First Name -->
		<b>Student First Name:</b><br>
		<INPUT class="defaultText" NAME="firstname" TYPE="text" SIZE="30" MAXLENGTH="30" id="title" placeholder="First Name">
		<BR><BR>
		
		<!-- Entry Field For Student Last Name -->
		<b>Student Last Name:</b><br>
		<INPUT class="defaultText" NAME="lastname" TYPE="text" SIZE="30" MAXLENGTH="30" id="title" placeholder="Last Name">
		<BR><BR>
			
		<!-- Entry Field For Student ID -->
		<b>Student ID:</b><br>
		<INPUT class="defaultText" NAME="studentid" TYPE="text" SIZE="30" MAXLENGTH="30" id="title" placeholder="W00000000">
		<BR><BR>
		
		<!-- Entry Field For Student Email Address -->
		<b>Email Address:</b><br>
		<INPUT class="defaultText" NAME="email" TYPE="text" SIZE="30" MAXLENGTH="30" id="title" placeholder="username@wit.edu">
		<BR><BR>
		
		<!-- Selection Field For Student Year of Graduation -->
		<b>Year of Graduation:</b><br>
			<select name="year" size=1>
				<option value="" disabled="disabled" selected>Select Year or Graduation</option>
				<option value="2012">2012</option>
				<option value="2013">2013</option>
				<option value="2014">2014</option>
				<option value="2015">2015</option>	
			</select>
		<BR><BR>
		
		<!-- Selection Field For Student Major -->
		<b>Select Major:</b><br>
		    
		<?php //this is  the dropdown box with all of the majors currently in the database
			echo '<select name="majorID" id="majorID" size=1>';
			echo '<option value="" disabled="disabled" selected>Select a Major ID below</option>';
                                                                             
			$result = mysql_query("SELECT MajorID FROM Major ORDER BY MajorID ASC");
			while($row = mysql_fetch_array($result)) //loops through each row of returned table and prints the results in "option" tags
			{
				echo '<option value="' . $row[0] . '">' . $row[0] . '</option>';
			}
			echo '</select>';
			
		?> 
		<BR><BR> 
		<!-- Submit Button for new Student form -->	
		<INPUT TYPE="submit" VALUE="Submit"/><input type="button" value="Reset Form" onclick="this.form.reset();" id="resetForm"/>
     </FORM> 
	<?php include( "import2.php" ); ?>
	</div>
		</div>
		</div>
	
		<?php include( "footer.php" ); ?>
		
	</body>
	
</html>
