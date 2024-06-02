<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>UDG - Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="UDG Content" name="keywords">
    <meta content="UDG Content" name="description">

    <!-- Favicon -->
    <link href="img/UDG.jpg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
  
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary px-2"><img src="img/UDG.jpg"></img>
                    </span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
            <form action="detail.php" method="GET">
                    <div class="input-group">
                        <input type="text" name="search_query"  class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <button  type="submit" class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

      </div>
      <div class="col-lg-4 col-6 text-right">
          <p class="m-0">Customer Service</p>
          <h5 class="m-0">081328306288</h5>
      </div>
  </div>
</div>
<!-- Topbar End -->

<?php
// Check if the form is submitted with a search query
if (isset($_GET['search_query'])) {
    // Retrieve the search query
    $search_query = $_GET['search_query'];

    // Your database connection details
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

    // Construct the SQL query to search for products based on the search query
    // For example, assuming you have a 'products' table with a 'name' column:
    $sql = "SELECT * FROM t_product WHERE nama LIKE '%$search_query%'";

    // Execute the SQL query
    $result = $conn->query($sql);

    // Close the database connection
    $conn->close();

    // Display the search results
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-lg-6 col-md-4 col-sm-6 pb-1">';
            echo '<div class="product-item bg-light mb-4">';
            echo '<div class="product-img position-relative overflow-hidden">';
            echo '<center><img src="webp/'. $row['images'] . '" type="image/webp" height="200" width="200"></center>';
            echo '<div class="product-action">';
            echo '<a class="btn btn-outline-dark btn-square" href="detail.php?id='. $row['id'] .'"><i class="fa fa-search"></i></a>';
            echo '</div>';
            echo '</div>';
            echo '<div class="text-center py-4">';
            echo '<a class="h6 text-decoration-none text-truncate" style="font-size:11px;" href="">' . $row['nama'] . '</a>';
            echo '<div class="d-flex align-items-center justify-content-center mt-2">';
            echo '<h7>IDR Rp.' . $row['harga'] . '</h7>';
            echo '</div>';
            // echo '<div class="d-flex align-items-center justify-content-center mb-1">';
            // echo '<small class="fa fa-star text-primary mr-1"></small>';
            // echo '<small class="fa fa-star text-primary mr-1"></small>';
            // echo '<small class="fa fa-star text-primary mr-1"></small>';
            // echo '<small class="fa fa-star text-primary mr-1"></small>';
            // echo '<small class="fa fa-star text-primary mr-1"></small>';
            // // echo '<small>(' . $row['jumlah_review'] . ')</small>';
            // echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No products found.";
    }

    // Stop further execution of the script
    exit();
}
?>
    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
    <div class="navbar-nav w-100">
        <div class="nav-item dropdown dropright">
            <a href="newest.php" class="nav-item nav-link">New</a>
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">By Equipment <i class="fa fa-angle-right float-right mt-1"></i></a>
            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                <a href="device.php" class="dropdown-item">Device</a>
                <a href="mediasource.php" class="dropdown-item ">Media Sources</a>
                <a href="tools.php" class="dropdown-item">Tools</a>
            </div>
        </div>
        <div class="nav-item dropdown dropright">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">By Product Type <i class="fa fa-angle-right float-right mt-1"></i></a>
            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                <a href="backpack.php" class="dropdown-item active">Backpack & Bags</a>
                <a href="fightcase.php" class="dropdown-item">Flight Cases</a>
                <a href="eva.php" class="dropdown-item">EVA Hardcases</a>
                <a href="audiocable.php" class="dropdown-item">Audio Cables</a>
            </div>
        </div>
        <div class="nav-item dropdown dropright">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Explore <i class="fa fa-angle-right float-right mt-1"></i></a>
            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                <a href="oem.php" class="dropdown-item">OEM</a>
                <a href="about.php" class="dropdown-item">About UDG</a>
            </div>
        </div>
    </div>
</nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">

                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <!-- <a href="shop.php" class="nav-item nav-link">Shop</a> -->
                            <!-- <a href="detail.php" class="nav-item nav-link">Shop Detail</a> -->
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/udg1.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">UDG Backpack & Travel Bags</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">UDG Backpack and also Travel Bags is the best choice for compartement need of traveling and going vacation around the world,feel comfort and easier with UDG Backpack & Travel Bags</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="shop.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/udg2.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">UDG Controller</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">UDG Controller is for DJ control mix for you can adjust the sound of mixer turntable of DJ</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/udg3.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">UDG Turn Table</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn"> Turntable is Tools Of DJ for mixing up and do some beats up some music you need</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">1-10 Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24 Hour Customer Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
    <div class="row px-xl-5 pb-3">
        <?php
        // Koneksi ke database
        $koneksi = mysqli_connect("localhost", "root", "", "db_udg");

        // Query untuk mengambil data dari tabel t_jenis
        $query = "SELECT * FROM t_jenis where id= 1 OR id = 2 OR id = 5 OR id = 8 OR id = 9 OR id = 11 ";
        $result = mysqli_query($koneksi, $query);

        // Menampilkan kategori
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-lg-3 col-md-4 col-sm-6 pb-1">';
            echo '<a class="text-decoration-none" href="#">';
            echo '<div class="cat-item d-flex align-items-center mb-4">';
            echo '<div class="flex-fill pl-3">';
            echo '<center><div class="overflow-hidden" style="width: 200px; height: 200px;">';
            echo '<img class="img-fluid" src="webp/' . $row['images'] . '" alt="' . $row['nama'] . '">';
            echo '</div></center>';
            echo '<h6>' . $row['nama'] . '</h6>';
            
            // Query untuk mengambil jumlah produk per kategori dari tabel t_product
            $query_produk = "SELECT COUNT(*) AS jumlah_produk FROM t_product WHERE id_jenis = " . $row['id'];
            $result_produk = mysqli_query($koneksi, $query_produk);
            $row_produk = mysqli_fetch_assoc($result_produk);
            $jumlah_produk = $row_produk['jumlah_produk'];

            echo '<small class="text-body">' . $jumlah_produk . ' Products</small>';
            echo '</div>';
            echo '</div>';
            echo '</a>';
            echo '</div>';
        }

        // Tutup koneksi
        mysqli_close($koneksi);
        ?>
    </div>
