<?php
	// initialize session
	session_start();
	
	// if user is not logged in and has accepted disclaimer, redirect to login page, else if disclaimer has not been accepted, redirect to splash
	include( "checkSession.php" );
?>

	<?php include( "header.php" ); ?>
	
	
	<body>

	<?php $thisPage = "about"; include( "nav.php" ); ?>

	<div class="wrapper">
		<div class="container">
			
		
			<div class="page-header">
				<h1>What is WITworks Review Board?</h1>
			</div>
			<div class="row vertical-spacing">
				<div class="span8 offset1">
				<p>WITworks Review Board is a web application which is designed by students for you, the students. The idea behind it is to a have completely centralized location for all your co-op needs. The application allows you to not only post reviews on your own experiences; but also if you are a newer student looking for co-ops or an upper classman looking for a potential job, it can give you a sense of what jobs are out that you can potentially apply for. As long as you are a registered student at Wentworth Institute of Technology, you will be able to access this site.</p>
				<br>
				<br>
				</div>
			</div>
			
			<div class="page-header">
				<h1>Meet the Founders</h1>
			</div>
			
			<br>
			
			<div class="row">
				<div class="span4 offset4">
					<img src="img/kevin.png">
					<h2>Kevin Tang</h2>
					<p><strong>The one that keeps it together.</strong> Kevin is the project manager of WITworks Review Board. His passion for coding and his programming language expertise makes him a great leader. In his spare time, Kevin likes to take pictures with Instagram and work full time at Wayfair.</p>
				</div>
			</div>
			
			<div class="row vertical-spacing">
				<div class="span4 offset2">
					<img src="img/juwelene.png">
					<h2>Juwelene Parro</h2>
					<p><strong>The girl in charge.</strong> Being the only girl in the group, Juwelene concentrates on website design and database management. Researching different website layouts and design is on her daily schedule to further improve WITworks Review Board. She loves writing SQL queries as much as she loves shopping on Newbury Street. </p>
				</div>
				<div class="span4">
					<img src="img/ian.png">
					<h2>Ian Duncan</h2>
					<p><strong>The smooth talker.</strong> Ian oversees all the documentation and presentation aspect of the project. No one can sell this website to someone better than Ian. He can whip up a presentation like no other. He has a way with words which is probably why his girlfriend of 4 and a half years, Krystal, is still with him. </p>
				</div>
			</div>
			
			<div class="row">
				<div class="span4 offset4">
					<img src="img/dan.png">
					<h2>Dan Collins</h2>
					<p><strong>The one that got away.</strong> Dan played a big role in the early stages of WITworks Review Board. For his senior project he decided to join a different team but we want to acknowledge all his contribution and wanted him to know that we miss him dearly!</p>
				</div>
			</div>
			
			<br>
			<br>
			<br>
			
		</div>
	
	</div>
	
	<?php include( "footer.php" ); ?>
	<?php include( "js.php" ); ?>

	</body>