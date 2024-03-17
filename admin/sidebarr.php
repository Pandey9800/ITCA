<?php
$title="Welcome To Black Burn";
$keywords="Welcome To Black Burn";
$company="Burn Black";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title><meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="India-Map.jpg.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-dark sidebar-mini" style="background-color:#000;color:#fff;">
    <div class="wrapper" style="background-color:#000;">
      
      <header class="main-header" style="background-color:#000;">
        <!-- Logo -->
        <a href="#" class="logo"><b>Company</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
         <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">0</span>                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 0 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
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
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p >Software

                      <small>Member since Nov. <?php echo date('Y'); ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <br/>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
              </li>
                  </li>
                </ul>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar" style="background-color:#000;">
           <section class="sidebar" style="background-color:#000;">
          <div class="user-panel">
            <div class="pull-center" align="center">
              <img src="dist/img/avatar.png" style="height:120px;" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-center" align="center;">
              <p><?php echo ucwords($userRow['Name']); ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
      <?php include_once 'menu.php'; ?>
          </section></aside>