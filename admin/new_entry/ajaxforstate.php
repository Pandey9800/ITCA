 <?php include("../function/db_connect.php"); 
 if(isset($con,$_POST['ins'])){
 $sname=mysqli_real_escape_string($con,$_POST['ss']);
 if($doi=mysqli_query($con,"INSERT INTO `level`(`state`) VALUES ('$sname')")){
 echo "<script>alert('ADD State Successfully'),window.open('create_newuser.php?name=STATE','_self')</script>";
 }
 }
 ?>