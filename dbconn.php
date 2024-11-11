<?php
$servername="localhost";
$hostname="root";
$password="";
$dbname="join";

$conn=mysqli_connect($servername,$hostname,$password,$dbname);
if(!$conn){
echo "Error in the connection".mysqli_connect_error();
}
?>