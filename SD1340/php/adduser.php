<html>
	<head>
		<title>Profile Created</title>
	</head>
	<body>
		<?php
			$username = $_POST['username'];
			$password = $_POST['password'];
			$firstname = $_POST['fname'];
			$lastname = $_POST['lname'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$registerbtn = $_POST['registerbtn'];
			
			if(isset($registerbtn)){

				$data_missing = array();
				
				if(empty($username)){
					// Adds name to array
					$data_missing[] = 'Username';
				} else {
					// Trim white space from the name and store the name
					$username = trim($username);
				}
				if(empty($password)){
					// Adds name to array
					$data_missing[] = 'Password';
				} else{
					// Trim white space from the name and store the name
					$password = trim($password);
				}
				if(empty($firstname)){
					// Adds name to array
					$data_missing[] = 'First Name';
				} else {
					// Trim white space from the name and store the name
					$firstname = trim($firstname);
				}
				if(empty($lastname)){
					// Adds name to array
					$data_missing[] = 'Last Name';
				} else{
					// Trim white space from the name and store the name
					$lastname = trim($lastname);
				}
				if(empty($email)){
					// Adds name to array
					$data_missing[] = 'Email';
				} else {
					// Trim white space from the name and store the name
					$email = trim($email);
				}
				if(empty($phone)){
					// Adds name to array
					$data_missing[] = 'Phone Number';
				} else {
					// Trim white space from the name and store the name
					$phone = trim($phone);
				}
				if(empty($data_missing)){	
					require_once('mysqli_connect.php');
					
					$query = "INSERT INTO users (username, password, firstname, lastname, email,
					phone, userid) VALUES (?, ?, ?,	?, ?, ?, NULL)";
					
					$stmt = mysqli_prepare($dbc, $query);
					
					mysqli_stmt_bind_param($stmt, "sssssii", $username, $password,
						$firstname, $lastname, $email, $phone, $userid);
					
					mysqli_stmt_execute($stmt);
					
					$affected_rows = mysqli_stmt_affected_rows($stmt);
					
					if($affected_rows == 1){
						
						echo 'User Account Created';
						
						mysqli_stmt_close($stmt);
						
						mysqli_close($dbc);
						
					} else {
						
						echo 'Error Occurred<br />';
						echo mysqli_error();
						
						mysqli_stmt_close($stmt);
						
						mysqli_close($dbc);
						
					}
					
				} else {
					
					echo 'You need to enter the following data<br />';
					
					foreach($data_missing as $missing){
						
						echo "$missing<br />";
						
					}
					
				}
				
			}
			
		?>
	</body>
</html>