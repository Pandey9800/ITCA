<?php include_once 'header.php';

//print_r($_POST);

if (isset($_POST['service_question_attempt'])) {
    $service_id = trim($_GET['service_id']); // $_POST['service_id'];
    $num_q_name = trim($_POST['num_q_name'] ?? null);

    $cat_id_q = mysqli_query($con, 'SELECT catid FROM service WHERE id="' . trim($_GET['service_id']) . '"');
    $cat_id_row = mysqli_fetch_assoc($cat_id_q);
    $q_list_q = mysqli_query($con, 'SELECT q_list_id FROM form_question WHERE service_id="' . trim($_GET['service_id']) . '"');
    while ($q_list_row = mysqli_fetch_assoc($q_list_q)) {
        $q_list_row_data[] = $q_list_row;
    }

    // Think Subjectively Not Objectively.  

    /*
        .trim(Method to Get["element name"]) . '"');
        You learned about it during graduation... remember it properly....
        
    */

    $variable = $num_q_name;
    $i = 0;
    while ($i < $num_q_name) {
        $j = $i + 1;
        $in_question = mysqli_query($con, 'INSERT INTO `customer_answer_question_service` (`service_id`, `question_id`, `asnwer`, cat_id) VALUES ("' . $service_id . '", "' . $q_list_row_data[$i]["q_list_id"] . '", "' . $_POST["question_name_squence" . $j] . '", "' . $cat_id_row['catid'] . '")');
        $i++;
    }
}

function getServiceInfo($service_id, $con) {
$service_query = mysqli_query($con, 'SELECT name FROM service WHERE id="' . $service_id . '"');
$service_row = mysqli_fetch_assoc($service_query);
return $service_row['name'];
    }

$service_id = trim($_GET['service_id']);
$service_name = getServiceInfo($service_id, $con);



if (isset($_POST['service_submit'])) {
    $panno = mysqli_real_escape_string($con, $_POST['panno']);
    $existingCustomerQuery = mysqli_query($con, 'SELECT * FROM customer WHERE panno="' . $panno . '" LIMIT 1');

    if ($existingCustomer = mysqli_fetch_assoc($existingCustomerQuery)) {
        $up = mysqli_query($con, 'UPDATE customer SET encounterservice="' . $_POST['service_id'] . '", dob="' . $_POST['dob'] . '", financial_year="' . $_POST['financial_year'] . '", panno="' . $_POST['panno'] . '" WHERE panno="' . $panno . '"');
    } else {
        $in_direct_inquiery = mysqli_query($con, 'INSERT INTO customer (encounterservice, dob, financial_year, panno) VALUES("' . $_POST['service_id'] . '", "' . $_POST['dob'] . '", "' . $_POST['financial_year'] . '", "' . $_POST['panno'] . '")');
    }
}

if (isset($_POST['personal_data_submit'])) {
    function inquiry_id($contact, $service_id, $con)
{
    $sel_query = 'SELECT id FROM customer WHERE contact="' . $contact . '" ORDER BY id DESC';
    echo "Query: $sel_query<br>"; // Debugging output
    $sel = mysqli_query($con, $sel_query);
    $inquiry = mysqli_fetch_assoc($sel);
    $inquiry_id = $inquiry['id'];
    return $inquiry_id;
}


    $id = inquiry_id($_POST['contact'], $_POST['service_id'], $con);
    
    echo $id;

    if ($id !== null) {
        $service_id = $_GET['service_id']; // Get the service ID from the URL parameters
        
        // Fetch catid from the service table based on the service_id
        $cat_id_query = mysqli_query($con, 'SELECT catid FROM service WHERE id="' . trim($_GET['service_id']) . '"');
        $cat_id_row = mysqli_fetch_assoc($cat_id_query);
        $catid = $cat_id_row['catid'];
    
        // Check if $cat_id_row is null, initialize it if needed
        if ($cat_id_row === null) {
            $catid = null; // Or handle the case appropriately
        }
    
        // Update customer details
        $up = mysqli_query($con, 'UPDATE customer SET name = "' . $_POST['name'] . '", lname = "' . $_POST['lname'] . '", email = "' . $_POST['email'] . '", contact = "' . $_POST['contact'] . '", father = "' . $_POST['father'] . '", city = "' . $_POST['city'] . '", address = "' . $_POST['address'] . '", pincode = "' . $_POST['pin'] . '", gender = "' . $_POST['gender'] . '", adharno = "' . $_POST['adhar'] . '", encounterservice = "' . $service_id . '", encountercat = "' . $catid . '" WHERE id="' . $id . '"');
    
        if ($up) {
            // Insert data into task table with the customer id and service id
            $insert_into_task = mysqli_query($con, 'INSERT INTO task (applicantid, taskid) VALUES("' . $id . '", "' . $service_id . '")');
    
            if ($insert_into_task) {
                // Redirect to thankyou.php with custid, service_id, and catid
                echo '<script>window.location="thankyou.php?custid=' . $id . '&service_id=' . $service_id . '&catid=' . $catid . '";</script>';
            } else {
                echo 'Error inserting data into task table: ' . mysqli_error($con);
            }
        } else {
            echo 'Error updating customer data: ' . mysqli_error($con);
        }
    } else {
        echo 'No customer found with the provided contact number and service ID.';
    }        
}
$cities = getCities();
?>


