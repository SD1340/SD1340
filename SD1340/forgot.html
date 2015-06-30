<!DOCTYPE html>
<html>
<head>
	<title>SD1340 - Log In</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="imgs/icons/favicon.png" type="image/png">
	<link rel="stylesheet" href="css/forgot.css" type="text/css">
	<script type="text/javascript" src='js/jquery.js'></script>
	<script type="text/javascript" src="js/home.js"></script>
	<script type="text/javascript" src="js/forgot.js"></script>
	
</head>
<body>
	<section id='logo'>
		<img src='imgs/logo.png'/>
	</section>
	<main>
		<header>
			<div>
				<h1>SD1340: Mr. Memering</h1>
			</div>
		</header>
		<form id='forgot' action='index.html' onsubmit='return formValidate()' method='post'>
			<div id='formwrapper'>
				<div><span id='errMsg'>*There is no account associated with this email</span></div>
				<div><span class='label'>Email:</span><input class='forgot' type='email' name='email' id='email' /></br></div>
			</div>
			<div id='buttonwrapper'><input type='submit' id='submit' name="submit" value='Submit' disabled /></div>
		</form>
	</main>
</body>
</html>
<?php
	$forgot = $_POST['forgot'];
	
	if(empty($forgot)){
		echo "<script>location.href='index.php';</script>";
	}

	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		require_once('php/mysqli_connect.php');
		$query=mysqli_query($dbc, "SELECT * FROM users WHERE email='".$email."'") or die(mysql_error());
		$res=mysqli_fetch_row($query);
		if ($res){
			$toEmail = $email;
			$headers = 'From: root.sd1340@gmail.com';
			if ($forgot=1){ // 1 = forgot username
				$typeofrequest = "username";
				$query = "INSERT INTO account_info_requests (time_of_request, email, reset_password_link, type_of_request, request_id) VALUES (?, ?, ?,	?, ?)";
				$stmt = mysqli_prepare($dbc, $query);
				mysqli_stmt_bind_param($stmt, "ssssi", NULL, $email, NULL, $typeofrequest, NULL);
				mysqli_stmt_execute($stmt);
				$affected_rows = mysqli_stmt_affected_rows($stmt);
				
				$query=mysqli_query($dbc, "SELECT * FROM `account_info_requests` WHERE email='".$email."' ORDER BY time_of_request ASC LIMIT 1") or die(mysql_error());
				$res1=mysqli_fetch_row($query);
				$resetpasswordlink = $res1['reset_password_link'];
				$timeofrequest = $res1['time_of_request'];
				
				$firstname = $res['firstname'];
				$username = $res['username'];
				
				$subject = 'SD1340 - Username Requested';
				$message = <<<EOD
Hello $firstname,

A request was made for your username for SD1340 at $timeofrequest.

Your username is: $username

If you did not send this request. Please click the link below if you wish to change 
your password to ensure the security of your account and any personal information attached to it.

Reset Password: $resetpasswordlink

Thank you - SD1340
			
EOD;
		}else { // else 2 = forgot password
			$typeofrequest = "password";
			$resetpasswordlink = 'http://sd1340.herobo.com/passwordreset?' + md5('sd1340'+time());
			$query = "INSERT INTO account_info_requests (time_of_request, email, reset_password_link, type_of_request, request_id) VALUES (?, ?, ?,	?, ?)";
			$stmt = mysqli_prepare($dbc, $query);
			mysqli_stmt_bind_param($stmt, "ssssi", NULL, $email, $resetpasswordlink, $typeofrequest, NULL);
			mysqli_stmt_execute($stmt);
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			
			$query=mysqli_query($dbc, "SELECT * FROM `account_info_requests` WHERE email='".$email."' ORDER BY time_of_request ASC LIMIT 1") or die(mysql_error());
			$res1=mysqli_fetch_row($query);
			$resetpasswordlink = $res1['reset_password_link'];
			$timeofrequest = $res1['time_of_request'];
			
			$firstname = $res['firstname'];
			$username = $res['username'];
			
			$subject = 'SD1340 - Password Reset Requested'
			$message = <<<EOD
Hello $firstname,

A request was made to reset your password for SD1340 at $timeofrequest.

Click the link below to reset your password. This link will only be active for one hour.
Reset Password: $resetpasswordlink

If you did not send this request. Disregard and do not click the link above.

Thank you - SD1340
			
EOD;
		}
			if($affected_rows == 1){
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
				mail($toEmail, $subject, $message, $headers);
				echo "<script>outputMsg();</script>";
			} else {
				echo "<script>window.location.href='server_error.html';</script>";
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
			}
		}
	}
?>
