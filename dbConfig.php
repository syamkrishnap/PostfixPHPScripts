<?php
// Database configuration
$dbHost     = "172.18.0.2";
$dbUsername = "root";
$dbPassword = "rootpwd";
$dbName     = "uploadimage";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
