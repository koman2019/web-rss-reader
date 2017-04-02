<?php

$xml=$_GET["q"];


$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

//get elements from "<channel>"
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
$channel_title = $channel->getElementsByTagName('title')
->item(0)->childNodes->item(0)->nodeValue;
$channel_link = $channel->getElementsByTagName('link')
->item(0)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('description')
->item(0)->childNodes->item(0)->nodeValue;

//output elements from "<channel>"
echo("<div class='panel-heading'>Preview:<h3><a href='" . $channel_link
  . "'>" . $channel_title . "</a>");
echo("<br>");
echo($channel_desc . "</h3></div>");

//get and output "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');
for ($i=0; $i<2; $i++) {

  if (!is_object($x->item($i))) break; // catch errors
  
  $isTitle = $x->item($i)->getElementsByTagName('title')->length;
  $isLink = $x->item($i)->getElementsByTagName('link')->length;
  $isPubDate= $x->item($i)->getElementsByTagName('pubDate')->length;
  
  if($isTitle) {
	$item_title=$x->item($i)->getElementsByTagName('title')
	->item(0)->childNodes->item(0)->nodeValue;
  } else {
	  break; // we will not accpet the news without title
  }

  if ($isLink) {
	$item_link=$x->item($i)->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
	echo ("<div class='panel-body'><h4><a href='" . $item_link . "'>" . $item_title . "</a></h4>");
  } else {
	echo ("<div class='panel-body'><h4>" . $item_title . "</h4>");
  }
    
  if ($isPubDate) {
	$item_PubDate=$x->item($i)->getElementsByTagName('pubDate')->item(0)->childNodes->item(0)->nodeValue; 
	echo ("<p>" . $item_PubDate . "</p><p>");
  }

  $item_desc=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->nodeValue;
  
  echo ($item_desc . "</p></div>");
}
?>


