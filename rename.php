<?php
$ID = "12345";
$oldname = "/var/www/html/mail-php/body/part1";
$newname = "/var/www/html/mail-php/body/$ID";
rename($oldname, $newname);
exec("ls /var/www/html/mail-php/body/");

?>
