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
    $no_sku = $_POST['no_sku'];
    $harga = $_POST['harga'];
    $description = $_POST['description'];
    $images = basename($_FILES["images"]["name"]);
    $is_available = $_POST['is_available'];
    $is_featured = $_POST['is_featured'];
    $is_new = $_POST['is_new'];
    $spec = $_POST['spec'];
    $id_jenis = $_POST['id_jenis'];

    // Construct SQL query
    if ($productId) {
        $sql = "UPDATE t_product SET nama='$nama', no_sku='$no_sku', harga='$harga', description='$description', images='$images', is_available='$is_available', is_featured='$is_featured', is_new='$is_new', spec='$spec', id_jenis='$id_jenis' WHERE id='$productId'";
    } else {
        $sql = "INSERT INTO t_product (nama, no_sku, harga, description, images, is_available, is_featured, is_new, spec, id_jenis) VALUES ('$nama', '$no_sku','$harga',  '$description', '$images', '$is_available', '$is_featured', '$is_new', '$spec', '$id_jenis')";
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
