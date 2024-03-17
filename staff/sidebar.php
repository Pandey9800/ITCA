<?php ob_start(); session_start();
if(!isset($_SESSION['memid'])){ 
header("Location: dashboard");
exit(); }error_reporting(0);
include_once '../admin/function/db_connect.php';
include_once '../admin/function/function.php';
$res=mysqli_query($con, "SELECT `eno`, `username`, `memcode`, `employeetype`, `incentivetype`, `incentive`, `first_name`, `present_address`, `present_city`, `present_district`, `present_state`, `present_pin_code`, `present_country`, `sex`, `dob`, `pan_number`, `mobile_no`, `tel_phone_no`, `qualificaton`, `other_qualification`, `Email`, `Password`, `pan_wallet`, `e_wallet`, `reward_wallet`, `ecounter`, `pic`, `timedate`, `ip` FROM `ecounter` WHERE `eno`='".$_SESSION['memid']."'");
$userRow=mysqli_fetch_assoc($res);$emptyp=$userRow['employeetype'];?><!DOCTYPE html><html><head><meta charset="UTF-8"><title><?php echo $title; ?></title><meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'><link href="../admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /><link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /><link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" /><link href="../admin/plugins/morris/morris.css" rel="stylesheet" type="text/css" /><link href="../admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" /><link href="../admin/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" /><link href="../admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" /><link href="../admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" /><link rel="stylesheet" href="../admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
   <link rel="stylesheet" href="../admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"><link rel="stylesheet" href="../admin/bower_components/select2/dist/css/select2.min.css">
  </head>
  <body class="hold-transition skin-white sidebar-mini" style="background-color:#03305D;">
    <div class="wrapper">
      <header class="main-header">
        <a href="#" class="logo"><b style="color:orange;">Efilingsgov</b></a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
         <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
            
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">0</span>                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 0 tasks</li>
                 
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <!--<li>-->
                      <!--  <a href="#">-->
                      <!--    <h3>-->
                      <!--      Design some buttons-->
                      <!--      <small class="pull-right">20%</small>-->
                      <!--    </h3>-->
                      <!--    <div class="progress xs">-->
                      <!--      <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">-->
                      <!--        <span class="sr-only">20% Complete</span>-->
                      <!--      </div>-->
                      <!--    </div>-->
                      <!--  </a>-->
                      <!--</li>-->
                     
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../images/<?php echo $userRow['pic']; ?>" style="width:40px;height:30px;" class="user" alt="<?php echo ucwords($userRow['first_name']); ?>" />
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="../images/<?php echo $userRow['pic']; ?>" class="img-circle" alt="User Image" />
                    <p style="color:#fff;"><?php echo ucwords($userRow['first_name']); ?>

                      <small>Member since: <?php echo showdate($userRow['timedate']); ?></small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="profile" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
              </li>
                  </li>
                </ul>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
           <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-center" align="center">
      <img src="../images/<?php echo $userRow['pic']; ?>" style="width:60px;height:60px;" class="img" alt="Burn Black" />
        <!--Efilingsgov-->   </div>
            <div class="pull-center text-center">
              <p style="text-align:center;font-size:15px;font-weight: bold;color:#fff;"><?php echo ucwords($userRow['first_name']); ?><br/><span style="color:#fff;">E-counter</span></p>
              <a href="#" style="text-align:center;"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
      <?php include_once 'menu.php'; ?>
          </section>
      </aside>