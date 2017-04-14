<?php 
require_once '../includes/db.php'; // The mysql database connection script
$status = '%';
if(isset($_GET['status'])){
	$status = $_GET['status'];
}
if(isset($_GET['uid'])){
	$userID = $_GET['uid'];
	$query="select sources.sourcename, sources.url from users_have_sources, sources where userid='$userID' and sources.sourcename=users_have_sources.sourcename order by sourcename";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$arr = array();
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$arr[] = $row;	
		}
	}
}

# JSON-encode the response
echo $json_response = json_encode($arr);
?>