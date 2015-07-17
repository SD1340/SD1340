<?php
	header('Content-Type: text/xml');
	echo '<?xml version="1.0" encoding="UTF=8" standalone="yes" ?>';
	
	$username	= $_GET['username'];
	$firstname 	= $_GET['firstname'];
	$lastname 	= $_GET['lastname'];
	$phone 		= $_GET['phone'];
	$email 		= $_GET['email'];
	
	require_once('../php/mysqli_connect.php');
	mysqli_query($dbc, "UPDATE users SET firstname = '".$firstname."', lastname = '".$lastname."', phone = '".$phone."', email = '".$email."' WHERE username = '".$username."'") 
		or die(mysql_error("<script>window.location.href='../server_error.html';</script>"));
		
	$query = mysqli_query($dbc, "SELECT firstname, lastname, email, phone, userimage FROM users WHERE username = '".$username."'")
			or die(mysql_error("<script>window.location.href='../server_error.html';</script>"));
			
	$res = mysqli_fetch_row($query);

	$firstname	=$res[0];
	$lastname	=$res[1];
	$email    	=$res[2];
	$phone    	=$res[3];
	$userimage	=$res[4];
	
	echo '<userinfo>';
	echo '<span>First Name: <div class="label">'.$firstname.'</div><input type="text" id="firstname" name="firstname" value="'.$firstname.'"/></span>';
	echo '<span>Last Name: <div class="label">'.$lastname.'</div><input type="text" id="lastname" name="lastname" value="'.$lastname.'"/></span>';
	echo '<span>Phone: <div class="label">'.$phone.'</div><input type="text" id="phone" name="phone" value="'.$phone.'"/></span>';
	echo '<span>Email: <div class="label">'.$email.'</div><input type="text" id="email" name="email" value="'.$email.'"/></span>';
	echo '</userinfo>';
?>