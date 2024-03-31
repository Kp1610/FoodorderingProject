<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie Delights - Order Food Online</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .social-media-icons {
    margin-top: 20px;
}

.social-media-icons a {
    margin-right: 10px;
    color: white;
    text-decoration: none;
}

/* Adjust size of social media icons */
.social-media-icons img {
    width: 30px; /* Adjust the width as needed */
    height: auto; /* Maintain aspect ratio */
}
    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <h1>Foodie Delights </h1>
            </div>
            <div class="nav-links">
                <a href="index2.php">Home</a>
                <a href="order.html">Order</a>
                <a href="contact.php">Contact Us</a>
                <a href="profile.php">Profile</a>
            </div>
            <?php
                    session_start();
                    // Check if the user is logged in
                    if (isset($_SESSION['name'])) {
                        // User is logged in, display their name and logout link
                        echo '<span class="nav-link" style="color: white;">' . $_SESSION['name'] . '</span>';
                        echo '<a class="nav-link" style="color: white;" href="logout.php" id="logout">Log Out</a>';
                        
                    } else {
                        // User is not logged in, display default message
                       // echo '<span class="nav-link" style="text-shadow: 1px 1px rgb(241, 241, 241);">Hello user</span>';
                    }
                    ?>
        </div>
    </header>

   
    <main>
        <div class="background-image">
   
                <div class="content">
                    <h1>Welcome to Foodie Delights</h1>
                    <p>Order delicious food online and enjoy!</p>
                </div>
             </div>
    </main>

    <footer class="black-footer">
        <div class="footer-content">
            <div class="left">
                <p>Order food from us to get amazing discounts and offers</p>
                <p>The best food ordering website in town</p>
            </div>

    <div class="social-media-icons">
        <a href="https://www.instagram.com/krutarth_pandya_?igsh=MWozZXp3b29oc2w3bA%3D%3D&utm_source=qr"><img src="images/instagram.JPEG" alt="Instagram"></a>
        <a href="https://www.facebook.com"><img src="images/facebook.png" alt="Facebook"></a>
        <a href="https://www.linkedin.com/in/krutarth-pandya-42197a267/"><img src="images/linkedin.png" alt="LinkedIn"></a>
    </div>
            <div class="right">
            <p>Phone No: 9427465455</p>
            <p>Address: Satellite Ahmedabad</p>
            <p>Email:krutarth.pandya1610@gmail.com</p>
            </div>
        </div>
    </footer>

    <script src="scripts.js"></script>
</body>
</html>
