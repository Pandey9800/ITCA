
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

                        <div class="col-lg-8 col-12 mx-auto">
                            <h1 class="text-white text-center">Make. Tax. Easy</h1>

                            <h6 class="text-center" style="color:#fff;">EASIEST WAY OF E-FILING YOUR INCOME TAX RETURN IN INDIA </h6>

                            <!--<form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">-->
                            <!--    <div class="input-group input-group-lg">-->
                            <!--        <span class="input-group-text bi-search" id="basic-addon1">-->
                                        
                            <!--        </span>-->

                            <!--        <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Design, Code, Marketing, Finance ..." aria-label="Search">-->

                            <!--        <button type="submit" class="form-control">Search</button>-->
                            <!--    </div>-->
                            <!--</form>-->
                        </div>
                    </div>
                </div>
            </section>


             <section class="featured-section">
                <div class="container">
                    <div class="row justify-content-center">

 <div class="col-lg-4 col-6 mb-4 mb-lg-0" style="padding-top: 10px; padding-bottom: 10px;border-radius:20px;">
    <div class=" bg-white"  style="border-radius:20px;">
        <div class="d-flex">
            <div class="mx-auto text-center">
                             <div class="text-center">
                <img src="./images/1707978318.png" style="width:100px;height:100px;" alt="GST"><br/>
                
      <h4 class="mb-2" style="font-size:10px;">GST</h4>
            </div>
                 <a href="service?catid=7" class="btn btn-primary btn-sm">Apply Now</a>
         <br/>
                            </div>
        </div> <br/>
    </div>
</div> 
 <div class="col-lg-4 col-6 mb-4 mb-lg-0" style="padding-top: 10px; padding-bottom: 10px;border-radius:20px;">
    <div class=" bg-white"  style="border-radius:20px;">
        <div class="d-flex">
            <div class="mx-auto text-center">
                             <div class="text-center">
                <img src="./images/1707978147.png" style="width:100px;height:100px;" alt="ITR Filing"><br/>
                
      <h4 class="mb-2" style="font-size:10px;">ITR FILING</h4>
            </div>
                 <a href="service?catid=6" class="btn btn-primary btn-sm">Apply Now</a>
         <br/>
                            </div>
        </div> <br/>
    </div>
</div> 
 <div class="col-lg-4 col-6 mb-4 mb-lg-0" style="padding-top: 10px; padding-bottom: 10px;border-radius:20px;">
    <div class=" bg-white"  style="border-radius:20px;">
        <div class="d-flex">
            <div class="mx-auto text-center">
                             <div class="text-center">
                <img src="./images/1707981170.png" style="width:100px;height:100px;" alt="TDS / TCS"><br/>
                
      <h4 class="mb-2" style="font-size:10px;">TDS / TCS</h4>
            </div>
                 <a href="service?catid=13" class="btn btn-primary btn-sm">Apply Now</a>
         <br/>
                            </div>
        </div> <br/>
    </div>
</div> 
 <div class="col-lg-4 col-6 mb-4 mb-lg-0" style="padding-top: 10px; padding-bottom: 10px;border-radius:20px;">
    <div class=" bg-white"  style="border-radius:20px;">
        <div class="d-flex">
            <div class="mx-auto text-center">
                             <div class="text-center">
                <img src="./images/1707978771.png" style="width:100px;height:100px;" alt="PF & ESIC"><br/>
                
      <h4 class="mb-2" style="font-size:10px;">PF & ESIC</h4>
            </div>
                 <a href="service?catid=9" class="btn btn-primary btn-sm">Apply Now</a>
         <br/>
                            </div>
        </div> <br/>
    </div>
</div> 
 <div class="col-lg-4 col-6 mb-4 mb-lg-0" style="padding-top: 10px; padding-bottom: 10px;border-radius:20px;">
    <div class=" bg-white"  style="border-radius:20px;">
        <div class="d-flex">
            <div class="mx-auto text-center">
                             <div class="text-center">
                <img src="./images/1707979037.png" style="width:100px;height:100px;" alt="Project & CMA Report"><br/>
                
      <h4 class="mb-2" style="font-size:10px;">PROJECT & CMA REPORT</h4>
            </div>
                 <a href="service?catid=10" class="btn btn-primary btn-sm">Apply Now</a>
         <br/>
                            </div>
        </div> <br/>
    </div>
