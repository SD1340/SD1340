<?php
	session_start();
	if(isset($_POST['login'])){
		require_once('mysqli_connect.php');
		mysql_select_db('SD1340') or die(mysql_error());
		$username=$_POST['username'];
		$password=$_POST['password'];
		if($username!='' && $password!=''){
			$query=mysql_query("SELECT * FROM users WHERE username='".$username."' AND password='".$password."'") or die(mysql_error());
			$res=mysql_fetch_row($query);
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