<?php include_once 'sidebar.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Customer Manage</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customer Manage</li>
      </ol>
    </section>
<?php $i=1;
$custm=mysqli_query($con,"SELECT `id`, `stfid`, `name`, `contact`, `city`, `pincode`, `address`, `panno`, `adharno`, `panphoto`, `aaphoto`, `photo`, `alternativenum`, `timedate` FROM `customer` WHERE (`stfid`='".$_SESSION['memid']."' || `stfid`=0) AND `id`='".$_GET['cid']."'  ORDER BY `timedate` DESC");
$rowcust=mysqli_fetch_array($custm);?>
    <section class="content">
      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <div align="center"><img class="profile-user-img img-responsive img-circle" src="../assets/docs/<?php echo ucwords($rowcust['photo']); ?>" alt="User profile picture" style="height:125px;"><?php if(empty($rowcust['photo'])){ ?><a href="customer-miss-data.php?newadd=pik&cid=<?php echo $_GET['cid'];?>" class="btn btn-info"> add photo</a><?php }?></div>
              <h3 class="profile-username text-center"><?php echo ucwords($rowcust['name']); ?></h3>
              <p class="text-muted text-center"><?php echo ucwords($rowcust['city']); ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Adhaar No.</b> <a class="pull-right"><?php echo $rowcust['adharno']; ?> </a>
                  <?php if (empty($rowcust['adharno'])) {
                   ?><a href="customer-miss-data.php?newadd=aadharno&cid=<?php echo $_GET['cid'];?>" class="btn btn-info"> Add </a><?php }?>
                </li>
                <li class="list-group-item">
                  <b>Pan No.</b> <a class="pull-right"><?php echo $rowcust['panno']; ?></a><?php if (empty($rowcust['panno'])) {
                   ?><a href="customer-miss-data.php?newadd=panno&cid=<?php echo $_GET['cid'];?>" class="btn btn-info"> Add </a><?php }?>
                </li>
                <li class="list-group-item">
                  <b>Register On</b> <a class="pull-right"><?php echo date('d, M-Y',strtotime($rowcust['timedate'])); ?></a>
                </li>
              </ul><?php if (empty($rowcust['aaphoto']) || empty($rowcust['panphoto'])) {
                   ?>
<a href="customer-miss-data.php?panadd=panphoto&aadharadd=aaphoto&cid=<?php echo $_GET['cid'];?>" class="btn btn-primary btn-block"><b>Add Document Photo</b></a><?php }?>
           <!--    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Current</a></li>
              <li><a href="#timeline" data-toggle="tab">TimeLine</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="post"><div class="table-responsive">
                 <table class="table table-striped" id="example1"><thead><tr><th>Sno.</th><th>Applicant</th><th>Apply For</th><th>Charge For</th><th>Status</th><th>Apply On</th></tr></thead><tbody><tr>
<?php $i=1;
$ress=mysqli_query($con,"SELECT `id`, `assign`, `stfid`, `applicantid`, `coupan`, `taskid`, `taskamt`, `taskdiscamt`, `assing`, `status`, `timedate`, `ip` FROM `task` WHERE `applicantid`='".$_GET['cid']."' AND `status`=0 ORDER BY `timedate` DESC");
while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $i; ?>.</td><th><?php echo CustNameM($rows['applicantid']); ?></th>
<th><?php echo ServiceName($rows['taskid']); ?></th>
<th>&#8377;:<?php echo ($rows['taskamt']); ?></th>
<td><?php echo applicationStatus($rows['status']); ?></td><td><?php echo showdate($rows['timedate']); ?></td>
</tr><?php  $i++;}?></tbody>
</table></div></div>
</div>
<div class="tab-pane" id="timeline"><div class="table-responsive"><table class="table table-striped" id="example2"><thead><tr><th>Sno.</th><th>Applicant</th><th>Apply For</th><th>Charge For</th><th>Status</th></tr></thead><tbody><tr>
<?php $i=1;
$ress=mysqli_query($con,"SELECT `id`, `assign`, `stfid`, `applicantid`, `coupan`, `taskid`, `taskamt`, `taskdiscamt`, `assing`, `status`, `timedate`, `ip` FROM `task` WHERE `applicantid`='".$_GET['cid']."' AND `status`!=0 ORDER BY `timedate` DESC");
while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $i; ?>.</td><th><?php echo CustNameM($rows['applicantid']); ?></th>
<th><?php echo ServiceName($rows['taskid']); ?></th>
<th>&#8377;:<?php echo ($rows['taskamt']); ?></th>
<td><?php echo applicationStatus($rows['status']); ?></td>
</tr><?php  $i++;}?></tbody>
</table></div>
              </div></div></div></div></div></section></div><?php include_once 'footer.php'; ?>