<?php
session_start();
include 'dbconn.php';
unset($_SESSION['name']);
unset($_SESSION['password']);

function checkdata($data) {    
    $data = stripslashes($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name']) && isset($_POST['password'])) {     
        if ($conn) {
            $name = checkdata($_POST['name']);
            $password = checkdata($_POST['password']);
            $_SESSION['name'] = $name;

            $stmt = $conn->prepare('SELECT password FROM USERS WHERE name = ?');
            if ($stmt) {
                $stmt->bind_param("s", $name);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($password);
                    $stmt->fetch();
                
                    // Compare the plaintext passwords directly
                    if ($password === $password) {
                        $_SESSION['loggedin'] = true;
                        echo "<script>
                            document.addEventListener('DOMContentLoaded', function() {
                                showpopup();
                                setTimeout(function() {
                                    window.location.href = '../first1.php';
                                }, 1000);
                            });
                        </script>";
                    } else {
                        echo "Incorrect password.";
                    }
                }
                else {
                        $err = 'Invalid password';
                        echo "<script>document.addEventListener('DOMContentLoaded', function() { showerror('$err'); });</script>";
                    }
                    
                } else {
                    $err = 'No record found';
                    echo "<script>document.addEventListener('DOMContentLoaded', function() { showerror('$err'); });</script>";
                }

                $stmt->close();
            } 
        } else {
            $err = 'Oops, unable to login. Try again later.';
            echo "<script>document.addEventListener('DOMContentLoaded', function() { showerror('$err'); });</script>";
        }
    }

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
<div class="overlay"></div>
    <div class="content">
    <h1 class="h1">LOGIN</h1>
    <div class="error"></div>
    <div class="form">
        <form class="box" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <input type="text" id="name" name="name" placeholder="Enter your name" required>                                                                                                                                         
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <div class="btn">
                <input type="submit" value="Login">
            </div>
            <div class="a1">
                <a class="a" href="regis.php">Don't have an account? Register here</a>
            </div>
        </form>
        <div class="popup">
            <div class="popbox">
                <p class="msg"></p>
            </div>
        </div>
    </div>
    <script>
        function showerror(err) {
            const error = document.querySelector('.error');
            error.style.display = 'block';
            error.textContent = err;
        }
        
        function showpopup() {
            const popup = document.querySelector('.popup');
            const msg = document.querySelector('.msg');
            msg.textContent = `Logged In Successfully!`;
            popup.style.display = 'flex';
            document.body.classList.add('blurred');
        }

    </script>
</body>
</html>

