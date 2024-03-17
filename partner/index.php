<?php ob_start();
session_start();
include_once '../admin/function/db_connect.php';
if(isset($_SESSION['partid'])){
 header("Location:dashboard");
exit();
  }
if(isset($_POST['login_admin'])){
        $name = mysqli_real_escape_string($con,$_POST['name']);
        $apass = mysqli_real_escape_string($con,$_POST['password']);
        $res=mysqli_query($con,"SELECT `eno`, `password` FROM ecounter WHERE (`username`='$name' || `mobile_no`='$name')");
        if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_array($res);
        if($row['password']==$apass){
           $_SESSION['partid'] = $row['eno'];
           $_SESSION['timess'] = time();
           header("Location: dashboard");
        exit();
        }else{
          header("Location: .\?fail&pass");
          exit();
        }
        }else{
          header("Location: .\?fail");
          exit();  
        }
}
?><!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><title>Partner Login Panel</title><meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"><link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"><script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script><script src="//code.jquery.com/jquery-1.11.1.min.js"></script><style> @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
.login-block{
background: #F5F8F8;
background: -webkit-linear-gradient(to bottom, #C4ECEC, #F5F8F8); 
background: linear-gradient(to bottom, #C4ECEC, #F5F8F8); 
float:left;
width:100%;
padding : 50px 0;}
.banner-sec{background:url();  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
.container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
.carousel-inner{border-radius:0 10px 10px 0;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 50px 30px; position:relative;}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#FEB58A;}
.login-sec .copy-text a{color:#E36262;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
.login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
.btn-login{background: #DE6262; color:#fff; font-weight:600;}
.banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
.banner-text h2{color:#fff; font-weight:600;}
.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
.banner-text p{color:#fff;}</style>
<section class="login-block"><div class="container"><div class="row"><div class="col-md-4 login-sec"><b style=color:red;text-align:center;font-size:18px;></b><h2 class="text-center">Login Here</h2><?php if(isset($_GET['fail'])){?><b style="color: red;text-align: center;">Wrong Username and Password<br/> Combination</b><?php }?><form  method="post" ><div class="form-group"><label for="exampleInputEmail1" class="text-uppercase">Username</label><input type="text" class="form-control" name="name" placeholder="enter here..." required="required"></div><div class="form-group"><label for="exampleInputPassword1" class="text-uppercase">Password</label><input type="password" name="password" class="form-control" required="required" placeholder="enter here..."></div><div class="form-check"><label class="form-check-label"><b style="color:red;"></b><br><input type="checkbox" class="form-check-input"><small>Remember Me</small></label><button type="submit" name="login_admin" class="btn btn-login float-right">Submit</button></div></form><div class="copy-text">Design By <a href="https://www.focusmedia.co.in/" target="_blank"> Focus Media</a></div></div><div class="col-md-8 banner-sec"><div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"><div class="carousel-inner" role="listbox"><div class="carousel-item active"><img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="burnblack"><div class="carousel-caption d-none d-md-block"><div class="banner-text"><h2 style="color:orange;">E-filligsGov</h2><ul><li>Strategic Planning</li><li>Succession Planning</li><li>Organizational Development</li><li>Manage Client</li><li>Manage Candidate</li><li>Work Post</li><li>Data Filter</li></ul></div></div></div></div></div></div></div></section></body></html>