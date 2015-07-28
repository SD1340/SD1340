<?php

header('Content-type: application/json');

// Query that retrieves events
$requete = "SELECT * FROM `evenement` ORDER BY `id`";

 // connection to the database
require_once 'mysqli_connect.php';

// Execute the query
$resultat = $dbc->query($requete) or die(print_r($dbc->errorInfo()));

// sending the encoded result to success page
// $array = mysqli_fetch_all($resultat, $resulttype = MYSQLI_ASSOC);

$events = array();

while ($row = mysqli_fetch_assoc($resultat)) {
	$eventsArray['id'] =  $row['id'];
	$eventsArray['title'] = $row['title'];
	$eventsArray['start'] = strtotime($row['start']);
	$eventsArray['end'] = strtotime($row['end']);
	$eventsArray['url'] = $row['url'];
	$eventsArray['allDay'] = $row['allDay'];
	$events[] = $eventsArray;
}



echo json_encode($events);

?>

