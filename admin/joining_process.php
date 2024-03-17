<?php
session_start();
include_once 'function/db_connect.php';

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
    <title>TaxTree | Dashboard</title>
<?php  include 'sidebar.php'; ?>

      <!-- Right side column. Contains the navbar and content of the page -->
     <!-- /.content-wrapper -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            OSN Tax Tree 
            <small>Fess & Commission Setting</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
  </section>
   <?php 
 $get_setting_details = "SELECT * FROM setting";
$run_setting_details = mysqli_query($con,$get_setting_details);
 while($setting = mysqli_fetch_array($run_setting_details)){
 $id = $setting ['id'];
 $joining_fees_zone = $setting ['joining_fees_zone'];
  $joining_fees_dist = $setting ['joining_fees_dist'];
   $joining_fees_tehsil = $setting ['joining_fees_tehsil'];
    $joining_fees_ecounter = $setting ['joining_fees_ecounter'];
	 $adv_credit_zone = $setting ['adv_credit_zone'];
 $adv_credit_zone = $setting ['adv_credit_zone'];
  $adv_credit_dist = $setting ['adv_credit_dist'];
   $adv_credit_tehsil = $setting ['adv_credit_tehsil'];
    $adv_credit_ecounter = $setting ['adv_credit_ecounter'];
$e_wallet_credit_zone = $setting ['e_wallet_credit_zone'];	
$e_wallet_credit_dist = $setting ['e_wallet_credit_dist'];	
$e_wallet_credit_tehsil = $setting ['e_wallet_credit_tehsil'];	
$e_wallet_credit_ecounter = $setting ['e_wallet_credit_ecounter'];	 
$pan_wallet_credit_zone = $setting ['pan_wallet_credit_zone'];
$pan_wallet_credit_dist = $setting ['pan_wallet_credit_dist'];
$pan_wallet_credit_tehsil = $setting ['pan_wallet_credit_tehsil'];
$pan_wallet_credit_ecounter = $setting ['pan_wallet_credit_ecounter'];	
$zone_comm_per = $setting ['zone_comm_per'];
$dist_comm_per = $setting ['dist_comm_per'];
$tehsil_comm_per = $setting ['tehsil_comm_per'];
 }
 ?>
   <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Details</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <form action="" method="post" enctype="multipart/form-data">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                       <th>Details</th>
                        <th>Zone</th>
                        <th>District</th>
                        <th>Tehsil/City</th>
                        <th>E-Counter</th>
                         <th>Commission(%)</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <td>Joining Fess</td>  
                        <td><input type="text" class="form-control" name="rm_joining_fees_zone" value="<?php echo $joining_fees_zone ;?>" /></td>
                        <td><input type="text" class="form-control" name="rm_joining_fees_dist" value="<?php echo $joining_fees_dist ;?>" /></td>
                        <td><input type="text" class="form-control" name="rm_joining_fees_tehsil" value="<?php echo $joining_fees_tehsil ;?>" /></td>
                         <td><input type="text" class="form-control" name="rm_joining_fees_ecounter" value="<?php echo $joining_fees_ecounter ;?>" /></td>
                         <td><input type="text" class="form-control" name="rm_zone_comm_per" value="<?php echo $zone_comm_per ;?>" /></td>
                     </tr>
                      <tr>
                      <td>Adv. Amount</td>
                       <td><input type="text" class="form-control" name="rm_adv_credit_zone" value="<?php echo $adv_credit_zone ;?>" /></td>
                        <td><input type="text" class="form-control" name="rm_adv_credit_dist" value="<?php echo $adv_credit_dist ;?>" /></td>
                        <td><input type="text" class="form-control" name="rm_adv_credit_tehsil" value="<?php echo $adv_credit_tehsil ;?>" /></td>
                         <td><input type="text" class="form-control" name="rm_adv_credit_ecounter" value="<?php echo $adv_credit_ecounter ;?>" /></td>
                          <td><input type="text" class="form-control" name="rm_dist_comm_per" value="<?php echo $dist_comm_per ;?>" /></td>
                      
                      </tr>
                       <tr>
                      <td>E-Wallet</td>
                       <td><input type="text" class="form-control" name="rm_e_wallet_credit_zone" value="<?php echo $e_wallet_credit_zone ;?>" /></td>
                        <td><input type="text" class="form-control" name="rm_e_wallet_credit_dist" value="<?php echo $e_wallet_credit_dist ;?>" /></td>
                        <td><input type="text" class="form-control" name="rm_e_wallet_credit_tehsil" value="<?php echo $e_wallet_credit_tehsil ;?>" /></td>
                         <td><input type="text" class="form-control" name="rm_e_wallet_credit_ecounter" value="<?php echo $e_wallet_credit_ecounter ;?>" /></td>
                         <td><input type="text" class="form-control" name="rm_tehsil_comm_per" value="<?php echo $tehsil_comm_per ;?>" /></td>
                      
                      </tr>
                       <tr>
                      <td>Pan-Wallet</td>
                      <td><input type="text" class="form-control" name="rm_pan_wallet_credit_zone" value="<?php echo $pan_wallet_credit_zone ;?>" /></td>
                        <td><input type="text" class="form-control" name="rm_pan_wallet_credit_dist" value="<?php echo $pan_wallet_credit_dist ;?>" /></td>
                        <td><input type="text" class="form-control" name="rm_pan_wallet_credit_tehsil" value="<?php echo $pan_wallet_credit_tehsil ;?>" /></td>
                         <td><input type="text" class="form-control" name="rm_pan_wallet_credit_ecounter" value="<?php echo $pan_wallet_credit_ecounter ;?>" /></td>
                      </tr>
                      </tbody>
                    </tr>
 <tr align="center"><td colspan="8"><input type="submit" class="btn btn-block btn-primary" style=" margin-left: 555px; width: 100px;height: 50" name="rm_update_setting" value="UPDATE" />	</td>
 	</td></tr>
 </form>
                  </table>
                </div><!-- /.box-body -->
              </div>
        <!-- Main content -->
       
          </div><!-- /.row -->

          <div class="row">
         
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div>
      <?php 
      if(isset($_POST['rm_update_setting'])){
   
  $rm_joining_fees_zone = $_POST['rm_joining_fees_zone'];
   $rm_joining_fees_dist = $_POST['rm_joining_fees_dist'];
    $rm_joining_fees_tehsil = $_POST['rm_joining_fees_tehsil'];
   $rm_joining_fees_ecounter = $_POST['rm_joining_fees_ecounter'];
   
    $rm_adv_credit_zone = $_POST['rm_adv_credit_zone'];
	$rm_adv_credit_dist = $_POST['rm_adv_credit_dist'];
	$rm_adv_credit_tehsil = $_POST['rm_adv_credit_tehsil'];
	$rm_adv_credit_ecounter = $_POST['rm_adv_credit_ecounter'];
	
	$rm_e_wallet_credit_zone = $_POST['rm_e_wallet_credit_zone'];
	$rm_e_wallet_credit_dist = $_POST['rm_e_wallet_credit_dist'];
	$rm_e_wallet_credit_tehsil = $_POST['rm_e_wallet_credit_tehsil'];
	$rm_e_wallet_credit_ecounter = $_POST['rm_e_wallet_credit_ecounter'];
	
	$rm_pan_wallet_credit_zone = $_POST['rm_pan_wallet_credit_zone'];
	$rm_pan_wallet_credit_dist = $_POST['rm_pan_wallet_credit_dist'];
	$rm_pan_wallet_credit_tehsil = $_POST['rm_pan_wallet_credit_tehsil'];
	$rm_pan_wallet_credit_ecounter = $_POST['rm_pan_wallet_credit_ecounter'];
	
	$rm_zone_comm_per = $_POST['rm_zone_comm_per'];
	$rm_dist_comm_per = $_POST['rm_dist_comm_per'];
	$rm_tehsil_comm_per = $_POST['rm_tehsil_comm_per'];
	
	
  $sql = "UPDATE setting SET joining_fees_zone='$rm_joining_fees_zone',joining_fees_dist='$rm_joining_fees_dist',joining_fees_tehsil='$rm_joining_fees_tehsil',joining_fees_ecounter='$rm_joining_fees_zone',
  adv_credit_zone='$rm_adv_credit_zone',adv_credit_dist='$rm_adv_credit_dist',adv_credit_tehsil='$rm_adv_credit_tehsil',adv_credit_ecounter='$rm_adv_credit_ecounter',
  e_wallet_credit_zone='$rm_e_wallet_credit_zone',e_wallet_credit_dist='$rm_e_wallet_credit_dist',e_wallet_credit_tehsil='$rm_e_wallet_credit_tehsil',e_wallet_credit_ecounter='$rm_e_wallet_credit_ecounter',
  pan_wallet_credit_zone='$rm_pan_wallet_credit_zone',pan_wallet_credit_dist='$rm_pan_wallet_credit_dist',pan_wallet_credit_tehsil='$rm_pan_wallet_credit_tehsil',pan_wallet_credit_ecounter='$rm_pan_wallet_credit_ecounter',
  zone_comm_per='$rm_zone_comm_per',dist_comm_per='$rm_dist_comm_per',tehsil_comm_per='$rm_tehsil_comm_per'";
   
   if (mysqli_query($con, $sql)) {
    echo "<script>alert('Account Update  Successfully, Thank You!')</script>";
		echo "<script>window.open('joining_process.php','_self')</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
}
   
   ?>
       <footer class="main-footer">
        <div class="pull-right hidden-xs">
         
        </div>
        <strong>Copyright &copy; 2017 <a href="#">ssinfotech</a>.</strong> All rights reserved.
      </footer>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>