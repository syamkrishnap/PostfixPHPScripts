<?php
include_once 'dbconfig-mail.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>File Uploading With PHP and MySQL</title>
<link rel="stylesheet" href="css/insert.css" type="text/css" />
</head>
<body>
<!--<div id="header">-->
<div class="maindiv">
<div class="form_div">
<div class="title">
<label>File Uploading With PHP and MySQL</label>
</div>
<div id="body">

	<form action="upload.php" method="post" enctype="multipart/form-data"><br />
        <label>ID:</label>
        <input class="input" name="ID" type="text" value=""><br />
	<input type="file" name="file" />
	<button type="submit" name="btn-upload">upload</button>
	</form>
    <br /><br />
</div>
</body>
</html>
