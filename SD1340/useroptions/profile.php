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
		require_once('../php/mysqli_connect.php');
		$query = mysqli_query($dbc, "SELECT username, firstname, lastname, email, phone, userimage FROM users WHERE username = '".$username."'")
			or die(mysql_error("<script>window.location.href='../server_error.html';</script>"));
		$res = mysqli_fetch_row($query);
		
		$username 	=$res[0];
		$firstname	=$res[1];
		$lastname	=$res[2];
		$email    	=$res[3];
		$phone    	=$res[4];
		$userimage	=$res[5];
		
		$filepath = '../imgs/userimages/';
		if (empty($userimage)){
			$userimage='default.png';
		}
		$userimage = $filepath . $userimage;
		if(empty($username)){
			echo "<script>location.href='../index.php';</script>";
		}
	?>
	<input type="hidden" value="<?php echo $username;?>" id="username"/>
	<input type="hidden" value="<?php echo $firstname;?>" id="userfirstname"/>
	<input type="hidden" value="<?php echo $lastname;?>" id="userlastname"/>
	<input type="hidden" value="<?php echo $email;?>" id="useremail"/>
	<input type="hidden" value="<?php echo $phone;?>" id="userphone"/>
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
			<div id='user'><a id='logout' href='../php/logout.php'>log out</a><a href='#' id='profile'><img src='<?php echo $userimage; ?>' href='#'/><span id='username_nav'><?php echo $username; ?></span></a></div>
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
			<div id="firstrow">Username: <?php echo $username; ?><button type="button" id="changeuserimage">Change User Image</button></div>
			<fieldset>
			<legend>Change Password</legend>
			<form id="password_form" method="POST" onsubmit="return validatepassword()">
			<span>Current Password: <input type="password" id="currentpassword" name="currentpassword"/></span>
			<span>New Password: <input type="password" id="newpassword" name="newpassword"/></span>
			<span>Re-Type New Password: <input type="password" id="retypenewpassword" name="retypenewpassword"/></span>
			<span><input type="submit" name="changepassword" id="changepassword" value="Change Password"/></span>
			</form>
			</fieldset>
		</div>
		<div>
			<fieldset>
			<legend>Contact Info</legend>
			<form id="contactinfo_form">
				<div id="contactinfodiv" onload="loaduserinfo()"></div>
				<span>
					<button id="changecontactinfo" type="button">Change Contact Info</button>
					<button type="button" name="updatecontactinfo" id="updatecontactinfo" onclick="validatecontactinfo()" >Update Contact Info</button>
					<button id="cancel" type="button">Cancel</button>
				</span>
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
	if(isset($_POST['changepassword'])){
		$currentpassword = $_POST['currentpassword'];
		$newpassword = $_POST['newpassword'];
		$retypenewpassword = $_POST['retypenewpassword'];
		$query2 = mysqli_query($dbc, "SELECT * FROM users WHERE username = '".$username."' AND password = '".$currentpassword."'")
			or die(mysql_error("<script>window.location.href='../server_error.html';</script>"));
		$res2 = mysqli_fetch_row($query2);
		if(!$res2){
			echo '<script>alert("That is not your current password")</script>';
			echo $res2;
		}else{
			mysqli_query($dbc, "UPDATE users SET password = '".$newpassword."' WHERE username = '".$username."'")
			or die(mysql_error("<script>window.location.href='../server_error.html';</script>"));
			
			echo '<script>alert("Password Updated")</script>';
		}
	}
?>