<html>
<head>
	<title>SD1340 - Upload User Image</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../imgs/icons/favicon.png" type="image/png">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<link rel="stylesheet" href="../css/index.css" type="text/css">
	<link rel="stylesheet" href="../css/home.css" type="text/css">
	<script type="text/javascript" src="../js/home.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>
	<style type="text/css">
		#logo{
			margin-top: 2em;
		}
	</style>
</head>
<body>
	<section id='logo'>
		<a href="../index.php"><img src='../imgs/logo.png'/></a>
	</section>
	<main>
		<header>
			<div>
				<h1>SD1340: Mr. Memering</h1>
			</div>
		</header>
		<div id="errMsg" style="color: red; display: none;">*Sorry, only JPG, JPEG, PNG & GIF files are allowed</div>
		<form id='imageupload' method='post' enctype="multipart/form-data">
			<input type="file" name="image" id="image" accept='image/*'/></br>
			<input type="submit" name="submit" value="Submit"/>
		</form>
		<?php
			session_start();
			if(empty($_SESSION['username'])){
				echo "<script>location.href='../index.php';</script>";
			}
		
			$target_dir = "../../imgs/userimages/";
			$db_dir = "imgs/userimages/";
			$uploadOk = 1;
			if(isset($_POST['submit'])){
				$imageFileType = pathinfo(basename( $_FILES["image"]["name"]),PATHINFO_EXTENSION);
				$target_file = $target_dir . $username . '.' . $imageFileType;
				$check = getimagesize($_FILES["image"]["tmp_name"]);
				if($check == false) {
					$uploadOk = 0;
				}
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
						require_once('../php/mysqli_connect.php');
						mysqli_query($dbc, "UPDATE users SET userimage = '".$target_file."' WHERE username='".$username."'") 
						or die(mysql_error("<script>window.location.href='../server_error.html';</script>"));
						echo "<script>window.location.href='imageuploaded.html';</script>";
					} else {
						echo "<script>window.location.href='../server_error.html';</script>";
					}
				}
			}
		?>
	</main>
</body>
</html>