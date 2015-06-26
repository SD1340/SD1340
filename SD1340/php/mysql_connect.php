<html>
	<head>
	</head>
	<body>
		<?php
			$mysql_host = "localhost";
			$mysql_database = "sd1340";
			$mysql_user = "derrick";
			$mysql_password = "password";
			
			$dbc = @mysql_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database)
			OR die('Something went wrong'. mysqli_connect_error());
		?>
	</body>
<html>