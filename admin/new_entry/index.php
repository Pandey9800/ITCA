<?php
 session_start();
 include("../function/db_connect.php"); 
 include_once 'header.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Add New User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New User</li>
      </ol>
    </section>
    <section class="content">
            <a href="./"><< Back</a>
            <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title" style="color:#000;">Add New User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="#" method="post" enctype="multipart/form-data">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
            
                <div class=col-sm-6>
                    <div class="form-group mb-10">
                        <label> Name<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="first_name" required placeholder="Enter Here" />
                    </div>
                </div>
                <div class=col-sm-6>
                    <div class="form-group mb-10">
                        <label>Gender :<span style="color:red"></span></label>
                        <select class="form-control" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Contact :<span style="color:red"></span></label>
                        <input type="text" pattern="[0-9]+" class="form-control" name="contact" placeholder="Enter Here" />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Whats Number :<span style="color:red"></span></label>
                        <input type="text" pattern="[0-9]+" class="form-control" name="wacontact" placeholder="Enter Here" />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Email Id:<span style="color:red"></span></label>
                        <input type="email" class="form-control" name="emailid" placeholder="Enter Here" />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>State Name :<span style="color:red"></span></label>
                        <select class="form-control" name="district">
<option value="Chhattisgarh">Chhattisgarh</option>
                        </select>
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>District Name :<span style="color:red"></span></label>
                        <select class="form-control" name="district">
