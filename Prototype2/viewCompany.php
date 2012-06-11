
<?php
	// initialize session
	session_start();
	
	// if user manually attempts to reach this page, redirect to home
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	if ( !isset( $_GET[ 'company' ] ) )
	{
		header( "Location: home.php" );
	}
	else if ( !isset( $_SESSION[ "username" ] ) && isset( $_SESSION[ "disclaimer" ] ) )
	{
		header( "Location: login.php" );
	}
	else if ( !isset( $_SESSION[ "disclaimer" ] ) )
	{
		header( "Location: splash.php" );
	}
?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<script src='http://jquery.com/src/jquery-latest.js' type="text/javascript"></script>
		<script src='js/jquery.raty.js' type="text/javascript"></script>
		<title>WITworks Review Board</title>
		<?php include( "header.php" ); ?>
	</head>
	
	<?php include( "nav.php" ); ?>
	
	<body>
        <br><br><br>
		
		<div id="content-container">
			<center>
				<table border="1">
					<tr valign="top">
						<td width="30%" valign="top">
							<?php

								// database connection settings
								include( 'config.php' );
								
								$searchString = @$_GET['company'] ; //this is the string they searched for
								
								
								// Build SQL Query
								$query = "SELECT * FROM Company WHERE CompanyName LIKE '" . mysql_real_escape_string( $searchString ) . "%'";
								$result = mysql_query( $query ) or die( mysql_error() ); 
								$row = mysql_fetch_array($result);
								$companyID = $row[ 0 ];
								
								$query2 = mysql_query( "SELECT COUNT( ReviewID ) FROM Student_Reviews JOIN Company WHERE Student_Reviews.CompanyID = Company.CompanyID AND Student_Reviews.CompanyID = '" . $companyID . "'" ) or die( mysql_error() );
								$reviewCountRow = mysql_fetch_array($query2);
								$reviewCount = $reviewCountRow[ 0 ];
								$grammarReview = " reviews";
								if ( $reviewCount == 1 )
									$grammarReview = " review";
								
								$companyName = $row[ 1 ];
								//prints to screen LOGO, Company Name, Company URL, Company Description
								if ( file_exists( $_SERVER{'DOCUMENT_ROOT'} . "/images/logos/" . $companyID . ".png" ) )
								{
									echo '<h2>'. $row[1] .'</h2><br><img src="/images/logos/' . $row[0] . '.png"  width="300"><br><br><a href="' . $row[2] . '" target="_blank">' . $row[2] . '</a><br><br>' . $row[3] . '<br><br><br>';
								}
								else
								{
									echo '<h2>'. $row[1] .'</h2><br><img src="/images/logos/newcompany.png"  width="216"><br><br><a href="http://www.google.com/search?hl=en&q=' . urlencode( $companyName ) . '" target="_blank">' . $row[2] . '</a><br><br>' . $row[3] . '<br><br><br>';
								}
								
								echo 'This company/employer hires co-op students from the following majors:<br>';
								$majorRow = mysql_query( "SELECT MajorID FROM company_by_major JOIN Company WHERE Company.CompanyID = company_by_major.CompanyID AND Company.CompanyID = '$companyID'" ) or die( mysql_error() );
								while( $majors = mysql_fetch_array( $majorRow ) )
								{
									$majorsList .= $majors[ 0 ] . ", ";
								}
								echo rtrim( $majorsList, ", " );
								
								echo '<br><br><br><font size="-1">' . $row[ 1 ] . " has " . $reviewCount . ' ' . $grammarReview . '.</font>';
							   
							?>
						</td>
						<td width="70%" valign="top">
							
							<?php include( "displayReviews.php" ); ?> <!--?company=" . $row[1] ); ?>-->
							
						</td>
					</tr>
				</table>
				
				<?php
					echo '<font size="+1"><a href="postReview.php?company=' . urlencode( $companyName ) . '"> Post your own review for ' . $companyName . '</a></font>';
				?>
				
			</center>
		</div>
	</body>
    
    <br><br>
	
	<?php include( "footer.php" ); ?>
	
</html>

