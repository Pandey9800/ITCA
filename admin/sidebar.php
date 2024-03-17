<?php ob_start();
session_start();
if(!isset($_SESSION['admin'])){ header("Location: ./");}
include_once 'function/db_connect.php';
include_once 'function/function.php';
error_reporting(E_ALL);
$res=mysqli_query($con, "SELECT `id`, `password`, `username`, `name`, `contact`, `emailid`, `address`, `bname`, `domain`, `img`,`logo` FROM `alogin` WHERE id=".$_SESSION['admin']);
$userRow=mysqli_fetch_assoc($res);?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title><meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  </head>
  
  <body class="hold-transition skin-white sidebar-mini" style="background-color:#03305D;">
    <div class="wrapper">
      <header class="main-header">
        <a href="#" class="logo"><b style="color:orange;"><?php echo strtoupper($userRow['bname']); ?></b></a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
         <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">0</span></a>
                <ul class="dropdown-menu">
                  <li class="header">You have 0 messages</li>
                  <li>
                    <ul class="menu">
                      <li><!-- start message -->
                        <!--<a href="#">-->
                        <!--  <div class="pull-left">-->
                        <!--    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>-->
                        <!--  </div>-->
                        <!--  <h4>-->
                        <!--    Support Team-->
                        <!--    <small><i class="fa fa-clock-o"></i> 5 mins</small>-->
                        <!--  </h4>-->
                        <!--  <p>Why not buy a new awesome theme?</p>-->
                        <!--</a>-->
                      </li><!-- end message -->
                     
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">0</span>                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 0 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <!--<li>-->
                      <!--  <a href="#">-->
                      <!--    <i class="fa fa-users text-aqua"></i> 5 new members joined today-->
                      <!--  </a>-->
                      <!--</li>-->
                      
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
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
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../images/<?php echo $userRow['logo']; ?>" style="width:40px;" class="user" alt="<?php echo ucwords($userRow['name']); ?>"/>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../images/<?php echo $userRow['img']; ?>" class="img-circle" alt="User Image" />
                    <p style="color:#000;"><?php echo ucwords($userRow['name']); ?>

                      <small>Member since Nov. <?php echo date('Y'); ?></small>
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
              <img src="../images/<?php echo $userRow['logo']; ?>" style="width:100%;height:100%;" class="img" alt="User Image" /> 
    <legend style="color:#fff;">Admin</legend>
            </div>
            <div class="pull-center text-center">
              <p style="text-align:center;font-size:15px;font-weight: bold;color:#fff;"><?php echo ucwords($userRow['name']); ?></p>
              <a href="#" style="text-align:center;"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
         <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>-->
      <?php include_once 'menu.php'; ?>
          </section>
        
        <!-- /.sidebar -->
      </aside>