<?php
if(isset($_POST['service_question_attempt'])){
    //print_r($_POST);   
?>

            <section class="section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center">
                            <h3 class="mb-4">Enter PERSONAL Details</h3>
                        </div>

                        <div class="col-lg-8 col-12 mt-3 mx-auto">
                            
                            <form method ="post" action="">
                                <input type="hidden" name="service_id" value="<?php echo trim($_GET['service_id']);?>">
                            <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                                <div class="d-flex">
                                    <table class="table table-responsive">
                                        <tr>
    <th>First Name</th>
    <th>
        <div class="col-12">
            <input type="text" name="name" class="form-control text-center" minlength="2" maxlength="30" placeholder="Enter Here..." required>
        </div>
        <!-- <input type="hidden" name="panno" value="<?php echo $_POST['panno']; ?>"> -->
        <input type="hidden" name="service_id" value="<?php echo $_POST['service_id']; ?>">
        <!-- <input type="hidden" name="financial_year" value="<?php echo $_POST['financial_year']; ?>"> -->
    </th>
</tr>
<tr>
    <th>Last Name</th>
    <th>
        <div class="col-12">
            <input type="text" name="lname" class="form-control text-center" minlength="2" maxlength="30" placeholder="Enter Here..." required>
        </div>
    </th>
</tr>
<tr>
    <th>Father's Full Name</th>
    <th>
        <div class="col-12">
            <input type="text" name="father" class="form-control text-center" minlength="2" maxlength="30" placeholder="Enter Here..." required>
        </div>
    </th>
</tr>
<tr>
    <th>City</th>
    <th>
        <div class="col-12">
            <select name="city" class="form-select text-center" required>
                <option value="" disabled selected>Select Your City</option>
                <?php
                $cities = getCities();
                foreach ($cities as $city):
                ?>
                <option value="<?php echo $city; ?>"><?php echo $city; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </th>
</tr>
<tr>
    <th>Address</th>
    <th>
        <div class="col-12">
            <input type="text" name="address" class="form-control text-center" placeholder="Enter Here...">
        </div>
    </th>
</tr>
<tr>
    <th>Pin Code</th>
    <th>
        <div class="col-12">
            <input type="text" name="pin" class="form-control text-center" minlength="6" maxlength="6" placeholder="Enter Here...">
        </div>
    </th>
</tr>
<tr>
    <th>Adhar Number</th>
    <th>
        <div class="col-12">
            <input type="text" name="adhar" class="form-control text-center" minlength="12" maxlength="12" placeholder="Enter Here...">
        </div>
    </th>
</tr>
<tr>
    <th>Contact Number</th>
    <th>
        <div class="col-12">
            <input type="text" name="contact" class="form-control text-center" minlength="10" maxlength="10" placeholder="Enter Here..." required>
        </div>
    </th>
</tr>
<tr>
    <th>Email ID</th>
    <th>
        <div class="col-12">
            <input type="email" name="email" class="form-control text-center" placeholder="Enter Here..." required>
        </div>
    </th>
</tr>
<tr>
    <th>Gender</th>
    <th>
        <div class="col-12">
            Male <input type="radio" name="gender" value="1" required> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Female <input type="radio" name="gender" value="2" required> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Other <input type="radio" name="gender" value="3" required>
        </div>
    </th>
</tr>
                              <?php //++$i;} } ?>
                             </table>
                            </div>
                       <input type="submit" class="btn custom-btn mt-3 col-lg-12"name="personal_data_submit" value="Continue">
                    </div>                  
</form>
                    </div>
                </div>
            </section>
<!-- <?php }elseif(isset($_POST['service_question_attempt'])){ ?>


            <section class="section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center">
                            <h3 class="mb-4">Enter PAN Details</h3>
                        </div>

                        <div class="col-lg-8 col-12 mt-3 mx-auto">
                            <form method ="post" action="" onsubmit="return validateForm()">
                                <input type="hidden" name="service_id" value="<?php echo trim($_GET['service_id']);?>">
                            <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                                <div class="d-flex">
                                    <table class="table table-responsive">
                                         <?php 
  //                                        $q = mysqli_query($con, 'SELECT * FROM form_question');
  //                                        if($n=mysqli_num_rows($q)){$i=1;
  // while ($r = mysqli_fetch_assoc($q)){
  ?>
                                            <tr>
                                            <th>Financial year</th>
                                            <th>
                                            <select name="financial_year" class="form-select" required>
                                            <?php $start = 2022; $end1 = 3000; while($start < $end1) { ?>
                                                <option value="<?php echo $start.'-'; $end = $start+1; echo $end; ?>">
                                                <?php echo $start.'-'.$end; ?>
                                                </option>
                                                <?php $start++; } ?>
                                                </select>
                                                </th>
                                                </tr>
                                                <tr>
                                                <th>Pan Number</th>
                                                <th>
                                                <input type="text" name="panno" class="form-control" maxlength="10" required>
                                                </th>
                                                </tr>
                                                <tr>
                                                <th>Date Of Birth</th>
                                                <th>
                                                <input type="date" name="dob" class="form-control" required>
                                                </th>
                                                </tr>

                                    <?php //++$i;} } ?>
                                    </table>
                                </div>
                                <input type="submit" class="btn custom-btn mt-3 col-lg-12"name="service_submit" value="Continue">
                            </div>
</form>
                    </div>
                </div>
            </section>
 -->
<?php }else{?>

    <section class="section-padding">
    <div class="container" style="width: 100%;">
        <div class="row">
        <div class="col-lg-12 col-12 text-center">
    <h3 class="mb-4" style="font-family: Arial, sans-serif; font-size: 24px; font-weight: bold; color: #333333;">Apply for <?php echo $service_name; ?></h3>
</div>
            <div class="col-lg-6 col-12 mt-3 mx-auto">
                <form method="post" action="">
                    <input type="hidden" name="service_id" value="<?php echo trim($_GET['service_id']); ?>">
                    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                        <div class="d-flex">
                            <div class="questions" style="width: 100%;">
                                <h4 style="text-align: center; color: #0A6F7B; border-radius: 50%;" class="shadow">Questions</h4>
                                <?php
                                // Fetch and display questions
                                $q = mysqli_query($con, 'SELECT * FROM form_question WHERE service_id="'.trim($_GET['service_id']).'"');
                                if ($n = mysqli_num_rows($q)) {
                                    $i = 1;
                                    ?>
                                    <input type="hidden" name="num_q_name" value="<?php echo $n; ?>">
                                    <?php
                                    while ($r = mysqli_fetch_assoc($q)) {
                                        ?>
                                        <div>
                                            <p>Q<?php echo $i; ?>. <?php echo $r['question']; ?> ?</p>
                                            <p><input type="radio" value="1" name="question_name_squence<?php echo $i; ?>"> Yes <input type="radio" value="0" checked="checked" name="question_name_squence<?php echo $i; ?>"> No</p>
                                        </div>
                                        <?php ++$i; } } ?>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn custom-btn mt-3 col-lg-12" name="service_question_attempt" value="Continue">
                </div>
                <div class="col-lg-6 col-12 mt-3 mx-auto">
    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
        <h4 style="text-align: center; color:#C5254E; border-radius: 50%;" class="shadow">Description</h4>
        <?php
        $service_id = isset($_GET['service_id']) ? $_GET['service_id'] : null;
        if ($service_id) {
            $query = "SELECT name FROM service WHERE id = ?";
            $statement = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($statement, "i", $service_id);
            mysqli_stmt_execute($statement);
            mysqli_stmt_bind_result($statement, $service_name);
            mysqli_stmt_fetch($statement);
            mysqli_stmt_close($statement);
            
            if ($service_name !== null) {
                $serdes_query = "SELECT serdes FROM service WHERE name = ?";
                $serdes_statement = mysqli_prepare($con, $serdes_query);
                mysqli_stmt_bind_param($serdes_statement, "s", $service_name);
                mysqli_stmt_execute($serdes_statement);
                mysqli_stmt_bind_result($serdes_statement, $serdes);
                mysqli_stmt_fetch($serdes_statement);
                mysqli_stmt_close($serdes_statement);

                // Replace <p> and <p>&nbsp;</p> with <br>
                $serdes_content = str_replace(['<p>', '<p>&nbsp;</p>'], ['<br>', ''], $serdes);
                ?>
                <div class="table-responsive">
                    <table style="border-collapse: collapse; width: 100%;">
                        <tbody>
                            <?php echo $serdes_content; ?>
                        </tbody>
                        <style>
                            table td, table th {
                                border: 1px solid #000;
                                padding: 8px;
                            }
                        </style>
                    </table>
                </div>
                <?php
            } else {
                ?>
                <div>No service found for the provided service ID.</div>
                <?php
            }
        } else {
            ?>
            <div>Service ID is not provided.</div>
            <?php
        }
        ?>
    </div>
</div>

        </div>
        </form>
    </div>
</section>

<?php }?>
            <section class="section-padding section-bg">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <h3 class="mb-4">Trending Topics</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 mt-3 mb-4 mb-lg-0">
                            <div class="custom-block bg-white shadow-lg">
                                <a href="topics-detail.html">
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mb-2">Investment</h5>
                                            <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                        </div>
                                        <span class="badge bg-finance rounded-pill ms-auto">30</span>
                                    </div>
                                    <img src="images/undraw_Finance_re_gnv2.jpg" class="custom-block-image img-fluid" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 mt-lg-3">
                            <div class="custom-block custom-block-overlay">
                                <div class="d-flex flex-column h-100">
                                    <img src="images/businesswoman-using-tablet-analysis.jpg" class="custom-block-image img-fluid" alt="">
                                    <div class="custom-block-overlay-text d-flex">
                                        <div>
                                            <h5 class="text-white mb-2">Finance</h5>
                                            <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint animi necessitatibus aperiam repudiandae nam omnis</p>
                                            <a href="topics-detail.html" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                                        </div>
                                        <span class="badge bg-finance rounded-pill ms-auto">25</span>
                                    </div>
                                    <div class="social-share d-flex">
                                        <p class="text-white me-4">Share:</p>
                                        <ul class="social-icon">
                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-twitter"></a>
                                            </li>
                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-facebook"></a>
                                            </li>
                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-pinterest"></a>
                                            </li>
                                        </ul>
                                        <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
                                    </div>
                                    <div class="section-overlay"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
<script>
function validateForm() {
    var dobInput = document.getElementsByName('dob')[0];    
    if (dobInput) {
        var selectedDate = new Date(dobInput.value);
        var age = calculateAge(selectedDate);
        if (age < 17) {
            alert('You are not eligible to continue. Please come back when you are 17+ Years Old.'); 
            return false; }} return true; }
function calculateAge(birthDate) {
    var today = new Date();
    var birthDate = new Date(birthDate);
    var age = today.getFullYear() - birthDate.getFullYear();
    var monthDiff = today.getMonth() - birthDate.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
        age--; } return age; }
</script>
<?php include_once 'footer.php'; ?>

<!-- Fm@2023#06 -->