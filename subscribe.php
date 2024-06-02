<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_udg";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the email field is set and not empty
    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        // Retrieve the email address from the form
        $email = $_POST["email"];
       
        // Insert the email address into the database
        $sql = "INSERT INTO t_subscribe (email) VALUES ('$email')";
        
        if ($conn->query($sql) === TRUE) {
            // Success response
            $response = array("success" => true, "message" => "Your email address has been added to our database.");
        } else {
            // Error response
            $response = array("success" => false, "message" => "Error: " . $conn->error);
        }
    } else {
        // If the email field is empty, display an error message
        $response = array("success" => false, "message" => "Please provide your email address.");
    }
} else {
    // If the request method is not POST, return an error response
    $response = array("success" => false, "message" => "Invalid request method.");
}

// Close the database connection
$conn->close();

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
