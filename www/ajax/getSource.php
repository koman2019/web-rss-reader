<?php 
require_once '../includes/db.php'; // The mysql database connection script
$status = '%';
if(isset($_GET['status'])){
$status = $_GET['status'];
}
$userID = $_GET['uid'];
$query="select distinct sources.sourcename, sources.url from sources where sources.sourcename not in (select sourcename from users_have_sources where userid='$userID') order by sourcename ";
#$query="select sourcename, url from sources, users_have_sources where userid='$userID' order by sourcename";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$arr[] = $row;	
	}
}

# JSON-encode the response
echo $json_response = json_encode($arr);
?>