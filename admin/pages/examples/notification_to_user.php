<?php
 session_start();
 include("../../function/db_connect.php"); 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Registration Page</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../../plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href=""><b>Create New User</b></a>
      </div>
<form action="notification_to_user.php" method="post" enctype="multipart/form-data">
 <table width="750" align="center">
 <tr align="center">
 <!--<td><h2>Crate an new user</h2></td>-->
 </tr>
 <tr>
 <td align="right"><b>MESSAGE:</b></td>
 <td><input type="text" class="form-control" name="msg" required /></td>
</tr>
<tr align="center"><td colspan="8"><input type="submit" name="noti" value="Submit" />	</td></tr>
 </form>
</table>
 

<?Php

 if(isset($_POST['noti'])){
 
   $msg = $_POST['msg'];
   
   $sql = "INSERT INTO notification(msg) VALUES('$msg')";
   if (mysqli_query($con, $sql)) {
    echo "<script>alert('Account Created Successfully, Thank You!')</script>";
		echo "<script>window.open('notification_to_user.php','_self')</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
   //$run_sql = mysqli_query($con,$insert_user);
   //move_uploaded_file($c_image_tmp,"customer/customer_photos/$c_image");
  
   
   //$get_ip = getIp();
        //$sel_cart = "select * from cart where ip_add ='$c_ip'";
//        $run_cart = mysqli_query($con,$sel_cart);
//        $check_cart = mysqli_num_rows($run_cart);
//		
//		if($check_cart==1){
//		
//		$_SESSION['customer_email']=$c_email;
		
		
}

?>
<script src="../../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>