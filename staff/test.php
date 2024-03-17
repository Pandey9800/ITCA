<?php include 'sidebar.php'; ?>
<div class="content-wrapper"><section class="content-header"><h1>Welcome<small>Back</small>
</h1><ol class="breadcrumb"><li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Dashboard</li></ol></section>
<?php if($emptyp!='employee'){ 



  ?>

<section class="content">
  
          <div class="row"><div class="col-md-8 col-sm-8 col-xs-12">
              <div class="box box-white box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Available Service</h3>

              <div class="box-tools pull-right">
                <a href="new-work"  class="btn btn-success btn-lg" style="border-radius:150px;"> + New Work</a>
              </div><hr/>
            <div class="box-body">
            <?php $service=mysqli_query($con,"SELECT `id`, `cast`, `timedate` FROM `cat` ORDER BY `cast` ASC");
            while($roww=mysqli_fetch_array($service)){?>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><?php  echo ucwords($roww['cast']);?></h3>
            </div>
            <div class="box-body">
             <a href="fill-from2?catid=<?php echo $roww['id']; ?>
          <?php //echo $roww['cast'];//instead name cast is there in table ?>" class="btn btn-primary btn-sm" style="background-color:blue;">Apply Now</a>
            </div></div></div>
          <?php }?>
         </div>
         </div>
        </div> </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Apply Status</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="example1" class="table table-responsive">
                 <?php $i=1;
          $ress=mysqli_query($con,"SELECT `taskid`, `status` FROM `task` WHERE `status`!=0 ORDER BY `timedate` DESC"); 
           while($rows=mysqli_fetch_array($ress)){?>
                <tr><td><b><?php echo ServiceName($rows['taskid']); ?></b></td>
                <td>
                <?php echo applicationStatus($rows['status']); ?></td>
                <td>...</td></tr>
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
                    <h5 class="description-header">0</h5>
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
                    <h5 class="description-header">30%</h5>
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
              <ul>
                <?php $notice=mysqli_query($con,"SELECT `id`, `stfid`, `msg`, `timedate` FROM `noticeboard` WHERE (`stfid`=0 || `stfid`='".$_SESSION['memid']."')");
                while($runnotice=mysqli_fetch_array($notice)){?>
                <li><i class="fa fa-check-circle-o text-green"></i> <?php echo ucwords($runnotice['msg']); ?></li>
              <?php }?>
              </ul>
            </div></div></div>
        <?php 





    $assigned1 = mysqli_query($con, 'SELECT  taskid, status FROM task WHERE assign ="'.$_SESSION['memid'].'"');
         $n = mysqli_num_rows($assigned1);
         while($assigned=mysqli_fetch_array($assigned1)) {
       $accu[]= $assigned;
         }




        $applicationsql=mysqli_query($con,"SELECT DISTINCT `status`, `taskid` FROM `task` WHERE (`assing`=0 || `assing`='".$_SESSION['memid']."')");

        $assigned1 = mysqli_query($con, 'SELECT DISTINCT taskid, status FROM task WHERE assign ="'.$_SESSION['memid'].'"');
         $n = mysqli_num_rows($assigned1);
       //   while($assigned=mysqli_fetch_array($assigned1)) {
       // $accu[]= $assigned;
       //   }
                while(($rrr=mysqli_fetch_array($applicationsql)) && ($assigned=mysqli_fetch_assoc($assigned1))){?>  
          <div class="col-md-4">
           <div class="box box-warning box-solid">
            <div class="box-header with-border">
             <h3 class="box-title"><?php echo strtoupper(ServiceName($rrr['taskid'])); ?><small style="color:#fff;">(<?php echo GetCatName(Service2Catid($rrr['taskid'])); ?>)</small></h3>
            </div>
            <div class="box-body">
              <ul>
                <li><i class="fa fa-check-circle-o"></i>           Pending: <b><?php if ($rrr['status']==0 || $rrr['status']==1) {$s=1;
               // echo $s;//print_r($accu);
               $z=0;
               foreach ($accu as $key => $value) {
      //   echo $value['status'];
         if ($rrr['taskid']==$value['taskid']) {
   $z++;
         }
               }echo $z;
                }


                //echo $assigned['taskid']?></b></li>
                <li><i class="fa fa-check-circle-o text-green"></i> Done:    <?php 
if ($rrr['status']==3) {$s=1;
               // echo $s;//print_r($accu);
               $z=0;
               foreach ($accu as $key => $value) {
      //   echo $value['status'];
         if ($rrr['taskid']==$value['taskid']) {
   $z++;
         }
               }echo $z;
                }else{echo $z=0;}?></b></li>
              </ul>
            </div>
          </div></div>
<?php }?>
</div></section>
<?php }?>
</div></div></div>
     <?php include_once 'footer.php'; ?>