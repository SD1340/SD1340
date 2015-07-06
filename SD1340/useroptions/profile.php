<!DOCTYPE html>
<html>
<head>
	<title>SD1340 - Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../imgs/icons/favicon.png" type="image/png">
	<link rel="stylesheet" href="../css/nav.css" type="text/css">
	<link rel="stylesheet" href="../css/profile.css" type="text/css">
	<script type="text/javascript" src='../js/jquery.js'></script>
	<script type="text/javascript" src='../js/nav.js'></script>
	<script type="text/javascript" src="../js/profile.js"></script>
</head>
<body>
	<?php
		session_start();
		$username = $_SESSION['username'];
		$filepath = '../imgs/userimages/';
		$image = $_SESSION['userimage'];
		if (empty($image)){
			$image='default.png';
		}
		$userimage = $filepath . $image;
		if(empty($username)){
			echo "<script>location.href='index.php';</script>";
		}
		$password	= $_SESSION['password'];
		$firstname 	= $_SESSION['firstname'];
		$lastname 	= $_SESSION['lastname'];
		$email 		= $_SESSION['email'];
		$phone		= $_SESSION['phone'];		
	?>
	<nav id='topnav'>
		<ul>
			<li id='btn1'><a href='#' id='menu_div'><img id='menubtn' class='icon' src='../imgs/buttons/menu.png'/></a></li>
			<li id='btn2' class='topnav_li'><a href='../home.php' class='topnav'><img class='icon' src='../imgs/icons/home.png'/><span class='topnav_txt'>Home</span></a></li>
			<li id='btn3' class='topnav_li'><a href='#' class='topnav'><img class='icon' src='../imgs/icons/assignments.png'/><span class='topnav_txt'>Assignments</span></a>
				<ul id="assignments_list">
					<li><a href='#'>Assignment 1</a></li>
					<li><a href='#'>Assignment 2</a></li>
					<li><a href='#'>Assignment 3</a></li>
					<li><a href='#'>Assignment 4</a></li>
					<li><a href='#'>Assignment 5</a></li>
				</ul>
			</li>
			<li id='btn4' class='topnav_li'><a href='#' class='topnav'><img class='icon' src='../imgs/icons/labs.png'/><span class='topnav_txt'>Labs</span></a>
				<ul id="labs_list">
					<li><a href='#'>Lab 1</a></li>
					<li><a href='#'>Lab 2</a></li>
					<li><a href='#'>Lab 3</a></li>
					<li><a href='#'>Lab 4</a></li>
					<li><a href='#'>Lab 5</a></li>
				</ul>
			</li>
			<div id='user'><a id='logout' href='php/logout.php'>log out</a><a href='#' id='profile'><img src='<?php echo $userimage; ?>' href='#'/><span id='username_nav'><?php echo $username; ?></span></a></div>
		</ul>
	</nav>
	<nav id='hideaway'>
		<ul>
			<li><a href='#' class='hideaway'>Dashboard<img class='icon' src='../imgs/icons/dashboard.png'/></a></li>
			<li><a href='#' class='hideaway'>Schedule<img class='icon' src='../imgs/icons/schedule.png'/></a></li>
			<li><a href='#' class='hideaway'>Turn In<img class='icon' src='../imgs/icons/turnin.png'/></a></li>
			<li><a href='#' class='hideaway'>Downloads<img class='icon' src='../imgs/icons/download.png'/></a></li>
			<li><a href='#' class='hideaway'>Forum<img class='icon' src='../imgs/icons/forum.png'/></a></li>
			<li><a href='#' class='hideaway'>Presentations/Projects<img class='icon' src='../imgs/icons/presentation.png'/></a></li>
			<li><a href='uploaduserimage.php' class='hideaway'>User Options<img class='icon' src='../imgs/icons/useroptions.png'/></a></li>
		</ul>
	</nav>
	<section id="logodiv">
		<img src='../imgs/logo.png' id="logo"/>
	</section>
	<main>
		<div>
			<span>Username: <?php echo $username; ?></span>
			<fieldset>
			<legend>Change Password</legend>
			<form id="password_form" method="POST" onsubmit="return validatepassword()">
			<span>Current Password: <input type="password" id="currentpassword" name="currentpassword"/></span>
			<span>New Password: <input type="password" id="newpassword" name="newpassword"/></span>
			<span>Re-Type New Password: <input type="password" id="retypenewpassword" name="retypenewpassword"/></span>
			<span><input type="submit" name="changepassword" id="changepassword" value="Change Password" disabled="disabled"/></span>
			</form>
			</fieldset>
		</div>
		<div>
			<fieldset>
			<legend>Contact Info</legend>
			<form id="contactinfo_form" method="POST" onsubmit="return validatecontactinfo()">
			<span>First Name: <div class="label"><?php echo $firstname; ?></div><input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>"/></span>
			<span>Last Name: <div class="label"><?php echo $lastname; ?></div><input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>"/></span>
			<span>Phone: <div class="label"><?php echo $phone; ?></div><input type="text" id="phone" name="phone" value="<?php echo $phone; ?>"/></span>
			<span>Email: <div class="label"><?php echo $email; ?></div><input type="text" id="email" name="email" value="<?php echo $email; ?>"/></span>
			<span><button id="changecontactinfo" type="button">Change Contact Info</button><input type="submit" name="updatecontactinfo" id="updatecontactinfo" value="Update Contact Info"/><button id="cancel" type="button">Cancel</button></span>
			</form>
			</fieldset>
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
<?php
	
?>