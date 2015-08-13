<!DOCTYPE html>
<html>
<head>
	<title>SD1340 - Turn In</title>
	<?php include 'resources.html';?>
</head>
<body
	<?php include 'php/loaduserinfo.php';?>
	<?php include 'nav.php';?>
	<section id="logodiv">
		<img src='imgs/logo.png' id="logo"/>
	</section>
	<main id="turn-in">
		<header>
			<div>
				<h1>SD1340: Turn-In</h1>
			</div>
		</header>
		<center>
		<form method="post" id="turn-in_form" enctype="multipart/form-data">
			<input type="file" id="turnin_file" name="turnin_file" />
			<select name="turn_in_assignment" id="turn_in_assignment">
				<option value="assignment 1">Assignment 1</option>
				<option value="assignment 2">Assignment 2</option>
				<option value="assignment 3">Assignment 3</option>
				<option value="assignment 4">Assignment 4</option>
				<option value="assignment 5">Assignment 5</option>
				<option value="lab 1">Lab 1</option>
				<option value="lab 2">Lab 2</option>
				<option value="lab 3">Lab 3</option>
				<option value="lab 4">Lab 4</option>
				<option value="lab 5">Lab 5</option>
				<option value="presentation/project">Presentation/Project</option>
			</select>
			<br />
			<input type="submit" id="turn-in_submit" name="turn-in_submit" style="margin: 30px;"/>
		</form>
		</center>	
	</main>
	<?php include 'footer.html';?>
</body>
</html>
<?php 
if (isset($_POST['turn-in_submit'])){
	$target_dir = "turn-in/";
	$uploadOk = true;
	$assignment = $_POST['turn_in_assignment'];
	
	$filetype = pathinfo(basename($_FILES['turnin_file']['name']),PATHINFO_EXTENSION);
	
	$target_file_name = date('Ymd-Hi.s') . '_' . $firstname . '_' . $lastname . '_' . $_FILES['turnin_file']["name"];
	$target_file = $target_dir . $target_file_name;
	
	if ($uploadOk == false){
		//error handling
	}else{
		if(move_uploaded_file($_FILES['turnin_file']['tmp_name'], $target_file)){
			$query = "INSERT INTO `turnin`(`username`, `file`, `assignment`) VALUES (?,?,?)";
			$stmt = mysqli_prepare($dbc, $query);
			mysqli_stmt_bind_param($stmt, "sss", $username, $target_file, $assignment);
			mysqli_stmt_execute($stmt);
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			if($affected_rows == 1){
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
				echo "<script>alert('File " . $_FILES['turnin_file']['name'] . " turned in for assignment, " . $assignment . ".');</script>";
			}else{
				var_dump(mysqli_stmt_error($stmt));
			}
		}
	}
}
?>