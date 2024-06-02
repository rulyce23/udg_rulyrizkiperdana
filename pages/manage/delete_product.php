<?php
// Check if productId is provided
if(isset($_POST['productId'])) {
    // Get the productId from the POST data
    $productId = $_POST['productId'];
    
    // Your database connection code
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

    // SQL to delete record
    $sql = "DELETE FROM t_product WHERE id = $productId";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Product deleted successfully";
    } else {
        echo "Error deleting product: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If productId is not provided, show an error message
    echo "Product ID is not provided";
}
?>
