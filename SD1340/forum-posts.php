<?php
	$username 	= $_POST['username'];
	if(empty($username)){
		echo "<script>location.href='index.php';</script>";
	}
	
	$action 	= $_POST['action'];
	
	require_once('php/mysqli_connect.php');
	if($action == 'new'){
		$message	= $_POST['message'];
		$stmt = $dbc->prepare("INSERT INTO `forum`(`user`, `message`) VALUES ('".$username."', ?)");
		$stmt->bind_param('s', $message);
		$stmt->execute();
	}
	$query = mysqli_query($dbc, "SELECT `postid`, `timeposted`, `user`, `message` FROM `forum` order by `timeposted` DESC");
	
	while ($row = mysqli_fetch_array($query)) {
?>

<div class="postwrapper">
	<ul class="postheaderwrapper">
		<li class="username"><?php echo $row["user"];?></li>
		<li class="timeposted"><?php echo $row["timeposted"];?></li>
	</ul>
	<hr />
	<p class="message"><?php echo $row["message"];?></p>
</div>

<?php
}
?>