<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Category</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
</head>
<body>

<!-- Main header -->
<header class="bg-primary text-white py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>Manage Category</h1>
            </div>
            <div class="col-md-6">
                <!-- Add any additional content here -->
            </div>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Dashboard</a>
                <span class="breadcrumb-item active"> > Category</span>


                <div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="table-container">
                <div class="card">
                    <div class="card-header">
                        <!-- <h3 class="card-title">List of Users</h3> -->

        <br><br>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="productTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Your PHP code for fetching data and generating the table
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

                                    // Construct the SQL query to retrieve data from the users table
                                    $sql = "SELECT * FROM t_jenis";

                                    // Execute the SQL query
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['nama'] . "</td>";
                                            echo "<td><img src='../../webp/" . $row['images'] . "' height='150' width='150'/></td>";
                                            echo "<td>";
                                            echo "<button class='btn btn-sm btn-primary btn-create' id='btnAddProduct' data-toggle='modal' data-target='#productModal2'>Tambah</button>";
                                            echo "<button class='btn btn-sm btn-info btn-edit' data-toggle='modal' data-target='#productModal2' data-id='" . $row['id'] . "' data-nama='" . $row['nama'] . "'>Edit</button>";
                                            echo "<button class='btn btn-sm btn-danger btn-delete' data-id='" . $row['id'] . "'>Delete</button>";
                                            
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>No Users found.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Add/Edit User -->
    <div class="modal fade" id="productModal2" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Add/Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="productForm" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" added for file upload -->
                    <input type="hidden" id="productId" name="productId">
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" id="nama" name="nama" class="form-control">
                        </div>
                  
                        <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" id="images" name="images[]" class="form-control-file" multiple accept="image/*">
                    </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="saveProduct" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

            </nav>


            
        </div>
    </div>
</div>

<!-- Content section -->

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
    $('#productTable').DataTable();


$('#btnAddProduct').click(function() {
    // Clear the form fields
    $('#productId').val('');
    $('#nama').val('');
    $('#no_sku').val('');
    $('#harga').val('');
    $('#description').val('');
    $('#images').val('');
    $('input[name="is_available"]').prop('checked', false);
    $('input[name="is_featured"]').prop('checked', false);
    $('input[name="is_new"]').prop('checked', false);
    $('#spec').val('');
    $('#id_jenis').val('');

    // Show the modal
    $('#productModal2').modal('show');
});


$('.btn-delete').click(function() {
    var productId = $(this).data('id');

    // Prompt confirmation from the user
    if (confirm("Are you sure you want to delete this product?")) {
        // Send AJAX request to delete the product
        $.ajax({
            url: 'delete_category.php',
            type: 'POST',
            data: { productId: productId },
            success: function(response) {
                alert(response);
                // Reload the page to reflect changes
                location.reload();
            },
            error: function(xhr, status, error) {
                alert("Error: " + error);
            }
        });
    }
});


    // Handle Edit button click
    $('.btn-edit').click(function() {
        var productId = $(this).data('id');
        var nama = $(this).closest('tr').find('td:eq(1)').text();
        var images = $(this).closest('tr').find('td:eq(2)').find('img').attr('src');
       
        $('#productId').val(productId);
        $('#nama').val(nama);
        $('#images').val(images);
        $('#productModal2').modal('show');
    });

    $('#saveProduct').click(function() {
    var productId = $('#productId').val();
    var nama = $('#nama').val();
    var images = $('#images')[0].files[0]; // Corrected access to file input value
   
    var formData = new FormData();
    formData.append('productId', productId);
    formData.append('nama', nama);
    formData.append('images', images);
    
    $.ajax({
        url: 'save_category.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            alert(response);
            $('#productModal2').modal('hide');
            location.reload();
        },
        error: function(xhr, status, error) {
            alert("Error: " + error);
        }
    });
});

});

</script>
</body>
</html>
