
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

                <!-- <div class="container-fluid">
                    <div class="row">
                       <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="design-tab" data-bs-toggle="tab" data-bs-target="#design-tab-pane" type="button" role="tab" aria-controls="design-tab-pane" aria-selected="true">Design</button>
                            </li>

                            <li class="nav-item" role="presentation">
                 <button class="nav-link" id="marketing-tab" data-bs-toggle="tab" data-bs-target="#marketing-tab-pane" type="button" role="tab" aria-controls="marketing-tab-pane" aria-selected="false">Marketing</button>
                            </li>
                            <li class="nav-item" role="presentation">
                <button class="nav-link" id="finance-tab" data-bs-toggle="tab" data-bs-target="#finance-tab-pane" type="button" role="tab" aria-controls="finance-tab-pane" aria-selected="false">Finance</button>
                 </li>

                 <li class="nav-item" role="presentation">
                <button class="nav-link" id="music-tab" data-bs-toggle="tab" data-bs-target="#music-tab-pane" type="button" role="tab" aria-controls="music-tab-pane" aria-selected="false">Music</button>
                            </li>

                <li class="nav-item" role="presentation">
                <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education-tab-pane" type="button" role="tab" aria-controls="education-tab-pane" aria-selected="false">Education</button>
                </li>
                </ul>
                </div>
                </div> -->

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
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">

                        <div class="col-12 text-center">
                            <h2 class="text-white mb-4">How does it work?</h1>
                        </div>

                        <div class="col-lg-10 col-12 mx-auto">
                            <div class="timeline-container">
                                <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                    <div class="list-progress">
                                        <div class="inner"></div>
                                    </div>

                                    <li>
                                        <h4 class="text-white mb-3">Search your favourite topic</h4>

                                        <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, cumque magnam? Sequi, cupiditate quibusdam alias illum sed esse ad dignissimos libero sunt, quisquam numquam aliquam? Voluptas, accusamus omnis?</p>

                                        <div class="icon-holder">
                                          <i class="bi-search"></i>
                                        </div>
                                    </li>
                                    
                                    <li>
                                        <h4 class="text-white mb-3">Bookmark &amp; Keep it for yourself</h4>

                                        <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint animi necessitatibus aperiam repudiandae nam omnis est vel quo, nihil repellat quia velit error modi earum similique odit labore. Doloremque, repudiandae?</p>

                                        <div class="icon-holder">
                                          <i class="bi-bookmark"></i>
                                        </div>
                                    </li>

                                    <li>
                                        <h4 class="text-white mb-3">Read &amp; Enjoy</h4>

                                        <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi vero quisquam, rem assumenda similique voluptas distinctio, iste est hic eveniet debitis ut ducimus beatae id? Quam culpa deleniti officiis autem?</p>

                                        <div class="icon-holder">
                                          <i class="bi-book"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12 text-center mt-5">
                            <p class="text-white">
                                Want to learn more?
                                <a href="#" class="btn custom-btn custom-border-btn ms-3">Check out Youtube</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>


            <section class="faq-section section-padding" id="section_4">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <h2 class="mb-4">Why I-TAXCA </h2>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-lg-5 col-12">
                            <img src="assets/img/aboutitax.jpg" class="img-fluid" alt="FAQs">
                        </div>

                        <div class="col-lg-6 col-12 m-auto">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        What is Topic Listing?
                                        </button>
                                    </h2>

                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Topic Listing is free Bootstrap 5 CSS template. <strong>You are not allowed to redistribute this template</strong> on any other template collection website without our permission. Please contact TemplateMo for more detail. Thank you.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        How to find a topic?
                                    </button>
                                    </h2>

                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            You can search on Google with <strong>keywords</strong> such as templatemo portfolio, templatemo one-page layouts, photography, digital marketing, etc.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Does it need to paid?
                                    </button>
                                    </h2>

                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short" style="font-size: xxx-large;"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/custom.js"></script>

</body>

</html>