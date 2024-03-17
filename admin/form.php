<?php include 'sidebar.php'; 
if(isset($_POST['submit'])){
$namea=validate($_POST['name']);
$sql =mysqli_query($con,"INSERT INTO `cat`(`cast`) VALUES ('$namea')");
if($sql>0){echo "<script>window.open('category?success','_self')</script>";
}else{echo "<script>alert('Server Busy');window.open('category?failed','_self')</script>";
}       
} 
?> 
<div class="content-wrapper"><section class="content-header"><h1><small>Form Manage</small></h1>
<ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Form Manage</li></ol></section><section class="content">
            <a href="./"><< Back</a>
<div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title" style="color:#000;">Form List ~ <span class="label label-success"><?php echo ServiceName($_GET['id']); ?></span></h3>
               <!-- <div class="box-tools pull-right">
                <a href="category?add" type="button" class="btn btn-warning" style="border-radius:20%;color:#fff;">+ Add New</a>
              </div> -->
            </div>

            <div class="box-body">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
           <table class="table table-striped" id="example1"><thead><tr><th>Sno.</th><th>Category</th><th>Service</th><th>Apply On</th><th>Status</th><th>Assign</th></tr></thead><tbody><tr>
<?php $i=1;
$ress=mysqli_query($con,"SELECT `id`, `stfid`, `coupan`, `taskid`, `catid`,`taskamt`, `taskdiscamt`, `status`, `timedate`, `ip` FROM `task` WHERE `taskid`='".$_GET['id']."'  ORDER BY `timedate` DESC");
while($rows=mysqli_fetch_array($ress)){?>
 <td><?php echo $i; ?>.</td><td><?php echo GetCatName($rows['catid'])?></td><th><?php echo ServiceName($rows['taskid']); ?></th><td><?php echo showdate($rows['timedate']); ?></td><td><?php echo applicationStatus($rows['status']); ?></td>
<td><a href="form?assign=<?php echo $rows['id']; ?>">Assign</a></td>
</tr><?php  $i++;}?></tbody>
</table>
</div></section></div>
<?php include_once 'footer.php'; ?>