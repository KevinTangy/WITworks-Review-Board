<div class="row">
	<div class="span3">
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
		
	<div class="span9">
		<h2>Search results for companies matching "<?php echo $searchString; ?>"</h2>
		
		<table class="table table-striped">
			<thead><tr><th>Company Name</th><th>Logo</th></tr></thead>
			<tbody>
			<?php
				while ( $i = mysql_fetch_array( $rows ) )
				{
					echo '<tr onclick="location.href=\'viewCompany.php?company=' . urlencode( $i[ 1 ] ) . '\';" style="cursor: pointer">';
					echo '<td>' . $i[ 1 ] . '</td>';
					echo '<td><img src="/img/logos/' . $i[ 0 ] . '.png" width="25"></td>';
					echo '</tr>';
				}
			?>
			</tbody>
		</table>
	</div>
</div>