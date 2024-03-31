
<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "restaurant";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form data
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mail = $_POST['mail'];
    $number = $_POST['number'];
    $password = $_POST['password'];


    // Check if password is not empty
    if (!empty($password)) {

        // Check if someone is already registered with the given email
        $stmt = $conn->prepare("SELECT mail FROM registration WHERE mail = ?");
        $stmt->bind_param("s", $mail);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 0) {
            // No user found with the given email, proceed to insert into 'registration' table
            $stmt = $conn->prepare("INSERT INTO registration (name, address, mail, number, password) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssis", $name, $address, $mail, $number, $password);

            if ($stmt->execute() === TRUE) {
               
                // Redirect to index.html
                header("Location: index.html");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Someone Already Registered Using This Email";
        }
    } else {
        echo "Please Fill The Whole Form";
    }
}

$conn->close();
?>
