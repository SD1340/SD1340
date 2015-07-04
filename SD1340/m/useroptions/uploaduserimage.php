<html>
<head>
	<title>SD1340 - Upload User Image</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../imgs/icons/favicon.png" type="image/png">
	<script type="text/javascript" src='../js/jquery.js'></script>
	<link rel="stylesheet" href="../css/index.css" type="text/css">
	<link rel="stylesheet" href="../css/home.css" type="text/css">
	<link rel="stylesheet" href="../css/nav.css" type="text/css">
	<link rel="stylesheet" href="../css/uploaduserimage.css" type="text/css">
	<script type="text/javascript" src="../js/home.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>
	<script type="text/javascript" src="../js/nav.js"></script>
	<style type="text/css">
		input{
			width: 100%;
			padding: .5em;
			margin: 1em 0;
			border-radius: .5em;
			font-size: 1em;
		}
	</style>
</head>
<body>
	<?php
		session_start();
		$username = $_SESSION['username'];
		$url = $_SERVER['HTTP_HOST'];
		$testing = strpos($url, 'host');
		if($testing == 0){
			$filepath = 'http://sd1340.herobo.com/imgs/userimages/';
		}else{
			$filepath = '../../imgs/userimages/';
		}
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
			<li id='btn1'><a href='#' id='menu_div'><img id='menubtn' class='icon' src='../imgs/buttons/menu.png'/></a></li>
			<li id='btn2' class='topnav_li'><a href='../home.php' class='topnav'><img class='icon' src='../imgs/icons/home.png'/><span class='topnav_txt'>Home</span></a></li>
			<li id='btn3' class='topnav_li'><a href='#' class='topnav'><img class='icon' src='../imgs/icons/assignments.png'/><span class='topnav_txt'>Assignments</span></a>
				<ul style="width: 225%;">
					<li><a href='#'>Assignment 1</a></li>
					<li><a href='#'>Assignment 2</a></li>
					<li><a href='#'>Assignment 3</a></li>
					<li><a href='#'>Assignment 4</a></li>
					<li><a href='#'>Assignment 5</a></li>
				</ul>
			</li>
			<li id='btn4' class='topnav_li'><a href='#' class='topnav'><img class='icon' src='../imgs/icons/labs.png'/><span class='topnav_txt'>Labs</span></a>
				<ul style="width: 125%;">
					<li><a href='#'>Lab 1</a></li>
					<li><a href='#'>Lab 2</a></li>
					<li><a href='#'>Lab 3</a></li>
					<li><a href='#'>Lab 4</a></li>
					<li><a href='#'>Lab 5</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<nav id='hideaway'>
		<ul>
			<li><a href='#' class='hideaway'><?php echo $username; ?><img class="icon" id="userimg" src="<?php echo $userimage; ?>" href='#'/></a></li>
			<li><a href='#' class='hideaway'>Dashboard<img class='icon' src='../imgs/icons/dashboard.png'/></a></li>
			<li><a href='#' class='hideaway'>Schedule<img class='icon' src='../imgs/icons/schedule.png'/></a></li>
			<li><a href='#' class='hideaway'>Turn In<img class='icon' src='../imgs/icons/turnin.png'/></a></li>
			<li><a href='#' class='hideaway'>Downloads<img class='icon' src='../imgs/icons/download.png'/></a></li>
			<li><a href='#' class='hideaway'>Forum<img class='icon' src='../imgs/icons/forum.png'/></a></li>
			<li><a href='#' class='hideaway'>Presentations/Projects<img class='icon' src='../imgs/icons/presentation.png'/></a></li>
			<li><a href='#' class='hideaway'>User Options<img class='icon' src='../imgs/icons/useroptions.png'/></a></li>
			<li><a href='../php/logout.php' class='hideaway'>Log Out</a></li>
		</ul>
	</nav>
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
		<form id='imageupload' method='post' enctype="multipart/form-data" onsubmit="return validate()" >
			<input type="file" name="image" id="image" accept='image/*'/></br>
			<input type="submit" name="submit" value="Update"/>
		</form>
		<script type="text/javascript">
		function validate(){
			if ($('#image').val()==''){
				alert("Please select an image you wish to upload");
				return false;
			}else{
				return true;
			}
		}
		</script>
		<?php
			$username = $_SESSION['username'];
			
			$uploadOk = 1;
			if(isset($_POST['submit']) && isset($_FILES['image'])){
				$imageFileType = pathinfo(basename( $_FILES["image"]["name"]),PATHINFO_EXTENSION);
				$target_file = '../../imgs/userimages/' . $username . '.' . $imageFileType;
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
						require_once('../php/mysqli_connect.php');
						mysqli_query($dbc, "UPDATE users SET userimage = '".$target_file."' WHERE username='".$username."'") 
						or die(mysql_error("<script>window.location.href='../server_error.html';</script>"));
						echo "<script>alert('User Image Updated');</script>";
					} else {
						echo "<script>window.location.href='../server_error.html';</script>";
					}
				}
			}
		?>
	</main>
</body>
</html>