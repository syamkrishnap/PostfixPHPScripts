<?php
include_once 'dbconfig-mail.php';

define("UPLOAD_DIR", "/var/www/html/iVault/uploads/");
$ID = $_POST['ID'];

if (!empty($_FILES["file"])) {
    $file = $_FILES["file"];

    if ($file["error"] !== UPLOAD_ERR_OK) {
        echo "<p>An error occurred.</p>";
        exit;
    }

    // ensure a safe filename
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $file["name"]);

    // don't overwrite an existing file
//    $i = 0;
//    $parts = pathinfo($name);
//    while (file_exists(UPLOAD_DIR . $name)) {
//        $i++;
//        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
//    }

    // preserve file from temporary directory
    $success = move_uploaded_file($file["tmp_name"],
        UPLOAD_DIR . $name);
    if (!$success) {
        echo "<p>Unable to save file.</p>";
        exit;
    }
    else
	$sql="INSERT INTO tbl_uploads(ID, header) VALUES('$ID', '$name')";
        mysqli_query($conn, $sql);
        echo "Success";
}
?>
