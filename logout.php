<?php
session_start();
if (isset($_SESSION['name']) && isset($_SESSION['password'])&& isset($_SESSION['email'])) {
    $name = $_SESSION['name'];
    $email=$_SESSION['email'];
    $pass = $_SESSION['password'];
}

session_unset();
session_destroy();
header('Location: signin.php');
exit();