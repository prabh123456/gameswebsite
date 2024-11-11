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
    $linkedin = $conn->real_escape_string($_POST['linkedin']);
    $applied_for = $conn->real_escape_string($_POST['applied_for']);

$sql="INSERT INTO job_applications(name,email,linkedin_profile, applied_for) VALUES('$name','$email','$linkedin','$applied_for')";

if($conn->query($sql)=== TRUE){
    echo "Application Submitted Successfully";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
header("Location: index.php");
    exit;
?>