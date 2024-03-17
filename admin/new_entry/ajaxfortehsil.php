 <?php include("../function/db_connect.php"); 
 if(isset($con,$_POST['ins'])){
 $sname=mysqli_real_escape_string($con,$_POST['ss']);
 $sname1=mysqli_real_escape_string($con,$_POST['ss1']);
 $sname2=mysqli_real_escape_string($con,$_POST['ss2']);
 if($doi=mysqli_query($con,"INSERT INTO `level`(`spid`, `dpid`, `tehsil`) VALUES ('$sname1','$sname2','$sname')")){
 echo "<script>alert('ADD Tehsil Successfully'),window.open('usertehsil.php?name=TEHSIL','_self')</script>";
 }
 }
 ?>