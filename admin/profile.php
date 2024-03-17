<?php include 'sidebar.php'; 
if(isset($_POST['photoadd'])){
$incentivea=validate($_POST['incentive']);
$oldpath = $_FILES['photo']['tmp_name'];
$temp = explode(".", $_FILES["photo"]["name"]);
$img = round(microtime(true)) . '.' . end($temp);
$newpath ="../images/".$img;
move_uploaded_file($oldpath, $newpath);
$sql =mysqli_query($con,"UPDATE `alogin` SET `img`='$img' WHERE `id`=1");
if($sql>0){
    echo "<script>window.open('profile?success','_self')</script>";
} else {
    echo "<script>alert('Server Busy');window.open('profile?failed')</script>";
}       
}
if(isset($_POST['logoadd'])){
$incentivea=validate($_POST['incentive']);
$oldpath = $_FILES['photo']['tmp_name'];
$temp = explode(".", $_FILES["photo"]["name"]);
$img = round(microtime(true)) . '.' . end($temp);
$newpath ="../images/".$img;
move_uploaded_file($oldpath, $newpath);
$sql =mysqli_query($con,"UPDATE `alogin` SET `logo`='$img' WHERE `id`=1");
if($sql>0){
    echo "<script>window.open('profile?success','_self')</script>";
} else {
    echo "<script>alert('Server Busy');window.open('profile?failed')</script>";
}       
} 
if(isset($_POST['update'])){
$namea=validate($_POST['name']);
$contacta=validate($_POST['contact']);
$maila=validate($_POST['mail']);
$addressa=validate($_POST['address']);
$bnamea=validate($_POST['bname']);
$weba=validate($_POST['web']);
$sql =mysqli_query($con,"UPDATE `alogin` SET `name`='$namea',`contact`='$contacta',`emailid`='$maila',`address`='$addressa',`bname`='$bnamea',`domain`='$weba' WHERE `id`=1");
if($sql>0){
    echo "<script>window.open('profile?success','_self')</script>";
} else {
    echo "<script>alert('Server Busy');window.open('profile?failed')</script>";
}       
} 

  ?><div class="content-wrapper"><section class="content-header"><h1><small>Manage Profile</small></h1><ol class="breadcrumb"><li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Manage Profile</li></ol></section>
<section class="content">
<div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <div align="center"><label>Image:</label><img class="profile-user-img img-responsive" src="../images/<?php echo $userRow['img']; ?>" style="height:200px;" alt="User profile picture"></div>
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
      <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <div align="center"><label>Logo</label><img class="profile-user-img img-responsive" src="../images/<?php echo $userRow['logo']; ?>" style="height:200px;" alt="User profile picture"></div>
<form action="#" method="post" enctype="multipart/form-data">
<label>Update Photo</label>
<input type="file" name="photo" class="form-control"><br/>
<div align="center"><button type="submit" class="btn btn-warning" name="logoadd">Update</button></div>
            </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <div align="center"><label>Update Your Details</label></div>
<form action="#" method="post" enctype="multipart/form-data">
<label>Name</label>
<input type="text" name="name" value="<?php echo $userRow['name']; ?>" class="form-control">
<label>Contact</label>
<input type="text" name="contact" value="<?php echo $userRow['contact']; ?>" class="form-control">
<label>Email</label>
<input type="text" name="mail" value="<?php echo $userRow['emailid']; ?>" class="form-control">
<label>Address</label>
<input type="text" name="address" value="<?php echo $userRow['address']; ?>" class="form-control">
<label>Bussiness Name</label>
<input type="text" name="bname" value="<?php echo $userRow['bname']; ?>" class="form-control">
<label>Website</label>
<input type="text" name="web" value="<?php echo $userRow['domain']; ?>" class="form-control">
<div align="center"><br/><button type="submit" class="btn btn-warning" name="update">Update</button></div>
            </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
  </div>
</section>
</div>

     <?php include_once 'footer.php'; ?>