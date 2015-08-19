<?php
	$username 	= $_POST['username'];
	
	if(empty($username)){
		echo "<script>location.href='index.php';</script>";
	}
	
	$action 	= $_POST['action'];
	
	require_once('php/mysqli_connect.php');
	if($action == 'new'){
		$title		= $_POST['title'];
		$stmt = $dbc->prepare("INSERT INTO `forums`(`user`, `title`) VALUES ('".$username."', ?)");
		$stmt->bind_param('s', $title);
		$stmt->execute();
	}
	$query = mysqli_query($dbc, "SELECT `forumid`, `timeposted`, `user`, `title` FROM `forums` order by `timeposted` DESC");
	
	while ($row = mysqli_fetch_array($query)) {
?>

<a href="forum.php?id=<?php echo $row["forumid"] ?>&title=<?php echo $row["title"]?>">
<div class="forumwrapper">
	<ul class="forumheaderwrapper">
		<li class="username"><?php echo $row["user"];?></li>
		<li class="timeposted"><?php echo $row["timeposted"];?></li>
	</ul>
	<hr />
	<p class="title"><?php echo stripslashes($row["title"]);?></p>
</div>
</a>

<?php
}
?>