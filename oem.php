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
                <a href="mediasource.php" class="dropdown-item">Media Sources</a>
                <a href="tools.php" class="dropdown-item">Tools</a>
            </div>
        </div>
        <div class="nav-item dropdown dropright">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">By Product Type <i class="fa fa-angle-right float-right mt-1"></i></a>
            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                <a href="backpack.php" class="dropdown-item">Backpack & Bags</a>
                <a href="fightcase.php" class="dropdown-item">Flight Cases</a>
                <a href="eva.php" class="dropdown-item">EVA Hardcases</a>
                <a href="audiocable.php" class="dropdown-item">Audio Cables</a>
            </div>
        </div>
        <div class="nav-item dropdown dropright">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Explore <i class="fa fa-angle-right float-right mt-1"></i></a>
            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                <a href="oem.php" class="dropdown-item active">OEM</a>
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
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img src="webp/miller.jpg">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 1200px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">OEM</h1>
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
    <!-- Products Start -->
 <div class="container-fluid pt-5 pb-3">
 <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">OUR PROJECTS UDG</span></h2>
        <div class="container-fluid pt-5">
        <div class="row px-xl-8 pb-3">
            <div class="col-lg-10 col-md-8 col-sm-12 pb-2">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 20px;">
                   <img src="webp/carhartt.webp" height="200" width="200" />
                    <p>Carhartt<br><br> Carhartt Work In Progress (Carhartt WIP) forms a division of the American brand Carhartt, one of the first company’s to pioneer workwear in the USA. Founded in Europe in 1989, 100 years after Hamilton Carhartt established his business in Detroit, Carhartt WIP has been carefully adapting and modifying Carhartt's core product characteristics for a different audience of consumers who value refined design and quality while still remaining true to Carhartt's brand origins.</p>
           </div>      
            </div>
            <div class="col-lg-10 col-md-8 col-sm-12 pb-2">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 20px;">
                   <img src="webp/nativeinstrument.webp" height="200" width="200" />
                    <p>Native Instruments<br><br>Native Instruments is a leading manufacturer of software and hardware for computer-based audio production and DJing. The company's mission is to develop innovative, fully-integrated solutions for all musical styles and professions. The resulting products regularly push technological boundaries and open up new creative horizons for professionals and amateurs alike.</p>
           </div>      
            </div>

            <div class="col-lg-10 col-md-8 col-sm-12 pb-2">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 20px;">
                   <img src="webp/millers.jpg" height="200" width="200" />
                    <p>Miller<br><br>SAB Miller are in the beer and soft drinks business. We bring refreshment and sociability to millions of people all over the world who enjoy our drinks. We do business in a way that improves livelihoods and helps build communities.
Miller SoundClash is annual DJ competition, run by Miller Genuine Draft. The Miller SoundClash focus is high energy electronic dance music, entrants should be set-up to DJ with this genre of music and other close variations. As long as it is high energy music that will set the dance floor on fire, it is the right music!</p>
           </div>      
            </div>
            <div class="col-lg-10 col-md-8 col-sm-12 pb-2">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 20px;">
                   <img src="webp/adamde.jpg" height="200" width="200" />
                    <p>UDG x Adam De Great<br><br> A Polish DJ and Producer who has been continuously performing on the festivals and club scene since 1997. He is one of the most recognisable and dynamically developing artists, who as the only Polish DJ ever performed officially several times at the world’s greatest festivals, such as TOMORROWLAND or ULTRA Europe, and on all the major events staged in Poland (main stage), such as Sunrise Festival, Mayday, Electrocity, Soundtropolis, Audiolake, Wonderland, Made in Poland festival, Beach Party Only and many more.</p>
           </div>      
            </div>
            <div class="col-lg-10 col-md-8 col-sm-12 pb-2">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 20px;">
                   <img src="webp/wolfmix.jpg" height="200" width="200" />
                    <p>UDG x Wolfmix<br><br>Wolfmix W1 is a standalone performance DMX lighting controller - designed for creating light shows on the fly without a computer.

A toolbox of FX modules, music sync, and up to 4 DMX universes - packed inside robust hardware with a powerful processor. Choose from 1000’s of light fixtures, or build your own directly inside the controller. Whether it’s for a live performance, disco, club or show - Wolfmix has you covered.</p>
           </div>      
            </div>

            <div class="col-lg-10 col-md-8 col-sm-12 pb-2">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 20px;">
                   <img src="webp/antelopeaudio.jpg" height="200" width="200" />
                    <p>UDG Antelope Audio<br><br>Antelope Audio has packed more than 20 years’ experience in digital audio, clocking and analog circuit development
Antelope Audio has a strong background in digital audio equipment manufacturing. We are dedicated to helping people achieve high-definition sound both in the recording studio and home environment.
We pioneered the adoption of Atomic clock generators in Audio Master Clocks. Now we implement pro audio technologies in a product line of USB D/A converters (DACs), targeting both audiophiles and professionals.</p>
           </div>      
            </div>


            <div class="col-lg-10 col-md-8 col-sm-12 pb-2">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 20px;">
                   <img src="webp/hhv20.webp" height="200" width="200" />
                    <p>UDG HHV 20Th Anniversary<br><br>The story of HHV starts at the end of the 1990s – at a time where the rare vinyl LP was not just a mouse click away. Hip hop music from the USA, especially that outside the mainstream, was difficult to get hold of in this country. At the time you could hardly buy it on vinyl – let alone for a fair price. The idea of changing this, in 2002, was the foundation for what is today HHV.

For the HHV 20th anniversary, we have teamed up with HHV to introduce the UDG x HHV 7" SlingBag 60 (HHV 20 Years Edition), a very special design where functionality meets subtle co-branding.</p>
           </div>      
            </div>

            <div class="col-lg-10 col-md-8 col-sm-12 pb-2">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 20px;">
                   <img src="webp/chamsys.jpg" height="200" width="200" />
                    <p>ChamSys<br><br>Since 2003, ChamSys has harnessed the talents of lighting designers, software engineers and hardware developers to innovate and disrupt the field of lighting control. They knew that to overcome the limitations of traditional consoles, they would have to utilize the latest technology and break some conventions. Those efforts lead to the release of MagicQ software and dedicated consoles, which fulfill the company’s aim creating high performance lighting consoles and softwares engineered to adapt to a wide range of applications for operators at all levels from beginners to professionals.
ChamSys wanted to bring to a special bag and opted for a customized version of the UDG Ultimate MIDI Controller Backpack Small.</p>
           </div>      
            </div>

            <div class="col-lg-10 col-md-8 col-sm-12 pb-2">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 20px;">
                   <img src="webp/Serato.webp" height="200" width="200" />
                    <p>Serato<br><br>Serato Audio Research is a New Zealand software company headquartered in Auckland, that specializes in audio signal processing, production and professional performance tools for DJs.
Serato wanted to bring to its partners a special bag and opted for a customized version of the UDG CourierBag Deluxe.</p>
           </div>      
            </div>


            
        </div>
    </div>
   


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