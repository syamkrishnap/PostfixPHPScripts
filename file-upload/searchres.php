<?php 
include_once 'dbconfig.php';
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
$ID = $_POST['txt_search_ID'];

$sql=("SELECT * FROM `tbl_uploads` WHERE `email_ID`='$ID';");
$result_set=mysqli_query($conn, $sql);


while($row=mysqli_fetch_array($result_set))
{
?>
<tr>
 <td > <?php echo $row['email_from']; ?></td>
 <td > <?php echo $row['email_subject']; ?></td>
 <td > <?php echo $row['body']; ?></td>
 <td > <?php echo $row['file']; ?></td>
 <td > <a href="uploads/<?php echo $row['file']; ?>" target="_blank">view file</a></td>
</tr>
<?php
}
?>

</table>
</body>
</html>

