<?php
	$username	= $_POST['username'];
	$firstname 	= $_POST['firstname'];
	$lastname 	= $_POST['lastname'];
	$phone 		= $_POST['phone'];
	$email 		= $_POST['email'];
	$action		= $_POST['action'];
	
	require_once('php/mysqli_connect.php');
	
	if ($action == "update"){
		$updatequery = mysqli_query($dbc, "UPDATE users SET firstname = '".$firstname."', lastname = '".$lastname."', phone = '".$phone."', email = '".$email."' WHERE username = '".$username."'") 
			or die(mysql_error("<script>window.location.href='../server_error.html';</script>"));
	}
	$query = mysqli_query($dbc, "SELECT firstname, lastname, email, phone, userimage FROM users WHERE username = '".$username."'")
			or die(mysql_error("<script>window.location.href='../server_error.html';</script>"));
			
	$res = mysqli_fetch_row($query);

	$firstname	=$res[0];
	$lastname	=$res[1];
	$email    	=$res[2];
	$phone    	=$res[3];
	$userimage	=$res[4];
?>
<span>First Name: <div class="text"><?php echo $firstname;?></div><input type="text" id="firstname" name="firstname" value="<?php echo $firstname;?>"/></span>
<span>Last Name: <div class="text"><?php echo $lastname;?></div><input type="text" id="lastname" name="lastname" value="<?php echo $lastname;?>"/></span>
<span>Phone: <div class="text"><?php echo $phone;?></div><input type="text" id="phone" name="phone" value="<?php echo $phone;?>"/></span>
<span>Email: <div class="text"><?php echo $email;?></div><input type="text" id="email" name="email" value="<?php echo $email;?>"/></span>