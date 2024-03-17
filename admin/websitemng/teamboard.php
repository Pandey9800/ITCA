<?php
 session_start();
 include("../function/db_connect.php"); 
include_once 'header.php';?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
            Board Of Member Managament Page
            
          </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Website Mng</li>
                </ol>
                <div align="center" class="form-control">
                 <table style="width:80%; outline:double;">
    <tr>
      <th>Member Name</th>
      <th>Post</th>
      <th>Photo</th>
      <th>Edit</th>
      <th>Delete</th>
     
    </tr>
    <?php 
	$sqli=mysqli_query($con,"SELECT `id`, `name`, `design`, `nation`, `gender`, `photo` FROM `team` WHERE pid=2");
	while($t=mysqli_fetch_array($sqli)){
	?>
    <tr>
      <td><?php echo $t['name'] ?></td>
      <td><?php echo $t['design'] ?></td>
      <td><img src="../../images/team/<?php echo $t['photo'] ?>" style="width:60px; height:60px;"></td>
      <td>Edit</td>
      <td><a href="deletea.php?id=<?php echo $t['id'] ?>">DELETE</a></td>
     
    </tr>
    <?php } ?>
   
  </table>
  </div>
  <br/><br/><br/>
    <br/><br/><br/>
      <br/><br/><br/>
        <br/><br/><br/>
          <br/><br/><br/>
            <br/><br/><br/>
  <hr/>
  <div align="center">
   <div align="center"><label><font color="#000099">Enter New Member</font></label></div>
  <form action="" method="post" enctype="multipart/form-data">
  <div class="row" style="margin-top: 30px; margin-center: 5px;margin-right: 5px">
                       
                   <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label> Enter Member Name<span style="color:red"></span></label>
                        <input type="text" name="name" class="form-control" required>
  
  
  </div></div>
   <div class=col-sm-4>
   <div class="form-group mb-10">
                        <label> Design.<span style="color:red"></span></label>
                        <input type="text" name="design" class="form-control">
  
  
  </div></div>
  <div class=col-sm-4>
   <div class="form-group mb-10">
                        <label> Gender.<span style="color:red"></span></label>
                        <input type="text" name="gender" class="form-control">
  
  
  </div></div>
  <div class=col-sm-4>
   <div class="form-group mb-10">
                        <label> Nationality.<span style="color:red"></span></label>
                        <input type="text" name="nation" class="form-control">
  
  
  </div></div>
   <div class=col-sm-8>
   <div class="form-group mb-10">
                        <label> Choose Photo<span style="color:red"></span></label>
                        <input type="file" name="photo" style="width:40%;" class="form-control">
 
  </div></div>
  <input type="submit" name="insert" value="ADD NOW" class="btn btn-primary" style="width:20%;">
  </div>
  </form>
  
  
  </div>
            </section>
           </div>
  
    <?Php

    if(isset($_POST['insert'])){
 
 //whether the email is blank

 
   $aname = $_POST['name'];
   $adesign = $_POST['design'];
   $agender = $_POST['gender'];
   $anation = $_POST['nation'];
 $file_name = $_FILES['photo']['name'];
             		$file_tmp = $_FILES['photo']['tmp_name'];
             		if(empty($errors)==true) {
                    move_uploaded_file($file_tmp,"../../images/team/".$file_name);
         //echo "Success";
                }
				
				if(mysqli_query($con,"INSERT INTO `team`(`pid`,`name`, `design`, `nation`, `gender`, `photo`) VALUES (2,'$aname','$adesign','$anation','$agender','$file_name')"))
             	{
             		
             		//header("Refresh:0");
             		//$msg1 = "User updated Sussesfully!";
                    echo '<script>alert("Added Succesfully")</script>,<meta http-equiv="refresh" content="0">';
             		

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