<option value="Balod">Balod</option>
<option value="Baloda Bazar">Baloda Bazar</option>
<option value="Balrampur">Balrampur</option>
<option value="Bastar">Bastar</option>
<option value="Bemetara">Bemetara</option>
<option value="Bijapur">Bijapur</option>
<option value="Bilaspur">Bilaspur</option>
<option value="Dantewada">Dantewada</option>
<option value="Dhamtari">Dhamtari</option>
<option value="Durg">Durg</option>
<option value="Gariaband">Gariaband</option>
<option value="Janjgir Champa">anjgir Champa</option>
<option value="Jashpur">Jashpur</option>
<option value="Kabirdham">Kabirdham</option>
<option value="Kanker">Kanker</option>
<option value="Kondagaon">Kondagaon</option>
<option value="Korba">Korba</option>
<option value="Koriya">Koriya</option>
<option value="Mahasamund">Mahasamund</option>
<option value="Mungeli">Mungeli</option>
<option value="Narayanpur">Narayanpur</option>
<option value="Raigarh">Raigarh</option>
<option value="Raipur">Raipur</option>
<option value="Rajnandgaon">Rajnandgaon</option>
<option value="Sukma">Sukma</option>
<option value="Surajpur">Surajpur</option>
<option value="Surguja">Surguja</option>
                        </select>
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Address :<span style="color:red"></span></label>
        <textarea type="text" class="form-control" name="present_address" placeholder="Enter Here"></textarea>
                    </div>
                </div>
                <div class=col-sm-2></div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Username <b style="color:red;">*</b></label>
                        <input type="text" class="form-control" name="present_district" required />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Password <b style="color:red;">*</b></label>
                        <input type="text" class="form-control" name="present_state" required />
                    </div>
                </div>
                 <div class=col-sm-2></div>
                <div class=col-sm-8></div><div class=col-sm-4>
                    <div class="form-group mb-10" style="background-color:yellow;">
                        <label> Refered By:<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="present_pin_code" placeholder="Enter Here" />
                    </div>
                </div>
                <div class=col-sm-6></div>
              
                     </div>
                   
            <div align="center"><input type="submit" class="btn btn-block btn-primary btn-lg" name="register" style="width:30%;" value="Register Now" /></div>
            
        </div>
        </form>
        
        <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add State</h4>
        </div>
        <div class="modal-body">
          <form action="ajaxforstate.php" method="post">
          <input type="text" placeholder="Enter State Name" class="form-control" name="ss" />
          <input type="submit" style="width:25%;" name="ins" class="btn btn-primary" />
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

        <!-- /.content-wrapper -->
        
   
    
    <?Php

    if(isset($_POST['register'])){
 
 //whether the email is blank

 
   $first_name = $_POST['first_name'];
   $middle_name = $_POST['middle_name'];
   $last_name = $_POST['last_name'];
   $father_name = $_POST['father_name'];
   $present_address = $_POST['present_address'];
   $present_city = $_POST['present_city'];
   $present_district = $_POST['present_district'];
   $present_state = $_POST['present_state'];
   $present_pin_code = $_POST['present_pin_code'];
   $present_country = $_POST['present_country'];
   $perm_address = $_POST['perm_address'];
   $perm_city = $_POST['perm_city'];
   $perm_district = $_POST['perm_district'];
   $perm_state = $_POST['perm_state'];
   $perm_pin_code = $_POST['perm_pin_code'];
   $perm_country = $_POST['perm_country'];
   $sex = $_POST['sex'];
   $dob = $_POST['dob'];
   $martial_status = $_POST['martial_status'];
   $pan_number = $_POST['pan_number'];
   $mobile_no = $_POST['mobile_no'];
   $tel_phone_no = $_POST['tel_phone_no'];
   $qualification = $_POST['qualification'];
   $other_qualification = $_POST['other_qualification'];
  
   $Password = $_POST['Password'];
    $Email = $_POST['email'];
  $roll = $_POST['rollname'];
  $state=$_POST['state'];
   $farm = $_POST['farm'];
   $fcode = 'TS'.rand(10000,99999);
   //$tehsil = $_POST['tehsil'];
   //$counter = $_POST['counter'];
   //$search_keywords = $_POST['search_keywords'];
   //$reffer_id = $_POST['reffer_id'];
   
   $pass=md5($Password);
    
   //$c_image = $_FILES['c_image']['name'];
//   $c_image_tmp = $_FILES['c_image']['tmp_name'];
//   
//   $c_ip = '1';
//   
   $sql = "INSERT INTO `ecounter`(`prev`,memcode, `first_name`, `middle_name`, `last_name`, `father_name`, `present_address`, `present_city`, `present_district`, `present_state`, `present_pin_code`, `present_country`, `perm_address`, `perm_city`, `perm_district`, `perm_state`, `perm_pin_code`, `perm_country`, `sex`, `dob`, `martial_status`, `pan_number`, `mobile_no`, `tel_phone_no`, `qualificaton`, `other_qualification`, `Email`, `Password`,`pan_wallet`, `e_wallet`, `reward_wallet`,`state`,fname,ip)VALUES('$roll','$fcode','$first_name','$middle_name','$last_name','$father_name','$present_address','$present_city','$present_district','$present_state','$present_pin_code','$present_country','$perm_address','$perm_city','$perm_district','$perm_state','$perm_pin_code','$perm_country','$sex','$dob','$martial_status','$pan_number','$mobile_no','$tel_phone_no','$qualification','$other_qualification','$Email','$pass',0,0,0,'$state','$farm','".$_SERVER['REMOTE_ADDR']."')";
   if (mysqli_query($con, $sql)) {
    echo "<script>alert('STATE Account Created Successfully, Thank You!')</script>";
        echo "<script>window.open('create_newuser.php?name=STATE','_self')</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}       

// Build the email (replace the address in the $to section with your own)
 $first_name = $_POST['first_name'];
   $middle_name = $_POST['middle_name'];

    $email_from = '1meatwork@gmail.com';
 
    $email_subject = "New Camp Registration for $first_name $last_name";
 
    $email_body = "You have received a new camp registration from the user $first_name.\
".
                            "\
 First Name: $first_name \
 Last Name: $last_name \
".

// Send the mail using PHPs mail() function

 
  $to = "rvdubey75@gmail.com";
 
  $headers = "From: $email_from \\r\
";
 
  $headers .= "Reply-To: $Email \\r\
";
 
  mail($to,$email_subject,$email_body,$headers);
 


function IsInjected($str)
{
    $injections = array('(\
+)',
           '(\\r+)',
           '(\  +)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
                
    $inject = join('|', $injections);
    $inject = "/$inject/i";
     
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}
 
if(IsInjected($Email))
{
    echo "Bad email value!";
    exit;
}

} 
?>
<?php include_once '../footer.php'; ?>