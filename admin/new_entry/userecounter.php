<?php
 session_start();
 include("../function/db_connect.php"); 
 include_once 'header.php'; ?>
         
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1></h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active"><?php echo $_GET['name']; ?></li>
                </ol>
            </section><a href="./"><< Back</a>
            <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"> Create New User For - <font color="#0099FF"><?php echo $_GET['name']; ?></font></h3>

              <div class="box-tools pull-right">
                <a type="button" href="../register_member/list_of_register.php" class="btn btn-box-tool">View List</a>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="" method="post" enctype="multipart/form-data">
            <div align="center"><label><font color="#000099">Select Work Area for <?php echo $_GET['name']; ?></font></label></div>
                      <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
                      
                 <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label> Select State :<span style="color:red"></span></label>
                        <select name="state" class="form-control">
                        <option value="">Select State</option>
                     
                        <?php
       $queryusers = "SELECT `id`, `state`, `dist`, `tehsil` FROM `level`  WHERE state IS NOT NULL GROUP BY state;";
       $db = mysqli_query($con,$queryusers);
       while ( $d=mysqli_fetch_assoc($db)) {
	   $rid=$d['id'];
	   $rstate=$d["state"];?>
      <option value="<?php echo $rid; ?>"><?php echo $rstate;?></option>
    
	<?php
	} ?> </select>
					  </div>
                    </div>
                      <?php /*?><div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label> Select Zone :<span style="color:red"></span></label>
                        <select name="zone" class="form-control">
                        <option value="">Select Zone</option>
                     
                        <?php
       $queryusers = "SELECT `eno`,`zone` FROM `ecounter` WHERE `zone` IS NOT NULL GROUP BY `zone`";
       $db = mysqli_query($con,$queryusers);
       while ( $d=mysqli_fetch_assoc($db)) {
	   $rid=$d['zone'];
	   $rstate=$d["zone"];?>
      <option value="<?php echo $rid; ?>"><?php echo $rstate;?></option>
	<?php
	} ?> </select>
					  </div>
                    </div><?php */?>
			   <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label> Select District :<span style="color:red"></span></label>
                        <select name="dist" class="form-control">
                        <option value="">Select District</option>
                     
                        <?php
       $queryusers = "SELECT `id`, `state`, `dist`, `tehsil` FROM `level`  WHERE dist IS NOT NULL GROUP BY dist;";
       $db = mysqli_query($con,$queryusers);
       while ( $d=mysqli_fetch_assoc($db)) {
	   $rid=$d['id'];
	   $rstate=$d["dist"];?>
      <option value="<?php echo $rid; ?>"><?php echo $rstate;?></option>
    
	<?php
	} ?> </select>
					  </div>
                    </div>
                      <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label> Select Tehsil :<span style="color:red"></span></label>
                        <select name="tehsil" class="form-control" required>
                        <option value="">Select Tehsil</option>
                     
                        <?php
       $queryusers = "SELECT `id`, `state`, `dist`, `tehsil` FROM `level`  WHERE tehsil IS NOT NULL GROUP BY  tehsil;";
       $db = mysqli_query($con,$queryusers);
       while ( $d=mysqli_fetch_assoc($db)) {
	   $rid=$d['id'];
	   $rstate=$d["tehsil"];?>
      <option value="<?php echo $rid; ?>"><?php echo $rstate;?></option>
    
	<?php
	} ?> </select>
					  </div>
                    </div>
                  <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Write Counter Name(Farm Name):<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="ecountername" required/>
                      </div>
                    </div>
             </div>
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
            
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>First Name<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="first_name" required />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Middle Name<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="middle_name" />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class=form-group>
                        <label>Last Name<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="last_name" />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Father Name :<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="father_name"  />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>present Address :<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="present_address" />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>present city :<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="present_city" />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>present distict :<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="present_district" required />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>present state</label>
                        <input type="text" class="form-control" name="present_state" required />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>present pincode :<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="present_pin_code" required />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>present country :<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="present_country" required />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Permanent Address:<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="perm_address" />
                    </div>
                </div>
                 <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Permanent city:<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="perm_city"  />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Permanent District:<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="perm_district"  />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Permanent State:<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="perm_state"  />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Permanent Pincode:<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="perm_pin_code"  />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Permanent country:<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="perm_country"  />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Gender:<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="sex"  />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Date of Birth:<span style="color:red"></span></label>
                        <input type="date" class="form-control" name="dob" required/>
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>martial Status:<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="martial_status"  />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Pan No.:<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="pan_number"  />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Mobile No.:<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="mobile_no" pattern="[789][0-9]{9}" />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>TelPhone No.:<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="tel_phone_no"  />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Qualification:<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="qualification" />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Other Qualification:<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="other_qualification"  />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Email:<span style="color:red">*</span></label>
                        <input type="email" class="form-control" name="email" required />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Give Password:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="Password" required />
                      </div>
                    </div>
                    </div>
                   
            <button class="btn btn-block btn-primary" name="register" style=" margin-left: 555px; width: 100px;height: 50">Register Now</button>
        </div>
        </form>
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
   $roll = $_GET['name'];
   $state = $_POST['state'];
  // $zone = $_POST['zone'];
   $dist = $_POST['dist'];
   $tehsil = $_POST['tehsil'];
   $counter = $_POST['ecountername'];
   
   $pass=md5($Password);
   $farm = $_POST['farm'];
   $fcode = 'TS'.rand(10000,99999);
   //$c_image = $_FILES['c_image']['name'];
//   $c_image_tmp = $_FILES['c_image']['tmp_name'];
//   
//   $c_ip = '1';
//   
   $sql = "INSERT INTO `ecounter`(`prev`,`memcode`, `first_name`, `middle_name`, `last_name`, `father_name`, `present_address`, `present_city`, `present_district`, `present_state`, `present_pin_code`, `present_country`, `perm_address`, `perm_city`, `perm_district`, `perm_state`, `perm_pin_code`, `perm_country`, `sex`, `dob`, `martial_status`, `pan_number`, `mobile_no`, `tel_phone_no`, `qualificaton`, `other_qualification`, `Email`, `Password`, `pan_wallet`, `e_wallet`, `reward_wallet`,`state`, `dist`, `tehsil`,	ecounter,`fname`,ip)VALUES('$roll','$fcode','$first_name','$middle_name','$last_name','$father_name','$present_address','$present_city','$present_district','$present_state','$present_pin_code','$present_country','$perm_address','$perm_city','$perm_district','$perm_state','$perm_pin_code','$perm_country','$sex','$dob','$martial_status','$pan_number','$mobile_no','$tel_phone_no','$qualification','$other_qualification','$Email','$pass',0,0,0,'$state','$dist','$tehsil','$counter','$farm','".$_SERVER['REMOTE_ADDR']."')";
   if (mysqli_query($con, $sql)) {
    echo "<script>alert('Counter Account Created Successfully, Thank You!')</script>";
		echo "<script>window.open('userecounter.php?name=E-Counter','_self')</script>";
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
           '(\	+)',
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
 <footer class="main-footer">
        <div class="pull-right hidden-xs">
         
        </div>
        <strong>Copyright &copy; 2018 <a href="#">ssinfotech</a>.</strong> All rights reserved.
      </footer>    <!-- ./wrapper -->
    <!-- jQuery 2.1.3 -->
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="../plugins/chartjs/Chart.min.js" type="text/javascript"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard2.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js" type="text/javascript"></script>
</body>

</html>