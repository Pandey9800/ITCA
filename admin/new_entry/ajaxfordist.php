 <?php include("../function/db_connect.php"); 
 if(isset($con,$_POST['ins'])){
 //$sid=mysqli_real_escape_string($con,$_POST['ss']);
 $sname=mysqli_real_escape_string($con,$_POST['ss']);
  $sname1=mysqli_real_escape_string($con,$_POST['ss1']);
 if($doi=mysqli_query($con,"INSERT INTO `level`(`spid`,`dist`) VALUES ('$sname1','$sname')")){
 echo "<script>alert('ADD District Successfully'),window.open('userdist.php?name=District','_self')</script>";
 }
 }
 ?>