<?php include 'sidebar.php'; 
if(isset($_POST['submit'])){
$eid=validate($_POST['empid']);
$sql =mysqli_query($con,"UPDATE `task` SET `assign`='$eid' WHERE `id`='".trim($_GET['astaskid'])."'");
$assignlistq =mysqli_query($con, 'INSERT INTO assignedlist(taskid, assign)VALUES("'.trim($_GET['astaskid']).'","'.$eid.'")');
if($sql>0){echo "<script>window.open('all-form?success','_self')</script>";
}else{echo "<script>alert('Server Busy');window.open('all-form','_self')</script>";
}}
if (isset($_GET['message'])) {
  $tinfoq=mysqli_query($con,"SELECT * FROM `task` WHERE id='".trim($_GET['id'])."'");
  $tdata=mysqli_fetch_assoc($tinfoq);
//print_r($tdata);$MyPHPStringVar=1;
$sendq=mysqli_query($con, "INSERT INTO `recentchat`( `estfid`,`wstfid`, `echat`, `taskid`,`taskchatid`) VALUES ('".$tdata['stfid']."', '".$tdata['assign']."','".trim($_GET['message'])."','".$tdata['taskid']."','".$tdata['id']."')");
//$MyPHPStringVar=1;
echo "<script>
window.open('view-applicant?id=".trim($_GET['id'])."','_self')</script>";
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

</div><div class="col-md-3">          <label>Prevoiusly assigned to :</label>

<?php //echo $_GET['astaskid'];
$dataq = mysqli_query($con," SELECT `assign` FROM `assignedlist` WHERE `taskid`='".trim($_GET['astaskid'])."'");
$n = mysqli_num_rows($dataq);
$data = mysqli_fetch_assoc($dataq);

if ($n>0 && !empty($data['assign'])) {
  $dataq = mysqli_query($con," SELECT `assign` FROM `assignedlist` WHERE `taskid`='".trim($_GET['astaskid'])."' ORDER BY aid DESC");
while($data = mysqli_fetch_array($dataq)){
//print_r($data); 
echo EcounterName($data['assign']).'<br>';
}
}
else{echo 'Not assigned to any one';}
?>

</div>

<div class="col-md-12">
  
 <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Status</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                   <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><small style="color:#000;">Applicatant:</small><br/><?php  
  $dataq = mysqli_query($con," SELECT * FROM `task` WHERE `id`='".trim($_GET['astaskid'])."'");
$runnx = mysqli_fetch_assoc($dataq);
              echo CustNameM($runnx['applicantid']); 
             // echo 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq';?></h3>

            </div>
          </div>
                
                <div class="post">

                      <div class="col-sm-12">Required Document
      <?php 
 //                $viewapplicant=mysqli_query($con,"SELECT `id`, `stfid`, `cusid`, `formid`, `docname`, `docfile` FROM `forminput` WHERE
 // `stfid`='".$runapplicant['stfid']."' AND `cusid`='".$runapplicant['applicantid']."' AND `taskno`='".$runapplicant['taskno']."'");
             $viewapplicant=mysqli_query($con,"SELECT * FROM `forminput` WHERE
 `taskno`='".$runnx['id']."'");   
                while($rrow=mysqli_fetch_array($viewapplicant)){  
                  $formdata[]=$rrow;}
                  $nim = mysqli_num_rows($viewapplicant);
                  if($nim>0){
                  for ($i=0; $i < count($formdata); $i++) { 
                  
                ?>

<?php if (empty($formdata[$i]['docfile']) && is_null($formdata[$i]['docval'])) {
  # code...
 ?>
     <li class="list-group-item">
                  <b><?php echo ucwords(getupDocsName($formdata[$i]['docname'])); ?></b> <a href="../assets/docs/<?php echo ucwords($rrow['docfile']); ?>" target="_blank" class="pull-right"><!--View--></a>
                </li><?php } ?>
               <?php  if (empty($formdata[$i]['docval']) && is_null($formdata[$i]['docfile'])) {?>
 <li class="list-group-item">
                <p>  <b style="padding-right: 55px;"><?php echo ucwords(getupDocsName($formdata[$i]['docname'])); ?></b> <?php //echo ucwords($rrow['docval']); ?></p>
                </li>

<?php
           } } }//echo count($rrow);// echo $runapplicant['taskid'];?>
              </ul>
<?php /*$viewapplicant=mysqli_query($con,"SELECT `id`, `stfid`, `cusid`, `formid`, `docname`, `docfile` FROM `forminput` WHERE 

   `formid`='".$runapplicant['taskid']."' AND `cusid`='".$runapplicant['applicantid']."' AND `stfid`='".$runapplicant['stfid']."'");
                 `stfid`='".$runapplicant['stfid']."' 
                while($rrow=mysqli_fetch_array($viewapplicant)){print_r($rrow);}echo empty($rrow);*/ ?>
                  </div>
                <p class="text-muted text-center">Uploaded Documents</p> 
                 <ul class="list-group list-group-unbordered">
                <?php 
 //                $viewapplicant=mysqli_query($con,"SELECT `id`, `stfid`, `cusid`, `formid`, `docname`, `docfile` FROM `forminput` WHERE
 // `stfid`='".$runapplicant['stfid']."' AND `cusid`='".$runapplicant['applicantid']."' AND `taskno`='".$runapplicant['taskno']."'");
             $viewapplicant=mysqli_query($con,"SELECT * FROM `forminput` WHERE
 `taskno`='".$runnx['id']."'");   
                while($rrow=mysqli_fetch_array($viewapplicant)){ if (!empty($rrow['docfile'])) {
                  # code...
                ?>
                
<li class="list-group-item">
    <?php 
        $docName = getupDocsName($rrow['docname']);
        $formattedDocName = $docName !== null ? ucwords($docName) : null;
    ?>
    <b><?php echo $formattedDocName; ?></b>
    <?php if ($formattedDocName !== null): ?>
        <a href="../assets/docs/<?php echo $rrow['docfile']; ?>" target="_blank" class="pull-right">View</a>
    <?php endif; ?>
</li>

               <?php } if (!empty($rrow['docval'])) {?>
 <li class="list-group-item">
                <p>  <b style="padding-right: 25px;"><?php echo ucwords(getupDocsName($rrow['docname'])); ?></b> <?php echo ucwords($rrow['docval']); ?></p>
                </li>

<?php
           }  }//echo count($rrow);// echo $runapplicant['taskid'];?>
              </ul>
<?php /*$viewapplicant=mysqli_query($con,"SELECT `id`, `stfid`, `cusid`, `formid`, `docname`, `docfile` FROM `forminput` WHERE 

   `formid`='".$runapplicant['taskid']."' AND `cusid`='".$runapplicant['applicantid']."' AND `stfid`='".$runapplicant['stfid']."'");
                 `stfid`='".$runapplicant['stfid']."' 
                while($rrow=mysqli_fetch_array($viewapplicant)){print_r($rrow);}echo empty($rrow);*/ ?>
 <!--  AND `cusid`='".$runapplicant['applicantid']."' 
  AND
-->
                </div>
                
                <div class="post">
                  <div class="user-block">
                    <span class="description">Download & Review</span>
                  </div>
                  <div class="row margin-bottom">
                    <div class="col-sm-12">
<ul>
<?php  $status=mysqli_query($con,"SELECT `actiontyp`, `reason`, `file`, `timedate`, `ip` FROM `formreason` WHERE `taskid`='".trim($_GET['astaskid'])."' ORDER BY ID DESC LIMIT 1");
if(mysqli_num_rows($status)>0){
while($rin=mysqli_fetch_array($status)){ ?>
<b><?php echo applicationStatus($rin['actiontyp']); ?></b> <?php echo $rin['reason'] ?> <?php if(!empty($rin['file'])){?>~ <a href="../assets/docs/<?php echo $rin['file']; ?>" target="_blank"> View <?php } ?></a>
<?php } }else{echo '<legend>Under Review</legend>';}?></ul>

                    </div>
                  </div>
                </div>

       <div class="col-md-12">
             <style type="text/css">
    </style><br>

<div class="col-sm-12">
          <div class="box box-danger direct-chat direct-chat-danger ">
            <div class="box-header with-border">
              <h3 class="box-title">Recent Chat <?php //print_r($_GET['message']); -->
             $tinfoq=mysqli_query($con,"SELECT * FROM `task` WHERE id='".trim($_GET['astaskid'])."'");
   $tdata=mysqli_fetch_assoc($tinfoq);
print_r($tdata);
               echo isset($_GET['message']);?></h3>
             </div>
            <div class="box-body">
              <div class="direct-chat-messages ">
              <?php 
$chatq = mysqli_query($con, "SELECT * FROM recentchat WHERE taskid='".$tdata['taskid']."' AND (wstfid='".$tdata['stfid']."' || wstfid='".$tdata['assign']."') AND (estfid='".$tdata['stfid']."' || estfid='".$tdata['assign']."') AND taskchatid ='".$tdata['id']."'");
                while ( $chatdata = mysqli_fetch_assoc($chatq)) {
                 # code...
               ?>
            <?php if(!empty($chatdata['wchat'])){?>   <button class="btn btn-info pull-right"><!--Work--><?php echo $chatdata['wchat']?></button> <br><br/> <p class="pull-right"> <?php echo date("M/d/Y, h:i A ", strtotime($chatdata['wtime']));//echo $chatdata['wtime'];?></p> <br><br/><br/><br/><br/><?php }?>  <?php if(!empty($chatdata['echat'])){?>
              <button class="btn btn-warning pull-left"><!--Sales--> <?php echo $chatdata['echat']?></button>
             <?php //print_r($chatdata)?>
                  <?php echo '<br><br>'.date("M/d/Y, h:i A ", strtotime($chatdata['etime']));//echo $chatdata['wtime'];?><br/><br/><br/><br/><?php }?> 
     <?php } ?>
                </div>
             
              </div>
              <!-- /.direct-chat-pane -->
            </div>
</div>
            <div class="box-footer">
              <form action="#" >
                <div class="input-group">
                  <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger btn-flat">Send</button>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                  </span>
                </div>
              </form>
            </div>
           </div>
</div><?php }else{ ?>

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
              <h3 class="box-title" style="color:#000;"> New Form List</h3></div>
            <div class="box-body">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
          <table class="table table-striped" id="example1"><thead><tr><th>Sno.</th><th>Applicant </th><th>Category</th><th>Serivce</th><th>Status</th><th>Apply On</th><th>View</th></tr></thead><tbody><tr>
<?php $i=1;
$ress=mysqli_query($con,"SELECT `id`,`applicantid`, `stfid`, `coupan`,`catid`, `taskid`, `taskamt`, `taskdiscamt`, `status`, `timedate`, `ip` FROM `task` WHERE `assign`=0 ORDER BY `timedate` DESC");
while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $i; ?>.</td><td><?php echo CustNameM($rows['applicantid']);?></td><td><?php echo getcatName(CatidByCatid($rows['taskid']));  ?></td><th><?php echo ServiceName($rows['taskid']); ?></th><td><?php echo applicationStatus($rows['status']); ?></td><td><?php echo showdate($rows['timedate']); ?></td>
<td><a href="all-form?astaskid=<?php echo ($rows['id']); ?>" class="btn btn-info btn-sm">Assign</a></td>
</tr><?php  $i++;}?></tbody>
</table>
</div></div>

</div>
<?php }?></section></div>

<?php include_once 'footer.php'; ?>