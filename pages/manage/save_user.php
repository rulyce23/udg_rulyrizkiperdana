<?php
// Ensure that this file is accessed via AJAX POST method and required parameters are set
if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST["username"]) || !isset($_POST["password"])) {
    http_response_code(403);
    exit("Forbidden");
}

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_udg";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Use prepared statement to prevent SQL injection
$username = $_POST["username"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password using bcrypt

// Check if the user already exists
$sql_check = "SELECT * FROM users WHERE username = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $username);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows > 0) {
    // If the user exists, update the password
    $sql_update = "UPDATE users SET password = ? WHERE username = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ss", $password, $username);
    
    if ($stmt_update->execute()) {
        echo "Password updated successfully";
    } else {
        echo "Error updating password: " . $stmt_update->error;
    }

    // Close the update statement
    $stmt_update->close();
} else {
    // If the user does not exist, insert a new record
    $sql_insert = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("ss", $username, $password);
    
    if ($stmt_insert->execute()) {
        echo "User saved successfully";
    } else {
        echo "Error inserting user: " . $stmt_insert->error;
    }

    // Close the insert statement
    $stmt_insert->close();
}

// Close the check statement and connection
$stmt_check->close();
$conn->close();
?>
