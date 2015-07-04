<html>
<head>
	<title>SD1340 - Log In</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="imgs/icons/favicon.png" type="image/png">
	<script type="text/javascript" src='js/jquery.js'></script>
	<script src="js/index.js"></script>
	<link rel="stylesheet" href="css/index.css" type="text/css">
	<script type="text/javascript" src="js/nav.js"></script>
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
				<div><input class='login' type='text' name='username' id='username_input' placeholder="Username"/></br></div>
				<div><a class='login' id='getusername' href='#' onclick="forgot();">Forgot Your Username?</a></div>
				<div><input class='login' type='password' name='password' id='password' placeholder="Password"/></br></div>
				<div><a class='login' id='passwordreset' href='#' onclick="forgot();">Forgot Your Password?</a></div>
			</div>
			<div id='buttonwrapper'>
				<input type='submit' id='loginbtn' name='login' value='Log In'/>
				<button type='button' id='registerbtn' name='register' value='Register'>Register</button>
			</div>
		</form>
		<form id="forgotform"><input type="hidden" value="" id="forgotaction" name="forgotaction"/></form>
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
						$_SESSION['username']=$res[1];
						$_SESSION['userimage']=$res[7];
						header('location:home.php');
					}else{
						echo "<script type='text/javascript'>showErrMsg();</script>";
					}
				}else{
					echo "<script type='text/javascript'>showErrMsg();</script>";
				}
			}
			if(isset($_POST['forgotaction'])){
				$forgot = $_POST['forgotaction'];
				echo "<script>location.href='forgot.php';</script>";
			}
		?>
	</main>
</body>
</html>