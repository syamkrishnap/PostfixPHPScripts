<?php
$from=exec("cat /var/www/html/mail-php/uploads/original-mail.txt|grep ^From:|cut -d'<' -f2|cut -d'>' -f1");
$sub=exec("cat /var/www/html/mail-php/uploads/original-mail.txt|grep ^Subject:|cut -d':' -f2|sed -e 's/^[ \t]*//'");
echo ("From: $from \nSubject: $sub \n");
?>
