<?php include 'sidebar.php'; 
if(isset($_POST['photoadd'])){
$oldpath = $_FILES['photo']['tmp_name'];
$temp = explode(".", $_FILES["photo"]["name"]);
$img = round(microtime(true)) . '.' . end($temp);
$newpath ="../images/".$img;
move_uploaded_file($oldpath, $newpath);
$sql =mysqli_query($con,"UPDATE `ecounter` SET `pic`='$img' WHERE `eno`='".$_SESSION['memid']."'");
if($sql>0){
    echo "<script>window.open('profile?success&pic','_self')</script>";
} else {
    echo "<script>alert('Server Busy');window.open('profile?failed','_self')</script>";
}       
}
if(isset($_POST['passupdate'])){
$newpassa=validate($_POST['newpass']);
$sql =mysqli_query($con,"UPDATE `ecounter` SET `Password`='$newpassa' WHERE `eno`='".$_SESSION['memid']."'");
if($sql>0){
    echo "<script>window.open('profile?success&pass','_self')</script>";
} else {
    echo "<script>alert('Server Busy');window.open('profile?failed','_self')</script>";
}       
} 
if(isset($_POST['update'])){
$namea=validate($_POST['name']);
$contacta=validate($_POST['contact']);
$maila=validate($_POST['mail']);
$addressa=validate($_POST['address']);
$bnamea=validate($_POST['bname']);
$weba=validate($_POST['web']);
$sql =mysqli_query($con,"UPDATE `ecounter` SET `first_name`='$namea',`present_address`='$addressa',`mobile_no`='$contacta' WHERE `eno`='".$_SESSION['memid']."'");
if($sql>0){
    echo "<script>window.open('profile?success','_self')</script>";
} else {
    echo "<script>alert('Server Busy');window.open('profile?failed','_self')</script>";
}       
} 

  ?><div class="content-wrapper"><section class="content-header"><h1><small>Manage Profile</small></h1><ol class="breadcrumb"><li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Manage Profile</li></ol></section>
<section class="content">
<div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <div align="left"><label>Profile Picture:</label><img class="profile-user-img img-responsive" src="../images/<?php echo $userRow['pic']; ?>" style="height:200px;" alt="User profile picture"></div>
<form action="#" method="post" enctype="multipart/form-data">
<label>Update Photo</label>
<input type="file" name="photo" class="form-control"><br/>
<div align="center"><button type="submit" class="btn btn-warning" name="photoadd">Update</button></div>
            </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      
      <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <div align="left"><label>Update Your Details</label></div>
<form action="#" method="post" enctype="multipart/form-data">
<label>Name</label>
<input type="text" name="name" value="<?php echo $userRow['first_name']; ?>" class="form-control">
<label>Contact</label>
<input type="text" name="contact" value="<?php echo $userRow['mobile_no']; ?>" class="form-control">
<label>Email</label>
<input type="text" name="mail" value="<?php echo $userRow['Email']; ?>" class="form-control">
<label>Address</label>
<input type="text" name="address" value="<?php echo $userRow['present_address']; ?>" class="form-control">
<div align="center"><br/><button type="submit" class="btn btn-warning" name="update">Update</button></div>
            </form>

            </div>
            <!-- /.box-body -->
          </div>
        </div>
          <!-- /.box -->
           <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <div align="left"><label>Update Password:</label><br/>
               <label>Old Password</label>
<input type="text" name="oldpass" placeholder="Enter Here" required="required" class="form-control">
<label>New Password</label>
<input type="text" name="newpass" placeholder="Enter Here" required="required"  class="form-control"><br/>
<div align="center"><button type="submit" class="btn btn-warning" name="passupdate">Update</button></div>
            </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      </div>
  </div>
</section>
</div>

     <?php include_once 'footer.php'; ?>