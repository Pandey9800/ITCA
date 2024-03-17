 <?php 
 include "../function/db_connect.php";
 if(isset($_GET['eno'])){
  

  $reg_eno = $_GET['eno'];
 $get_user_details = "SELECT * FROM ecounter WHERE 	eno = '$reg_eno'";

  $run_user_details = mysqli_query($con,$get_user_details);
 while($row_user_details = mysqli_fetch_array($run_user_details)){
 $first_name = $row_user_details ['first_name'];
 $father_name = $row_user_details ['father_name'];
 $present_address = $row_user_details ['present_address'];
 $present_city = $row_user_details ['present_city'];
 $present_district = $row_user_details ['present_district'];
 $present_state = $row_user_details ['present_state'];
 $present_pin_code = $row_user_details ['present_pin_code'];

 $present_country = $row_user_details ['present_country'];
 $perm_address = $row_user_details ['perm_address'];
 $perm_city = $row_user_details ['perm_city'];
 $perm_district = $row_user_details ['perm_district'];
 $perm_state = $row_user_details ['perm_state'];
 $sex = $row_user_details ['sex'];
 $dob = $row_user_details ['dob'];
 $martial_status = $row_user_details ['martial_status'];
 $pan_number = $row_user_details ['pan_number'];
 $mobile_no = $row_user_details ['mobile_no'];
 $qualification = $row_user_details ['qualification'];
 $other_qualification = $row_user_details ['other_qualification'];
 $Email = $row_user_details ['Email'];
 $Password = $row_user_details ['Password'];
 $roll = $row_user_details ['roll'];
 }
 //echo $eno_id;
}
 ?>
 <p align="center">USER DETAILS</p>
 <table width="750" align="center">
 <tr align="center">
 <!--<td><h2>Crate an new user</h2></td>-->
 </tr>
 <tr>
 <td align="right"><b>First Name:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $first_name; ?>" /></td>


 <td align="right"><b>Fathers Name:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $father_name; ?>"  /></td>

 <td align="right"><b>Present Address:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $present_address; ?>"  /></td>
 </tr>
 <tr>
 <td align="right"><b>Present City:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $present_city; ?>"/></td>
 
 <td align="right"><b>present Dist.:</b></td>
 <td><textarea type="text" class="form-control" value="<?php echo $present_district; ?>"  ></textarea></td>
 
 <td align="right"><b>present State:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $present_state; ?>" /></td>
</tr>
 <tr>
 	<td align="right"><b>present PinCode:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $present_pin_code; ?>" /></td>
 <td align="right"><b>present Country:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $present_country; ?>" /></td>
 <td align="right"><b>Perm Address:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $perm_address; ?>" /></td>
 	</tr>
 	<tr>
<td align="right"><b>Perm City:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $perm_city; ?>" /></td>
 <td align="right"><b>Perm Dist:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $perm_district; ?>" /></td>
 <td align="right"><b>Perm Dist:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $perm_district; ?>" /></td>
 	</tr>
 	<tr>
 		<td align="right"><b>Perm State:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $perm_state; ?>" /></td>
 <td align="right"><b>Sex:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $sex; ?>" /></td>
 <td align="right"><b>Date of Birth:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $dob; ?>" /></td>
 	</tr>
 	<tr>
 		<td align="right"><b>Marital Stutus:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $martial_status; ?>" /></td>
 <td align="right"><b>Pan Number:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $pan_number; ?>" /></td>
 <td align="right"><b>Mobile No.:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $mobile_no; ?>" /></td>
 	</tr>
 	<tr>
 		<td align="right"><b>pQualification:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $qualification; ?>" /></td>
 <td align="right"><b>Other Qualification:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $other_qualification; ?>" /></td>
 <td align="right"><b>Email:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $Email; ?>" /></td>
 	</tr>
 	<tr>
 		<td align="right"><b>Password:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $Password; ?>" /></td>
 <td align="right"><b>Roll:</b></td>
 <td><input type="text" class="form-control" value="<?php echo $roll; ?>" /></td>
 
 	</tr>
 	<tr>

 </table>
 <p align="center"><input type="submit" value="BACK" name="Back"></p>
 
