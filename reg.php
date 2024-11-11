<?php
session_start();
include 'dbconn.php';
include 'regis.php';
unset($_SESSION['form_data']);

function checkdata($data) {
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_SESSION['form_data'] = $_POST;
    if (
        isset($_POST['name']) &&
        isset($_POST['email']) &&
        isset($_POST['phone']) &&
        isset($_POST['password'])
    ) {
        $name = checkdata($_POST['name']);
        $email = checkdata($_POST['email']);
        $phone = checkdata($_POST['phone']);
        $password = checkdata($_POST['password']);
        // $hashedpass = password_hash($password, PASSWORD_BCRYPT);

        $hasError = false;
        $stmt = $conn->prepare('SELECT * FROM USERS WHERE email = ? OR phone = ?');
        if ($stmt) {
            $stmt->bind_param('ss', $email, $phone);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $err = "Email or Phone Number already exists";
                $escaped_err = htmlspecialchars($err, ENT_QUOTES, 'UTF-8');
                echo "<script>document.addEventListener('DOMContentLoaded', function() { showerror('$escaped_err'); });</script>";
                $stmt->close();
                $hasError = true;
            }
        } else {
            die('Prepare failed: ' . $conn->error);
        }

        // Name validation
        if (!preg_match('/^[A-Za-z]{2,}$/', $name)) {
            $err = 'Enter a valid name. It should only contain letters and be at least 2 characters long.';
            echo "<script>document.addEventListener('DOMContentLoaded', function() { showerr('name-error', '$err'); });</script>";
            $hasError = true;
        }

        // Phone validation
        if (!preg_match('/^[0-9]{10}$/', $phone)) {
            $err = 'Enter a valid 10-digit phone number.';
            echo "<script>document.addEventListener('DOMContentLoaded', function() { showerr('phone-error', '$err'); });</script>";
            $hasError = true;
        }

        // Email validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err = 'Enter a valid email address.';
            echo "<script>document.addEventListener('DOMContentLoaded', function() { showerr('email-error', '$err'); });</script>";
            $hasError = true;
        }

        // Password validation
        if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
            $err = 'Password should be at least 8 characters long and include uppercase, lowercase, number, and special character.';
            echo "<script>document.addEventListener('DOMContentLoaded', function() { showerr('password-error', '$err'); });</script>";
            $hasError = true;
        }

        // If there are no errors, proceed to insert into the database
        if (!$hasError) {
            $stmt = $conn->prepare('INSERT INTO USERS (name, email, phone, password) VALUES (?, ?, ?, ?)');
            if ($stmt) {
                $stmt->bind_param("ssss", $name, $email, $phone, $password);
                if ($stmt->execute()) {
                    echo "<script>document.addEventListener('DOMContentLoaded', function() { showpopup('$name'); });</script>";
                } else {
                    echo 'Error: ' . $stmt->error;
                }
                $stmt->close();
            } else {
                die('Prepare failed: ' . $conn->error);
            }
        }
    } else {
        echo "<script>document.addEventListener('DOMContentLoaded', function() { showerror('All fields are required.'); });</script>";
    }
}

mysqli_close($conn);
?>
