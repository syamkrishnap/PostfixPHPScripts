<?php
include_once 'dbconfig.php';

define("UPLOAD_DIR", "/var/www/html/file-upload/uploads/");
$from = $_POST['from'];
$to = $_POST['to'];
$ID = $_POST['ID'];
$subject = $_POST['subject'];
$body = $_POST['body'];

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
	$sql="INSERT INTO tbl_uploads(email_from,email_to,email_ID,email_subject,body,file) VALUES('$from', '$to', '$ID', '$subject', '$body','$name')";
        mysqli_query($conn, $sql);
        echo "Success";
}
?>
