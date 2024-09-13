<?php


if (! function_exists('checarLink')) {

	function checarLink($url){

		// if($socket =@ fsockopen($url, 1, $errno, $errstr, 5)) {
		//   	 $result = '1';
		// 	 fclose($socket);
		// } else {
		//   	 $result = '0';
		// }

		$ch = curl_init($url);  
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1);  
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
		curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, true);
		 
		$data = curl_exec($ch);  
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  


		if($httpcode >= 200 && $httpcode < 400){  
			$result = '1';
		} else {
			$result = '0';
		}

		curl_close($ch);  



	 return $result;
	}
}
