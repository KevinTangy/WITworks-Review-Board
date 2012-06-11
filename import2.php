
<?php
	
	
	// database connection settings
	include( 'config.php' );
		
	if ($_FILES[csv][size] > 0) { 

    //get the csv file 
    $file = $_FILES[csv][tmp_name]; 
    $handle = fopen($file,"r"); 
    
    $line = 0;
     
    //loop through the csv file and insert into database 
   do 
   { 
   	$line++;
        if ($data[0]) 
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
				
				mysql_query("INSERT INTO Login (UserName, Password, StudentID) VALUES 
					( 
						'".addslashes($data[6])."', 
						'".addslashes('cbe0cd68cbca3868250c0ba545c48032f43eb0e8a5e6bab603d109251486f77a91e46a3146d887e37416c6bdb6cbe701bd514de778573c9b0068483c1c626aec')."', 
						'".addslashes($data[0])."'
					) 
				");
				
				
	} 
	
	
   }
	
	while ($data = fgetcsv($handle,1000,",","'")); 
    
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