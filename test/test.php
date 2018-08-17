<?php
$file = exec("cat file.txt");
$split = explode(",", $file);
echo $split[0];
echo "                  ";
echo $split[1];
?>
