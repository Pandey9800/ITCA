<?php
ob_start();
session_start();
include_once 'admin/function/db_connect.php';
include_once 'admin/function/function.php';

// Check if user is logged in
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    $user = null;
}

// Handle user logout
if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    header("Location: index.php"); // Redirect to homepage or login page
    exit;
}

// Handle new user registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if login or registration form is submitted
    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $profilePic = null;
        if (isset($_FILES['profilePic'])) {
            $targetDir = "images/";
            $targetFile = $targetDir . basename($_FILES["profilePic"]["name"]);
            if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $targetFile)) {
                $profilePic = $targetFile;
            } else {
                echo "Error uploading file.";
            }
        }
        // Check if user already exists
        $query = "SELECT * FROM users WHERE mobile='$mobile'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            echo '<script>alert("User already exists. Please sign in.");</script>';
        } else {
            // Create hashed password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            // Insert user into database
            $insert_query = "INSERT INTO users (name, mobile, email, password, profile_pic) VALUES ('$name', '$mobile', '$email', '$hashed_password', '$profilePic')";
            if (mysqli_query($con, $insert_query)) {
                echo '<script>alert("New User created successfully");</script>';
                header("Location: index.php"); // Redirect to homepage after successful registration
                exit;
            } else {
                echo "Error: " . $insert_query . "<br>" . mysqli_error($con);
            }
        }
    } elseif (isset($_POST['login'])) {
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        // Query to fetch user details from database based on mobile number
        $query = "SELECT * FROM users WHERE mobile='$mobile' LIMIT 1";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            // Verify password
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                echo '<script>alert("Login successful");</script>';
                header("Location: index.php"); // Redirect to homepage after successful login
                exit;
            } else {
                echo '<script>alert("Invalid mobile number or password");</script>';
            }
        } else {
            echo '<script>alert("Invalid mobile number or password");</script>';
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>itaxca EASIEST WAY OF E-FILING YOUR INCOME TAX RETURN IN INDIA</title>

    <!-- CSS FILES -->
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

                        <!-- <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">Service</a>
                        </li> -->

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">How it works</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Contact</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="true">Learn</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">FAQ</a></li>
                                <li><a class="dropdown-item" href="#">Tax Book</a></li>
                                <li><a class="dropdown-item" href="#">Blog</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_10">Become Partner</a>
                        </li>
                    </ul>
                    <div>
                        <a href="track_application.php" class="navbar-icon bi-box-arrow-in-up smoothscroll" title="Track Your Application"></a>
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="d-none d-lg-block">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php if ($user && isset($user['profile_pic'])) : ?>
                                    <img src="<?php echo $user['profile_pic']; ?>" alt="Profile Picture" class="rounded-circle" width="40" height="40">
                                <?php else : ?>
                                    <span class="bi bi-person"></span>
                                <?php endif; ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                <?php if ($user) : ?>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#registrationModal">Edit Profile</a></li>
                                    <li><a class="dropdown-item" href="?logout=true">Logout</a></li>
                                <?php else : ?>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#registrationModal">Login / Register</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Modal -->
        <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
    <h5 class="modal-title" id="registrationModalLabel">User Authentication</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>


            <div class="modal-body">
                <form id="authenticationForm" action="index.php" method="POST" enctype="multipart/form-data">
                    <div id="signInFields">
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input type="text" maxlength="10" class="form-control" id="mobile" name="mobile" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="signIn()">Sign In</button>
                        <p class="text-center mt-3">Don't have an account? <a href="#" onclick="showRegistrationFields()">Register here</a></p>
                    </div>
                    <div id="registerFields" style="display: none;">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="mobileReg" class="form-label">Mobile Number</label>
                            <input type="text" maxlength="10" class="form-control" id="mobileReg" name="mobile" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="passwordReg" class="form-label">Password</label>
                            <input type="password" class="form-control" id="passwordReg" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="profilePic" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="profilePic" name="profilePic">
                        </div>
                        <button type="button" class="btn btn-primary" onclick="register()">Register</button>
                        <p class="text-center mt-3">Already have an account? <a href="#" onclick="showSignInFields()">Sign in here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



    </main>
    
    <!-- JavaScript libraries and scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#loginBtn').click(function() {
                $('#registrationModal').modal('show');
            });
        });
    </script>

    <script>
        function showRegistrationFields() {
    $('#signInFields').animate({opacity: 0}, 300, function() {
        $(this).slideUp(400);
    });
    $('#registerFields').slideDown(400).animate({opacity: 1}, 300);
}

function showSignInFields() {
    $('#registerFields').animate({opacity: 0}, 300, function() {
        $(this).slideUp(400);
    });
    $('#signInFields').slideDown(300).animate({opacity: 1}, 300);
}

        function signIn() {
            // Basic form validation before submitting
            if (document.getElementById('mobile').value.trim() === '' || document.getElementById('password').value.trim() === '') {
                alert('Mobile number and password are required.');
                return;
            }
            document.getElementById("authenticationForm").submit();
        }
        function register() {
            // Basic form validation before submitting
            if (document.getElementById('name').value.trim() === '' || document.getElementById('mobileReg').value.trim() === '' || 
                document.getElementById('email').value.trim() === '' || document.getElementById('passwordReg').value.trim() === '') {
                alert('All fields are required.');
                return;
            }
            document.getElementById("authenticationForm").submit();
        }
    </script>

</body>

</html>
