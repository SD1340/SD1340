<!DOCTYPE html>
<html>
<head>
	<title>SD1340 - Forums</title>
	<?php include 'resources.html';?>
</head>
<body>
	<?php include 'php/loaduserinfo.php';?>
	<?php include 'nav.php';?>
	<section id="logodiv">
		<img src='imgs/logo.png' id="logo"/>
	</section>
	<main id="forums">
		<header>
			<div>
				<h1>SD1340: Forums</h1>
			</div>
		</header>
		<div id="newforumwrapper">
			<h3>New Forum</h3>
			<input type="text" id="title" placeholder="What's your question?" maxlength="1000"></input>
			<button type="button" id="submitnewforum" onclick="forums_post()">Submit</button>
		</div>
		<div id="forum"></div>
		<input type="hidden" value="<?php echo $username;?>" id="username">
	</main>
	<?php include 'footer.html';?>
</body>
</html>