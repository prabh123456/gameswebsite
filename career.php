<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers</title>
    <link rel="stylesheet" href="career.css">
</head>
<body>
    <nav>
        <div class="h1">GameGalaxy</div>
        <ul>
            <li><a href="../hero/index.php">Home</a></li>
            <li><a href="../hero/index.php">Games</a></li>
            <li><a href="../help/help.html">Help</a></li>
            <li><a href="../careers/career.php" class="active">Careers</a></li>
        </ul>
    </nav>

    <div class="text">
        <h2 class="firsttext">Help Us Change the Way People Play</h2>
        <h1 class="secondtext">We’re Hiring</h1>
        <p class="firstpara">Join our team of innovators in gaming! Explore exciting career opportunities and help us shape the future of interactive entertainment.</p>
    </div>

    <div class="box2">
        <div class="overlay"></div>
    </div>
    <div class="box3">
        <h1 class="h11">Job Openings</h1>
        <div class="job-container"></div> 
    </div>

    <!-- Modal (Hidden by default) -->
    <div id="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>Apply for Job</h2>
            <form id="apply-form" method="post" action="database.php">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
    
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
    
                <label for="linkedin">LinkedIn Profile</label>
                <input type="text" id="linkedin" name="linkedin">
    
                <label for="applied_for">Job Position</label>
                <input type="text" id="applied_for" name="applied_for" required>
    
                <button type="submit">Submit Application</button>
            </form>
        </div>
    </div>
    

    <footer class="footer">
        <div class="footer-content">
            <p>Contact us at: <a href="mailto:kaurprabh6698@gmail.com">kaurprabh6698@gmail.com</a></p>
            <p>Created by Prabhjot Kaur</p>
            <p>© 2024 GameGalaxy. All rights reserved.</p>
        </div>
    </footer>

    <script src="career.js"></script>
</body>
</html>
