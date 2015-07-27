<?php
	session_start();
	$username = $_SESSION['username'];
	require_once('mysqli_connect.php');
	$query = mysqli_query($dbc, "SELECT username, firstname, lastname, email, phone, userimage FROM users WHERE username = '".$username."'")
		or die(mysql_error("<script>window.location.href='/server_error.html';</script>"));
	$res = mysqli_fetch_row($query);
	
	$username 	=$res[0];
	$firstname	=$res[1];
	$lastname	=$res[2];
	$email    	=$res[3];
	$phone    	=$res[4];
	$userimage	=$res[5];
	
	$filepath = '/imgs/userimages/';
	if (empty($userimage)){
		$userimage='default.png';
	}
	$userimage = $filepath . $userimage;
	if(empty($username)){
		echo "<script>location.href='/index.php';</script>";
	}
?>