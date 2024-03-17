<?php include 'sidebar.php'; ?>
<div class="content-wrapper">
	 <a href="dashboard.php"> <small>Back</small></a>
        <section class="content-header">
          <h1>New Customer
          
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">New Customers</li>
          </ol>
  </section>


  <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col">
              <div class="info-box">
             <?php if (isset($_GET['self'])) {
	# code...
?>
                <div class="info-box-content">
                  <span class="info-box-text">New Customer(Added by Customer) List</span>
                  <table class="table table-responsive"><thead><tr><th>S No.</th><th>Customer</th><th>City</th><th>Phone</th><th>Category</th><th>Service</th></tr></thead><tbody>
<?php

$q= mysqli_query($con, 'SELECT * FROM customer WHERE encountercat!=0 AND encounterservice !=0 ORDER BY id DESC');$i=0;
while ($data= mysqli_fetch_array($q)) {
	# code...



?>

                  	<tr><td><?php echo ++$i;?></td><td><?php echo $data['name'];?></td><td><?php echo $data['city'];?></td><td><?php echo $data['contact'];?></td><td><?php echo CastNamebyid($data['encountercat']);?></td><td><?php echo ServiceName($data['encounterservice']);?></td></tr>
<?php }?>
                  </tbody></table>
                </div><!-- /.info-box-content -->

<?php }else{?>
                <div class="info-box-content">
                  <span class="info-box-text">New Customer(Added by staff) List</span>
                  <table class="table table-responsive"><thead><tr><th>S No.</th><th>Customer</th><th>City</th><th>Phone</th></tr></thead><tbody>
<?php

$q= mysqli_query($con, 'SELECT * FROM customer WHERE stfid!=0 ORDER BY id DESC');$i=0;
while ($data= mysqli_fetch_array($q)) {
?>

                  	<tr><td><?php echo ++$i;?></td><td><?php echo $data['name'];?></td><td><?php echo $data['city'];?></td><td><?php echo $data['contact'];?></td></tr>
<?php }?>
                  </tbody></table>
                </div><!-- /.info-box-content -->

<?php }?>
              </div>

          </div></div></section></div>
  <?php include_once 'footer.php'; ?>