<div class="row"><br>		
	<div class="span8">
		<h2>Search results for companies matching "<?php echo $searchString; ?>"</h2>
		
		<table class="table table-striped">
			<thead><tr><th>Company/Employer</th><th>Majors</th><th>Average Rating</th></tr></thead>
			<tbody>
			<?php
				$counter = 0;
				while ( $i = mysql_fetch_array( $rows ) )
				{
					echo '<tr onclick="location.href=\'viewCompany.php?company=' . urlencode( $i[ 1 ] ) . '\';" style="cursor: pointer">';
					echo '<td>' . $i[ 1 ] . '</td>';
					
					$majorRow = mysql_query( "SELECT MajorID FROM company_by_major JOIN Company WHERE Company.CompanyID = company_by_major.CompanyID AND Company.CompanyID = '" . mysql_real_escape_string( $i[ 0 ] ) . "'" ) or die( mysql_error() );
					while( $majors = mysql_fetch_array( $majorRow ) )
					{
						$majorsList .= $majors[ 0 ] . ", ";
					}
					$majorsList = rtrim( $majorsList, ", " );
					echo '<td>' . $majorsList . '</td>';
					$majorsList = "";
					
					$avg_rating_row = mysql_query( "SELECT AVG( Reviews.Rating ) FROM Student_Reviews JOIN Reviews JOIN Company JOIN Student WHERE Student_Reviews.CompanyID = Company.CompanyID AND Company.CompanyName = '" . mysql_real_escape_string( $i[ 1 ] ) . "' AND Student_Reviews.ReviewID = Reviews.ReviewID AND Student_Reviews.StudentID = Student.StudentID" ) or die( mysql_error() );
					$avg_rating_array = mysql_fetch_array( $avg_rating_row );
					if ( empty( $avg_rating_array[ 0 ] ) )
						$avg_rating_array[ 0 ] = 0;
					echo "<td>
						<div id=\"avg_rating_" . $counter . "\"></div>
							<script type=\"text/javascript\">
								$('#avg_rating_" . $counter . "').raty({
									score:		" . $avg_rating_array[ 0 ] . ",
									halfShow:	true,
									readOnly:	true,
									cancel:		false,
									path:		'img/raty/',
									cancelOff:	'cancel-off.png',
									cancelOn:	'cancel-on.png',
									starOff:	'star-off.png',
									starOn:		'star-on.png'
								});
							</script>
						</td>";
					echo '</tr>';
					$counter++;
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