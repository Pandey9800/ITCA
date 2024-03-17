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
    <link href="India-Map.jpg.css" rel="stylesheet" type="text/css">
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
        <a href="" class="logo"><b>Comapny</b></a>
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
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
           
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Member Details</li>
                </ol>
            </section>
            <?php 
 include "../function/db_connect.php";
 if(isset($_GET['eno'])){
  

  $reg_eno = $_GET['eno'];
 $get_user_details = "SELECT `eno`, `prev`, `memcode`, `first_name`, `middle_name`, `last_name`, `father_name`, `present_address`, `present_city`, `present_district`, `present_state`, `present_pin_code`, `present_country`, `perm_address`, `perm_city`, `perm_district`, `perm_state`, `perm_pin_code`, `perm_country`, `sex`, `dob`, `martial_status`, `pan_number`, `mobile_no`, `tel_phone_no`, `qualificaton`, `other_qualification`, `Email`, `Password`, `pan_wallet`, `e_wallet`, `reward_wallet`, `state`, `zone`, `dist`, `tehsil`, `ecounter`, `fname`, `ip` FROM `ecounter` WHERE 	eno = '$reg_eno' AND `memcode` IS NOT NULL";

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
 $ccode = $row_user_details ['memcode'];
 }
 //echo $eno_id;
}
 ?>
   <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
   <h2 align="center"><font color="#990000">Over View Of Member</font></h2>
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
                        <label>First Name<span style="color:red">*</span></label>
                        <input type="text" class="form-control" value="<?php echo $first_name; ?>" readonly />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Middle Name<span style="color:red">*</span></label>
                        <input type="text" class="form-control"  value="<?php echo $middle_name; ?>" readonly/>
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class=form-group>
                        <label>Last Name<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="last_name"value="<?php echo $last_name; ?>" readonly />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Father Name :<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="father_name" value="<?php echo $father_name; ?>" readonly />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>present Address :<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="present_address" value="<?php echo $present_address; ?>" readonly/>
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>present city :<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="present_city" value="<?php echo $present_city; ?>"  readonly/>
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>present distict :<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="present_district" value="<?php echo $present_district; ?>" readonly />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>present state</label>
                        <input type="text" class="form-control" name="present_state" value="<?php echo $present_state; ?>" readonly />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>present pincode :<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="present_pin_code" value="<?php echo $present_pin_code; ?>"  readonly/>
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>present country :<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="present_country" value="<?php echo $present_country; ?>" readonly />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Permanent Address:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="perm_address" value="<?php echo $perm_address; ?>" readonly/>
                    </div>
                </div>
                 <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Permanent city:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="perm_city" value="<?php echo $perm_city; ?>" readonly/>
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Permanent District:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="perm_district" value="<?php echo $perm_district; ?>" readonly />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Permanent State:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="perm_state" value="<?php echo $perm_state; ?>"  readonly/>
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Permanent Pincode:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="perm_pin_code" value="<?php echo $perm_pin_code; ?>" readonly />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Permanent country:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="perm_country" value="<?php echo $perm_country; ?>" readonly />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Gender:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="sex" value="<?php echo $sex; ?>" readonly/>
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Date of Birth:<span style="color:red">*</span></label>
                        <input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>" readonly />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>martial Status:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="martial_status" value="<?php echo $martial_status; ?>" readonly />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Pan No.:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="pan_number" value="<?php echo $pan_number; ?>" readonly/>
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Mobile No.:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="mobile_no" value="<?php echo $mobile_no; ?>" readonly/>
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>TelPhone No.:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="tel_phone_no" value="<?php echo $tel_phone_no; ?>" readonly/>
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Qualification:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="qualification" value="<?php echo $qualification; ?>" readonly />
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Other Qualification:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="other_qualification" value="<?php echo $other_qualification; ?>" readonly/>
                      </div>
                    </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Email:<span style="color:red">*</span></label>
                        <input type="email" class="form-control" name="Email" value="<?php echo $Email; ?>" readonly/>
                      </div>
                    </div>
                     
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Roll Is:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="role" value="<?php echo $roll; ?>" readonly/>
                       
                      </div>
                    </div> 
                     
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Zone:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="zone" value="<?php echo $zone; ?>" readonly/>
                      </div>
                    </div> 
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Dist:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="dist" value="<?php echo $dist; ?>" readonly/>
                      </div>
                    </div> 
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Tehsil:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="tehsil" value="<?php echo $tehsil; ?>" readonly />
                      </div>
                    </div> 
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Counter:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="counter" value="<?php echo $counter; ?>" readonly/>
                      </div>
                    </div> 
                    


            </div>
           <!-- <button class="btn btn-block btn-primary" name="register" style=" margin-left: 555px; width: 100px;height: 50">Submit</button>-->
        </div>
        </form>
        <a href="list_of_register.php"><button class="btn btn-block btn-primary" name="" style=" margin-left: 555px; width: 100px;height: 50">Back To List</button></a>
        <!-- /.content-wrapper -->
        
    </div>
 
 <footer class="main-footer">
        <div class="pull-right hidden-xs">
         
        </div>
        <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">focusmedia</a>.</strong> All rights reserved.
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