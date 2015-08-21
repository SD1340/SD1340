<html>
<head>
<style>
form{
	position: absolute;
	width: 50%;
	height: 50%;
	top: 25%;
	left: 25%;
}
input[type="submit"]{
	margin: 15px;
}
</style>
</head>
<body>
<div id="errMsg" style="color: red; display: none;">*Sorry, only JPG, JPEG, PNG & GIF files are allowed</div>
<form id='imageupload' method='post' enctype="multipart/form-data">
	<center>
		<input type="file" name="image" id="image" accept='image/*'/></br>
		<input type="submit" name="submit" value="Submit"/>
	</center>
</form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
	
	$target_dir = "/imgs/userimages/";
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
		//echo "<script>window.location.href='server_error.html';</script>";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			$target_file = $username . '.' . $imageFileType;
			
			mysqli_query($dbc, "UPDATE users SET userimage = '".$target_file."' WHERE username='".$username."'") 
			or die(mysql_error("<script>window.location.href='server_error.html';</script>"));
			echo "<script>alert('User image has been updated.');</script>";
			echo "<script>window.location.href = 'uploaduserimage.php'</script>";
		} else {
			//echo "<script>window.location.href='server_error.html';</script>";
		}
	}
}
?>
