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
		<h3>Username: <?php echo $username; ?></h3>
		<div>
			<div style="float: left; width: 10%; margin-right: 20%;">
				<fieldset id="passfs">
					<legend>Change Password</legend>
					<form id="password_form" method="POST" onsubmit="return validatepassword()">
						<span>Current Password: <input type="password" id="currentpassword" name="currentpassword"/></span>
						<span>New Password: <input type="password" id="newpassword" name="newpassword"/></span>
						<span>Re-Type New Password: <input type="password" id="retypenewpassword" name="retypenewpassword"/></span>
						<span><input type="submit" name="changepassword" id="changepassword" value="Change Password"/></span>
					</form>
				</fieldset>
			</div>
			<div style="float: left; width: 70%; margin-top: 15px;">
				<center>
					<img src="<?php echo $userimage; ?>" id="userimage-big" /><br />
					<button type="button" id="changeuserimage">Change User Image</button>
				</center>
			</div>
		</div>
		<div id="contact-div">
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
		<div id="dim-background"></div>
		<div id="uploaduserimage">
			<div id="x">X</div>
			<div id="errMsg" style="color: red; display: none;">*Sorry, only JPG, JPEG, PNG & GIF files are allowed</div>
			<form id='imageupload' method='post' enctype="multipart/form-data">
				<center>
					<input type="file" name="image" id="image" accept='image/*'/></br>
					<input type="submit" name="imagesubmit" value="Submit"/>
				</center>
			</form>
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
<?php
if(isset($_POST['imagesubmit'])){
	if (empty($_FILES['image']['name'])){
		echo '<script>alert("You must select an image");</script>';
	}else{
		$target_dir = "imgs/userimages/";
		$uploadOk = 1;
		
		$imageFileType = pathinfo(basename( $_FILES["image"]["name"]),PATHINFO_EXTENSION);
		$target_file = $target_dir . $username . '.' . $imageFileType;
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check == false) {
			$uploadOk = 0;
		}
		$imageFileType = strtolower($imageFileType);
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "<script>$('#errMsg').show();</script>";
			$uploadOk = 0;
		}
		if ($uploadOk == 0) {
			echo "<script>window.location.href='server_error.html';</script>";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
				$target_file = $username . '.' . $imageFileType;
					
				mysqli_query($dbc, "UPDATE users SET userimage = '".$target_file."' WHERE username='".$username."'")
				or die(mysql_error("<script>window.location.href='server_error.html';</script>"));
				echo "<script>alert('User image has been updated.');</script>";
				echo "<script>window.location.href = 'profile.php'</script>";
			} else {
				echo "<script>window.location.href='server_error.html';</script>";
			}
		}	
	}
}
?>