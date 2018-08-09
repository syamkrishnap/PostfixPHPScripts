<?php
$connection = mysqli_connect("172.18.0.2", "email", "email"); // Establishing Connection with Server
$db = mysqli_select_db($connection, "email"); // Selecting Database from Server
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
print_r($from = $_POST['from']);
$from = $_POST['from'];
$to = $_POST['to'];
$ID = $_POST['ID'];
$subject = $_POST['subject'];
if($from !=''||$subject !=''){
//Insert Query of SQL
//$query = mysqli_query("insert into data(email_from, email_to, email_ID, email_subject) values ('$from', '$to', '$ID', '$subject')");
$query = mysqli_query($connection,"insert into data(email_from, email_to, email_ID, email_subject) values ('$from', '$to', '$ID', '$subject')");
echo "<br/><br/><span>Data Inserted successfully...!!</span>";
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}
mysqli_close($connection); // Closing Connection with Server
?>
