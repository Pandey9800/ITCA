<?php
 session_start();
 include("../../function/db_connect.php"); 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Registration Page</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../../plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href=""><b>Create New User</b></a>
      </div>
<form action="register.php" method="post" enctype="multipart/form-data">
 <table width="750" align="center">
 <tr align="center">
 <!--<td><h2>Crate an new user</h2></td>-->
 </tr>
 <tr>
 <td align="right"><b>first Name:</b></td>
 <td><input type="text" class="form-control" name="first_name" required /></td>


 <td align="right"><b>middle Name:</b></td>
 <td><input type="text" class="form-control"name="middle_name"  /></td>

 <td align="right"><b>last Name:</b></td>
 <td><input type="text" class="form-control" name="last_name"  /></td>
 </tr>
 <tr>
 <td align="right"><b>fathers Name:</b></td>
 <td><input type="text" class="form-control" name="father_name" required /></td>
 
 <td align="right"><b>present Address:</b></td>
 <td><textarea type="text" class="form-control" name="present_address"  ></textarea></td>
 
 <td align="right"><b>present city:</b></td>
 <td><input type="text" class="form-control" name="present_city"  /></td>
</tr>
 <tr>
 <td align="right"><b>present distict:</b></td>
 <td><input type="text" class="form-control" name="present_district" required /></td>
 
 <td align="right"><b>present state:</b></td>
 <td><input type="text" class="form-control" name="present_state" required /></td>
 
 <td align="right"><b>present pincode:</b></td>
 <td><input type="text" class="form-control" name="present_pin_code" required /></td>
 </tr>
 <tr>
 <td align="right"><b>present country:</b></td>
 <td><input type="text" class="form-control" name="present_country" required /></td>
 
 <td align="right"><b>Parment Address:</b></td>
 <td><input type="text" class="form-control" name="perm_address"  /></td>

 <td align="right"><b>Parment city:</b></td>
 <td><input type="text" class="form-control" name="perm_city"  /></td>
  </tr>
 <tr>
 <td align="right"><b>Parment District:</b></td>
 <td><input type="text" class="form-control" name="perm_district"  /></td>
 
 <td align="right"><b>Parment State:</b></td>
 <td><input type="text" class="form-control" name="perm_state"  /></td>

 <td align="right"><b>Parment Pincode:</b></td>
 <td><input type="text" class="form-control" name="perm_pin_code"  /></td>
  </tr>
 <tr>
 <td align="right"><b>Parment country:</b></td>
 <td><input type="text" class="form-control" name="perm_country"  /></td>
 
 <td align="right"><b>Sex:</b></td>
 <td><input type="text" class="form-control" name="sex"  /></td>
 
 <td align="right"><b>Date of Birth:</b></td>
 <td><input type="date" class="form-control" name="dob"  /></td>
 </tr>
 <tr>
 <td align="right"><b>martial Status:</b></td>
 <td><input type="text" class="form-control" name="martial_status"  /></td>
 
 <td align="right"><b>Pan No.:</b></td>
 <td><input type="text" class="form-control" name="pan_number"  /></td>
 
 <td align="right"><b>Mobile No.:</b></td>
 <td><input type="text" class="form-control" name="mobile_no" pattern="[789][0-9]{9}" /></td>
