<?php
	$email = $_POST['email'];
	$forgot = $_POST['forgot'];
	
	require_once('php/mysqli_connect.php');
	$query=mysqli_query($dbc, "SELECT firstname, username FROM users WHERE email='".$email."'") or die(mysql_error());
	$res=mysqli_fetch_row($query);
	if ($res){
		$toEmail = $email;
		$headers = 'From: root.sd1340@gmail.com';
		if ($forgot=1){ // 1 = forgot username
			$typeofrequest = "username";
			$query = mysqli_query($dbc, "INSERT INTO account_info_requests (time_of_request, email, reset_password_link, type_of_request, request_id) VALUES (NULL, ".$email.", NULL,	".$typeofrequest.", NULL)");
			
			$query=mysqli_query($dbc, "SELECT * FROM `account_info_requests` WHERE email='".$email."' ORDER BY time_of_request ASC LIMIT 1") or die(mysql_error());
			$res1=mysqli_fetch_row($query);
			$resetpasswordlink = $res1['reset_password_link'];
			$timeofrequest = $res1['time_of_request'];
			
			$firstname = $res[0];
			$username = $res[1];
			
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
		$query = mysqli_query($dbc, "INSERT INTO account_info_requests (time_of_request, email, reset_password_link, type_of_request, request_id) VALUES (NULL, ".$email.", ".$resetpasswordlink.",	".$typeofrequest.", NULL)");
		
		$query=mysqli_query($dbc, "SELECT * FROM `account_info_requests` WHERE email='".$email."' ORDER BY time_of_request ASC LIMIT 1") or die(mysql_error());
		$res1=mysqli_fetch_row($query);
		$resetpasswordlink = $res1['reset_password_link'];
		$timeofrequest = $res1['time_of_request'];
		
		$firstname = $res[0];
		$username = $res[1];
		
		$subject = 'SD1340 - Password Reset Requested';
		$message = <<<EOD
Hello $firstname,

A request was made to reset your password for SD1340 at $timeofrequest.

Click the link below to reset your password. This link will only be active for one hour.
Reset Password: $resetpasswordlink

If you did not send this request. Disregard and do not click the link above.

Thank you - SD1340
		
EOD;
	}

		mysqli_close($dbc);
		mail($toEmail, $subject, $message, $headers);
		echo "<script>alert('An email has been sent to ".$email.", have a nice day!');</script>";

	}
?>