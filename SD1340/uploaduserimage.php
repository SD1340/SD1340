<!DOCTYPE html>
<html>
<head>
	<title>SD1340 - Home</title>
	<?php include 'resources.html';?>
	<style>
	input{
		margin: 15px;
	}
	</style>
</head>
<body>
	<?php include 'php/loaduserinfo.php';?>
	
	<nav id='topnav'>
		<ul>
			<li id='btn1'><a href='#' id='menu_div'><img id='menubtn' class='icon' src='../imgs/buttons/menu.png'/></a></li>
			<li id='btn2' class='topnav_li'><a href='../home.php' class='topnav'><img class='icon' src='../imgs/icons/home.png'/><span class='topnav_txt'>Home</span></a></li>
			<li id='btn3' class='topnav_li'><a href='#' class='topnav'><img class='icon' src='../imgs/icons/assignments.png'/><span class='topnav_txt'>Assignments</span></a>
				<ul id="assignments_list">
					<li><a href='../assignments/unit1assignment1.php'>Assignment 1</a></li>
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
			<div id='user'><a id='logout' href='php/logout.php'>log out</a><a href='profile.php' id='profile'><img src='<?php echo $userimage; ?>'/><span id='username_nav'><?php echo $username; ?></span></a></div>
		</ul>
	</nav>
	<nav id='hideaway'>
		<ul>
			<li><a href='../dashboard.php' class='hideaway'>Dashboard<img class='icon' src='../imgs/icons/dashboard.png'/></a></li>
			<li><a href='#' class='hideaway'>Schedule<img class='icon' src='../imgs/icons/schedule.png'/></a></li>
			<li><a href='#' class='hideaway'>Turn In<img class='icon' src='../imgs/icons/turnin.png'/></a></li>
			<li><a href='#' class='hideaway'>Downloads<img class='icon' src='../imgs/icons/download.png'/></a></li>
			<li><a href='../forum.php' class='hideaway'>Forum<img class='icon' src='../imgs/icons/forum.png'/></a></li>
			<li><a href='#' class='hideaway'>Presentations/Projects<img class='icon' src='../imgs/icons/presentation.png'/></a></li>
			<li><a href='#' class='hideaway'>User Options<img class='icon' src='../imgs/icons/useroptions.png'/></a></li>
		</ul>
	</nav>
	<section id="logodiv">
		<img src='../imgs/logo.png' id="logo"/>
	</section>
	<main>
		<header>
			<div>
				<h1>SD1340: Mr. Memering</h1>
			</div>
		</header>
		<div id="errMsg" style="color: red; display: none;">*Sorry, only JPG, JPEG, PNG & GIF files are allowed</div>
		<form id='imageupload' method='post' enctype="multipart/form-data">
			<center>
				<input type="file" name="image" id="image" accept='image/*'/></br>
				<input type="submit" name="submit" value="Submit"/>
			</center>
		</form>
	</main>
<?php
if(isset($_POST['submit'])){
	
	$target_dir = "../imgs/userimages/";
	$db_dir = "imgs/userimages/";
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
		echo "<script>window.location.href='../server_error.html';</script>";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			$target_file = $username . '.' . $imageFileType;
			
			mysqli_query($dbc, "UPDATE users SET userimage = '".$target_file."' WHERE username='".$username."'") 
			or die(mysql_error("<script>window.location.href='../server_error.html';</script>"));
			echo "<script>window.location.href = 'uploaduserimage.php'</script>";
			echo "<script>alert('User image has been updated.');</script>";
		} else {
			echo "<script>window.location.href='../server_error.html';</script>";
		}
	}
}
?>
</body>
</html>
