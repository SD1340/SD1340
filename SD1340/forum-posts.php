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
	$query = mysqli_query($dbc, "SELECT *\n"
    . "FROM `forum`\n"
    . "INNER JOIN\n"
    . "`users` ON (\n"
    . "`forum`.`user` = `users`.`username`)\n"
    . "WHERE `forum`.`forumid` = ".$forumid."\n"
    . "ORDER BY `forum`.`timeposted`");

	while ($row = mysqli_fetch_array($query)) {
?>

<div class="postwrapper">
	<ul class="postheaderwrapper">
		<li class="username"><?php echo $row["user"];?></li>
		<li class="timeposted"><?php echo $row["timeposted"];?></li>
	</ul>
	<hr />
	<table>
		<tr>
			<td class="postuserimage" valign="top">
				<img style="background-image: url('imgs/userimages/<?php echo $row['userimage']; ?>');" />
			</td>
			<td class="postmessage">
				<div class="message"><?php echo stripslashes($row["message"]);?></div>
			</td>
		</tr>
	</table>
</div>

<?php
}
?>