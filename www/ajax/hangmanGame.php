<?php
	/* Input which is sent from client */
//    $word = "situation";
//    $guess = "sa";
//	$lose = 2;
	
    /* TODO: Game Algorithm  */

    /* TODO: echo the result 
	{
		'displayWord': "s---a----",
		'correctGuess' : "sa",
		'lose' : 2
	}
	*/
	
	
	/* Example 2: Input which is sent from client
	$word = "situation";
    $guess = "sad";
	$lose = 2;
	
	*/

	/* output which is json 
	{
		'displayWord': "s---a----",
		'correctGuess' : "sa", // we don't return "sad"
		'lose' : 3   // add one
	}
	*/
  	  
$word = $_GET['word'];
$guess = $_GET['guess'];
$lose = $_GET['lose'];;




$word_chars = str_split(  $word );
//print_r( $word_chars);
$guess_chars = str_split($guess);
//print_r($guess_chars);

$displayWord_chars = $word_chars;      
for( $i = 0 ; $i < count($displayWord_chars); $i++){
  //use '---' instead, not easy to see '___'
  $displayWord_chars[$i] = '-';
}
//print_r($displayWord_chars);
$correctGuess = "";

foreach( $guess_chars as $guess_char){
  $match = 0;
  $i = 0;
  foreach( $word_chars as $word_char){
      if( strcmp($word_char, $guess_char) == 0){
            $match = 1;
            $displayWord_chars[$i] = $word_char;
        }
      $i++;
    }
  
  if( $match == 1){
    $correctGuess = $correctGuess . $guess_char;
    }else{
     $lose++;
    }
}

$displayWord = implode("",$displayWord_chars);
//echo "$displayWord<br>";
//echo "$correctGuess<br>";
//echo "$lose<br>";

$arr = array("displayWord" => "$displayWord", "correctGuess" => "$correctGuess", "lose" => $lose);

echo json_encode($arr);


?>	