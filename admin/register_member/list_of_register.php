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
          
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <!--<a href="#" class="btn btn-default btn-flat">Profile</a>-->
                    </div>
                    <div class="pull-right">
                      <a href="../../userpanel/logout.php" class="btn btn-default btn-flat">Sign out</a>
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
   <!--  <li class="active treeview"><a href="../joining_process.php">
                <i class="fa fa-dashboard"></i> <span>Joining Process</span> <i class="fa fa-angle-left pull-right"></i></a>              </li>
          
       <li class="active treeview">
            
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Filter </span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../filter/user_filter.php"><i class="fa fa-circle-o"></i>Filter Details</a></li>
                
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
              <a href="list_of_register.php">
                <i class="fa fa-th"></i> <span>List of Register </span> 
              </a>
            </li>
            <li> <a href="../filter/mon_tr_b_adm.php">
                <i class="fa fa-th"></i> <span>Money Transfer </span></a></li>
            <!--<li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Charts</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>UI Elements</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Forms</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Tables</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
              </ul>
            </li>
            <li>
              <a href="pages/calendar.html">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>
            <li>
              <a href="pages/mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Add New </span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="pages/examples/register.php"><i class="fa fa-circle-o"></i> Register</a></li>
                <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Others</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> PAN</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> ITR <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li>
                      <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i></a></li>
              </ul>
            </li>
            <li><a href=""><em class="fa fa-book"></em> Documentation</a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-danger"></i> Important</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-warning"></i> Warning</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li>
          </ul>-->
          </section>
        
        <!-- /.sidebar -->
      </aside>
      <!-- =============================================== -->

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1></h1>
          <ol class="breadcrumb">
            <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Register_member</a></li>
            <li class="active">List_of_register</li>
          </ol>
        </section>

          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Registered List</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          </div>
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped" id="example2">
                <thead>
                  <tr>
                    <th>SN.</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Qualification</th>
                    <th>Roll</th>
                    <th>DETAILS</th>
                    <th>EDIT</th>
                   <th>DELETE</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <?php
         $get_c = "select `eno`, `prev`, `first_name`, `middle_name`, `last_name`, `father_name`,`present_city`,Email, `mobile_no`,`pan_wallet`, `e_wallet`, `reward_wallet`,qualificaton, `state`, `zone`, `dist`, `tehsil`, `ecounter` from ecounter";
  $run_c =mysqli_query($con,$get_c);
  $i=0;
  while ($row = mysqli_fetch_array($run_c))
 
  {
   $i++;
  ?>
                    <td><?php  echo $i; ?></td>
                    <td><?php echo $row['first_name'].'&nbsp;'.$row['middle_name'].'&nbsp;&nbsp;'.$row['last_name']; ?></td>
                     <td><?php echo $row['father_name']; ?></td>
                    <td><?php echo $row['present_city']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                   <td><?php echo $row['qualificaton']; ?></td>
                   <td><?php echo $row['prev']; ?></td>
                   <td><a href="details.php?eno=<?php echo  $row['eno'];  ?>">Details</a></td>
                   
                    <td><a href="edit.php?eno=<?php echo  $row['eno'];  ?>">Edit</a></td>
                   <td><a href="delet_user.php?eno=<?php echo  $row['eno'];  ?>"><font color="#990000">DELETE</font></a></td>
                  </tr>
                  <?PHP } ?>
                 
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
    
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
    <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
  </body>
</html>