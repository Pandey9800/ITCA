 <?php include 'sidebar.php'; ?>
<div class="content-wrapper"><section class="content-header"><h1>Welcome<small>Back</small>
</h1><ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Dashboard</li></ol></section>

  <section class="content">
            <a href="./"><< Back</a>
<div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title" style="color:#000;">Application List</h3>
               <div class="box-tools pull-right">
               
              </div>
            </div>

            <div class="box-body">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
           <table class="table table-striped" id="example1">
                <thead>
                  <tr><th>Sno.</th><th>Applicant</th><th>Apply For</th><th>Type</th><th>Status</th><th>Apply On</th><th>View</th></tr>
                </thead>
                <tbody>
                  <tr>
                 <?php $i=1;
          $ress=mysqli_query($con,"SELECT `id`, `assign`, `stfid`, `applicantid`, `coupan`, `taskid`, `taskamt`, `taskdiscamt`, `assing`, `status`, `timedate`, `ip` FROM `task` WHERE assign ='".$_SESSION['memid']."'  ORDER BY `timedate` DESC");
           while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $i; ?>.</td><th><?php echo CustNameM($rows['applicantid']); ?></th><th><?php echo ServiceName($rows['taskid']); ?><br/><small>(<?php echo GetCatName(Service2Catid($rows['taskid'])); ?>)</small></th><td><?php if ($rows['stfid']==0) {echo 'By Own';}; if ($rows['stfid']!=0) {
                echo 'By Staff';
                }?></td><td><?php echo applicationStatus($rows['status']); ?></td><td><?php echo showdate($rows['timedate']); ?></td>
<td><a href="view-applicant-form?id=<?php echo ($rows['id']); ?>" class="btn btn-info btn-sm">View</a></td>
                  </tr>
                  <?php  $i++;}?>
                 
                </tbody>
              </table>
</div></section>
</div>
     <?php include_once 'footer.php'; ?>