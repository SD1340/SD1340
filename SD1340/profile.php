<!DOCTYPE html>
<html>
<head>
	<title>SD1340 - Home</title>
	<?php include 'resources.html';?>
</head>
<body>
	<?php require_once 'php/loaduserinfo.php';?>
	<input type="hidden" value="<?php echo $username;?>" id="username"/>
	<input type="hidden" value="<?php echo $firstname;?>" id="userfirstname"/>
	<input type="hidden" value="<?php echo $lastname;?>" id="userlastname"/>
	<input type="hidden" value="<?php echo $email;?>" id="useremail"/>
	<input type="hidden" value="<?php echo $phone;?>" id="userphone"/>
	<?php include 'nav.php';?>
	<section id="logodiv">
		<img src='imgs/logo.png' id="logo"/>
	</section>
	<main id="profile">
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
				<div id="contactinfodiv"></div>
				<span>
					<button id="changecontactinfo" type="button">Change Contact Info</button>
					<button type="button" name="updatecontactinfo" id="updatecontactinfo" onclick="validatecontactinfo()" >Update Contact Info</button>
					<button id="cancel" type="button">Cancel</button>
				</span>
			</form>
			</fieldset>
		</div>
	</main>
	<?php include 'footer.html';?>
</body>
</html>
<?php
	if(isset($_POST['changepassword'])){
		$currentpassword = $_POST['currentpassword'];
		$newpassword = $_POST['newpassword'];
		$retypenewpassword = $_POST['retypenewpassword'];
		$query2 = mysqli_query($dbc, "SELECT * FROM users WHERE username = '".$username."' AND password = '".$currentpassword."'")
			or die(mysql_error("<script>window.location.href='server_error.html';</script>"));
		$res2 = mysqli_fetch_row($query2);
		if(!$res2){
			echo '<script>alert("That is not your current password")</script>';
			echo $res2;
		}else{
			mysqli_query($dbc, "UPDATE users SET password = '".$newpassword."' WHERE username = '".$username."'")
			or die(mysql_error("<script>window.location.href='server_error.html';</script>"));
			
			echo '<script>alert("Password Updated")</script>';
		}
	}
?>