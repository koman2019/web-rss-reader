<?php 
require_once '../includes/db.php'; // The mysql database connection script
if(isset($_GET['uid']) & isset($_GET['sourcename'])){
	
	$userID = $_GET['uid'];
	$sourcename = $_GET['sourcename'];

	$query="insert into users_have_sources (userid , sourcename) values ('$userID' ,'$sourcename')";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$result = $mysqli->affected_rows;

	echo $json_response = json_encode($result);
}
?>