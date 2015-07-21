<html>
<head>
	<title>SD1340 - Log In</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="imgs/icons/favicon.png" type="image/png">
	<link rel="stylesheet" href="css/index.css" type="text/css">
	<script type="text/javascript" src='js/jquery.js'></script>
	<script type="text/javascript" src="js/home.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	
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
		<form id='login' method='post'>
			<div id='loginwrapper'>
				<div><span id='errMsg'>*Invalid Username or Password</span></div>
				<div><span class='label'>Username:</span><input class='login' type='text' name='username' id='username_input'/></br></div>
				<div><span class='label'>&nbsp;</span><a class='login' href="#" onclick="forgot('Username')">Forgot Your Username?</a></div>
				<div><span class='label'>Password:</span><input class='login' type='password' name='password' id='password'/></br></div>
				<div><span class='label'>&nbsp;</span><a class='login' href="#" onclick="forgot('Password')">Forgot Your Password?</a></div>
			</div>
			<div id='buttonwrapper'>
				<input type='submit' id='loginbtn' name='login' value='Log In'/>
				<button type='button' id='registerbtn' name='register' value='Register'>Register</button>
			</div>
		</form>
		<form id="forgot_form" method="post" action="forgot.php">
			<input type="hidden" value="" name="forgot" id="forgotval">
		</form>
		<?php
			session_start();
			if(isset($_SESSION['username'])){
				echo "<script>location.href='home.php';</script>";
			}
			if(isset($_POST['login'])){
				$username=$_POST['username'];
				$password=$_POST['password'];
				if($username!='' && $password!=''){
					require_once('php/mysqli_connect.php');
					$query=mysqli_query($dbc, "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'") or die(mysql_error());
					$res=mysqli_fetch_row($query);
					if($res){
						$_SESSION['username']	=$res[1];
						$_SESSION['password']	=$res[2];
						$_SESSION['firstname']	=$res[3];
						$_SESSION['lastname']	=$res[4];
						$_SESSION['email']		=$res[5];
						$_SESSION['phone']		=$res[6];
						$_SESSION['userimage']	=$res[7];
						header('location:home.php');
					}else{
						echo "<script type='text/javascript'>$('#errMsg').show();</script>";
					}
				}else{
					echo "<script type='text/javascript'>$('#errMsg').show();</script>";
				}
			}
		?>
	</main>
</body>
</html>
