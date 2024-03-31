<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: index.html"); // Redirect to login page if not logged in
    exit();
}

// Retrieve user details from session
$name = $_SESSION['name'];
$email = $_SESSION['email'];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if query is not empty
    if (!empty($_POST['query'])) {
        // Connect to the database
        $con = new mysqli("localhost", "root", "", "restaurant");
        if ($con->connect_error) {
            die("Failed to Connect:" . $con->connect_error);
        } else {
            // Prepare and execute SQL query to insert the query into the database
            $query = $_POST['query'];
            $stmt = $con->prepare("INSERT INTO queries (name, email, query) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $query);
            $stmt->execute();
            $stmt->close();
            $con->close();

            // Redirect to a thank you page or display a success message
            echo "<h2>Query submitted successfully. We'll get back to you soon!</h2>";
        }
    } else {
        echo "<h2>Please enter a query.</h2>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('images/myqueries.webp') no-repeat center center fixed;
            background-size: cover;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.8); /* Add transparency */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group textarea {
            width: 100%;
            height: 150px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
        }

        .btn-container {
            text-align: center;
        }

        .btn-container button {
            padding: 10px 20px;
            background-color: white;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-container button:hover {
            background-color: black;
            color: white;
        }

        .return-btn {
            margin-top: 20px;
            text-align: center;
        }

        .return-btn a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: white;
            color: black;
            border-radius: 5px;
        }

        .return-btn a:hover {
            background-color: black;
            color:white
        }
        .myque {
            margin-top: 20px;
            text-align: center;
        }

        .myque a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: white;
            color: black;
            border-radius: 5px;
        }

        .myque a:hover {
            background-color: black;
            color: white;
        }

        .reach-us {
            margin-top: 30px;
        }

        .reach-us h3 {
            margin-bottom: 10px;
        }

        .reach-us a {
            display: block;
            margin-bottom: 5px;
            color: #007bff;
            text-decoration: none;
        }

        .reach-us a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Contact Us</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="query">Your Query:</label>
            <textarea id="query" name="query" placeholder="Write your query here..." required></textarea>
        </div>
        <div class="btn-container">
            <button type="submit">Submit</button>
        </div>
    </form>
    <div class="return-btn">
        <a href="index2.php">Return to Home</a>
    </div>
    <div class="myque">
        <a href="my_queries.php">Show Complaints</a>
    </div>
    <div class="reach-us">
        <h3>Reach Us On:</h3>
        <a href="mailto:info@example.com">Email: KJ@gmail.com</a>
        <a href="tel:+1234567890">Number: +91 9427465455</a>
    </div>
</div>

</body>
</html>
