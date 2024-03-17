<?php include 'sidebar.php';

if(isset($_POST['custsubmit'])){
$cname  = validate($_POST['cname']);
$cmob   = validate($_POST['cmob']);
$city   = validate($_POST['city']);
$ss     = validate($_POST['service']);

$coup=mysqli_query($con,"INSERT INTO `customer`(`stfid`, `name`, `contact`, `city`,`encounterservice`) VALUES ('".$_SESSION['partid']."','$cname','$cmob','$ss')");

if($coup>0){

  header("Location: customer-report.php");
          exit();
}else{
    echo "<script>alert('Server Busy Faild')</script><meta http-equiv='refresh' content='0'/>";
} 
} 
?>

<div class="content-wrapper"><a href="dashboard"><< Home</a><section class="content-header"><ol class="breadcrumb"><li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li><li class="active"><?php //echo ucwords(trim($_GET['name'])); ?></li></ol></section>
<section class="content"><div class="row">
<div class="box-body box-profile"><div class="row">
   <div class="col-md-4"></div> <div class="col-md-4"><div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Add Customer</h3>
            </div>
            <div class="box-body">
            <form method="post">
            <label>Name*</label>
            <input type="text" name="cname" class="form-control" placeholder="enter here" required="required">
             <label>Contact</label>
            <input type="text" name="cmob" class="form-control"  placeholder="enter here">
             <label>City</label>
            <input type="text" name="city" class="form-control"  placeholder="enter here">
              <label>Service Type</label>
              <select class="form-control" name="service">
  <?php $servicez=mysqli_query($con,"SELECT `id`,`name` FROM `service` ORDER BY `name` ASC");
            while($roww=mysqli_fetch_array($servicez)){?>
                <option value="<?php echo $roww['id']; ?>"><?php echo ucwords($roww['name']); ?></option>
<?php }?>
              </select>
      <br/>
      <div class="box box-success  collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Full Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <label>Photo</label>
            <input type="file" name="pik" class="form-control"  placeholder="enter here">
              <label>Pan No.</label>
            <input type="text" name="panno" class="form-control" placeholder="enter here" >
              <label>Pan Card</label>
            <input type="file" name="pancard" class="form-control" placeholder="enter here" >
            <label>Adhaar No.</label>
            <input type="text" name="panno" class="form-control" placeholder="enter here" >
              <label>Adhaar Card</label>
            <input type="file" name="pancard" class="form-control" placeholder="enter here" >
             <label>Address</label>
            <input type="text" name="address" class="form-control"  placeholder="enter here">
             <label>Pincode</label>
            <input type="text" name="pincode" class="form-control"  placeholder="enter here">
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="custsubmit" class="btn btn-primary">Submit</button>
      </div></form>
          
          </div></div></div></div></div></div></section></div>
          <?php include_once 'footer.php'; ?> 