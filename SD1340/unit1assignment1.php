<!DOCTYPE html>
<html>
<head>
	<title>SD1340 - Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="imgs/icons/favicon.png" type="image/png">
	<link rel="stylesheet" href="css/nav.css" type="text/css">
	<link rel="stylesheet" href="css/slider.css" type="text/css">
	<link rel="stylesheet" href="css/home.css" type="text/css">
	<script type="text/javascript" src='js/jquery.js'></script>
	<script type="text/javascript" src='js/nav.js'></script>
	<script type="text/javascript" src="js/jssor.js"></script>
    <script type="text/javascript" src="js/jssor.slider.js"></script>
	<script type="text/javascript" src="js/slider.js"></script>
	<script type="text/javascript" src="js/home.js"></script>
</head>
<body>
	<?php
		session_start();
		$username = $_SESSION['username'];
		$filepath = 'imgs/userimages/';
		$image = $_SESSION['userimage'];
		if (empty($image)){
			$image='default.png';
		}
		$userimage = $filepath . $image;
		if(empty($username)){
			echo "<script>location.href='index.php';</script>";
		}
	?>
	<nav id='topnav'>
		<ul>
			<li id='btn1'><a href='#' id='menu_div'><img id='menubtn' class='icon' src='imgs/buttons/menu.png'/></a></li>
			<li id='btn2' class='topnav_li'><a href='#' class='topnav'><img class='icon' src='imgs/icons/home.png'/><span class='topnav_txt'>Home</span></a></li>
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
			<li><a href='#' class='hideaway'>Forum<img class='icon' src='imgs/icons/forum.png'/></a></li>
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
				<h1>Unit 1 Assignment 1: Research HTML5 Enhancements<h1>
			</div>
		</header>
		<div id='section'>
			<div>
				<h3>Course Objectives and Learning Outcomes</h3>
					<ul style="list-style:disc;">
						<li>Create a website using HTML5.</li>
						<br>
						<li>Structure content on a Web page using HTML5 tags.</li>
					</ul>
				<br>
				<h3>Assignment Requirements:</h3>
					<p>Use the HTML 5.1 specification and the documents on Web Platform Docs to research three semantic tags. 
					<br>
					<br>
					Write a one-page paper explaining how to use those tags. Include a short example of an HTML page that properly uses the three tags.</p>
				<br>
				<h3>Required Resources:</h3>
					<ul>
						<li>HTML 5.1 Specification
						<br><a href=http://www.w3.org/TR/2013/WD-html51-20130528/>http://www.w3.org/TR/2013/WD-html51-20130528/</a></li>
						<br>
						<li>Web Platform Docs
						<br><a href=http://docs.webplatform.org/wiki/Main_Page>http://docs.webplatform.org/wiki/Main_Page</a></li>
					</ul>
				<br>
				<h3>Submission Requirements:</h3>
					Submit a one-page paper to your instructor. Cite any sources used using APA format.
				<br>
				<h3>Evaluation Requirements:</h3>
				<table border="1" style="width:100%">
					<tr>
						<td><h3>Category</h3></td>
						<td><h3>#</h3></td>
						<td><h3>Criteria</h3></td>
					</tr>
					<tr>
						<td rowspan="2">Content (90%)</td>
						<td>1.1</td>
						<td>The essay should describe how to use three semantic tags.
						<br><br>Up to 60 points for this element</td>
					</tr>
					<tr>
						<td>1.2</td>
						<td>The essay should give an example of how to use the three tags.
						<br><br>Up to 30 points for this element</td>
					</tr>
					<tr>
						<td>Style (10%)</td>
						<td>2.1</td>
						<td>Information should be organized in a logical, easy-to-read manner
						<br><br>Up to 10 points for readability and style</td>
					</tr>
				</table>
			</div>
		</div>
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
