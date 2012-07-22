<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	include( "checkSession.php" );
	
	// if user manually attempts to reach this page, redirect to home
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	if ( !isset( $_GET[ 'company' ] ) )
	{
		header( "Location: search.php" );
	}
	// checks for GET variable validity (user typed it in manually in address bar)
	else
	{
		$company = @$_GET[ 'company' ]; // this is the string they searched for
		
		// database connection settings
		include( 'config.php' );
		
		// Build SQL Query
		$query = "SELECT * FROM Company WHERE CompanyName LIKE '" . mysql_real_escape_string( $company ) . "%'";
		$result = mysql_query( $query ) or die( mysql_error() ); 
		$row = mysql_fetch_array( $result );
		
		if ( $row[ 0 ] == NULL )
		{
			header( "Location: search.php" );
		}
	}
	
	include( "header.php" );
?>


	<body>

	<?php $thisPage = "viewCompany"; include( "nav.php" ); include( "js.php" ); echo '<script src="js/jquery.raty.min.js"></script>'; ?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span4">
					<?php
						$companyID = $row[ 0 ];
								
						$query2 = mysql_query( "SELECT COUNT( ReviewID ) FROM Student_Reviews JOIN Company WHERE Student_Reviews.CompanyID = Company.CompanyID AND Student_Reviews.CompanyID = '" . $companyID . "'" ) or die( mysql_error() );
						$reviewCountRow = mysql_fetch_array( $query2 );
						$reviewCount = $reviewCountRow[ 0 ];
						
						if ( $reviewCount == 1 )
							$grammarReview = " review";
						else
							$grammarReview = " reviews";
							
						$companyName = $row[ 1 ];

						//prints to screen LOGO, Company Name, Company URL, Company Description
						if ( file_exists( $_SERVER{'DOCUMENT_ROOT'} . "/img/logos/" . $companyID . ".png" ) )
						{
							echo '<h2>'. $row[1] .'</h2><br><img src="/img/logos/' . $row[0] . '.png"  width="100%"><br><br>';
						}
						else
						{
							echo '<h2>'. $row[1] .'</h2><br><img src="/img/logos/newcompany.png"  width="100%"><br><br>';
						}
								
						if ( $row[ 2 ] != "Website pending..." )
						{
							echo '<a href="' . $row[2] . '" target="_blank">' . $row[2] . '</a><br><br>' . $row[3] . '<br><br><br>';
						}
						else
						{
							echo '<a href="http://www.google.com/search?hl=en&q=' . urlencode( $companyName ) . '" target="_blank">' . $row[2] . '</a><br><br>' . $row[3] . '<br><br><br>';
						}
								
						echo 'This company/employer hires co-op students from the following majors:<br>';
						$majorRow = mysql_query( "SELECT MajorID FROM company_by_major JOIN Company WHERE Company.CompanyID = company_by_major.CompanyID AND Company.CompanyID = '$companyID'" ) or die( mysql_error() );
						while( $majors = mysql_fetch_array( $majorRow ) )
						{
							$majorsList .= $majors[ 0 ] . ", ";
						}
						
						echo rtrim( $majorsList, ", " );
						
						echo '<br><br><br>' . $row[ 1 ] . " has " . $reviewCount . ' ' . $grammarReview . '.<br><br><br>';
						echo '<button class="btn btn-primary" href="postReview.php?company=' . urlencode( $companyName ) . '"> Post your own review for ' . $companyName . ' </button><br><br>';
					?>
				</div>
				
				<div class="span8">
					<?php include( "displayReviews.php" ); ?>
				</div>
			</div>
		</div> <!-- /container -->
		<div class="push"></div>
	</div> <!-- /wrapper -->
	
	<?php include( "footer.php" ); ?>

	</body>


</html>
