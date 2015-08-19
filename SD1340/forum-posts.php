<?php
	$username 	= $_POST['username'];
	$forumid	= $_POST['forumid'];
	
	if(empty($username) or empty($forumid)){
		//echo "<script>location.href='index.php';</script>";
	}
	
	$action 	= $_POST['action'];
	
	require_once('php/mysqli_connect.php');
	if($action == 'new'){
		$message	= $_POST['message'];
		$stmt = $dbc->prepare("INSERT INTO `forum`(`user`, `message`, `forumid`) VALUES ('".$username."', ? , '".$forumid."')");
		$stmt->bind_param('s', $message);
		$stmt->execute();
	}
	$query = mysqli_query($dbc, "SELECT `postid`, `forumid`, `timeposted`, `user`, `message` FROM `forum` WHERE `forumid` = ".$forumid." order by `timeposted`");

	while ($row = mysqli_fetch_array($query)) {
?>

<div class="postwrapper">
	<ul class="postheaderwrapper">
		<li class="username"><?php echo $row["user"];?></li>
		<li class="timeposted"><?php echo $row["timeposted"];?></li>
	</ul>
	<hr />
	<p class="message"><?php echo stripslashes($row["message"]);?></p>
</div>

<?php
}
?>