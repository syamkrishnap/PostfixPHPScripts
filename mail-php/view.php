<?php
include_once 'dbconfig-mail.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen, projection, tv" />
<script>
$(document).ready(function() {
$('#example').DataTable();
} );
</script>
</head>

<body>
<table id="example" class="display" style="width:100%">

    <thead>
    <tr>
    <td>ID</td>
    <td>From</td>
    <td>Subject</td>
    <td>File Name</td>
    <td>View</td>
    </tr>
    </thead>
<tbody>

    <?php
	$sql="SELECT * FROM tbl_uploads";
	$result_set=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_array($result_set))
	{
    ?>

    <?php
	$file=($row['header']);
	$from=exec("cat /var/www/html/mail-php/uploads/'$file'|grep ^From:|cut -d'<' -f2|cut -d'>' -f1");
        $sub=exec("cat /var/www/html/mail-php/uploads/'$file'|grep ^Subject:|cut -d':' -f2|sed -e 's/^[ \t]*//'");	
    ?>

        <tr>
	<td><?php echo $row['ID'] ?></td>
        <td><?php echo $from ?></td>
        <td><?php echo $sub ?></td>
        <td><?php echo $row['header'] ?></td>
        <td><a href="uploads/<?php echo $row['header'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
	}
	?>
</tbody>
</table> 
</body>
</html>
