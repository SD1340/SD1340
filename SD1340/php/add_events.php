<?php
// Values received via ajax
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$url = $_POST['url'];

// insert the records
$sql = "INSERT INTO evenement (title, start, end, url) VALUES (:title, :start, :end, :url)";
$q = $dbc->prepare($sql);
$q->execute(array(':title'=>$title, ':start'=>$start, ':end'=>$end,  ':url'=>$url));
?>