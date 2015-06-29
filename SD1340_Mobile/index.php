<!DOCTYPE html>
<html>
<head>
	<title>SD1340 - Log In</title>
	<meta charset="utf-8">
	<link rel="icon" href="imgs/icons/favicon.png" type="image/png">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	
</head>
<body>
	<section id='logo'>
		<img src='imgs/logo.png' style="width: 80%;"/>
	</section>
	<main>
		<header>
			<div>
				<h1>SD1340: Mr. Memering</h1>
			</div>
		</header>
		<form id='login' method='post'>
			<div id='loginwrapper'>
				<div><span id='errMsg' style="color: red; display: none;">*Invalid Username or Password</span></div>
				<div><input class='login' type='text' name='username' id='username_input' placeholder="Username"/></br></div>
				<div><a class='login' id='getusername' href='forgot.html'>Forgot Your Username?</a></div>
				<div><input class='login' type='password' name='password' id='password' placeholder="Password"/></br></div>
				<div><a class='login' id='passwordreset' href='forgot.html'>Forgot Your Password?</a></div>
			</div>
			<div id='buttonwrapper'>
				<input type='submit' id='loginbtn' name='login' value='Log In'/>
				<button type='button' id='registerbtn' name='register' value='Register'>Register</button>
			</div>
		</form>
		<?php
			session_start();
			if(isset($_POST['login'])){
				$username=$_POST['username'];
				$password=$_POST['password'];
				if($username!='' && $password!=''){
					require_once('php/mysqli_connect.php');
					$query=mysqli_query($dbc, "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'") or die(mysql_error());
					$res=mysqli_fetch_row($query);
					if($res){
						$_SESSION['username']=$username;
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