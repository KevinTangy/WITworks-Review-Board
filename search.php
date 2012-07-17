<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	include( "checkSession.php" );

	if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" )
	{
		// database connection settings
		include( 'config.php' );
	
		$searchString = @$_POST[ 'company' ]; //this is the string they searched for
		
		if ( $searchString == "" )
			$searchString = "!";
	
		// Build SQL Query  
		$query = "SELECT * FROM Company WHERE CompanyName LIKE '" . mysql_real_escape_string( $searchString ) . "%'";
	
		$rows = mysql_query( $query ) or die( mysql_error() );
	
		if ( mysql_num_rows( $rows ) == 0 )
		{
			$message = "No matches found. Please try again~";  // alert
			// basic search form here
			// with advanced search by major
			$resultsPage = '
				<div class="page-header">
					<h2>No search results for companies starting with "'<?php echo $searchString; ?>'"</h2>
				</div>
				
				<div class="row">
					<div class="span6">
						<form class="form-search">
							<input type="text" class="input-medium search-query">
							<button type="submit" class="btn">Search</button>
						</form>
					</div>
					<div class="span6">
						*Search by major goes here*
					</div>
				</div>
				';
		}
		else
		{
			// search results!
			// header( "Location: viewCompany.php?company=" . urlencode( $searchString ) );
		}
	}
	else
	{
		// basic search form here
		// with advanced search by major
		$resultsPage = '
			<div class="page-header">
				<h2>Search for co-op companies</h2>
			</div>
			
			<div class="row">
				<div class="span6">
					<form class="form-search">
						<input type="text" class="input-medium search-query">
						<button type="submit" class="btn">Search</button>
					</form>
				</div>
				<div class="span6">
					*Search by major goes here*
				</div>
			</div>
			';
	}
	
	include( "header.php" );
?>


	<body>

	<?php $thisPage = "search"; include( "nav.php" ); ?>

	<div class="wrapper">
		<div class="container">
			
			<?php echo $resultsPage; ?>
			
		</div> <!-- /container -->
		<div class="push"></div>
	</div> <!-- /wrapper -->
	
	<?php include( "footer.php" ); ?>

	<?php include( "js.php" ); ?>

	</body>


</html>
