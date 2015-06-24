<html>
	<head>
	</head>
	<body>
		<?php
			$mysql_host = "mysql16.000webhost.com";
			$mysql_database = "a4164421_sd1340";
			$mysql_user = "a4164421_derrick";
			$mysql_password = "password1234";
			
			$dbc = @mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database)
			OR die('Something went wrong'. mysqli_connect_error());
		?>
	</body>
<html>