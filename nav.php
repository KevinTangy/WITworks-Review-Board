
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="home.php">WRB</a>
				
				<div class="btn-group pull-right">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i>
						<?php
							include( "config.php" );
							$queryFName = "SELECT firstname, lastname FROM Student JOIN Login WHERE Login.StudentID = Student.StudentID AND username = '" . $_SESSION[ "username" ] . "'";
							$result = mysql_query( $queryFName ) or die( mysql_error() );
							$name = mysql_fetch_array( $result );
							echo $name[ 0 ] . " " . $name[ 1 ];
						?>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="myProfile.php">My Profile</a></li>
						<?php
							if ( include( "checkAdmin.php" ) )
							{
								echo '<li class="divider"></li>';
								echo '<li><a href="admin.php">Admin Dashboard</a></li>';
							}
						?>
						<li class="divider"></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
				
				<div class="nav-collapse">
					<ul class="nav">
						<li <?php if ( $thisPage=="home" ) echo 'class="active"'; ?>><a href="home.php">Home</a></li>
						<li <?php if ( $thisPage=="about" ) echo 'class="active"'; ?>><a href="about.php">About</a></li>
						<li <?php if ( $thisPage=="post" ) echo 'class="active"'; ?>><a href="postReview.php">Post</a></li>
						<li <?php if ( $thisPage=="help" ) echo 'class="active"'; ?>><a href="help.php">Help</a></li>
						<li><a href="https://lconnect.wit.edu" target="_blank">Lconnect</a></li>
					</ul>
			
					<form class="navbar-search pull-left" action="">
						<input class="search-query span3" placeholder="Search for a company" type="text">
						<div class="icon-search"></div>
					</form>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	