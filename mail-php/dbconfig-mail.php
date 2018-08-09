<?php
$dbhost = "172.18.0.2";
$dbuser = "root";
$dbpass = "rootpwd";
$dbname = "mailphpdata";
mysqli_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 
$conn = mysqli_connect($dbhost,$dbuser,$dbpass);

mysqli_select_db($conn, $dbname) or die('database selection problem');
?>
