<?php
session_start();
include_once '../function/db_connect.php';

if(!isset($_SESSION['admin']))
{
	header("Location: ../admin_login_panel.php");
}
$res=mysqli_query($con, "SELECT * FROM alogin WHERE sno=".$_SESSION['admin']);
$userRow=mysqli_fetch_assoc($res);
//$rm=$userRow['mobile_no'];

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Comapny | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="../India-Map.jpg.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo"><b>Comapny</b>Jeevan</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
         
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <!--<a href="#" class="btn btn-default btn-flat">Profile</a>-->
                    </div>
                    <div class="pull-right">
                      <a href="../../userpanel/logout.php?logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
         <?php include_once 'nav.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
           
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Edit</li>
                </ol>
            </section>
            
          <?php 
 include "../function/db_connect.php";
 
 if(isset($_GET['eno'])){
  

  $reg_eno = $_GET['eno'];
 $get_user_details = "SELECT `eno`, `prev`,  `memcode`,`first_name`, `middle_name`, `last_name`, `father_name`, `present_address`, `present_city`, `present_district`, `present_state`, `present_pin_code`, `present_country`, `perm_address`, `perm_city`, `perm_district`, `perm_state`, `perm_pin_code`, `perm_country`, `sex`, `dob`, `martial_status`, `pan_number`, `mobile_no`, `tel_phone_no`, `qualificaton`, `other_qualification`, `Email`, `Password`, `pan_wallet`, `e_wallet`, `reward_wallet`, `state`, `zone`, `dist`, `tehsil`, `ecounter`, `ip` FROM ecounter WHERE 	eno = '$reg_eno'";

  $run_user_details = mysqli_query($con,$get_user_details);
 while($row_user_details = mysqli_fetch_array($run_user_details)){
 $first_name = $row_user_details ['first_name'];
 $middle_name = $row_user_details ['middle_name'];
 $last_name = $row_user_details ['last_name'];
 $father_name = $row_user_details ['father_name'];
 $present_address = $row_user_details ['present_address'];
 $present_city = $row_user_details ['present_city'];
 $present_district = $row_user_details ['present_district'];
 $present_state = $row_user_details ['present_state'];
 $present_pin_code = $row_user_details ['present_pin_code'];

 $present_country = $row_user_details ['present_country'];
 $perm_pin_code = $row_user_details ['perm_pin_code'];
 $perm_address = $row_user_details ['perm_address'];
 $perm_city = $row_user_details ['perm_city'];
 $perm_district = $row_user_details ['perm_district'];
 $perm_state = $row_user_details ['perm_state'];
  $perm_country = $row_user_details ['perm_country'];
 $sex = $row_user_details ['sex'];
 $dob = $row_user_details ['dob'];
 $martial_status = $row_user_details ['martial_status'];
 $pan_number = $row_user_details ['pan_number'];
 $mobile_no = $row_user_details ['mobile_no'];
 $tel_phone_no = $row_user_details ['tel_phone_no'];
 $qualification = $row_user_details ['qualificaton'];
 $other_qualification = $row_user_details ['other_qualification'];
 $Email = $row_user_details ['Email'];
 $Password = $row_user_details ['Password'];
 $roll = $row_user_details ['prev'];
 $dist = $row_user_details ['dist'];
 $zone = $row_user_details ['zone'];
 $tehsil = $row_user_details ['tehsil'];
 $counter = $row_user_details ['ecounter'];
 $id_eno = $row_user_details ['eno'];
  $ccode = $row_user_details ['memcode'];
  }
 //echo $eno_id;
}
 ?>
  <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
   <h2 align="center"><font color="#990000">Edit Member Info</font></h2>
   <hr/>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Counter Code<span style="color:red">-</span></label>
                       <font color="#990000"><strong><?php echo $ccode; ?></strong></font>
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Role For<span style="color:red">-</span></label>
                       <font color="#990000"><strong><?php echo $roll; ?></strong></font>
                    </div>
                </div>
               </div>
               <hr/>
 <form action="" method="post" enctype="multipart/form-data">
  <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
                <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Roll<span style="color:red">*</span></label>

 <select class="form-control"   name="rroll">
 <option><?php echo $roll ;?></option>
 <option>Zone</option>
 <option>Dist</option>
 <option>Block</option>
  <option>Counter</option>
 </select>
 </div>
 </div>
