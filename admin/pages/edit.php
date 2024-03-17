 <?php 
 include "../function/db_connect.php";
 
 if(isset($_GET['eno'])){
  

  $reg_eno = $_GET['eno'];
 $get_user_details = "SELECT * FROM ecounter WHERE 	eno = '$reg_eno'";

  $run_user_details = mysqli_query($con,$get_user_details);
 while($row_user_details = mysqli_fetch_array($run_user_details)){
 $id_eno = $row_user_details ['eno'];
 $first_name = $row_user_details ['first_name'];
 $middle_name = $row_user_details ['middle_name'];
 $last_name = $row_user_details ['last_name'];
 $father_name = $row_user_details ['father_name'];
 $present_address = $row_user_details ['present_address'];
 $present_city = $row_user_details ['present_city'];
 $present_district = $row_user_details ['present_district'];
 $present_state = $row_user_details ['present_state'];
 $present_pin_code = $row_user_details ['present_pin_code'];

 $present_country = $row_user_details ['present_country'];
 $perm_address = $row_user_details ['perm_address'];
 $perm_pin_code = $row_user_details ['perm_pin_code'];
 $perm_city = $row_user_details ['perm_city'];
 $perm_district = $row_user_details ['perm_district'];
 $perm_state = $row_user_details ['perm_state'];
 $sex = $row_user_details ['sex'];
 $dob = $row_user_details ['dob'];
 $martial_status = $row_user_details ['martial_status'];
 $pan_number = $row_user_details ['pan_number'];
 $mobile_no = $row_user_details ['mobile_no'];
 $tel_phone_no = $row_user_details ['tel_phone_no'];
 $qualification = $row_user_details ['qualification'];
 $other_qualification = $row_user_details ['other_qualification'];
 $Email = $row_user_details ['Email'];
 $Password = $row_user_details ['Password'];
 $roll = $row_user_details ['roll'];
 }
 //echo $eno_id;
}
 ?>
 <p align="center">EDIT AND UPDATE PROFILE DETAILS</p>
 <form action="" method="post" enctype="multipart/form-data">
 <table width="750" align="center">
 <tr align="center">
 <!--<td><h2>Crate an new user</h2></td>-->
 </tr>
 <tr>
 	<td><input type="hidden" class="form-control" name="rm_name" value="<?php echo $id_eno ;?>" /></td>
 <td align="right"><b>first Name:</b></td>

 <td><input type="text" class="form-control" name="rm_name" value="<?php echo $first_name ;?>" /></td>


 <td align="right"><b>middle Name:</b></td>
 <td><input type="text" class="form-control" name="rm_name" value="<?php echo $middle_name; ?>"  /></td>

 <td align="right"><b>last Name:</b></td>
 <td><input type="text" class="form-control" name="rm_name" value="<?php echo $last_name ;?>"  /></td>
 </tr>
 <tr>
 <td align="right"><b>fathers Name:</b></td>
 <td><input type="text" class="form-control" name="rm_name" value="<?php echo $father_name ;?>" /></td>
 
 <td align="right"><b>present Address:</b></td>
 <td><textarea type="text" class="form-control" name="rm_address" value="<?php echo $present_address ;?>"></textarea></td>
 
 <td align="right"><b>present city:</b></td>
 <td><input type="text" class="form-control" name="rm_city" value="<?php echo $present_city ;?>" /></td>
</tr>
 <tr>
 <td align="right"><b>present distict:</b></td>
 <td><input type="text" class="form-control" name="rm_district" value="<?php echo $present_district ;?>" /></td>
 
 <td align="right"><b>present state:</b></td>
 <td><input type="text" class="form-control" name="rm_state" value="<?php echo $present_state ;?>" /></td>
 
 <td align="right"><b>present pincode:</b></td>
 <td><input type="text" class="form-control" name="rm_pin_code" value="<?php echo  $present_pin_code ;?>" /></td>
 </tr>
 <tr>
 <td align="right"><b>present country:</b></td>
 <td><input type="text" class="form-control" name="rm_country" value="<?php echo $present_country ;?>" /></td>
 
 <td align="right"><b>Parment Address:</b></td>
 <td><input type="text" class="form-control" name="rm_address" value="<?php echo $perm_address ;?>" /></td>

 <td align="right"><b>Parment city:</b></td>
 <td><input type="text" class="form-control" name="rm_city" value="<?php echo $perm_city ;?>"  /></td>
  </tr>
 <tr>
 <td align="right"><b>Parment District:</b></td>
 <td><input type="text" class="form-control" name="rm_district" value="<?php echo $perm_district ;?>"  /></td>
 
 <td align="right"><b>Parment State:</b></td>
 <td><input type="text" class="form-control" name="rm_state" value="<?php echo $perm_state ;?>"  /></td>

 <td align="right"><b>Parment Pincode:</b></td>
 <td><input type="text" class="form-control" name="rm_pin_code" value="<?php echo $perm_pin_code ;?>"  /></td>
  </tr>
 <tr>
 <td align="right"><b>Parment country:</b></td>
 <td><input type="text" class="form-control" name="rm_country" value="<?php echo $present_country ;?>" /></td>
 
 <td align="right"><b>Sex:</b></td>
 <td><input type="text" class="form-control" name="rm_sex"  value="<?php echo  $sex ;?>" /></td>
 
 <td align="right"><b>Date of Birth:</b></td>
 <td><input type="date" class="form-control" name="rm_dob" value="<?php echo $dob ;?>"  /></td>
 </tr>
 <tr>
 <td align="right"><b>martial Status:</b></td>
 <td><input type="text" class="form-control" name="rm_status" value="<?php echo $martial_status ;?>"  /></td>
 
 <td align="right"><b>Pan No.:</b></td>
 <td><input type="text" class="form-control" name="rm_number" value="<?php echo $pan_number;?>"  /></td>
 
 <td align="right"><b>Mobile No.:</b></td>
 <td><input type="text" class="form-control" name="rm_no" value="<?php echo $mobile_no ;?>" pattern="[789][0-9]{9}" /></td>
