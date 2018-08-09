<?php
?>

<!--
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Search</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>Search</label>
</div>
-->

<html>
<head>
<title>Search</title>
<link href="css/insert.css" rel="stylesheet">
</head>
<body>
<div class="maindiv">
<!--HTML Form -->
<div class="form_div">
<div class="title">
<h2>Enter the ID and click on Submit</h2>
</div>


<form name="search" method="post" action="searchres.php">
<table>
<tr><td>ID</td><td><input type="text" name="txt_search_ID"></td></tr>
<tr><td colspan=3><input type="submit" name="submit" value="submit"></td></tr>
</table>

</form>

</body>
</html>

<?php
?>
