<!DOCTYPE html>
<html>
<head>
	<title>SD1340 - Forum</title>
	<?php include 'resources.html';?>
	<script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>
</head>
<body>
	<?php include 'php/loaduserinfo.php';?>
	<?php 
	if(isset($_GET['id'])){
		$forumid = $_GET['id'];
		$title = $_GET['title'];
	}else{
		//header('Location: forums.php');
	}
	?>
	<?php include 'nav.php';?>
	<section id="logodiv">
		<img src='imgs/logo.png' id="logo"/>
	</section>
	<main id="forum">
		<header>
			<div>
				<a href="forums.php">&lt; Back to Forums</a>
				<h1><?php echo $title?></h1>
			</div>
		</header>
		<div id="posts"></div>
		<hr style="width: 90%;"/>
		<div id="newpostwrapper">
			<h3>Comment</h3>
			<textarea id="message" name="message" placeholder="Message" maxlength="3000"></textarea>
			<script type="text/javascript">
				CKEDITOR.replace('message');
			</script>
			<button type="button" id="submitnewpost" onclick="forum_post()">Submit</button>
		</div>
		<input type="hidden" value="<?php echo $username;?>" id="username">
		<input type="hidden" value="<?php echo $forumid; ?>" id="forumid">
	</main>
	<?php include 'footer.html';?>
</body>
</html>