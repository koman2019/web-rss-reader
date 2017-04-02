<?php 
require_once '../includes/db.php'; // The mysql database connection script
if(isset($_GET['url'])){

$url = $_GET['url'];
$xml=$_GET["url"];

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

//get elements from "<channel>"
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
$channel_title = $channel->getElementsByTagName('title')
->item(0)->childNodes->item(0)->nodeValue;

$query="INSERT INTO sources(sourcename,url)  VALUES ('$channel_title', '$url')";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$result = $mysqli->affected_rows;

echo $json_response = json_encode($result);
}
?>