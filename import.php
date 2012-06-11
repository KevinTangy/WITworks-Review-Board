
<?php
	
	
	// database connection settings
	include( 'config.php' );
		
	if ($_FILES[csv][size] > 0) { 

    //get the csv file 
    $file = $_FILES[csv][tmp_name]; 
    $handle = fopen($file,"r"); 

     
     if ($data[0]) 
	 {
	//don't do anything with first row
	$data = fgetcsv($handle,1000,",","'");
	//loop through the csv file and insert into database 
		while (($data = fgetcsv($handle,1000,",","'"))!==FALSE);
			{	
				mysql_query("INSERT INTO Student (StudentID, LastName, FirstName, EmailAddress, ExpectedGradYear, MajorID) VALUES 
					( 
						'".addslashes($data[0])."', 
						'".addslashes($data[1])."', 
						'".addslashes($data[2])."', 
						'".addslashes($data[3])."',
						'".addslashes($data[4])."',
						'".addslashes($data[5])."' 
					) 
				"); 
			
			}
		
	fclose($handle);
	}
		
	
    
	//
    //redirect 
    header('Location: addStudent.php?success=1'); die; 

} 

?> 

<html> 
<head> 

</head> 

<body> 

<?php if (!empty($_GET[success])) { echo "<b>Your file has been imported.</b><br><br>"; } //generic success notice ?> 

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
  <h3>Choose your CSV file to be imported: </h3><br /> 
  <input name="csv" type="file" id="csv" /> 
  <input type="submit" name="Submit" value="Submit" /> 
</form> 

</body> 
</html> 