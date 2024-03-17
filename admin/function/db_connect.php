<?php 
date_default_timezone_set("Asia/Kolkata");
define("RUPEES","&#8377;");
$title="Welcome To Efilingsgov";
$keywords="Welcome To Efilingsgov";
$company="Efilingsgov";
$ip=$_SERVER['REMOTE_ADDR'];
$time=time();
$website="Efilingsgov";
$databasehost="localhost";
$databasename="efillings";
$databaseuser="root";
$databasepassword="";
$con=mysqli_connect($databasehost, $databaseuser, $databasepassword, $databasename) or die("connection failed.<br>".mysqli_connect_errno().": ".mysqli_connect_error());
?>