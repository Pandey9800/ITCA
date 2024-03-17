<?php include 'sidebar.php'; 
if(isset($_POST['submit'])){
$eid=validate($_POST['empid']);
$sql =mysqli_query($con,"UPDATE `task` SET `assign`='$eid' WHERE `id`='".trim($_GET['astaskid'])."'");
if($sql>0){echo "<script>window.open('all-form?success','_self')</script>";
}else{echo "<script>alert('Server Busy');window.open('all-form','_self')</script>";
}       
} 
?> 
<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Form Manage</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Form Manage</li>
      </ol>
    </section>
    <section class="content">
            <a href="./"><< Back</a>
            <?php if(isset($_GET['astaskid'])){?>
 <div class="box-body">
          <div class="row">
            <div class="col-md-3"></div><div class="col-md-6">
              <form method="post">
              <div class="form-group">
                <label>Assign To Employee</label>
                <select class="form-control select2" name="empid" style="width:100%;" required="required">
                  <option value="">Select</option>
                     <?php $i=1;
          $resss=mysqli_query($con,"SELECT `eno`, `username`,`first_name` FROM `ecounter` WHERE `employeetype`!='freelance' ORDER BY `timedate` DESC");
           while($rows=mysqli_fetch_array($resss)){?>
                  <option value="<?php echo $rows['eno']; ?>"><?php echo ucwords($rows['first_name']); ?> ~ <?php echo ($rows['username']); ?></option>
                  <?php }?>
                </select>
              </div>
              <hr/>
              <button class="btn btn-primary" type="submit" name="submit">Submit</button>
            </form>
            <?php }else{ ?>

<div class="box box-default box-solid">
            <div class="box-header with-border">  <?php if(isset($_GET['success'])){?>
<div class="col-md-4"></div><div class="col-md-4">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Success</h3>

              <div class="box-tools pull-right">
                <a href="all-form" type="button" ><i class="fa fa-times"></i></a>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">Assign Successfully
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div><div class="col-md-4"></div>
            <?php }?>
              <h3 class="box-title" style="color:#000;">Form Status</h3></div>
            <div class="box-body">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
          <table class="table table-striped" id="example1"><thead><tr><th>Sno.</th><th>Applicant</th><th>Category</th><th>Service</th><th>Assigned to</th><th>Status</th><th>Apply On</th><th>View</th></tr></thead><tbody><tr>
<?php $i=1;
$ress=mysqli_query($con,"SELECT `id`, `stfid`,`assign`, `applicantid`, `coupan`, `catid`,`taskid`, `taskamt`, `taskdiscamt`, `status`, `timedate`, `ip` FROM `task`  ORDER BY `timedate` DESC");
while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $i; ?>.</td><td><?php echo CustNameM($rows['applicantid']);?></td><td><?php echo getcatName(CatidByCatid($rows['taskid']));  ?></td><th><?php echo ServiceName($rows['taskid']); ?></th><td><?php if (!empty($rows['assign'])) {
 echo EcounterName($rows['assign']); 
}else{echo 'Not Assigned to any one';} ?></td><td><?php echo applicationStatus($rows['status']); ?></td><td><?php echo showdate($rows['timedate']); ?></td>
<td><a href="all-form?astaskid=<?php echo ($rows['id']); ?>" class="btn btn-info btn-sm"><?php if (empty($rows['assign'])) {?>Assign<?php }else{echo 'Reassign';} ?></a></td>
</tr><?php  $i++;}?></tbody>
</table>
</div></div>
</div>
<?php }?></section></div>
<?php include_once 'footer.php'; ?>