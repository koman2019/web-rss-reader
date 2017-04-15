<?php 
require_once '../includes/db.php'; // The mysql database connection script
if(isset($_GET['title']) & isset($_GET['desc'])){
	
	$title = $_GET['title'];
	$content = $_GET['desc'];
	$userID = $_GET['uid'];
	$sourcename = $_GET['sourcename'];
	
	if(isset($_GET['date'])) {
		$date = $_GET['date'];
	} else {
		$date = null;
	}
	$title = $mysqli->real_escape_string($title);
	$content = $mysqli->real_escape_string($content);
	$date = $mysqli->real_escape_string($date);

	$query="insert into yournews (userid , sourcename, title , pubdate,content) values ('$userID' ,'$sourcename','$title' ,'$date','$content')";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$result = $mysqli->affected_rows;

	echo $json_response = json_encode($result);
}
?>