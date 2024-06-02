<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table Example</title>
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
                <h1>Manage User</h1>
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
                <span class="breadcrumb-item active"> > User</span>


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
                            <table id="usersTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
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
                                    $sql = "SELECT * FROM users";

                                    // Execute the SQL query
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['username'] . "</td>";
                                            echo "<td>";
                                            echo "<button class='btn btn-sm btn-primary btn-create' id='btnAddUser' data-toggle='modal' data-target='#userModal'>Tambah</button>";
                                            echo "<button class='btn btn-sm btn-info btn-edit' data-toggle='modal' data-target='#userModal' data-id='" . $row['id'] . "' data-username='" . $row['username'] . "'>Edit</button>";
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
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Add/Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="userForm">
                        <input type="hidden" id="userId" name="userId">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="saveUser" class="btn btn-primary">Save</button>
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
        $('#usersTable').DataTable();

        // Handle Edit button click
        $('.btn-edit').click(function() {
            var userId = $(this).data('id');
            var username = $(this).data('username');

            $('#userId').val(userId);
            $('#username').val(username);
            $('#userModal').modal('show');
        });

        // Handle Delete button click
        $('.btn-delete').click(function() {
            var userId = $(this).data('id');
            // Perform AJAX request to delete user with userId
            // For example:
            // $.post('delete_user.php', {userId: userId}, function(response) {
            //     // Handle response
            // });
        });

        // Handle Save button click
        $('#saveUser').click(function() {
            var userId = $('#userId').val();
            var username = $('#username').val();
            var password = $('#password').val();
            var confirm_password = $('#confirm_password').val();

            if (password != confirm_password) {
                alert('Password and Confirm Password do not match');
                return;
            }

            // Perform AJAX request to save/update user
            $.ajax({
                type: "POST",
                url: "save_user.php",
                data: {userId: userId, username: username, password: password},
                success: function(response) {
                    if (response.includes("successfully")) {
                        alert("User saved successfully");
                        $('#userModal').modal('hide');
                        location.reload();
                    } else {
                        alert("Error: " + response);
                    }
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