<input type="hidden" class="form-control"  name="rid" value="<?php echo $id_eno ;?>" />
   <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Name<span style="color:red">*</span></label>
  
<input type="text" class="form-control" name="rfname" value="<?php echo $first_name ;?>" /></td>

</div>
  </div><div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Middile Name<span style="color:red">*</span></label>
  <input type="text" class="form-control" name="rmname" value="<?php echo $middle_name; ?>"  />
  </div>
  </div>
  <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Last Name<span style="color:red">*</span></label><input type="text" class="form-control" name="rlname" value="<?php echo $last_name ;?>"  />
  </div>
  </div>
  <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Father Name<span style="color:red">*</span></label>
 <input type="text" class="form-control" name="fname" value="<?php echo $father_name ;?>" />
 </div>
 </div>
  <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Present Address<span style="color:red">*</span></label><textarea type="text" class="form-control" name="raddress" value="<?php echo $present_address ;?>"></textarea>
  </div>
  </div>
 <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Present city<span style="color:red">*</span></label><input type="text" class="form-control" name="rcity" value="<?php echo $present_city ;?>" />
</div>
</div>
  <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Present Dist.<span style="color:red">*</span></label><input type="text" class="form-control" name="rdist" value="<?php echo $present_district ;?>" />
  </div>
  </div>
  <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Present State<span style="color:red">*</span></label><input type="text" class="form-control" name="rm_state" value="<?php echo $present_state ;?>" />
  </div>
  </div>
 <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Present PinCode<span style="color:red">*</span></label><input type="text" class="form-control" name="rm_pin_code" value="<?php echo  $present_pin_code ;?>" />
    </div>
  </div> 
  <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Present Country<span style="color:red"></span></label><input type="text" class="form-control" name="rm_country" value="<?php echo $present_country ;?>" />
  </div>
  </div>
  <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Present Address<span style="color:red"></span></label><input type="text" class="form-control" name="rm_address" value="<?php echo $perm_address ;?>" />
  </div>
  </div>
  <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Permanent City<span style="color:red">*</span></label><input type="text" class="form-control" name="rm_city" value="<?php echo $perm_city ;?>"  />
  </div>
  </div>
 <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Permanent Dist.<span style="color:red">*</span></label><input type="text" class="form-control" name="rm_district" value="<?php echo $perm_district ;?>"  />
  </div>
  </div>
 <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Permanent State<span style="color:red">*</span></label><input type="text" class="form-control" name="rm_state" value="<?php echo $perm_state ;?>"  />
  </div>
  </div>
 <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Permanent PinCode<span style="color:red">*</span></label><input type="text" class="form-control" name="rm_pin_code" value="<?php echo $perm_pin_code ;?>"  />
  </div>
  </div>
 <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Permanent Country<span style="color:red">*</span></label><input type="text" class="form-control" name="rm_country" value="<?php echo $present_country ;?>" />
  </div></div>
 <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Gender<span style="color:red">*</span></label><input type="text" class="form-control" name="rm_sex"  value="<?php echo  $sex ;?>" />
  </div>
  </div>
<div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Date Of Birth<span style="color:red">*</span></label><input type="date" class="form-control" name="rm_dob" value="<?php echo $dob ;?>"  />
  </div>
  </div>
 <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Marital Status<span style="color:red">*</span></label><input type="text" class="form-control" name="rm_status" value="<?php echo $martial_status ;?>"  />
  </div>
  </div>
<div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Pan Card No.<span style="color:red">*</span></label><input type="text" class="form-control" name="rm_number" value="<?php echo $pan_number;?>"  />
  </div>
  </div>
