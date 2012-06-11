
<div id="companyTree">
	<h3>Search by Major</h3>
	
	<?php
	
	// database connection settings
	include( 'config.php' );
	
	$result=mysql_query( "SELECT CompanyName, MajorName, company_by_major.MajorID, company_by_major.CompanyID FROM Company, Major, company_by_major WHERE Major.MajorID = company_by_major.MajorID AND Company.CompanyID = company_by_major.CompanyID ORDER BY MajorName ASC, CompanyName ASC"); //returns table of results 
	
	$previousMajor = null;
	$count = 0;
	
	echo "<ul class=\"collapsibleList\">";

	while( $row = mysql_fetch_array( $result ) ) //loops through each row of returned table
	{
		if( $previousMajor != $row[2] ) //if you've come to the first entry for this specific major, print major name AND company name
		{
			if($count != 0) //if this is not the VERY FIRST ROW IN TABLE RESULTS reason because we don't want </ul></li> close tags before we even have any of the list printed
			{
				echo "</ul></li>";
			}
			echo "<li>" . $row[1] . "<ul>"; //major name
			echo "<li><a href='viewCompany.php?company=" . urlencode( $row[0] ) . "'>" . $row[0] . "</a></li>"; //company name
		}
		else //if the same major turns up twice in a row in the table of results
		{
			echo "<li><a href='viewCompany.php?company=" . urlencode( $row[0] ) . "'>" . $row[0] . "</a></li>";  //ONLY PRINT THE COMPANY NAME
		}

		$previousMajor = $row[2]; //previousMajor is now the major ID of the current row, go to top of loop
		$count++; //just a counter for the loop, equal to the number of entries in the company_by_major table, this number isnt very important to us, we just need to know when its 0 in this loop see line 18
	}

	echo "</ul>";
	?>
	
</div>
