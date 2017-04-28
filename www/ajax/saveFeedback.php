<?php 
require_once '../includes/db.php'; // The mysql database connection script
if(isset($_GET['uid']) & isset($_GET['sourcename'])){
	
	$feedback = $_GET['feedback'];
	$feedback = $mysqli->real_escape_string($feedback);
	$userID = $_GET['uid'];
	$sourcename = $_GET['sourcename'];
	$title = $_GET['title'];
	$title = $mysqli->real_escape_string($title);
	$query = "UPDATE yournews SET feedback='$feedback' WHERE userid='$userID' and sourcename='$sourcename' and title = '$title'";

	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$result = $mysqli->affected_rows;

	echo $json_response = json_encode($result);
}
?>