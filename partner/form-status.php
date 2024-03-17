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
    <section class="content-header">
      <h1><small>Application Manage</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Application Manage</li>
      </ol>
    </section>
    <section class="content">
            <a href="./"><< Back</a>
<div class="box box-default box-solid">
            <div class="box-header witd-border">
              <h3 class="box-title" style="color:#000;">Application List</h3>
              
            </div>
            <div class="box-body">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
<div class="table-responsive"><table class="table table-striped" id="example1"><tdead><tr><th>Sno.</th><th>Applicant</th><th>Category</th><th>Apply For</th><th> Type</th><th>Coupan Code</th><th>MRP</th><th>Discount Amount</th><th>Charge For</th><th>Status</th><th>Apply On</th><th>View</th></tr></thead><tbody><tr>
<?php $i=1;
$ress=mysqli_query($con,"SELECT * FROM `task` WHERE (`stfid`='".$_SESSION['memid']."'|| `stfid`=0)  ORDER BY `timedate` DESC"); 
while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $i; ?>.</td><td><?php echo CustNameM($rows['applicantid']); ?></td><td><?php echo GetCatName($rows['catid']);?></td>
<td><?php echo ServiceName($rows['taskid']); ?></td>
<td><?php if ($rows['stfid']==0) {echo 'By Own';}; if ($rows['stfid']!=0) {
                echo 'By Staff';
                }?></td>
<td><?php echo $rows['coupan']; ?></td>
<td>&#8377;:<?php echo ($rows['mrp']); ?></td>
<td>&#8377;:<?php echo ($rows['taskdiscamt']); ?></td>
<td>&#8377;:<?php echo ($rows['taskamt']); ?></td>
<td><?php echo applicationStatus($rows['status']); ?></td><td><?php echo showdate($rows['timedate']); ?></td>
<td><a href="view-applicant?id=<?php echo ($rows['id']); ?>" class="btn btn-info btn-sm">View</a></td>
</tr><?php  $i++;}?></tbody>
</table></div></div></section></div>
<?php include_once 'footer.php'; ?>