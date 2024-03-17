<?php
 session_start();
 include("../function/db_connect.php"); 
include_once 'header.php';?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
            User Type
            
          </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Website Mng</li>
                </ol>
                <br/><br/><br/><br/>
                <div>
               <p align="center">
                <button class="btn btn-primary"  onClick="window.open('create_newuser.php?name=STATE','_self')" style="width:30%; height:90px;">Team Managemnt</button>
                
                 </p>
                <!--<p align="center"> 
                <button class="btn btn-primary" style="width:30%; height:90px;" onClick="window.open('userzone.php?name=Zone','_self')">Register Zone</button>
                 
                <button class="btn btn-primary" style="width:30%;height:90px;" onClick="window.open('userdist.php?name=District','_self')">Register District</button>
                 
                 </p>
                 <p align="center">
               
                <button class="btn btn-primary" style="width:30%; height:90px;" onClick="window.open('usertehsil.php?name=Tehsil-Block','_self')">Register Tehsil/Block</button>
                
                <button class="btn btn-primary" style="width:30%; height:90px;" onClick="window.open('userecounter.php?name=E-counter','_self')">Register E-counter</button>
               
                 </p>-->
                </div>
            </section>
           </div>
          
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