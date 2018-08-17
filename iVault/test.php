<?php
include_once 'dbconfig-mail.php';
?>

<?php

$ID = 0;

if(isset($_POST['txt_search_ID']) && $_POST['txt_search_ID'] != ''){
$ID = $_POST['txt_search_ID'];
}

if(isset($_GET['txt_search_ID']) && $_GET['txt_search_ID'] != ''){
$ID = $_GET['txt_search_ID'];
}

$sql=("SELECT * FROM `tbl_uploads` WHERE `ID`='$ID';");
$result_set=mysqli_query($conn, $sql);


while($row=mysqli_fetch_array($result_set))
{
?>

<?php
 $file=($row['header']);
 $from=exec("cat /var/www/html/mail-php/uploads/'$file'|grep ^From:|cut -d'<' -f2|cut -d'>' -f1");
 $sub=exec("cat /var/www/html/mail-php/uploads/'$file'|grep ^Subject:|cut -d':' -f2|sed -e 's/^[ \t]*//'");
?>

<?php
 exec("rm -f /var/www/html/mail-php/extracted/*");
 exec("munpack -C /var/www/html/mail-php/extracted/ -qtf /var/www/html/mail-php/uploads/'$file'");
 exec("mv /var/www/html/mail-php/extracted/part* /var/www/html/mail-php/body/" );
 $filename=exec("ls -1 /var/www/html/mail-php/extracted/");
?>

<?php
$oldname = "/var/www/html/mail-php/body/part1";
$newname = "/var/www/html/mail-php/body/$ID";
rename($oldname, $newname);
?>

<?php echo $from ?>

<?php
}
?>


