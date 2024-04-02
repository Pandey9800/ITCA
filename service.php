<?php
include ('./admin/function/db_connect.php');
include ('./admin/function/function.php');
include_once 'header.php';

if(isset($_GET['catid'])) {
    $catid = $_GET['catid'];
    $query = "SELECT cast FROM cat WHERE id = $catid";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $categoryName = $row['cast'];
    } else {
        $categoryName = "Unknown Category";
    }
} else {
    $categoryName = "Unknown Category";
}
?>



<!doctype html><html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="itaxca">
    <meta name="author" content="itaxca">
    <title>itaxca EASIEST WAY OF E-FILING YOUR INCOME TAX RETURN IN INDIA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/templatemo-topic-listing.css" rel="stylesheet">
</head>

<body id="top">

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="./">
                    <i class="bi bi-shield-check"></i>
                    <span>I-taxCA</span>
                </a>

                <div class="d-lg-none ms-auto me-4">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">How it works</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Contact</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="true">Learn</a>

                            <!--<ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">-->
                            <!--    <li><a class="dropdown-item" href="#">FAQ</a></li>-->
                            <!--    <li><a class="dropdown-item" href="#">Tax Book</a></li>-->
                            <!--    <li><a class="dropdown-item" href="#">Blog</a></li>-->
                            <!--</ul>-->
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="partner-login">Become Partner</a>
                        </li>
                    </ul>
                    <div>
                        <a href="track_application.php" class="navbar-icon bi-box-arrow-in-up smoothscroll" title="Track Your Application"></a>
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="d-none d-lg-block">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="bi bi-person"></span>
                                        </button>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#registrationModal">Login / Register</a></li>
                                                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>

  <!-- Modal -->
<div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registrationModalLabel">User Registration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Initially empty, will be populated by login or registration form -->
            </div>
        </div>
    </div>
</div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <script>
    </script>
    
    <script>
        $(document).ready(function() {
            $('#loginBtn').click(function() {
                $('#registrationModal').modal('show');
            });
                    });
    </script>

        <script>
            function populateProfileFields() {
    var user = null;
    if (user) {
        document.getElementById('name').value = user.name;
        document.getElementById('contact').value = user.contact;
        document.getElementById('email').value = user.email;
        document.getElementById('profileImg').src = user.profile_pic;
        $('#registrationModal').modal('show');
    } }
        </script>
<script>
    $(document).ready(function () {
        showLoginForm();
    });

    function showLoginForm() {
        $('#modalBody').html(`
            <!-- Login Form -->
            <form id="loginForm" action="index.php" method="POST">
                <div class="mb-3">
                    <label for="login_contact" class="form-label">contact</label>
                    <input type="text" class="form-control" maxlength="10" id="login_contact" name="contact" required>
                </div>
                <div class="mb-3">
                    <label for="login_password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="login_password" name="login_password" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </form>
            <hr>
            <p class="text-center">Not Registered? <a href="#" onclick="showRegistrationForm()">Register now!</a></p>
        `);
    }

    function showRegistrationForm() {
        $('#modalBody').html(`
            <!-- Registration Form -->
            <form id="registrationForm" action="index.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Mobile Number</label>
                    <input type="text" maxlength="10" class="form-control" id="contact" name="contact" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control" id="photo" name="photo" onchange="readURL(this)">
                    <img id="profileImg" src="#" alt="Your image" style="display:none; width: 100px; height: 100px;"/>
                </div>
                <button type="submit" name="register" class="btn btn-primary">Register</button>
            </form>
            <hr>
            <p class="text-center">Already Registered? <a href="#" onclick="showLoginForm()">Login now!</a></p>
        `);
    }
</script>


