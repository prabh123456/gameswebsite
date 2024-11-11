<?php
$servername="localhost";
$username="root";
$password="";
$database="job_portal";

$conn= new mysqli($servername,$username,$password,$database);

if($conn->connect_error){
    die('connection error'.$conn->connect_error);
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

$sql="INSERT INTO Contact(name,email,message) VALUES('$name','$email','$message')";

if($conn->query($sql)=== TRUE){
    echo "Application Submitted Successfully";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
header("Location: first1.php");
    exit;
?>