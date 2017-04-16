<?php
	require_once '../includes/db.php'; // The mysql database connection script
	
	$query="select content from yournews where userid='1' ORDER BY RAND() LIMIT 1";
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$arr = array();
	if($results->num_rows == 1) {
		while($row = $results->fetch_assoc()) {
			$text = $row["content"];
			$text = $mysqli->real_escape_string($text);

		}
	} else {
		$text = "situation"	;
	}
	
		
    //$text = "She said she'll report to them about the situation in Hong Kong, but won't touch on specific topics such as political reform. She will return to Hong Kong on Wednesday.";
    
    /* TODO: randomly pick a word from $text. The word is a meaningful word (report, situation...etc).  */
    $words = preg_split( "/[,.;:~!@#$%^&*()\s]+/", $text );
	
    //Don't need names/words staring with CAPITAL letter. Choose the longest one.
    $word_id = array();
    foreach($words as $word){
    	if(preg_match("/^[^A-Z][a-z]+/", $word)){
    		if( strlen($word) >= 5 ){
				array_push($word_id , $word);
    		}
    	}
    }
	algorithm($word_id);
	
	function algorithm($word_id) {
		/* TODO: echo the word */
		//echo $word_id;
		//echo "<br>";

		/*
		check if you have curl enabled
		http://stackoverflow.com/questions/3020049/how-to-enable-curl-in-xampp
		phpinfo();    

		use https://temp-mail.org/en/ to get an new account.
		Oxford dictionary API (free usage: 3000 searchs per month)
		user="kovi99"; password="Kovi=123456" 
		$app_id = 'eb3dd4fc';
		$app_key = '97052783bc0c57e9057f6086862307ad';
		*/
		$language = 'en';
		//$word_id = 'professional';	//for testing

		$url = 'https://od-api.oxforddictionaries.com:443/api/v1/entries/' . $language . '/' . strtolower($word_id[array_rand($word_id)]);
		//echo $url;


		//curl -X GET --header "Accept: application/json" --header "app_id: eb3dd4fc" --header "app_key: 97052783bc0c57e9057f6086862307ad" "https://od-api.oxforddictionaries.com:443/api/v1/entries/en/application"

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1, 		// 1 = Return the response as a string instead of outputting it to the screen
			CURLOPT_URL => $url,
			CURLOPT_HTTPHEADER => array('Accept: application/json','app_id: eb3dd4fc','app_key: 97052783bc0c57e9057f6086862307ad'),
			CURLOPT_SSL_VERIFYPEER => false
		));
		//curl_setopt($ch,CURLOPT_HTTPHEADER,array('HeaderName: HeaderValue','HeaderName2: HeaderValue2'));

		$result = curl_exec($curl);
		curl_close($curl);


		echo $result;

		
	}
	





	
?>