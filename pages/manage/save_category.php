<?php
if (isset($_FILES['images']) && !empty($_FILES['images']['name'])) {
    // File upload handling
    $target_dir = "../../webp/";
    $target_file = $target_dir . basename($_FILES["images"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($uploadOk) {
        if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
            echo "File uploaded successfully";
        } else {
            echo "Error uploading file";
        }
    }

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_udg";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $productId = $_POST['productId'];
    $nama = $_POST['nama'];
   
    $images = basename($_FILES["images"]["name"]);
   
    // Construct SQL query
    if ($productId) {
        $sql = "UPDATE t_jenis SET nama='$nama', images='$images' WHERE id='$productId'";
    } else {
        $sql = "INSERT INTO t_jenis (nama, images) VALUES ('$nama','$images')";
    }

    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Product saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
} else {
    echo "No image uploaded";
}
?>
