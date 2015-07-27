<?php 

$id = $_POST['id'];

$sql = "DELETE from evenement WHERE id=".$id;
$q = $dbc->prepare($sql);
$q->execute();

?>