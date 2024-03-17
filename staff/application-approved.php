<?php include 'sidebar.php'; 
if(isset($_POST['submit'])){
$namea=validate($_POST['name']);
$sql =mysqli_query($con,"INSERT INTO `cat`(`cast`) VALUES ('$namea')");
if($sql>0){echo "<script>window.open('category?success','_self')</script>";
}else{echo "<script>alert('Server Busy');window.open('category?failed','_self')</script>";
}       
} 
?> 
<div class="content-wrapper">
    <section class="content">
            <a href="./"><< Back</a>
<div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title" style="color:#000;">Approved/Success List</h3>
            </div>
<div class="box-body">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px"><div class="table-responsive">
<table id="example1" class="table table-bordered table-hover"><thead><tr><th>Sno.</th><th>Category</th><th>Service</th><th>Status</th><th>Apply On</th><th>View</th></tr></thead><tbody><tr>
<?php $i=1;
$ress=mysqli_query($con,"SELECT `id`, `stfid`, `coupan`, `taskid`,`catid`, `taskamt`, `taskdiscamt`, `status`, `timedate`, `ip` FROM `task` WHERE `stfid`='".$_SESSION['memid']."' AND `status`=2  ORDER BY `timedate` DESC");
while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $i; ?>.</td><th><?php echo getCatName($rows['catid']); ?></th><th><?php echo ServiceName($rows['taskid']); ?></th><td><?php echo applicationStatus($rows['status']); ?></td><td><?php echo showdate($rows['timedate']); ?></td>
<td><a href="view-applicant?id=<?php echo ($rows['id']); ?>" class="btn btn-info btn-sm">View</a></td>
</tr><?php  $i++;}?></tbody></table></div></div></section></div>
<?php include_once 'footer.php'; ?>