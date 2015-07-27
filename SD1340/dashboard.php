<!DOCTYPE html>
<html>
<head>
	<title>SD1340 - Dashboard</title>
	<?php include 'resources.html';?>
</head>
<body>
	<?php include 'php/loaduserinfo.php';?>
	<?php include 'nav.php';?>
	<section id="logodiv">
		<img src='imgs/logo.png' id="logo"/>
	</section>
	<main id="dashboard">
		<header>
			<div>
				<h1>SD1340: Dashboard</h1>
			</div>
		</header>
		<?php if($username == "derrick.l.adkins" || $username == "rmemerin"){?>
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
			<button type="button" id="submitnewpost" onclick="dashboard_post()">Submit</button>
		</div>
		<?php }?>
		<div id="posts"></div>
		<input type="hidden" value="<?php echo $username;?>" id="username">
	</main>
	<?php include 'footer.html';?>
</body>
</html>