<?php
 session_start();
 include("../function/db_connect.php"); 
include_once 'header.php';?>
 <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
            About Us Page Setting
            
          </h1>
            
  <form action="" method="post" enctype="multipart/form-data">
   <div class="row" style="margin-top: 30px; margin-center: 5px;margin-right: 5px">
                       

  <div class=col-sm-12>
   <div class="form-group mb-12">
 
  <div align="center">
                        <label> Write Content For About us Page<span style="color:red"></span></label>
                        <textarea name="name" class="form-control" placeholder="Write Content For About us Page" style="height:405px;"></textarea>
                        
  </div></div>
  </div>
  <div align="center">
  <input type="submit" name="insert" value="Add-NOW" class="btn btn-primary" style="width:20%;">
  </div>
  </div>
  </form>
  
  
  </div>
            </section>
           </div>
  
    <?Php

    if(isset($_POST['insert'])){
   $fname = mysqli_real_escape_string($con,$_POST['name']);
				if(mysqli_query($con,"INSERT INTO `download`(`about`) VALUES ('$fname')"))
             	{
                    echo '<script>alert("About Us Content Added Succesfully")</script>,<meta http-equiv="refresh" content="0">';
             	}else
             	{
				 echo '<script>alert("Fail")</script>,<meta http-equiv="refresh" content="0">';
				 }
				 }
			
				
   ?>       
 <?php include_once '../footer.php'; ?>  <!-- ./wrapper -->
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