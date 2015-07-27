<!DOCTYPE html>
<html>
<head>
	<title>SD1340 - Forum</title>
	<?php include 'resources.html';?>
</head>
<body>
	<?php include 'php/loaduserinfo.php';?>
	<?php include 'nav.php';?>
	<section id="logodiv">
		<img src='imgs/logo.png' id="logo"/>
	</section>
	<main id="forum">
		<header>
			<div>
				<h1>SD1340: Forum</h1>
			</div>
		</header>
		<div id="newpostwrapper">
			<h3>New Post</h3>
			<textarea id="message" placeholder="Message" maxlength="3000"></textarea>
			<button type="button" id="submitnewpost" onclick="forum_post()">Submit</button>
		</div>
		<div id="posts"></div>
		<input type="hidden" value="<?php echo $username;?>" id="username">
	</main>
	<?php include 'footer.html';?>
</body>
</html>