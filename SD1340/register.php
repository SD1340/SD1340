<html>
<head>
	<title>SD1340 - Register</title>
	<?php include 'resources.html';?>
	<?php
		if(isset($_POST['registerbtn'])){
			$username = test_input($_POST["username"]);
			$password = test_input($_POST["password"]);
			$fname = test_input($_POST["fname"]);
			$lname = test_input($_POST["lname"]);
			$email = test_input($_POST["email"]);
			$phone = test_input($_POST["phone"]);
		}else{
			$username = '';
			$password = '';
			$fname = '';
			$lname = '';
			$email = '';
			$phone = '';
		}
	?>
</head>
<body>
	<section id='logo'>
		<img src='imgs/logo.png'/>
	</section>
	<main id="register">
		<header>
			<div>
				<h1>SD1340: Mr. Memering</h1>
			</div>
		</header>
		<form id='register' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' onsubmit="return formValidate()" method='post'>
			<div id='formwrapper'>
				<div id='panel1'>
					<div><span class='label'>Username:</span><input class='register' type='text' name='username' id='username' value="<?php echo $username ?>"/><span id='UNameMsg' class='errMsg'>*Username already taken</span></br></div>
					<div><span class='label'>Password:</span><input class='register' type='password' name='password' id='password' value="<?php echo $password ?>"/><span id='PasswordMsg' class='errMsg'>*Invalid Password: Must be at least 8 characters, contain upper and lower case letters, and have at least 2 numbers.</span></br></div>
					<div><span class='label'>Confirm Password:</span><input class='register' type='password' name='cpassword' id='cpassword'/><span id='CPasswordMsg' class='errMsg'>*Passwords Don't Match</span></br></div>
				</div>
				<div id='panel2'>
					<div><span class='label'>First Name:</span><input class='register' type='text' name='fname' id='fname' value="<?php echo $fname ?>"/><span id='FNameMsg' class='errMsg'>*Invalid First Name</span></br></div>
					<div><span class='label'>Last Name:</span><input class='register' type='text' name='lname' id='lname' value="<?php echo $lname ?>"/><span id='LNameMsg' class='errMsg'>*Invalid Last Name</span></br></div>
				</div>
				<div id='panel3'>
					<div><span class='label'>Email:</span><input class='register' type='email' name='email' id='email' value="<?php echo $email ?>"/><span id='EmailMsg' class='errMsg'>*Invalid Email</span></br></div>
					<div><span class='label'>Phone:</span><input class='register' type='tel' name='phone' id='phone' value="<?php echo $phone ?>"/><span id='PhoneMsg' class='errMsg'>*Invalid Phone Number</span></br></div>
				</div>
			</div>
			<button type='button' id='cancel' class='register' value='cancel'>Cancel</button>
			<div id='bottomnav'>
				<div id='buttons'>
					<button type='button' id='back' class='register' value='back'>&larr;Back</button>
					<button type='button' id='next' class='register' value='next'>Next&rarr;</button>
					<input type='submit' class='register' name='registerbtn' id='registerbtn' value='Register'/>
				</div></br>
				<div id='progressbar'>
					<div id='progress1' class='progressbar'><p>Step 1</p></div>
					<div id='progress2' class='progressbar'><p>Step 2</p></div>
					<div id='progress3' class='progressbar'><p>Step 3</p></div>
				</div>
			</div>
		</form>
	</main>
	<?php
		$username = $password = $fname = $lname = $email = $phone = "";
		if(isset($_POST['registerbtn'])){
			$username = test_input($_POST["username"]);
			$password = test_input($_POST["password"]);
			$fname = test_input($_POST["fname"]);
			$lname = test_input($_POST["lname"]);
			$email = test_input($_POST["email"]);
			$phone = test_input($_POST["phone"]);
			$okaytoprocess = true;
			$userid = NULL;
			if($username!=''){
				require_once('php/mysqli_connect.php');
				$query = mysqli_query($dbc, "SELECT username FROM users WHERE username='".$username."'");
				$res=mysqli_fetch_row($query);
				$query2 = mysqli_query($dbc, "SELECT email FROM users WHERE email='".$email."'");
				$res2=mysqli_fetch_row($query2);
				if ($res){
					echo "<script type='text/javascript'>showUserNameTakenErrMsg();</script>";
					$okaytoprocess = false;
				}
				if ($res2){
					echo "<script type='text/javascript'>alert('It seems you already have an account with this email. Use a different email or log in to the account associated with this email. If you forgot your username or password, click the link to get your username or reset your password on the log in page.');</script>";
					$okaytoprocess = false;
				}
				if($okaytoprocess){
					$data_missing = array();
					if(empty($username)){
						$data_missing[] = 'Username';
					}
					if(empty($password)){
						$data_missing[] = 'Password';
					}
					if(empty($fname)){
						$data_missing[] = 'First Name';
					}
					if(empty($lname)){
						$data_missing[] = 'Last Name';
					}
					if(empty($email)){
						$data_missing[] = 'Email';
					}
					if(empty($phone)){
						$data_missing[] = 'Phone Number';
					}
					if(empty($data_missing)){
						$query = "INSERT INTO users (username, password, firstname, lastname, email, phone, userid) VALUES (?, ?, ?, ?, ?, ?, ?)";
						$stmt = mysqli_prepare($dbc, $query);
						mysqli_stmt_bind_param($stmt, "sssssii", $username, $password, $fname, $lname, $email, $phone, $userid);
						mysqli_stmt_execute($stmt);
						$affected_rows = mysqli_stmt_affected_rows($stmt);
						if($affected_rows == 1){
							mysqli_stmt_close($stmt);
							mysqli_close($dbc);
							echo "<script>location.href='useradded.html';</script>";
						} else {
							echo 'Error Occurred<br />';
							echo mysqli_error($dbc);
							mysqli_stmt_close($stmt);
							mysqli_close($dbc);
						}
					} else {
						echo 'You need to enter the following data<br />';
						foreach($data_missing as $missing){
							echo "$missing<br/>";
						}
					}
				}
			}
		}
		
		function test_input($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
</body>
</html>
