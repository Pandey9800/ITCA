<?php include 'sidebar.php'; 
if(isset($_POST['register'])){
$namea=validate($_POST['name']);
$bussinessnamea=validate($_POST['bussinessname']);
$gendera=validate($_POST['gender']);
$contacta=validate($_POST['contact']);
$wacontacta=validate($_POST['wacontact']);
$emailida=validate($_POST['emailid']);
$statea=validate($_POST['state']);
$districta=validate($_POST['district']);
$citya=validate($_POST['city']);
$addressa=validate($_POST['address']);
$usernamea=validate($_POST['username']);
$passworda=validate($_POST['password']);
$referedbya=validate($_POST['referedbya']);
$memcode=rand(1111,9999);
$employeetypea=validate($_POST['employeetype']);
$incentivetypea=validate($_POST['incentivetype']);
$incentivea=validate($_POST['incentive']);
$sql =mysqli_query($con,"INSERT INTO `ecounter`(`username`,`memcode`,`employeetype`, `incentivetype`, `incentive`, `first_name`,`present_address`, `present_city`, `present_district`, `present_state`,`present_country`,`mobile_no`, `tel_phone_no`,`Email`, `Password`,`ecounter`,`ip`) VALUES ('$usernamea','$memcode','$employeetypea','$incentivetypea','$incentivea','$namea','$addressa','$citya','$districta','$statea','india','$contacta','$wacontacta','$emailida','$passworda','$bussinessnamea','".$_SERVER['REMOTE_ADDR']."')");
if($sql>0){
    echo "<script>window.open('create-new-user?success','_self')</script>";
} else {
    echo "<script>alert('Server Busy');window.open('create-new-user?failed')</script>";
}       

 $first_name = $_POST['name'];
    $email_from = '1meatwork@gmail.com';
    $email_subject = "New Camp Registration for $first_name";
 
    $email_body = "You have received a new camp registration from the user $first_name.\
"."\
 Name: $first_name \
".
// Send the mail using PHPs mail() function
  $to = "rvdubey75@gmail.com";
 
  $headers = "From: $email_from \\r\
";
 
  $headers .= "Reply-To: $Email \\r\
";
 
  mail($to,$email_subject,$email_body,$headers);
function IsInjected($str){
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
            <a href="create-new-user"><< Back</a>
            <?php if(isset($_GET['add'])){ ?>
            <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title" style="color:#000;">Add New User</h3>
            </div>
            <div class="box-body">
            <form action="#" method="post" enctype="multipart/form-data">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
            <div class=col-sm-5>
                    <div class="form-group mb-10">
                        <label> Name<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="name" required placeholder="Enter Here" />
                    </div>
                </div>
                <div class=col-sm-5>
                    <div class="form-group mb-10">
                        <label> Bussiness Name </label>
                        <input type="text" class="form-control" name="bussinessname" placeholder="Enter Here" />
                    </div>
                </div>
                <div class=col-sm-2>
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
                        <label>Contact :<span style="color:red">*</span></label>
                        <input type="text" pattern="[0-9]+" class="form-control" name="contact" placeholder="Enter Here" required="required" />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>WhatsApp Number :<span style="color:red"></span></label>
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
                        <select class="form-control" name="state">
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
                        <label>City :<span style="color:red">*</span></label>
        <input type="text" class="form-control" name="city" required />
                    </div>
                </div>
                                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Employment Type<span style="color:red">*</span></label>
       <select class="form-control select2" name="employeetype">
        <option value="employee">Employee</option>
<option value="freelance">Freelance</option>
                        </select>
                    </div>
                </div>
               <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Types of Incentive<span style="color:red">*</span></label>
         <select class="form-control select2" name="incentivetype">
        <option value="percentage">Percentage</option>
<option value="fixed">Fixed</option>
                        </select>
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Incentive Value<span style="color:red">*</span></label>
                <input type="text" class="form-control" pattern="[0-9]+" name="incentive" required />
                    </div>
                </div>
                 <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Address :<span style="color:red"></span></label>
        <textarea type="text" class="form-control" name="address" placeholder="Enter Here"></textarea>
                    </div>
                </div>
               <div class=col-sm-12></div><div class=col-sm-2></div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Username <b style="color:red;">*</b></label>
                        <input type="text" class="form-control" value="<?php echo rand(111111,999999); ?>" name="username" required />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Password <b style="color:red;">*</b></label>
                        <input type="text" class="form-control" value="<?php echo rand(111111,999999); ?>" name="password" required />
                    </div>
                </div>
                 <div class=col-sm-2></div><div class=col-sm-4>
                    <div class="form-group mb-10" style="background-color:yellow;">
                        <label> Refered By:<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="referedby" placeholder="Enter Here" />
                    </div>
                </div>
                <div class=col-sm-8></div>
                <div class=col-sm-6></div>
              
                     </div>
                   
            <div align="center"><input type="submit" class="btn btn-block btn-primary btn-lg" name="register" style="width:30%;" value="Register Now" /></div>
            
        </div>
        </form>
      </div></div>
      <?php }else{ ?>
              <div class="table-responsive">
               <div align="right"><a href="create-new-user?add" type="button" class="btn btn-warning" style="border-radius:20%;color:#fff;">+ Add New</a></div>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Sales Executive</a></li>
              <li><a href="#tab_2" data-toggle="tab">Work Executive</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                  <table class="table table-striped" class="example1">
                <thead>
                  <tr><th>Sno.</th><th>Name</th>
                    <th>Login Details</th>
                    <th>Contact Details</th>
                    <th>City</th><th>Add On</th></tr>
                </thead>
                <tbody>
                  <tr>
                 <?php $i=1;
          $ress=mysqli_query($con,"SELECT `eno`, `username`, `memcode`, `first_name`, `present_address`, `present_city`, `present_district`, `present_state`, `present_pin_code`, `present_country`, `sex`, `dob`, `pan_number`, `mobile_no`, `tel_phone_no`, `qualificaton`, `other_qualification`, `Email`, `Password`, `pan_wallet`, `e_wallet`, `reward_wallet`, `ecounter`, `timedate`, `ip` FROM `ecounter` WHERE `employeetype`='freelance' ORDER BY `timedate` DESC");
           while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $i; ?>.</td><td><?php echo $rows['first_name']; ?></td><td><?php echo $rows['username'].'<br/>'.$rows['Password']; ?></td><td><?php echo $rows['mobile_no'].'<br/>'.$rows['tel_phone_no'].'<br/>'.$rows['Email']; ?></td><td><?php echo $rows['present_city']; ?></td><td><?php echo showdate($rows['timedate']); ?></td>
                  </tr>
                  <?php  $i++;}   ?>
                 
                </tbody>
              </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
               <table class="table table-striped" class="example1">
                <thead>
                  <tr><th>Sno.</th><th>Name</th>
                    <th>Login Details</th>
                    <th>Contact Details</th>
                    <th>City</th><th>Add On</th></tr>
                </thead>
                <tbody>
                  <tr>
                 <?php $i=1;
          $ress=mysqli_query($con,"SELECT `eno`, `username`, `memcode`, `first_name`, `present_address`, `present_city`, `present_district`, `present_state`, `present_pin_code`, `present_country`, `sex`, `dob`, `pan_number`, `mobile_no`, `tel_phone_no`, `qualificaton`, `other_qualification`, `Email`, `Password`, `pan_wallet`, `e_wallet`, `reward_wallet`, `ecounter`, `timedate`, `ip` FROM `ecounter` WHERE `employeetype`='employee' ORDER BY `timedate` DESC");
           while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $i; ?>.</td><td><?php echo $rows['first_name']; ?></td><td><?php echo $rows['username'].'<br/>'.$rows['Password']; ?></td><td><?php echo $rows['mobile_no'].'<br/>'.$rows['tel_phone_no'].'<br/>'.$rows['Email']; ?></td><td><?php echo $rows['present_city']; ?></td><td><?php echo showdate($rows['timedate']); ?></td>
                  </tr>
                  <?php  $i++;}   ?>
                 
                </tbody>
              </table>
              </div>

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        
      <?php }?>
</div></section></div>
<?php include_once 'footer.php'; ?>