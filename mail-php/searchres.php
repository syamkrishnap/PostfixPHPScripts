<?php 
include_once 'dbconfig-mail.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Search Result</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>Search Result</label>
</div>

<div id="body">
        <table width="80%" border="1">


<tr>
 <td ><div align="center"> <strong>From</strong></div></td>
 <td ><div align="center"> <strong>Subject</strong></div></td>
 <td ><div align="center"> <strong>Body</strong></div></td>
 <td ><div align="center"> <strong>Filename</strong></div></td>
 <td ><div align="center"> <strong>View</strong></div></td>
</tr>

<?php

//$ID = $_POST['txt_search_ID'];

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

<tr>
 <td><?php echo $from ?></td>
 <td><?php echo $sub ?></td>
 <td><?php echo file_get_contents("/var/www/html/mail-php/body/$ID"); ?></td>
 <td > <?php echo $filename; ?></td>
 <td > <a href="extracted/<?php echo $filename; ?>" target="_blank">view file</a></td>
</tr>
<?php
}
?>

</table>
</body>
</html>

