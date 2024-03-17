 <?php include 'sidebar.php'; ?>
<div class="content-wrapper"><section class="content-header"><h1><!--Welcome--><small><!--Back--></small>
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
           <table class="table table-striped" class="example1">
                <thead>
                  <tr><th>Sno.</th><th>Applicant</th><th>Category</th><th>Service</th><th>Status</th><th>Apply On</th><th>View</th></tr>
                </thead>
                <tbody>
                  <tr>
                 <?php $i=1;
          $ress=mysqli_query($con,"SELECT `id`, `stfid`,`catid`,`applicantid`, `coupan`, `taskid`, `taskamt`, `taskdiscamt`, `status`, `timedate`, `ip` FROM `task` WHERE `taskid`='".trim($_GET['type'])."' AND assign='".$_SESSION['memid']."' ORDER BY `timedate` DESC");
           while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $i; ?>.</td><td><?php $sid = $rows['applicantid'];  echo CustNameM($sid);  ?></td><td><?php echo getcatName($rows['catid']);  ?><th><?php echo ServiceName($rows['taskid']); ?></th><td><?php echo applicationStatus($rows['status']); ?></td><td><?php echo showdate($rows['timedate']); ?></td>
<td><a href="view-applicant-form?id=<?php echo ($rows['id']); ?>" class="btn btn-info btn-sm">View</a></td>
                  </tr>
                  <?php  $i++;}?>
                 
                </tbody>
              </table>
</div></section>
</div>
     <?php include_once 'footer.php'; ?>