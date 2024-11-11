<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="regis.css">
    <title>Registration</title>
</head>
<body>
<div class="overlay"></div>
    <div class="content">
    <h1 class="h1">Registration Form</h1>
    <div class="error"></div>
    <div class="form">
        <form class="box" action="reg.php" method="POST">
            <label for="name" class="label">Name:</label>
            <div class="error-message" id="fname-error"></div>
            <input class="name" type="text" name="name" required minlength="2" maxlength="50" value="<?php echo isset($_SESSION['form_data']['name']) ? htmlspecialchars($_SESSION['form_data']['name']) : ''; ?>">
            <label for="email" class="label">Email:</label>
            <div class="error-message" id="email-error"></div>
            <input type="email" name="email" required value="<?php echo isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; ?>">
            <br>
            <label for="phone" class="label ">Phone Number:</label>
            <div class="error-message" id="phone-error"></div>
            <input type="tel" id="phone" class="phone" name="phone" required pattern="[0-9]{10}" value="<?php echo isset($_SESSION['form_data']['phone']) ? htmlspecialchars($_SESSION['form_data']['phone']) : ''; ?>">
           <br>
            <label for="password" class="label ">Password:</label>
            <div class="error-message" id="password-error"></div>
            <input type="password" name="password" required>
            <input type="submit" value="Submit">
            <div class="a1">
                <a class="a" href="signin.php">Already have an account?Signin</a>
            </div>
        </form>
        <div class="popup">
            <div class="popbox">
                <p class="msg"></p>
                <button class="btn">Sign In</button>
            </div>
        </div>
    </div>
    </div>
    <script>
        function showpopup(name) {
            const popup = document.querySelector('.popup');
            const msg = document.querySelector('.msg');
            msg.textContent = `Hi ${name}, you have successfully registered, Please sign-in.`;
            popup.style.display = 'flex';
            document.body.classList.add('blurred');
        }
        function showerror(err) {
            const error = document.querySelector('.error');
            error.style.display = 'block';
            error.textContent = err;
        }

        function showerr(fieldid, error) {
            const err = document.querySelector(`#${fieldid}`);
            err.textContent = error;
            err.style.display = 'block';
        }

        document.querySelector('.btn').onclick = function() {
            window.location.href = 'signin.php';
        };
    </script>
</body>
</html>