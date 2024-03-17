<?php
session_start();
//include("../function/functions.php");
include "../function/db_connect.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Widgets</title>
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
  <body class="skin-blue">
    <div class="wrapper">

      <?php include '../header.php'; ?>
     
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
      
        <!-- sidebar: style can be found in sidebar.less -->
       <?php   include '../sidebar.php'  ?>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Registered list
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          </ol>
        </section>

        <div class="pad margin no-print">
          <div class="callout callout-info" style="margin-bottom: 0!important;">												
            <h4><i class="fa fa-info"></i> REGISTER LIST:</h4>
            This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
          </div>
        </div>

        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
            <form method="get" action="search_result.php" enctype="multipart/form-data">
 <input type="text" name="user_query" placeholder="Search a Product"/>
 <input type="submit" name="search" value="Search"/>
 </form>
             <!-- <h2 class="page-header">
                <i class="fa fa-globe"></i> AdminLTE, Inc.
                <small class="pull-right">Date: 2/10/2014</small>
              </h2>
            </div>
          </div>
         
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong>Admin, Inc.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                Phone: (804) 123-5432<br/>
                Email: info@almasaeedstudio.com
              </address>
            </div>
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong>John Doe</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                Phone: (555) 539-1037<br/>
                Email: john.doe@example.com
              </address>-->
            </div><!-- /.col -->
           <!-- <div class="col-sm-4 invoice-col">
              <b>Invoice #007612</b><br/>
              <br/>
              <b>Order ID:</b> 4F3S8J<br/>
              <b>Payment Due:</b> 2/22/2014<br/>
              <b>Account:</b> 968-34567
            </div>--><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>SN.</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Qualification</th>
                    <th>Roll</th>
                    <th>Details</th>
                    <th>EDIT</th>
                    <th>DELET</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
      <?php
            $get_c = "select * from ecounter";
  $run_c =mysqli_query($con,$get_c);
  while ($row = mysqli_fetch_array($run_c))
     
  { 
    $eno = $row ['eno'];
    ?>
  <tr>
    
                    <td><?php echo $eno; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['present_city']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                   <td><?php echo $row['qualification']; ?></td>
                   <td><?php echo $row['roll']; ?></td>
                   <td><a href="details.php?eno=<?php echo $eno ?>">Details</a></td>
                   <td><a href="edit.php?eno=<?php echo $eno ?>">EDIT</a></td>
                   <td><a href="delet_user.php?eno=<?php echo $eno ?>">DELET</a></td>
                  </tr>
                  <?PHP } ?>          
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->
          
          <?php  
		    
if (isset($_GET['edit']))
{
include ("user_edit.php");
}
		  ?>

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
             
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
            </div>
          </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>
      </div><!-- /.content-wrapper -->
        <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>

