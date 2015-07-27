<nav id='topnav'>
	<ul>
		<li id='btn1'><a href='#' id='menu_div'><img id='menubtn' class='icon' src='/imgs/buttons/menu.png'/></a></li>
		<li id='btn2' class='topnav_li'><a href='/home.php' class='topnav'><img class='icon' src='/imgs/icons/home.png'/><span class='topnav_txt'>Home</span></a></li>
		<li id='btn3' class='topnav_li'><a href='#' class='topnav'><img class='icon' src='/imgs/icons/assignments.png'/><span class='topnav_txt'>Assignments</span></a>
			<ul id="assignments_list">
				<li><a href='/assignments/unit1assignment1.php'>Assignment 1</a></li>
				<li><a href='#'>Assignment 2</a></li>
				<li><a href='#'>Assignment 3</a></li>
				<li><a href='#'>Assignment 4</a></li>
				<li><a href='#'>Assignment 5</a></li>
			</ul>
		</li>
		<li id='btn4' class='topnav_li'><a href='#' class='topnav'><img class='icon' src='/imgs/icons/labs.png'/><span class='topnav_txt'>Labs</span></a>
			<ul id="labs_list">
				<li><a href='#'>Lab 1</a></li>
				<li><a href='#'>Lab 2</a></li>
				<li><a href='#'>Lab 3</a></li>
				<li><a href='#'>Lab 4</a></li>
				<li><a href='#'>Lab 5</a></li>
			</ul>
		</li>
		<div id='user'><a id='logout' href='/php/logout.php'>log out</a><a href='/profile.php' id='profile'><img src='<?php echo $userimage; ?>' href='#'/><span id='username_nav'><?php echo $username; ?></span></a></div>
	</ul>
</nav>
<nav id='hideaway'>
	<ul>
		<li><a href='/dashboard.php' class='hideaway'>Dashboard<img class='icon' src='/imgs/icons/dashboard.png'/></a></li>
		<li><a href='/schedule.php' class='hideaway'>Schedule<img class='icon' src='/imgs/icons/schedule.png'/></a></li>
		<li><a href='#' class='hideaway'>Turn In<img class='icon' src='/imgs/icons/turnin.png'/></a></li>
		<li><a href='#' class='hideaway'>Downloads<img class='icon' src='/imgs/icons/download.png'/></a></li>
		<li><a href='/forum.php' class='hideaway'>Forum<img class='icon' src='/imgs/icons/forum.png'/></a></li>
		<li><a href='#' class='hideaway'>Presentations/Projects<img class='icon' src='/imgs/icons/presentation.png'/></a></li>
		<li><a href='/uploaduserimage.php' class='hideaway'>User Options<img class='icon' src='/imgs/icons/useroptions.png'/></a></li>
	</ul>
</nav>