</div> 
 <div class="col-lg-4 col-6 mb-4 mb-lg-0" style="padding-top: 10px; padding-bottom: 10px;border-radius:20px;">
    <div class=" bg-white"  style="border-radius:20px;">
        <div class="d-flex">
            <div class="mx-auto text-center">
                             <div class="text-center">
                <img src="./images/1707981078.png" style="width:100px;height:100px;" alt="MSME Registration"><br/>
                
      <h4 class="mb-2" style="font-size:10px;">MSME REGISTRATION</h4>
            </div>
                 <a href="service?catid=12" class="btn btn-primary btn-sm">Apply Now</a>
         <br/>
                            </div>
        </div> <br/>
    </div>
</div> 
 <div class="col-lg-4 col-6 mb-4 mb-lg-0" style="padding-top: 10px; padding-bottom: 10px;border-radius:20px;">
    <div class=" bg-white"  style="border-radius:20px;">
        <div class="d-flex">
            <div class="mx-auto text-center">
                             <div class="text-center">
                <img src="./images/1707981382.png" style="width:100px;height:100px;" alt="Audit & Accounting/Bookkeeping"><br/>
                
      <h4 class="mb-2" style="font-size:10px;">AUDIT & ACCOUNTING/BOOKKEEPING</h4>
            </div>
                 <a href="service?catid=14" class="btn btn-primary btn-sm">Apply Now</a>
         <br/>
                            </div>
        </div> <br/>
    </div>
</div> 
 <div class="col-lg-4 col-6 mb-4 mb-lg-0" style="padding-top: 10px; padding-bottom: 10px;border-radius:20px;">
    <div class=" bg-white"  style="border-radius:20px;">
        <div class="d-flex">
            <div class="mx-auto text-center">
                             <div class="text-center">
                <img src="./images/1707982471.png" style="width:100px;height:100px;" alt="Company Incorporation & ROC Compliance"><br/>
                
      <h4 class="mb-2" style="font-size:10px;">COMPANY INCORPORATION & ROC COMPLIANCE</h4>
            </div>
                 <a href="service?catid=15" class="btn btn-primary btn-sm">Apply Now</a>
         <br/>
                            </div>
        </div> <br/>
    </div>
</div> 
 <div class="col-lg-4 col-6 mb-4 mb-lg-0" style="padding-top: 10px; padding-bottom: 10px;border-radius:20px;">
    <div class=" bg-white"  style="border-radius:20px;">
        <div class="d-flex">
            <div class="mx-auto text-center">
                             <div class="text-center">
                <img src="./images/1707982834.png" style="width:100px;height:100px;" alt="Tax Planning & Consultation"><br/>
                
      <h4 class="mb-2" style="font-size:10px;">TAX PLANNING & CONSULTATION</h4>
            </div>
                 <a href="service?catid=16" class="btn btn-primary btn-sm">Apply Now</a>
         <br/>
                            </div>
        </div> <br/>
    </div>
</div> 
 <div class="col-lg-4 col-6 mb-4 mb-lg-0" style="padding-top: 10px; padding-bottom: 10px;border-radius:20px;">
    <div class=" bg-white"  style="border-radius:20px;">
        <div class="d-flex">
            <div class="mx-auto text-center">
                             <div class="text-center">
                <img src="./images/1707983025.png" style="width:100px;height:100px;" alt="Other Services"><br/>
                
      <h4 class="mb-2" style="font-size:10px;">OTHER SERVICES</h4>
            </div>
                 <a href="service?catid=17" class="btn btn-primary btn-sm">Apply Now</a>
         <br/>
                            </div>
        </div> <br/>
    </div>
</div> 
    
</div>
</div>
</section>

<section class="explore-section section-padding" id="section_2">
    <div class="container">
                        <div class="col-12 text-center">
                            <h2 class="mb-4">Learn TAX</h1>
                        </div>

                    </div>
                </div>

                <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                    <div class="row">
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            </section>


            <section class="timeline-section section-padding" id="section_3">
                
            </section>


            <section class="faq-section section-padding" id="section_4">
                
            </section>


            <section class="contact-section section-padding section-bg" id="section_5">
                
            </section>