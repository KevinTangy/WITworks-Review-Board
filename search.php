<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	include( "checkSession.php" );

	if ( $_SERVER[ "REQUEST_METHOD" ] == "GET" )
	{
		// database connection settings
		include( 'config.php' );
	
		$searchString = @$_GET[ 'company' ]; //this is the string they searched for
	
		// Build SQL Query  
		$query = "SELECT * FROM Company WHERE CompanyName LIKE '" . mysql_real_escape_string( $searchString ) . "%'";
	
		$rows = mysql_query( $query ) or die( mysql_error() );
	
		if ( mysql_num_rows( $rows ) == 0 )
		{
			$error = '<div class="row"><div class="span5" style="text-align:center"><div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">&times;</a>No search results for companies matching "' . $searchString . '"</div></div></div>';
			
			ob_start();
			include( "searching.php" );
			$resultsPage = ob_get_clean();
		}
		else if ( $searchString == "" )
		{
			ob_start();
			include( "searching.php" );
			$resultsPage = ob_get_clean();
		}
		else
		{
			ob_start();
			include( "searchResults.php" );
			$resultsPage = ob_get_clean();
			// header( "Location: viewCompany.php?company=" . urlencode( $searchString ) );
		}
	}
	else
	{
		ob_start();
		include( "searching.php" );
		$resultsPage = ob_get_clean();
	}
	
	include( "header.php" );
?>


	<body>

	<?php $thisPage = "search"; include( "nav.php" ); include( "js.php" ); echo '<script src="js/jquery.raty.min.js"></script>'; ?>

	<div class="wrapper">
		<div class="container">
			
			<?php
				echo $error;
				if ( !empty( $resultsPage ) )
					echo $resultsPage;
				else
				{
					include( "searching.php" );
				}
			?>
			
		</div> <!-- /container -->
		<div class="push"></div>
	</div> <!-- /wrapper -->
	
	<?php include( "footer.php" ); ?>

	</body>


</html>