<div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Mobile Number<span style="color:red">*</span></label><input type="text" class="form-control" name="rm_no" value="<?php echo $mobile_no ;?>" pattern="[789][0-9]{9}" />
  </div>
  </div>
 <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Telephone Number<span style="color:red">*</span></label><input type="text" class="form-control" name="rm_phone_no"  value="<?php echo $tel_phone_no ;?>" />
  </div>
  </div>
 <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Qualification<span style="color:red">*</span></label><input type="text" class="form-control" name="rm_qualification" value="<?php echo $qualification ;?>" />
  </div>
 </div><div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Other Qualification<span style="color:red">*</span></label><input type="text" class="form-control" name="rm_other_qualification" value="<?php echo $other_qualification ;?>" /></div>
  </div>
 <div class=col-sm-4>
                    <div class="form-group mb-10">
  <label>Email ID<span style="color:red">*</span></label><input type="email" class="form-control" name="rm_Email" value="<?php echo $Email ;?>" />
  </div>
  </div>
 </div>
<input type="submit" class="btn btn-block btn-primary" style=" margin-left: 555px; width: 100px;height: 50" name="rm_update" value="UPDATE NOW" />	
 </form>
 </div>
<p align="center"><a href="list_of_register.php" ><font color="#990033" size="+2"> BACK</font></a></p>	
</div>
<footer class="main-footer">

        <div class="pull-right hidden-xs">
         
        </div>
        <strong>Copyright &copy; 2018 <a href="ssinfotech.co.in">ssinfotech</a>.</strong> All rights reserved.
      </footer> 
<?Php
if(isset($_GET['eno'])){
  

  $reg_eno = $_GET['eno'];
 if(isset($_POST['rm_update'])){
   
  $first_name = $_POST['rfname'];
   $middle_name = $_POST['rmname'];
   $last_name = $_POST['rlname'];
   $father_name = $_POST['fname'];
   $present_address = $_POST['raddress'];
   $present_city = $_POST['rcity'];
   $present_district = $_POST['rdist'];
   $present_state = $_POST['rm_state'];
   $present_pin_code = $_POST['rm_pin_code'];
   $present_country = $_POST['rm_country'];
   $perm_address = $_POST['rm_address'];
   $perm_city = $_POST['rm_city'];
   $perm_district = $_POST['rm_district'];
   $perm_state = $_POST['rm_state'];
   $perm_pin_code = $_POST['rm_pin_code'];
   $perm_country = $_POST['rm_country'];
   $sex = $_POST['rm_sex'];
   $dob = $_POST['rm_dob'];
   $martial_status = $_POST['rm_status'];
   $pan_number = $_POST['rm_number'];
   $mobile_no = $_POST['rm_no'];
   $tel_phone_no = $_POST['rm_phone_no'];
   $qualification = $_POST['rm_qualification'];
   $other_qualification = $_POST['rm_other_qualification'];
   $Email = $_POST['rm_Email'];
   //$Password = $_POST['Password'];
   $roll = $_POST['rroll'];
  
  $sql = "UPDATE ecounter SET prev='$roll',first_name='$first_name',middle_name='$middle_name',last_name='$last_name',father_name='$father_name',present_address='$present_address',present_city='$present_city',present_district='$present_district',present_state='$present_state',present_pin_code='$present_pin_code',present_country='$present_country',perm_address='$perm_address',perm_city='$perm_city',perm_district='$perm_district',perm_state='$perm_state',perm_pin_code='$perm_pin_code',perm_country='$perm_country',sex='$sex',dob='$dob',martial_status='$martial_status',pan_number='$pan_number',mobile_no='$mobile_no',tel_phone_no='$tel_phone_no',qualificaton='$qualification',other_qualification='$other_qualification',Email='$Email' WHERE eno = '$reg_eno'";
   
   if (mysqli_query($con, $sql)) {
    echo "<script>alert('Member Account Update  Successfully, Thank You!')</script><meta http-equiv='refresh' content='0'></meta>";
		
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
}
}
?>
    <!-- ./wrapper -->
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