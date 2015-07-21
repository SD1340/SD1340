<!DOCTYPE html>
<html>
<head>
	<title>SD1340 - Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="imgs/icons/favicon.png" type="image/png">
	<link rel="stylesheet" href="css/nav.css" type="text/css">
	<link rel="stylesheet" href="css/home.css" type="text/css">
	<link rel="stylesheet" href="css/dashboard.css" type="text/css">
	<script type="text/javascript" src='js/jquery.js'></script>
	<script type="text/javascript" src='js/nav.js'></script>
	<script type="text/javascript" src='js/dashboard.js'></script>
</head>
<body>
	<?php
		session_start();
		$username = $_SESSION['username'];
		if(empty($username)){
			echo "<script>location.href='index.php';</script>";
		}
		require_once('php/mysqli_connect.php');
		$query = mysqli_query($dbc, "SELECT userimage FROM users WHERE username='".$username."'") 
			or die(mysql_error("<script>window.location.href='../server_error.html';</script>"));
			
		$res = mysqli_fetch_row($query);
		
		$image = $res[0];
		if (empty($image)){
			$image='default.png';
		}
		$filepath = 'imgs/userimages/';
		$userimage = $filepath . $image;
	?>
	<input type="hidden" value="<?php echo $username;?>" id="username">
	<nav id='topnav'>
		<ul>
			<li id='btn1'><a href='#' id='menu_div'><img id='menubtn' class='icon' src='imgs/buttons/menu.png'/></a></li>
			<li id='btn2' class='topnav_li'><a href='home.php' class='topnav'><img class='icon' src='imgs/icons/home.png'/><span class='topnav_txt'>Home</span></a></li>
			<li id='btn3' class='topnav_li'><a href='#' class='topnav'><img class='icon' src='imgs/icons/assignments.png'/><span class='topnav_txt'>Assignments</span></a>
				<ul id="assignments_list">
					<li><a href='#'>Assignment 1</a></li>
					<li><a href='#'>Assignment 2</a></li>
					<li><a href='#'>Assignment 3</a></li>
					<li><a href='#'>Assignment 4</a></li>
					<li><a href='#'>Assignment 5</a></li>
				</ul>
			</li>
			<li id='btn4' class='topnav_li'><a href='#' class='topnav'><img class='icon' src='imgs/icons/labs.png'/><span class='topnav_txt'>Labs</span></a>
				<ul id="labs_list">
					<li><a href='#'>Lab 1</a></li>
					<li><a href='#'>Lab 2</a></li>
					<li><a href='#'>Lab 3</a></li>
					<li><a href='#'>Lab 4</a></li>
					<li><a href='#'>Lab 5</a></li>
				</ul>
			</li>
			<div id='user'><a id='logout' href='php/logout.php'>log out</a><a href='useroptions/profile.php' id='profile'><img src='<?php echo $userimage; ?>'/><span id='username_nav'><?php echo $username; ?></span></a></div>
		</ul>
	</nav>
	<nav id='hideaway'>
		<ul>
			<li><a href='#' class='hideaway'>Dashboard<img class='icon' src='imgs/icons/dashboard.png'/></a></li>
			<li><a href='#' class='hideaway'>Schedule<img class='icon' src='imgs/icons/schedule.png'/></a></li>
			<li><a href='#' class='hideaway'>Turn In<img class='icon' src='imgs/icons/turnin.png'/></a></li>
			<li><a href='#' class='hideaway'>Downloads<img class='icon' src='imgs/icons/download.png'/></a></li>
			<li><a href='forum.php' class='hideaway'>Forum<img class='icon' src='imgs/icons/forum.png'/></a></li>
			<li><a href='#' class='hideaway'>Presentations/Projects<img class='icon' src='imgs/icons/presentation.png'/></a></li>
			<li><a href='useroptions/uploaduserimage.php' class='hideaway'>User Options<img class='icon' src='imgs/icons/useroptions.png'/></a></li>
		</ul>
	</nav>
	<section id="logodiv">
		<img src='imgs/logo.png' id="logo"/>
	</section>
	<main>
		<header>
			<div>
				<h1>SD1340: Dashboard</h1>
			</div>
		</header>
		<?php if($username == "derrick.l.adkins" || $username == "rmemering"){?>
		<div id="newpostwrapper">
			<h3>New Post</h3>
			Type:&nbsp;
			<select id="type">
				<option value="Information">Information</option>
				<option value="Assignment">Assignment</option>
				<option value="Schedule">Schedule</option>
				<option value="Update">Update</option>
			</select>
			<textarea id="message" placeholder="Message" maxlength="3000"></textarea>
			<button type="button" id="submitnewpost" onclick="post()">Submit</button>
		</div>
		<?php }?>
		<div id="posts"></div>
	</main>
	<footer>
		<div id='footer_div'>
			<ul id='left_footer' class='inner_footer'>
				<li><a href='#'>Home</a></li>
				<li><a href='#'>Assignments</a></li>
				<li><a href='#'>Labs</a></li>
			</ul>
			<ul id='center_footer' class='inner_footer'>
				<li><a href='#'>Dashboard</a></li>
				<li><a href='#'>Schedule</a></li>
				<li><a href='#'>Turn In</a></li>
			</ul>
			<ul id='right_footer' class='inner_footer'>
				<li><a href='#'>Downloads</a></li>
				<li><a href='#'>Forum</a></li>
				<li><a href='#'>Presentations/Projects</a></li>
				<li><a href='#'>User Options</a></li>
			</ul>
		</div>
	</footer>
</body>
</html>