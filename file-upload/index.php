<?php
include_once 'dbconfig.php';
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
	<label>From:</label>
	<input class="input" name="from" type="text" value=""><br />
	<label>To:</label>
	<input class="input" name="to" type="text" value=""><br />
	<label>ID:</label>
	<input class="input" name="ID" type="text" value=""><br />
	<label>Subject:</label>
	<textarea cols="25" name="subject" rows="5"></textarea><br />
        <label>Body:</label>
        <textarea cols="25" name="body" rows="5"></textarea><br />
	<input type="file" name="file" />
	<button type="submit" name="btn-upload">upload</button>
	</form>
    <br /><br />
</div>
</body>
</html>
