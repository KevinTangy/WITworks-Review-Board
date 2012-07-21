<div class="row">		
	<div class="span8">
		<h2>Search results for companies matching "<?php echo $searchString; ?>"</h2>
		
		<table class="table table-striped">
			<thead><tr><th>Company/Employer</th><th>Majors</th></tr></thead>
			<tbody>
			<?php
				while ( $i = mysql_fetch_array( $rows ) )
				{
					echo '<tr onclick="location.href=\'viewCompany.php?company=' . urlencode( $i[ 1 ] ) . '\';" style="cursor: pointer">';
					echo '<td>' . $i[ 1 ] . '</td>';
					
					$majorRow = mysql_query( "SELECT MajorID FROM company_by_major JOIN Company WHERE Company.CompanyID = company_by_major.CompanyID AND Company.CompanyID = '" . $i[ 0 ] . "'" ) or die( mysql_error() );
					while( $majors = mysql_fetch_array( $majorRow ) )
					{
						$majorsList .= $majors[ 0 ] . ", ";
					}
					$majorsList = rtrim( $majorsList, ", " );
					echo '<td>' . $majorsList . '</td>';
					$majorsList = "";
					echo '</tr>';
				}
			?>
			</tbody>
		</table>
	</div>
	
	<div class="span4">
		<br><h3>5 Random Companies</h3><br>
		<table class="table table-striped">
			<tbody>
				<?php
					$randC = mysql_query( "SELECT * FROM Company WHERE CompanyID >= ( SELECT FLOOR( MAX( CompanyID ) * RAND() ) FROM Company ) LIMIT 5" ) or die( mysql_error() );
					while ( $i = mysql_fetch_array( $randC ) )
					{
						echo '<tr onclick="location.href=\'viewCompany.php?company=' . urlencode( $i[ 1 ] ) . '\';" style="cursor: pointer">';
						echo '<td>' . $i[ 1 ] . '</td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</div>