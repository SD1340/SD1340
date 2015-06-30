<html>
	<head>
	</head>
	<body>
		<?php
			$url = $_SERVER['HTTP_HOST'];
			$testing = strpos($url, 'host');
			if($testing == 0){
				$mysql_host = "mysql16.000webhost.com";
				$mysql_database = "a4164421_sd1340";
				$mysql_user = "a4164421_derrick";
				$mysql_password = "password1234";
			}else{
				$mysql_host = "localhost";
				$mysql_database = "sd1340";
				$mysql_user = "derrick";
				$mysql_password = "password";
			}
			
			$dbc = @mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database)
			OR die("<script>location.href='server_error.html';</script>");
		?>
	</body>
<html>