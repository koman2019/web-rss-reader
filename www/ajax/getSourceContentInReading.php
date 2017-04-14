<?php

$xml=$_GET["q"];


$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);
ini_set('error_reporting', E_STRICT);
$articles = [];

//get and output "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');
for ($i=0; $i< 6; $i++) {

  if (!is_object($x->item($i))) break; // catch errors
  
  $isTitle = $x->item($i)->getElementsByTagName('title')->length;
  $isLink = $x->item($i)->getElementsByTagName('link')->length;
  $isPubDate= $x->item($i)->getElementsByTagName('pubDate')->length;
  
  if($isTitle) {
	$item_title=$x->item($i)->getElementsByTagName('title')
	->item(0)->childNodes->item(0)->nodeValue;
	
	$articles[$i]->title = $item_title;
  } else {
	  break; // we will not accpet the news without title
  }

  if ($isLink) {
	$item_link=$x->item($i)->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
	$articles[$i]->articleLink = $item_link;

  } else {

  }
    
  if ($isPubDate) {
	$item_PubDate=$x->item($i)->getElementsByTagName('pubDate')->item(0)->childNodes->item(0)->nodeValue; 
	$articles[$i]->pubDate = $item_PubDate;
  }

  $item_desc=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->nodeValue;
  
  $articles[$i]->desc = $item_desc;
  
}

$myJSON = json_encode($articles);
echo $myJSON;
?>