
<div id="nav" align="center">
    <ul id="menu">
		<li><a href="home.php" <?php if ( $thisPage=="home" ) echo "id=\"currentpage\""; ?> target="_self">Home</a></li>
		<li><a href="myProfile.php" <?php if ( $thisPage=="profile" ) echo "id=\"currentpage\""; ?> target="_self">My Profile</a></li>
		<li><a href="search.php" <?php if ( $thisPage=="search" ) echo "id=\"currentpage\""; ?> target="_self">Search</a></li>
		<li><a href="postReview.php" <?php if ( $thisPage=="post" ) echo "id=\"currentpage\""; ?> target="_self">Post</a></li>
		<li><a href="help.php" <?php if ( $thisPage=="help" ) echo "id=\"currentpage\""; ?> target="_self">Help</a></li>
		<li><a href="http://lconnect.wit.edu/" target="_blank">Lconnect</a></li>
		<li><a href="logout.php" target="_self">Logout</a></li>
		<?php
			if ( include( "checkAdmin.php" ) )
			{
				echo '<li><a href="admin.php" ';
			
				if ( $thisPage=="admin" )
					echo 'id="currentpage"';
			
				echo 'target="_self">Admin</a></li>';
			}
		?>
	</ul>
</div>
