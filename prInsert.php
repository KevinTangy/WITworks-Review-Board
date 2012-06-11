
<?php
	// initialize session
	session_start();
	
	// database connection settings
	include( 'config.php' );
	
	// get user input
	$cname = mysql_real_escape_string( $_POST[ 'company_name' ] );
	$title = mysql_real_escape_string( $_POST[ 'title' ] );
	$cnum = $_POST[ 'course_num' ];
	$desc = mysql_real_escape_string( $_POST[ 'desc' ] );
	$review = mysql_real_escape_string( $_POST[ 'review' ] );
	$ostars = $_POST[ 'score' ];
	$cstars = $_POST[ 'cScore' ];
	$estars = $_POST[ 'eScore' ];
	$mstars = $_POST[ 'mScore' ];
	
	// student info
	$query1 = mysql_query( "SELECT StudentID FROM Login WHERE username = '" . $_SESSION[ "username" ] . "'" ) or die( mysql_error() );
	$qID = mysql_fetch_array( $query1 );
	$studentID = $qID[ 0 ];
	
	// grab major and grad year according to student id of current student
	$query2 = mysql_query( "SELECT ExpectedGradYear,MajorID FROM Login,Student WHERE Login.StudentID = '" . $studentID . "' AND Login.StudentID = Student.StudentID" ) or die( mysql_error() );
	$sInfo = mysql_fetch_array( $query2 );
	$gradYear = $sInfo[ 0 ];
	$major = $sInfo[ 1 ];
	
	// get Company ID
	$query3 = mysql_query( "SELECT CompanyID FROM Company WHERE CompanyName = '$cname'" ) or die( mysql_error() );
	$cID = mysql_fetch_array( $query3 );
	$companyID = $cID[ 0 ];
	
	// insert into Reviews table
	if ( $cname != "OTHER_COMPANY" )
	{
		$queryCompanyMajor = mysql_query( "SELECT MajorID FROM company_by_major JOIN Company WHERE company_by_major.CompanyID = Company.CompanyID AND Company.CompanyID = '$companyID'" ) or die( mysql_error() );
		$majorExists = true;
		
		while ( $companyMajorRow = mysql_fetch_array( $queryCompanyMajor ) )
		{
			if ( $companyMajorRow[ 0 ] != $major )
			{
				$majorExists = false;
			}
			else
			{
				$majorExists = true;
				break;
			}
		}
		
		if ( !$majorExists )
		{
			$insertCompanyByMajor = mysql_query( "INSERT INTO company_by_major( MajorID, CompanyID ) VALUES( '$major', '$companyID' )" ) or die( mysql_error() );
		}
		
		$insert1 = mysql_query( "INSERT INTO Reviews( CourseID, JobPosition, JobDescription, CoopReview, Rating, Culture, Experience, Management ) VALUES( '$cnum', '$title', '$desc', '$review', '$ostars', '$cstars', '$estars', '$mstars' )" )  or die( mysql_error() );
	}
	else
	{
		$cname = $_POST[ "other_company_name" ];
		$insertCompany = mysql_query( "INSERT INTO Company( CompanyName, CompanyWebsite, CompanyDescription ) VALUES( '$cname', 'Website pending...', 'Description pending...' )" ) or die( mysql_error() );
		$companyID = mysql_insert_id();
		
		$insertCompanyByMajor = mysql_query( "INSERT INTO company_by_major( MajorID, CompanyID ) VALUES( '$major', '$companyID' )" ) or die( mysql_error() );
		
		$insert1 = mysql_query( "INSERT INTO Reviews( CourseID, JobPosition, JobDescription, CoopReview, Rating, Culture, Experience, Management ) VALUES( '$cnum', '$title', '$desc', '$review', '$ostars', '$cstars', '$estars', '$mstars' )" )  or die( mysql_error() );
	}
	$reviewID = mysql_insert_id();
	
	
	
	// insert into Student_Reviews table
	date_default_timezone_set( 'EDT' );
	$insert2 = mysql_query( "INSERT INTO Student_Reviews( StudentID, ReviewID, MajorID, CompanyID, Date, Time ) VALUES( '$studentID', '$reviewID', '$major', '$companyID', CURDATE(), CURTIME() )" )  or die( mysql_error() );	
	
	if ( $insert1 && $insert2 )
	{
		header( "Location: viewCompany.php?company=" . urlencode( $cname ) );
	}
	else
	{
		die( mysql_error() );
	}
	
?>
