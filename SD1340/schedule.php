<!DOCTYPE html>
<html>
<head>
	<title>SD1340 - Schedule</title>
	<?php include 'resources.html';?>
</head>
<body>
	<?php include 'php/loaduserinfo.php';?>
	<?php include 'nav.php';?>
	<section id="logodiv">
		<img src='imgs/logo.png' id="logo"/>
	</section>
	<main id="schedule">
		<header>
			<div>
				<h1>SD1340: Calendar</h1>
			</div>
		</header>
		<center>
			<object width="750" height="675" data="calendar.php"></object>
		</center>
	</main>
	<?php include 'footer.html';?>
</body>
</html>