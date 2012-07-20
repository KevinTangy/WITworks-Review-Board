	<div class="row">
		<div class="span6">
			<div class="page-header">
				<h2>Search for Co-op Companies</h2>
			</div>
			<form class="form-search" method="GET" action="">
				<input type="text" class="input-large search-query" name="company">
				<button type="submit" class="btn">Search</button>
			</form>
		</div>
		
		<div class="span6">
			<div class="page-header">
				<h2>Search by Major</h2>
			</div>

			<?php
				// database connection settings
				include( 'config.php' );
	
				$result = mysql_query( "SELECT CompanyName, MajorName, company_by_major.MajorID, company_by_major.CompanyID FROM Company, Major, company_by_major WHERE Major.MajorID = company_by_major.MajorID AND Company.CompanyID = company_by_major.CompanyID ORDER BY MajorName ASC, CompanyName ASC"); //returns table of results 
	
				$previousMajor = null;
				$count = 0;
	
				echo '<div class="accordion" id="accordion1">';

				while ( $row = mysql_fetch_array( $result ) ) // loops through each row of returned table
				{
					if ( $previousMajor != $row[ 2 ] ) // if you've come to the first entry for this specific major, print major name AND company name
					{
						if ( $count != 0 ) // if this is not the VERY FIRST ROW IN TABLE RESULTS reason because we don't want </ul></li> close tags before we even have any of the list printed
						{
							echo "</div></div></div>";
						}
						echo '<div class="accordion-group"><div class="accordion-heading"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse' . $count . '">' . $row[ 1 ] . '</a></div>'; // major name
						echo '<div id="collapse' . $count . '" class="accordion-body collapse"><div class="accordion-inner"><p><a href="viewCompany.php?company=' . urlencode( $row[ 0 ] ) . '">' . $row[ 0 ] . '</a></p>'; // company name
						
						$count++; // just a counter for the loop, equal to the number of entries in the company_by_major table, this number isnt very important to us, we just need to know when its 0 in this loop see line 18
					}
					else // else if the same major turns up twice in a row in the table of results
					{
						echo '<p><a href="viewCompany.php?company=' . urlencode( $row[ 0 ] ) . '">' . $row[ 0 ] . "</a></p>";  // ONLY PRINT THE COMPANY NAME
					}

					$previousMajor = $row[ 2 ]; // previousMajor is now the major ID of the current row, go to top of loop
				}

				echo '</div></div></div>';
			?>
	
		</div>
	</div>