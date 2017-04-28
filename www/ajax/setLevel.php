<?php 
require_once '../includes/db.php'; // The mysql database connection script
if(isset($_GET['uid'])){

$uid = $_GET['uid'];
$level = $_GET['level'];
$sourceName = $_GET['sourceName'];

$query="INSERT INTO grades(sourcename,userid,grade)  VALUES ('$sourceName', '$uid', '$level')";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$result = $mysqli->affected_rows;

echo $json_response = json_encode($result);
}
?>