</tr>
 <tr>
 <td align="right"><b>TelPhone No.:</b></td>
 <td><input type="text" class="form-control" name="tel_phone_no"  /></td>

 <td align="right"><b>Qualification:</b></td>
 <td><input type="text" class="form-control" name="qualification" required /></td>
 
 <td align="right"><b>Other Qualification:</b></td>
 <td><input type="text" class="form-control" name="other_qualification" required /></td>
 </tr>
 <tr>
 <td align="right"><b>Email:</b></td>
 <td><input type="email" class="form-control" name="Email" required /></td>
 
 <td align="right"><b>Give Password:</b></td>
 <td><input type="text" class="form-control" name="Password" required /></td>
 </tr>
 <tr>
 <td>
 <select class="form-control" name="roll">
 <option>Roll</option>
 <option>Zone</option>
 <option>Dist</option>
 <option>Block</option>
  <option>Counter</option>
 </select></td>
 <td align="right"><b>ZONE:</b></td>
 <td><input type="text" class="form-control" name="zone" required /></td>
 <td align="right"><b>DIST:</b></td>
 <td><input type="text" class="form-control" name="dist" required /></td>
 <td align="right"><b>TEHSIL:</b></td>
 <td><input type="text" class="form-control" name="tehsil" required /></td>
 <td align="right"><b>Counter:</b></td>
 </tr>
 <tr>
 <td align="right"><b>Counter:</b></td>
 <td><input type="text" class="form-control" name="counter" required /></td>
 <td align="right"><b>Keyword:</b></td>
 <td><input type="text" class="form-control" name="search_keywords" required /></td>
 </tr>
 <!--<td align="right"><b>Roll:</b></td>
 <td><input type="text" name="roll" required /></td>-->
 </tr>
 <!--<tr>
 <td align="right"><b>Customer Email:</b></td>
 <td><input type="text" name="c_email" required /></td>
 </tr>
 <tr>
 <td align="right"><b>Customer Password:</b></td>
 <td><input type="text" name="c_pass" required /></td>
 </tr>
 <tr>
 <td align="right"><b>Customer Country:</b></td>
 <td>
 <select name="c_country">
 <option>Select Country</option>
 <option>India</option>
 <option>USA</option>
 <option>Afaganistan</option>
 <option>Japan</option>
 </select></td>
 </tr>
 <tr>
 <td align="right"><b>Customer City:</b></td>
 <td><input type="text" name="c_city" required /></td>
 </tr>
 <tr>
 <td align="right"><b>Customer Contact:</b></td>
 <td><input type="text" name="c_contact" required /></td>
 </tr>
 <tr>
 <td align="right"><b>Customer Address:</b></td>
 <td><input type="text" name="c_address" required /></td>
 </tr>
 <tr>
 <td align="right"><b>Customer Image:</b></td>
 <td><input type="file" name="c_image"/></td>
 </tr>-->
 <tr align="center"><td colspan="8"><input type="submit" name="register" value="Submit" />	</td></tr>
 </form>
</table>
 

<?Php

 if(isset($_POST['register'])){
 
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
   $Email = $_POST['Email'];
   $Password = $_POST['Password'];
   $roll = $_POST['roll'];
   $zone = $_POST['zone'];
   $dist = $_POST['dist'];
   $tehsil = $_POST['tehsil'];
   $counter = $_POST['counter'];
   $search_keywords = $_POST['search_keywords'];	
   //$c_image = $_FILES['c_image']['name'];
//   $c_image_tmp = $_FILES['c_image']['tmp_name'];
//   
//   $c_ip = '1';
//   
   $sql = "INSERT INTO ecounter(first_name, middle_name, last_name, father_name, present_address, present_city, present_district, present_state, present_pin_code, present_country,perm_address, perm_city, perm_district, perm_state, perm_pin_code, perm_country, sex, dob, martial_status, pan_number, mobile_no, tel_phone_no, qualification, other_qualification,Email, Password, roll,zone,dist,tehsil,counter,search_keywords) VALUES('$first_name','$middle_name','$last_name','$father_name','$present_address','$present_city','$present_district'
   ,'$present_state','$present_pin_code','$present_country','$perm_address','$perm_city','$perm_district','$perm_state','$perm_pin_code','$perm_country','$sex','$dob','$martial_status','$pan_number','$mobile_no','$tel_phone_no','$qualification','$other_qualification','$Email','$Password','$roll','$zone','$dist','$tehsil','$counter','$search_keywords')";
   if (mysqli_query($con, $sql)) {
    echo "<script>alert('Account Created Successfully, Thank You!')</script>";
		echo "<script>window.open('register.php','_self')</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
   //$run_sql = mysqli_query($con,$insert_user);
   //move_uploaded_file($c_image_tmp,"customer/customer_photos/$c_image");
  
   
   //$get_ip = getIp();
        //$sel_cart = "select * from cart where ip_add ='$c_ip'";
//        $run_cart = mysqli_query($con,$sel_cart);
//        $check_cart = mysqli_num_rows($run_cart);
//		
//		if($check_cart==1){
//		
//		$_SESSION['customer_email']=$c_email;
		
		
}

?>
<script src="../../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>