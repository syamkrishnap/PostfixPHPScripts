<?php
 $name = "4039331bf5c27b6c4d2b5ab4850f1ab71c2464c5251c878ff9e8ef681f9fa3df";
 echo $name;
// $string = file_get_contents("http://www.example.com/file.php");

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "http://34.239.50.216:8080/iVault/getData");

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($curl,CURLOPT_USERPWD,"name:$name");

$result = curl_exec($curl);

curl_close($curl);

print($result);

?>
