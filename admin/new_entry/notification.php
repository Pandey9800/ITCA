<?php
 session_start();
 include("../function/db_connect.php"); 
 include_once 'header.php'; ?>
  <?php include_once 'nav.php';?>
           </section>
        <!-- /.sidebar -->
      </aside>        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1></h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>

            </section>
<a href="./"><< Back</a>
            <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Notification Manage</font></h3>

              <div class="box-tools pull-right">
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="row" style="margin-top: 70px; margin-left: 5px;margin-right: 5px">
                 <div class=col-sm-3></div>
                <form action="" method="post" enctype="multipart/form-data">
                <div class=col-sm-6>
                   <label style="margin-left: 333px;">Enter Notification</label>
                       <textarea type="text" class="form-control" name="msg" placeholder="enter here"></textarea>
                    </div>
                </div>
              </div>
              <input type="submit" class="btn btn-block btn-primary" name="notice" style=" margin-left: 555px; width: 100px;height: 50" value="SEND">
          
        </form>
        
       <div class="row" style="margin-top: 70px; margin-left: 5px;margin-right: 5px">
 <div class=col-sm-6>
                    <div class="form-group mb-10">
                    <label>Notification List</label>
<div class="table-responsive">          
  <table class="table table-bordered"><tr><th colspan="2">Notifiction</th><th colspan="2">Delete</th></tr>
<?php $sql = mysqli_query($con,"SELECT * FROM `notification`");
while($yoi=mysqli_fetch_array($sql)){ ?>
<tr>
<td colspan="2"><?php echo $yoi['msg']; ?></td><td colspan="2"><form method="post" action=""><input type="hidden" name="did" value="<?php echo $yoi['id']; ?>"><button type="submit" name="deleding" class="btn btn-danger"><i class="fa fa-trash"></i></button></form></td>
</tr><?php } ?>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<?php 
 if(isset($_POST['deleding'])){
 
   $id = mysqli_real_escape_string ($con,$_POST['did']);
if(mysqli_query($con,"DELETE FROM `notification` WHERE `id`='$id'")){
 echo "<script>alert('Deleted Successuffy')</script><meta http-equiv='refresh' content='0'></meta>";
 }
 }
 ?>
                  

        <?Php

 if(isset($_POST['notice'])){
 
   $amsg = mysqli_real_escape_string ($con,$_POST['msg']);
   $sql = "INSERT INTO `notification`(`msg`) VALUES ('$amsg')";
   if (mysqli_query($con, $sql)) {
    echo "<script>alert('Notice Added Successfully!')</script><meta http-equiv='refresh' content='0'></meta>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
 }

?>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
           
            <strong>Copyright &copy; 2018 <a href="#">ssinfotech</a>.</strong> All rights reserved.
        </footer>
    </div>
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