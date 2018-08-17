<?php

//$ID = $_POST['name'];
//echo $ID;
$ID = 0;

if(isset($_POST['txt_search_ID']) && $_POST['txt_search_ID'] != ''){
$ID = $_POST['txt_search_ID'];
}

if(isset($_GET['txt_search_ID']) && $_GET['txt_search_ID'] != ''){
$ID = $_GET['txt_search_ID'];
}
$download=exec("curl -F 'name=$ID' http://34.239.50.216:8080/iVault/getData");
echo $download;
exec("curl $download -o mail-header.txt");
exec("sed '/Content-Type:/q' mail-header.txt > mail-header-meta.txt");

?>