</tr>
 <tr>
 <td align="right"><b>TelPhone No.:</b></td>
 <td><input type="text" class="form-control" name="rm_phone_no"  value="<?php echo $tel_phone_no ;?>" /></td>

 <td align="right"><b>Qualification:</b></td>
 <td><input type="text" class="form-control" name="rm_qualification" value="<?php echo $qualification ;?>" /></td>
 
 <td align="right"><b>Other Qualification:</b></td>
 <td><input type="text" class="form-control" name="rm_other_qualification" value="<?php echo $other_qualification ;?>" /></td>
 </tr>
 <tr>
 <td align="right"><b>Email:</b></td>
 <td><input type="email" class="form-control" name="rm_Email" value="<?php echo $Email ;?>" /></td>
 
 <td align="right"><b>Give Password:</b></td>
 <td><input type="text" class="form-control" name="rm_Password" value="<?php echo $Password ;?>" /></td>
 </tr>
 <tr>
 <td>
 <select class="form-control"  name="rm_roll">
 <option><?php echo $roll ;?></option>
 <option>Zone</option>
 <option>Dist</option>
 <option>Block</option>
  <option>Counter</option>
 </select></td>
 
 </tr>
 
 <tr align="center"><td colspan="8"><input type="submit" name="rm_update" value="UPDATE" />	</td>
 	</td></tr>
 </form>

</table>
<p align="center"><a href="register_user.php">BACK</a></p>	
<?Php
if(isset($_GET['eno'])){
  

  $reg_eno = $_GET['eno'];
 if(isset($_POST['rm_update'])){
   
   $first_name = $_POST['rm_name'];
   $middle_name = $_POST['rm_name'];
   $last_name = $_POST['rm_name'];
   $father_name = $_POST['rm_name'];
   $present_address = $_POST['rm_address'];
   $present_city = $_POST['rm_city'];
   $present_district = $_POST['rm_district'];
   $present_state = $_POST['rm_state'];
   $present_pin_code = $_POST['rm_pin_code'];
   $present_country = $_POST['rm_country'];
   $perm_address = $_POST['rm_address'];
   $perm_city = $_POST['rm_city'];
   $perm_district = $_POST['rm_district'];
   $perm_state = $_POST['rm_state'];
   $perm_pin_code = $_POST['rm_pin_code'];
   $perm_country = $_POST['rm_country'];
   $sex = $_POST['rm_sex'];
   $dob = $_POST['rm_dob'];
   $martial_status = $_POST['rm_status'];
   $pan_number = $_POST['rm_number'];
   $mobile_no = $_POST['rm_no'];
   $tel_phone_no = $_POST['rm_phone_no'];
   $qualification = $_POST['rm_qualification'];
   $other_qualification = $_POST['rm_other_qualification'];
   $Email = $_POST['rm_Email'];
   $Password = $_POST['rm_Password'];
   $roll = $_POST['rm_roll'];
  
  $sql = "UPDATE ecounter SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',father_name='$father_name',present_address='$present_address',present_city='$present_city',present_district='$present_district',present_state='$present_state',present_pin_code='$present_pin_code',present_country='$present_country',perm_address='$perm_address',perm_city='$perm_city',perm_district='$perm_district',perm_state='$perm_state',perm_pin_code='$perm_pin_code',perm_country='$perm_country',sex='$sex',dob='$dob',martial_status='$martial_status',pan_number='$pan_number',mobile_no='$mobile_no',tel_phone_no='$tel_phone_no',qualification='$qualification',other_qualification='$other_qualification',Email='$Email',Password='$Password',roll='$roll' WHERE eno = '$reg_eno'";
   
   if (mysqli_query($con, $sql)) {
    echo "<script>alert('Account Update  Successfully, Thank You!')</script>";
		echo "<script>window.open('register_user.php','_self')</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
}
}
?>