</body>
</html>
            

            <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
                <div class="container">
                    <div class="row">
                        
                        <!-- <div class="col-lg-8 col-12 mx-auto">
                            <h1 class="text-white text-center">Make. Tax. Easy</h1>
                            
                            <h6 class="text-center" style="color:#fff;">EASIEST WAY OF E-FILING YOUR INCOME TAX RETURN IN INDIA </h6>
                        </div> -->
                    </div>
                    <h5 style="text-align: center; color: #fff;">We provide the following services for <span style="color: red;"><?php echo $categoryName; ?></span></h5>
                </div>
            </section>


            <section class="featured-section">
    <div class="container">
        <div class="row justify-content-center">
            <?php
            if(isset($_GET['catid'])) {
                $catid = $_GET['catid'];
                $query = "SELECT * FROM service WHERE catid = $catid";
                $result = mysqli_query($con, $query);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-lg-4 col-6 mb-4 mb-lg-0" style="padding-top: 5px; padding-bottom: 5px; border-radius: 10px;">
                            <div class="bg-white" style="border-radius: 10px;">
                                <div class="d-flex">
                                    <div class="mx-auto text-center">
                                        <div class="text-center">
                                        <img src="admin/<?php echo $row['pic']; ?>" style="width:100%; height:100%; padding-top:5%;" alt="<?php echo $row['name']; ?>"><br/>
                                            <h5 class="mb-2"><?php echo $row['name']; ?></h5>
                                        </div>
                                        <a href="apply.php?service_id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Apply Now</a>
                                        <br/>
                                    </div>
                                </div>
                                <br/>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            }
            ?>
        </div>
    </div>
</section>


            <section class="contact-section section-padding section-bg" id="section_5">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center">
                            <h2 class="mb-5">Get in touch</h2>
                        </div>

                        <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118983.6153040918!2d81.53667066827742!3d21.262045511343103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a28dda23be28229%3A0x163ee1204ff9e240!2sRaipur%2C%20Chhattisgarh!5e0!3m2!1sen!2sin!4v1708274768523!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-3 mb-lg- mb-md-0 ms-auto">
                            <h4 class="mb-3">Head office</h4>

                            <p>Raipur Chhattisgarh</p>

                            <hr>

                            <p class="d-flex align-items-center mb-1">
                                <span class="me-2">Phone</span>

                                <a href="tel: 305-240-9671" class="site-footer-link">
                                    +91 89821 05845
                                </a>
                            </p>

                            <p class="d-flex align-items-center">
                                <span class="me-2">Email</span>

                                <a href="mailto:info@itaxca.com/" class="site-footer-link">
                                    info@itaxca.com
                                </a>
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mx-auto">
                            <h4 class="mb-3">Connect With Us</h4>

                            <i class="bi bi-facebook"></i> || <i class="bi bi-instagram"></i>
                        </div>

                    </div>
                </div>
            </section>
        </main>

<footer class="site-footer section-padding">
             </footer>
<footer id="footer">
    <div class="footer-top" id="section_10">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <b style="font-size:20px;">I-taxCA</b>
              <p class="pb-3"><em style="font-size:14px;">TRADEMARK REGISTRATION | TAX | GST | COMPANY REGISTRATION | MSME | FSSAI | GUMASTA | DIGITAL SIGNATURE SERVICES | ISO | FINANCE | OTHER BUSINESS REGISTRATION AND LICENSING |</em></p>
              <p>
                <strong>Phone:</strong> +91 9575126240<br>
                <strong>Email:</strong> info@itaxca.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4  style="font-size:20px;">Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="./" style="font-size:14px;">Home</a></li>

              <li><i class="bx bx-chevron-right"></i> <a href="partner/" style="font-size:14px;">Partner Login</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#" style="font-size:14px;">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#" style="font-size:14px;">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#" style="font-size:14px;">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#" style="font-size:14px;">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4 style="font-size:20px;">Userfull Link</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#" style="font-size:14px;">Customer Login</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="partner/" style="font-size:14px;">E-counter Login</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="staff/" style="font-size:14px;">Staff Login</a></li>
            </ul>
          </div> 

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4 style="font-size:20px;">Our Newsletter</h4>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>itaxca</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short" style="font-size: xxx-large;"></i></a>
  <div id="preloader"></div>
  <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/custom.js"></script>
</body>
</html>