 <form action="" method="post">
<table align="center" width="600">
<tr align="center">
<td colspan="2">Do You Really Want To DELETE Your Acoount</td>
</tr>
<tr align="center">
<td><input type="submit" name="yes" value="Yes I Want"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>

</tr>
</table>
</form>
<p align="center"><a href="register_user.php"><input type="submit" name="no" value="No Do't"/></a></p>
 <?php 
 include "../function/db_connect.php";
 
 if(isset($_GET['eno'])){
  

  $reg_eno = $_GET['eno'];
if (isset($_POST['yes'])){
 $sql_delet = "DELETE FROM ecounter WHERE eno = '$reg_eno'";

  $run_delet = mysqli_query($con,$sql_delet);
 if($run_delet){
 //session_destroy();
echo "<script>alert('Account is Deleted  Successfully, Thank You!')</script>";
		echo "<script>window.open('register_user.php','_self')</script>";
		}
		
		if(isset($_POST['no'])){
echo"<script>window.open('register_user.php','_self')</script>";
}
}
}
		?>