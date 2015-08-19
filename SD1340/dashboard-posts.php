<?php
	$username 	= $_POST['username'];
	if(empty($username)){
		echo "<script>location.href='index.php';</script>";
	}
	
	$action 	= $_POST['action'];
	
	require_once('php/mysqli_connect.php');
	if($action == 'new'){
		$message	= $_POST['message'];
		$type		= $_POST['type'];
		
		$stmt = $dbc->prepare("INSERT INTO `dashboard`(`user`, `message`, `type`) VALUES ('".$username."', ?, '".$type."')");
		$stmt->bind_param('s', $message);
		$stmt->execute();
	}
	$query = mysqli_query($dbc, "SELECT `postid`, `timeposted`, `user`, `message`, `type` FROM `dashboard` order by `timeposted` DESC");
	
	while ($row = mysqli_fetch_array($query)) {
?>

<div class="postwrapper">
	<ul class="postheaderwrapper">
		<li class="username"><?php echo $row["user"];?></li>
		<li class="type"><?php echo $row["type"];?></li>
		<li class="timeposted"><?php echo $row["timeposted"];?></li>
	</ul>
	<hr />
	<p class="message"><?php echo stripslashes($row["message"]);?></p>
</div>

<?php
}
?>