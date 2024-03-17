<div align="center">
<br/><br/><br/>
<p align="center"><font color="#990000">Do You Really Want To DELETE Your Notification?</font></p>
<form action="" method="post">
<table align="center" width="600">
<tr align="center">
<td colspan="2">Action</td>
</tr>
<br/><br/><br/><br/><br/><br/><br/>
<tr align="center">
<td><input type="submit" class="form-control" name="yes" value="Yes I Want"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>
</tr>
</table>
</form>
<a href="delet_notification.php"><input type="submit" class="form-control" name="no" value="No Don't"/></a></p>
</div>
 <?php 
 include "../function/db_connect.php";
 
 if(isset($_GET['id'])){
  

  $reg_eno = $_GET['id'];
if (isset($_POST['yes'])){
 $sql_delet = "DELETE FROM notification WHERE id = '$reg_eno'";

  $run_delet = mysqli_query($con,$sql_delet);
 if($run_delet){
 //session_destroy();
echo "<script>alert('Account is Deleted  Successfully, Thank You!')</script>";
		echo "<script>window.open('delet_notification.php','_self')</script>";
		}
		
		//if(isset($_POST['no'])){
//echo"<script>window.open('delet_notification.php','_self')
//}
}
}
		?>
        <!-- /.content-wrapper -->
        
    </div>
 
