<?php include 'sidebar.php';
if(isset($_GET['taskid'])){
  $query="INSERT INTO coupan(formid, pin, amt, disamt, timedate, ip) VALUES('$selectforma','".$epin[$i]."',".$formpricea.",".$dispricea.",'".date('Y-m-d')."','".$ip."'";
            mysqli_query($con,$query) or die(mysqli_error($con));
}
if(isset($_GET['accept'])){
$applicant=id2userid(trim($_GET['appliid'])); 
   $app=mysqli_query($con,"SELECT `mrp`,`taskamt` FROM `task` WHERE `id`='".trim($_GET['accept'])."'")or die(mysqli_error($con)); 
    $fl=mysqli_fetch_array($app);
$cherge=$fl['mrp'];
$disc=$fl['taskamt'];
$xxv=mysqli_query($con,"SELECT `id`, `level`, `commission` FROM `commission`")or die(mysqli_error($con));
while($run=mysqli_fetch_array($xxv)){
$per[]=$run['commission'];
}  

$sponsorlst=getchildupline(($applicant));
$ucode=md5(time());
$x=1; 
for($i=0;count($sponsorlst)>$i; $i++){
  $amtgen=round(($cherge*($per[$i]/100)),2);

$insert= mysqli_query($con,"INSERT INTO `transactions`(`formid`,`transfer_from`, `transfer_to`, `transaction_for`, `amount`) VALUES ('".trim($_GET['accept'])."','admin','$applicant','referincome','$amtgen')")or die(mysqli_error($con));

$memupdate=mysqli_query($con,"UPDATE `ecounter` SET `incentive`=`incentive`+'$amtgen' WHERE `username`='".$sponsorlst[$i]."'");

}
$update=mysqli_query($con,"UPDATE `task` SET `status`=2 WHERE `id`='".trim($_GET['accept'])."'");

if($update>0){
  header("Location: dashboard");
  exit();
}}
?>

<div class="content-wrapper"><section class="content-header"><h1>Welcome<small>Back</small></h1><ol class="breadcrumb"><li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Dashboard</li></ol></section>
        <section class="content">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-white" style="background-color:#F8FAFA"><i class="fa  fa-user-secret" style="color:orange;"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Sales Excutive</span>
                  <span class="info-box-number"><?php  echo EcounterType('freelance');?>
                   <small></small></span>
                </div></div></div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-default" style="background-color:#F8FAFA"><i class="fa fa-sitemap" style="color:red;"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Work Executive</span>
                  <span class="info-box-number"><?php  echo EcounterType('employee');?></span>
                </div></div></div>
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-default" style="background-color:#F8FAFA"><i class="fa fa-edit" style="color:green;"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Today's Work</span>
                  <span class="info-box-number">
          <?php 
         $ress=mysqli_query($con, "SELECT COUNT(`tehsil`) AS Num2  FROM `level` GROUP BY tehsil");
                 $userRow1=mysqli_fetch_assoc($ress);
                 echo $userRow1['Num2'];
          ?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-default" style="background-color:#F8FAFA"><i class="fa fa-cubes"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Work</span>
                  <span class="info-box-number"><?php 
          $ress=mysqli_query($con, "SELECT * FROM ecounter");
                   $userRow1=mysqli_num_rows($ress);
            echo $userRow1;
          ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
<div class="box box-white box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Application Status</h3>
            </div> 
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-bordered" id="example1" style="width:100%">
               <thead> <tr>
<th>S No.</th><th>IN</th> <th>Category</th><th>Service</th><th>Applicant Details</th><th> Type</th><th>Applied On</th> <th >Status</th><th>Details</th></tr></thead><tbody>
                
                <?php
        $i=0;
        $app=mysqli_query($con,"SELECT `id`, `assign`, `stfid`, `applicantid`, `coupan`, `catid`,`taskid`, `taskamt`, `taskdiscamt`, `assing`, `status`, `timedate`, `ip` FROM `task` ORDER BY `timedate` DESC")or die(mysqli_error($con)); 
        while($fl=mysqli_fetch_array($app)){
        $i++;?><tr>
          <td><?php echo $i;  ?></td>
             <td><?php if($fl['status']==1){ ?><a href="dashboard?accept=<?php echo $fl['id']; ?>&appliid=<?php echo $fl['applicantid']; ?>" onclick="return confirm('Do You Want to Accept')" class="btn btn-warning btn-sm">Accept</a><?php }else{ ?> <b style="color:green;">Active</b><?php }?></td> 
                <td><?php echo getcatName(CatidByCatid($fl['taskid']));?></td>
                <td><?php echo ServiceName($fl['taskid']);?></td>
                <td><?php $sid = $fl['applicantid'];  echo CustNameM($sid);  ?></td><td><?php if ($fl['stfid']==0) {echo 'By Own';}; if ($fl['stfid']!=0) {
                echo 'By Staff';
                }?></td>
                <td><?php echo date('d, M-Y',strtotime($fl['timedate'])); ?></td>
                <td><?php echo applicationStatus($fl['status']); ?></td>
                
                <td><a href="view-form.php?taskid=<?php echo $fl['id']?>&applicantid=<?php echo $fl['applicantid'];?>" class="btn btn-default"><i class="fa fa-eye"></i></a></td>
                </tr>
                <?php } ?></tbody></table>
               </div></div>
             
  <div class="row">
           <div class="col-md-6">
               <div class="box box-white box-solid" style="background-color:#F8FAFA">
            <div class="box-header with-border">
              <h3 class="box-title">Current Active</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered responsive-table" style="width:100%">
                <tr>
                <th>#</th><th>Staff</th><th>Status</th>
                </tr><?php $i=0;
        $app=mysqli_query($con,"SELECT `id`, `memid`, `datetime` FROM `currentlogin` ORDER BY `memid` DESC"); 
        while($fl=mysqli_fetch_array($app)){?>
                 <tr>
                <td><?php echo $i;  ?>.</td>
                <td><?php echo ucwords($fl['name']);  ?> ~ <span class="label label-default"><?php echo ucwords($fl['design']);  ?></span></td>
                <td><?php if($fl['pid']==1){  ?><a href="#"><i class="fa fa-circle text-success"></i> Online</a><?php }else{?><a href="#"><i class="fa fa-circle text-red"></i> Offline</a><?php }?></td>
                </tr>
                <?php $i++;} ?>
              </table>
               </div></div></div>
               
                   <div class="col-md-6"><div class="box box-white box-solid" style="background-color:#F8FAFA">
            <div class="box-header with-border">
              <h3 class="box-title">Commission Slab</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                      <table class="table table-bordered responsive-table" style="width:100%">
                <tr>
                <th>#</th><th>Zone</th><th>Commission (%)</th>
                </tr>
                
                <?php
        // $appz=mysqli_query($con,"SELECT `id`, `form_name`, `section_name`, `commission` FROM `commission`"); 
        // while($fl=mysqli_fetch_array($appz)){
        // $i++;
        ?>
                 <!-- <tr>
                <td><?php //echo $i;  ?></td>
                <td><span class="label label-default"><?php ///echo ucwords($fl['section_name']);  ?></span></td>
                <td><?php //echo ucwords($fl['commission']);  ?></td>
                </tr> -->
                <?php //} ?>
                
                </table>
               </div>
               </div></div></div>
              </section></div>
     <?php include_once 'footer.php'; ?>