</div>
        </div>
    </div>
    <!-- Categories End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Bacpack & Other Products</span></h2>
        <div class="row px-xl-5">
            <?php
            // Koneksi ke database
            $koneksi = mysqli_connect("localhost", "root", "", "db_udg");
    
            // Query untuk mengambil data produk
            $query = "SELECT id,nama as nama_produk, images,harga,is_featured FROM t_product where id_jenis = 1 OR id_jenis = 2 OR id_jenis = 5 OR id_jenis = 8 OR id_jenis = 9 OR id_jenis = 11";
            $result = mysqli_query($koneksi, $query);
    
            // Menampilkan produk
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-lg-5 col-md-4 col-sm-6 pb-1">';
                echo '<div class="product-item bg-light mb-4">';
                echo '<div class="product-img position-relative overflow-hidden">';
                echo '<center><img src="webp/'. $row['images'] . '" type="image/webp" height="200" width="200"></center>';
                echo '<div class="product-action">';
                echo '<a class="btn btn-outline-dark btn-square" href="detail.php?id='. $row['id'] .'"><i class="fa fa-search"></i></a>';
                echo '</div>';
                echo '</div>';
                echo '<div class="text-center py-4">';
                echo '<a class="h6 text-decoration-none text-truncate" style="font-size:11px;" href="">' . $row['nama_produk'] . '</a>';
                echo '<div class="d-flex align-items-center justify-content-center mt-2">';
                echo '<h7>IDR Rp.' . $row['harga'] . '</h7>';
                echo '</div>';
                // echo '<div class="d-flex align-items-center justify-content-center mb-1">';
                // echo '<small class="fa fa-star text-primary mr-1"></small>';
                // echo '<small class="fa fa-star text-primary mr-1"></small>';
                // echo '<small class="fa fa-star text-primary mr-1"></small>';
                // echo '<small class="fa fa-star text-primary mr-1"></small>';
                // echo '<small class="fa fa-star text-primary mr-1"></small>';
                // // echo '<small>(' . $row['jumlah_review'] . ')</small>';
                // echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
    
            // Tutup koneksi
            mysqli_close($koneksi);
            ?>
        </div>
    </div>

    </div>
    </div>
    </div>
    <!-- Products End -->
 <!-- Products Start -->
 <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Newest Products</span></h2>
        <div class="row px-xl-5">
            <?php
            // Koneksi ke database
            $koneksi = mysqli_connect("localhost", "root", "", "db_udg");
    
            // Query untuk mengambil data produk
            $query = "SELECT id, nama as nama_produk, images,harga,is_featured FROM t_product where is_new = 'yes' AND id_jenis = 1 OR is_new = 'yes' AND id_jenis = 2 OR is_new = 'yes' AND id_jenis = 5 OR is_new = 'yes' AND id_jenis = 8 OR is_new = 'yes' AND id_jenis = 9 OR is_new = 'yes' AND id_jenis = 11 ";
            $result = mysqli_query($koneksi, $query);
    
            // Menampilkan produk
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-lg-5 col-md-4 col-sm-6 pb-1">';
                echo '<div class="product-item bg-light mb-4">';
                echo '<div class="product-img position-relative overflow-hidden">';
                echo '<center><img src="webp/'. $row['images'] . '" type="image/webp" height="200" width="200"></center>';
                echo '<div class="product-action">';
                echo '<a class="btn btn-outline-dark btn-square" href="detail.php?id='. $row['id'] .'"><i class="fa fa-search"></i></a>';
               echo '</div>';
                echo '</div>';
                echo '<div class="text-center py-4">';
                echo '<a class="h6 text-decoration-none text-truncate" style="font-size:11px;" href="">' . $row['nama_produk'] . '</a>';
                echo '<div class="d-flex align-items-center justify-content-center mt-2">';
                echo '<h7>IDR Rp.' . $row['harga'] . '</h7>';
                echo '</div>';
                // echo '<div class="d-flex align-items-center justify-content-center mb-1">';
                // echo '<small class="fa fa-star text-primary mr-1"></small>';
                // echo '<small class="fa fa-star text-primary mr-1"></small>';
                // echo '<small class="fa fa-star text-primary mr-1"></small>';
                // echo '<small class="fa fa-star text-primary mr-1"></small>';
                // echo '<small class="fa fa-star text-primary mr-1"></small>';
                // echo '<small>(' . $row['jumlah_review'] . ')</small>';
                // echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
    
            // Tutup koneksi
            mysqli_close($koneksi);
            ?>
        </div>
    </div>
    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Latest Products</span></h2>
        <div class="row px-xl-5">
            <?php
            // Koneksi ke database
            $koneksi = mysqli_connect("localhost", "root", "", "db_udg");
    
            // Query untuk mengambil data produk
            $query = "SELECT id, nama as nama_produk, images,harga,is_featured FROM t_product";
            $result = mysqli_query($koneksi, $query);
    
            // Menampilkan produk
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-lg-6 col-md-4 col-sm-6 pb-1">';
                echo '<div class="product-item bg-light mb-4">';
                echo '<div class="product-img position-relative overflow-hidden">';
                echo '<center><img src="webp/'. $row['images'] . '" type="image/webp" height="200" width="200"></center>';
                echo '<div class="product-action">';
                echo '<a class="btn btn-outline-dark btn-square" href="detail.php?id=' . $row['id'] . '"><i class="fa fa-search"></i></a>';
                echo '</div>';
                echo '</div>';
                echo '<div class="text-center py-4">';
                echo '<a class="h6 text-decoration-none text-truncate" style="font-size:11px;" href="">' . $row['nama_produk'] . '</a>';
                echo '<div class="d-flex align-items-center justify-content-center mt-2">';
                echo '<h7>IDR Rp.' . $row['harga'] . '</h7>';
                echo '</div>';
                // echo '<div class="d-flex align-items-center justify-content-center mb-1">';
                // echo '<small class="fa fa-star text-primary mr-1"></small>';
                // echo '<small class="fa fa-star text-primary mr-1"></small>';
                // echo '<small class="fa fa-star text-primary mr-1"></small>';
                // echo '<small class="fa fa-star text-primary mr-1"></small>';
                // echo '<small class="fa fa-star text-primary mr-1"></small>';
                // // echo '<small>(' . $row['jumlah_review'] . ')</small>';
                // echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
    
            // Tutup koneksi
            mysqli_close($koneksi);
            ?>
        </div>
    </div>

    </div>
    </div>
    </div>
    <!-- Products End -->


    <!-- Vendor Start -->
    <!-- <div class="container-fluid py-5">
        <h2> Our Vendor </h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="img/vendor-1.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-2.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-3.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-4.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-5.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-6.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-7.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-8.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-9.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Vendor End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">Wanna See More About Newest Of Our Product? Just Get In Touch Or You Can Visit Our Store In</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Bandung, West Java</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>rulyrizky23@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>081328306288</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <!-- <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a> -->
                            <!-- <a class="text-secondary mb-2" href="detail.php"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a> -->
                            <!-- <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a> -->
                            <a class="text-secondary" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <!-- <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a> -->
                            <!-- <a class="text-secondary mb-2" href="detail.php"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a> -->
                            <!-- <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a> -->
                            <a class="text-secondary" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Please Subscribe to us for can be informed about our newest product. Thank You</p>
                        <form id="subscribeForm" action="subscribe.php" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Your Email Address">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Subscribe</button>
                        </div>
                    </div>
                </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="http://portorulyrp.kesug.com">Rulzco</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

<!-- Include SweetAlert library -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("subscribeForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission
        
        // Fetch the form data
        const formData = new FormData(this);
        
        // Send the form data via AJAX
        fetch(this.action, {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: data.message
                }).then(() => {
                    window.location.href = "index.php"; // Redirect to index.php
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: data.message
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "An error occurred while processing your request."
            });
        });
    });
});
</script>
</body>

</html>