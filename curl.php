<?php
/*$username = 'mikethefrog'; //step2
//+authentication token
$url = 'https://api.github.com/users/treehouse';
$process = curl_init($url); 
curl_setopt($process, CURLOPT_USERAGENT, $username); //step 2

curl_setopt($process, CURLOPT_RETURNTRANSFER, 1); //step3
$return = curl_exec($process);
curl_close($process); 
$json = json_decode($return);
if (json_last_error() === JSON_ERROR_NONE) {
    // JSON is valid
    var_dump($json);
} else {
	var_dump($return);
}*/

$username = "mikethefrog";
$url = "https://api.github.com/users/treehouse";
$process = curl_init($url);
curl_setopt($process, CURLOPT_USERAGENT, $username);
curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
$return = curl_exec($process);
$results = json_decode($return);
//var_dump($results);
echo "<img src='".$results->avatar_url."'/>";
curl_close($process);