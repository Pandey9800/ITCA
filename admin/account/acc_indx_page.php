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
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
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
          <?php /*?><div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>



                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                 
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
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
                  <span class="hidden-xs"><a href="../userpanel/logout.php">Logout</a></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      Textree - Digital India Solutions



                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li><?php */?>
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
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
           <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../dist/img/avatar.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $userRow['Name']; ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
           <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
<li class="active treeview">
              <a href="../index_admin_panel.php">
                <i class="fa fa-dashboard"></i> <span>Home</span> </a>                  </li>
<!--<li class="active treeview"><a href="joining_process.php">
                <i class="fa fa-dashboard"></i> <span>Joining Process</span> <i class="fa fa-angle-left pull-right"></i></a></li>
-->          
<!--<li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Filter </span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="../filter/user_filter.php"><i class="fa fa-circle-o"></i>Filter Details</a></li>
                <li><a href="../filter/list_of_form.php"><i class="fa fa-circle-o"></i>Form List</a></li>
              </ul>
            </li>-->
            <li class="treeview">
              <a href="">
                <i class="fa fa-files-o"></i>
                <span>New Entery</span><i class="fa fa-angle-left pull-right"></i>
                <!--<span class="label label-primary pull-right">4</span>-->
              </a>
              <ul class="treeview-menu">
                <li><a href="../new_entry/index.php"><i class="fa fa-circle-o"></i>Create New User</a></li>
                <li><a href="../new_entry/notification.php"><em class="fa fa-circle-o"></em>Nofication</a></li>
              </ul>
            </li>
<li>
              <a href="../register_member/list_of_register.php">
                <i class="fa fa-th"></i> <span>List of Register </span> </a></li>
<li> <a href="../filter/mon_tr_b_adm.php">
                <i class="fa fa-th"></i> <span>Money Transfer </span></a></li>
                <li class="treeview">
              <a href="">
                <i class="fa fa-files-o"></i>
                <span>Account Section</span><i class="fa fa-angle-left pull-right"></i>
                <!--<span class="label label-primary pull-right">4</span>-->
              </a>
              <ul class="treeview-menu">
                <li><a href="../account/acc_indx_page.php"><i class="fa fa-circle-o"></i>Total Transction</a></li>
                <li><a href="#"><em class="fa fa-circle-o"></em>Zone Transction</a></li>
                <li><a href="#"><em class="fa fa-circle-o"></em>Dist Transction</a></li>
                <li><a href="#"><em class="fa fa-circle-o"></em>Block/City Transction</a></li>
                 <li><a href="#"><em class="fa fa-circle-o"></em>Counter Transction</a></li>
              </ul>
            </li>
          </ul>
          </section>
        
        <!-- /.sidebar -->
      </aside>
      <!-- =============================================== -->

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Main Account Page
      
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Register_member</a></li>
            <li class="active">List_of_register</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="callout callout-info">
            <h4>Main Account!</h4>
            <p>View all Account Users.</p>
          </div>
         

       <!-- /.content -->
          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                
                  
                    <th>ID.</th>
                    <th>Debiter</th>
                    <th>Creaditer</th>
                    <th>Transaction For</th>
                    <th>Transaction Id</th>
                    <th>Amount</th>
                    <th>Date & Time</th>
                    <th>IP</th>
                    
                   
                  </tr>
                </thead>
                <tbody>
                  <tr>
                 <?php
				  $ress=mysqli_query($con,"SELECT c.* , p.* FROM transactions c,ecounter p WHERE c.transfer_from = p.eno ");
				  $res=mysqli_query($con,"SELECT c.* , p.first_name FROM transactions c,ecounter p WHERE c.transfer_to = p.eno ");
                  while($row=mysqli_fetch_array($res))
				   while($rows=mysqli_fetch_array($ress))
{
  ?>
 <td><?php echo $rows['id']; ?></td>
                      <td><?php echo $rows['first_name']. $rows['transfer_from']; ?></td>
                       <td><?php echo $row['first_name']. $rows['transfer_to']; ?></td>
                    <td><?php echo $rows['transaction_for']; ?></td>
                   <td><?php echo $rows ['transaction_for_id']; ?></td>
                   <td><?php echo $rows['amount']; ?></td>
                    <td><?php echo $row['date_time']; ?></td>
                   <td><?php echo $rows['ip']; ?></td>
                    <?php /*?><td><?php $rm=($rows['amount']/100)*10;
					 echo $rm; ?></td>
                    <td><?php $rm=($rows['amount']/100)*5;
					 echo $rm; ?></td>
                    <td><?php $rm=($rows['amount']/100)*3;
					 echo $rm; ?></td><?php */?>
                   
                  <?php /*?> <td><a href="details.php?eno=<?php echo  $row['eno'];  ?>">Details</a></td>
                   <td><a href="edit.php?eno=<?php echo  $row['eno'];  ?>">Edit</a></td>
                   <td><a href="delet_user.php?eno=<?php echo  $row['eno'];  ?>"><font color="#990000">DELETE</font></a></td><?php */?>
                  </tr>
                  <?php  }   ?>
                 
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

        
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
        
          
         
        </section>
      </div><!-- /.content-wrapper -->

     <footer class="main-footer">
        <div class="pull-right hidden-xs">
         
        </div>
        <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">focusmedia</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
  </body>
</html>