
<!DOCTYPE html>
<html lang="en">


	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Le styles -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<style type="text/css">
			body
			{
				padding-top: 60px;
				padding-bottom: 40px;
			}
		</style>
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
	
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="ico/favicon.ico">
		<!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png"> -->
		
		<?php
			$title = "WITworks Review Board";
			switch( $_SERVER[ "SCRIPT_NAME" ] )
			{
				case "/splash.php":
					$title .= " - Disclaimer";
					break;
				case "/login.php":
					$title .= " - Login";
					break;
				case "/iforgot.php":
					$title .= " - Forgot Password";
					break;
				case "/home.php":
					$title .= " - Home";
					break;
				case "/index.php": default:
					break;
			}
			
			echo "<title>" . $title . "</title>";
		?>
		
	</head>
