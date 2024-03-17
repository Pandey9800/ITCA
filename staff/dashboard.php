<?php include 'sidebar.php'; ?>
<div class="content-wrapper"><section class="content-header"><h1>Welcome<small> Back </small>
</h1><ol class="breadcrumb"><li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Dashboard</li></ol></section>
<?php if($emptyp!='employee'){ ?>
<section class="content">
  
          <div class="row"><div class="col-md-8 col-sm-8 col-xs-12">
              <div class="box box-white box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Available Service</h3>

              <div class="box-tools pull-right">
                <a href="new-work"  class="btn btn-success btn-lg" style="border-radius:150px;"> + New Work</a>
              </div><hr/>
            <div class="box-body">

 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Service</th>
                  <th>Documents</th>
                  <th>Charge</th>
                </tr>
                </thead>
                <tbody>
                  <?php $service=mysqli_query($con,"SELECT `id`, `catid`, `name`, `sdetail`, `cost`, `advrequired`, `advper`, `duedays`, `duepay`, `type`, `pic`, `timedate` FROM `service` ORDER BY `name` ASC");
            while($roww=mysqli_fetch_array($service)){?>
                <tr>
                  <td><?php echo ucwords($roww['name']); ?></td>
                   <td><?php $sqll=mysqli_query($con,"SELECT `id`, `docid`, `serviceid`, `document`, `type`, `fieldorfile`, `status` FROM `servicedoc` WHERE `serviceid`='".trim($roww['id'])."'");
                   while($rw=mysqli_fetch_array($sqll)){
                    echo ucwords($rw['document']).'<br/>';}?></td>
                    <td>&#8377;: <?php echo ($roww['cost']); ?></td>
                </tr>
              <?php }?>
              </tbody>
            </table>


           
         </div>
         </div>
        </div> </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
<div class="box box-success" >
            <div class="box-header with-border">
              <h3 class="box-title">Apply Status</h3>
            </div>
            <!-- /.box-header -->
          <div class="box-body" >
             <table id="example1" class="table table-responsive" >
             <b> <tr><th>Service Name</th><th> Status</th><th>Total</th></tr></b>
                 <?php $i=1; $ap=0;          
                 
          $ress=mysqli_query($con,"SELECT DISTINCT `taskid`, `status` FROM `task` WHERE (`stfid`='".$_SESSION['memid']."' || `stfid`=0) ORDER BY `timedate` DESC"); 
           while($rows=mysqli_fetch_array($ress)){?>
                <tr><td style="width:100px;"><?php echo ServiceName($rows['taskid']); //echo $rows['taskid'];

$catq=mysqli_query($con, 'SELECT catid FROM task WHERE taskid="'.$rows['taskid'].'"'); $catd=mysqli_fetch_assoc($catq);
//print_r($catd['catid']);
echo '<br>'.'('.GetCatName($catd['catid']).')';

                 ?></td>
                <td>
              <a href="form-status">   <?php echo applicationStatus($rows['status']); ?></a> </td>
                <td><?php if ($rows['status']==0 || $rows['status']==1) {
 $statq=mysqli_query($con,"SELECT  `status` FROM `task` WHERE  (`stfid`='".$_SESSION['memid']."' || `status`=0)AND `taskid` ='".$rows['taskid']."' AND (`status`=0 || `status`=1)");
     $apn = mysqli_num_rows($statq);
  echo $apn;
                }

                if ($rows['status']==2) {

$statq=mysqli_query($con,"SELECT  `status` FROM `task` WHERE  (`stfid`='".$_SESSION['memid']."' || `stfid`=0)AND `taskid` ='".$rows['taskid']."' AND (`status`=2)");
     $apn = mysqli_num_rows($statq);
  echo $apn;
                }

if ($rows['status']==3) {

$statq=mysqli_query($con,"SELECT  `status` FROM `task` WHERE  (`stfid`='".$_SESSION['memid']."' || `stfid`=0)AND `taskid` ='".$rows['taskid']."' AND (`status`=3)");
     $apn = mysqli_num_rows($statq);
  echo $apn;
                }

                ?></td></tr>
              <?php }?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>  
          </div>    
</section>
<?php }else{ ?>
  <section class="content">
            <a href="./"><< Back</a><br/>
        <div class="col-md-4">
          <div class="box box-widget widget-user" style="background-image: url('../images/backgif.gif');">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header">
              <h3 class="widget-user-username" style="color:#fff;"><?php echo ucwords($userRow['first_name']); ?></h3>
              <h5 class="widget-user-desc" style="color:#fff;">Employee</h5>
            </div>
            <div class="widget-user-image text-center">
              <img class="img-circle" src="../images/<?php echo $userRow['pic']; ?>" style="width:100px;height:100%;" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><!--0
-->
<?php 

    $assigned1 = mysqli_query($con, 'SELECT status FROM task WHERE assign ="'.$_SESSION['memid'].'"  AND status =2');
      echo   $n = mysqli_num_rows($assigned1);

?>

                    </h5>
                    <span class="description-text">Done Task</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">0</h5>
                    <span class="description-text">Ranking</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">30%
<?php

//  $assigned1 = mysqli_query($con, 'SELECT status FROM task WHERE assign ="'.$_SESSION['memid'].'"  AND (status =2 || status =3) ');
//          $n2 = mysqli_num_rows($assigned1);

// $pending =$n;
// $given =$n2;
//  $errorRate = (($given-$pending)/$given)*100;
// echo $acc = 100-$errorRate;

?>

                    </h5>
                    <span class="description-text">Accuracy</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
      
              <div class="col-md-4">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Notice Board</h3>
            </div>
            <div class="box-body">
              <ul class="no-bullets">
                <?php $notice=mysqli_query($con,"SELECT `id`, `stfid`, `msg`, `timedate` FROM `noticeboard` WHERE (`stfid`=0 || `stfid`='".$_SESSION['memid']."')");
                while($runnotice=mysqli_fetch_array($notice)){?>
                <li><i class="fa fa-check-circle-o text-green"></i> <?php echo ucwords($runnotice['msg']); ?></li>

              </ul></div></div></div>
<div class="col-md-4 ">
<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Apply Status</h3>
            </div>
            <!-- /.box-header -->
          <div class="box-body">
             <table id="example1" class="table table-responsive">
              <tr><th>Service Name</th><th> Status</th><th>Total</th></tr>
                 <?php $i=1; $ap=0;          
                 
          $ress=mysqli_query($con,"SELECT DISTINCT `taskid`, `status` FROM `task` WHERE `assign`='".$_SESSION['memid']."' ORDER BY `timedate` DESC"); 
           while($rows=mysqli_fetch_array($ress)){?>
                <tr><td><?php echo ServiceName($rows['taskid']);
$catq=mysqli_query($con, 'SELECT catid FROM task WHERE taskid="'.$rows['taskid'].'"'); $catd=mysqli_fetch_assoc($catq);
//print_r($catd['catid']);
echo '<br>'.'('.GetCatName($catd['catid']).')'; ?></td>
                <td>
              <a href="application?type=<?php echo $rows['taskid'];?>">   <?php echo applicationStatus($rows['status']); ?></a> </td>
                <td><?php if ($rows['status']==0 || $rows['status']==1) {
 $statq=mysqli_query($con,"SELECT  `status` FROM `task` WHERE  `assign`='".$_SESSION['memid']."' AND `taskid` ='".$rows['taskid']."' AND (`status`=0 || `status`=1)");
     $apn = mysqli_num_rows($statq);
  echo $apn;
                }

                if ($rows['status']==2) {

$statq=mysqli_query($con,"SELECT  `status` FROM `task` WHERE  `assign`='".$_SESSION['memid']."' AND `taskid` ='".$rows['taskid']."' AND (`status`=2)");
     $apn = mysqli_num_rows($statq);
  echo $apn;
                }

if ($rows['status']==3) {

$statq=mysqli_query($con,"SELECT  `status` FROM `task` WHERE  `assign`='".$_SESSION['memid']."' AND `taskid` ='".$rows['taskid']."' AND (`status`=3)");
     $apn = mysqli_num_rows($statq);
  echo $apn;
                }

                ?></td></tr>
              <?php }?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>  
          </div>    
</div></section>
<?php }}?>
</div></div></div>
     <?php include_once 'footer.php'; ?>