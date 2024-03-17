<?php include 'sidebar.php'; 
if(isset($_POST['assign'])){
//assign->tskid,excutive
$sql =mysqli_query($con,"UPDATE `task` SET `assign`='".trim($_POST['excutive'])."', `status`=1 WHERE `id`='".trim($_POST['tskid'])."'");


$assignq = mysqli_query($con, 'INSERT INTO assignedlist(taskid, assign) VALUES("'.trim($_POST['tskid']).'","'.trim($_POST['excutive']).'")');
if($sql>0){
    echo "<script>alert('Assign Successfully');</script><meta http-equiv='refresh' content='0'/>";
} else {
    echo "<script>alert('Server Busy');</script><meta http-equiv='refresh' content='0'/>";
}       


} 
$tsl=mysqli_query($con,"SELECT `id`, `assign`, `stfid`, `applicantid`, `coupan`, `taskid`, `taskamt`, `taskdiscamt`, `assing`, `status`, `timedate`, `ip` FROM `task` WHERE `id`='".trim($_GET['taskid'])."'");
$runnx=mysqli_fetch_array($tsl); 
?> <style type="text/css">li, ul {  
list-style-type: none;  
font-weight: bold;  

}</style>
<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Add New User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New User</li>
      </ol>
    </section>
            <a href="create-new-user"><< Back</a>
    <section class="content">
           <div class="row">
<div align="center"><b><?php echo ServiceName($runnx['taskid']); ?></div>
            <div class="col-md-4">
               
               
          <div class="nav-tabs-custom">
            <div align="center"><b>Required Personal Document</b></div>
            <ul class="nav nav-tabs">
              <li></li>
            </ul>
              
              <div class="tab-pane" id="tab_2">
                  <form method="post"><br/>
                      <label>Assign To Work Executive</label> <a href="create-new-user?add" type="button">+ Add New</a>
                      <input type="hidden" name="tskid" value="<?php echo trim($_GET['taskid']); ?>">
                      <select class="form-control" name="excutive">
                         <option>Select</option> 
                         <?php $i=1;
          $ress=mysqli_query($con,"SELECT `eno`, `username`, `memcode`, `first_name` FROM `ecounter` WHERE `employeetype`='employee' ORDER BY `timedate` DESC");
          
           while($rows=mysqli_fetch_array($ress)){?>
           <option value="<?php echo $rows['eno']; ?>"><?php echo ucwords($rows['first_name']); ?> <?php echo ucwords($rows['memcode']); ?></option>
           <?php }?> 
                      </select><br/>
                     <div align="center"><button class="btn btn-primary btn-sm" name="assign">Submit</button></div><br/>
                     <?php //echo $_GET['astaskid'];
$dataq = mysqli_query($con," SELECT `assign` FROM `task` WHERE `id`='".trim($_GET['taskid'])."'");
$n = mysqli_num_rows($dataq);
$data = mysqli_fetch_assoc($dataq);

if ($n>0 && !empty($data['assign'])) {
  $dataq = mysqli_query($con," SELECT `assign` FROM `assignedlist` WHERE `taskid`='".trim($_GET['taskid'])."'");
while($data = mysqli_fetch_assoc($dataq)){
//print_r($data); 
echo '<br>'.EcounterName($data['assign']);
}
}
else{echo 'Not assigned to any one';}
?><br/>
                  </form>
               
              </div>

            </div>
            <!-- /.tab-content -->
          </div>
         
 <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Status</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                   <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><small style="color:#000;">Applicatant:</small><br/><?php  echo CustNameM($runnx['applicantid']); 
             // echo 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq';?></h3>

            </div>
          </div>
                
                  <div class="post">



                  <div class="col-sm-12">

                       <?php 
       $custsql=mysqli_query($con,"SELECT `id`, `stfid`, `name`, `contact`, `city`, `pincode`, `address`, `panno`, `adharno`, `panphoto`, `aaphoto`, `photo`, `alternativenum`, `timedate` FROM `customer` WHERE `id`='".trim($_GET['applicantid'])."'");
 $runcust=mysqli_fetch_assoc($custsql);

 //print_r($runcust);  
                ?>
  Personal Document
                <li class="list-group-item">
                  <b><?php //if (empty($runcust['pincode'])) {
              //echo 'Pin Code: ';echo $runcust['pincode'];
                //  } ?><?php //if (!empty($runcust['alternativenum'])) {
             // echo '<br>Alternate Number: ';echo $runcust['alternativenum'];
                //  } ?><?php if (!empty($runcust['city'])) {
              echo '<br>City: ';echo $runcust['city'];
                  } ?><?php //if (!empty($runcust['address'])) {
              //echo '<br>Adress: ';echo $runcust['address'];
               //   } ?><?php if (!empty($runcust['panno'])) {
              echo '<br>Pan No: ';echo $runcust['panno'];
                  } ?><?php if (!empty($runcust['panphoto'])) {
              echo '<br>Pan Photo';?>
<a href="../assets/docs/<?php echo ucwords($runcust['panphoto']); ?>" target="_blank" class="pull-right">View</a>
              <?php
                  } ?></b> 
                </li>

          Required Personal Document <br>    
<li>
 <ul>
  <b><?php //if (empty($runcust['pincode'])) {
//echo 'Pin Code';
            //      } ?><?php //if (empty($runcust['alternativenum'])) {
              //echo '<br>Alternate Number';
             //     } ?><?php if (empty($runcust['city'])) {
              echo '<br>City';
                  } ?><?php //if (empty($runcust['address'])) {
             // echo '<br>Adress';
              //    } ?><?php if (empty($runcust['panno'])) {
              echo '<br>Pan No';
                  } ?><?php if (empty($runcust['photo'])) {
              echo '<br>'.'Photo';
                  } ?><?php if (empty($runcust['aaphoto'])) {
              echo '<br>Pan Photo';
                  } ?><?php if (empty($runcust['aaphoto'])) {
              echo '<br>Aadhar Photo';
                  } ?></b> 

</li>

</ul>

                  </div>

                                        <div class="col-sm-12">
<?php

 $docqq=mysqli_query($con,"SELECT * FROM `servicedoc` WHERE serviceid='".trim($_GET['taskid'])."'"); $fd=0;
 $fd= mysqli_num_rows($docqq);

  //print_r($doref['fieldorfile']);
//   if ($doref['fieldorfile']==1) {
//  $docq=mysqli_query($con,"SELECT * FROM `forminput` WHERE
//  `taskno`='".$runapplicant['id']."' AND `docname`='".$doref['id']."'");   
// while($rrow=mysqli_fetch_array($docq)){

//  if(empty($rrow['docval'])){  ++$fd;}
// //print_r($rrow['docval']);
// //  echo 'doc';//++$fd;

// }


//   }
//   if ($doref['fieldorfile']==2) {

//      $docq=mysqli_query($con,"SELECT * FROM `forminput` WHERE
//  `taskno`='".$runapplicant['id']."' AND `docname`='".$doref['id']."'");   
// while($rrow=mysqli_fetch_array($docq)){

//   if (empty($rrow['docfile'])) {
// ++$fd;
//   }
// //print_r($rrow['docfile']);
//   //echo 'file';//++$fd;

// }

// }


if ($fd>0) {
   # code...
 

//                 while($rrow=mysqli_fetch_array($docq)){
// if(empty($rrow['docvalue']) || empty($rrow['docfile'])){

//  }
// }  echo $fd;
  # code...
?>
          Required Form Document<!-- (<a href="view-applicant?id=<?php //echo trim($_GET['id']);?>&update">Update</a>)  --><br> 
<?php 

} 
                ?>

<li>
 <ul>
  <b>
  <?php 
 //                $viewapplicant=mysqli_query($con,"SELECT `id`, `stfid`, `cusid`, `formid`, `docname`, `docfile` FROM `forminput` WHERE
 // `stfid`='".$runapplicant['stfid']."' AND `cusid`='".$runapplicant['applicantid']."' AND `taskno`='".$runapplicant['taskno']."'");
             $viewapplicant=mysqli_query($con,"SELECT * FROM `forminput` WHERE
 `taskno`='".trim($_GET['taskid'])."'");   
 $checkforminput = mysqli_num_rows($viewapplicant); 
while($doref = mysqli_fetch_array($docqq)){
  echo '<br>'.$doref['document'];}
// if ($checkforminput==0) {
//   # code...
// //echo 'missing data';

//   $sericedocq=mysqli_query($con,"SELECT * FROM `servicedoc` WHERE serviceid='".$runapplicant['taskid']."'");
//    //  $servicedocdata=mysqli_fetch_assoc($sericedocq);
//    // echo $c = mysqli_num_rows($sericedocq);

// while($servicedocdata=mysqli_fetch_array($sericedocq))
// {//$d[]=$servicedocdata;


//     $fincheckq=mysqli_query($con,"SELECT * FROM `forminput` WHERE
//  `taskno`='".$runapplicant['id']."' AND formid ='".$servicedocdata['serviceid']."'"); 
//    $fincheck = mysqli_num_rows($fincheckq);
//     if ($fincheck==0) {
//    echo '<br>'.$servicedocdata['document'];
//     }

// }
        ?>
    </b> 
<?php //}//}?>

</li>

</ul>

                  </div>
                  <p class="text-muted text-center">Uploaded Form Documents</p> 
                 <ul class="list-group list-group-unbordered">
                <?php 
 //                $viewapplicant=mysqli_query($con,"SELECT `id`, `stfid`, `cusid`, `formid`, `docname`, `docfile` FROM `forminput` WHERE
 // `stfid`='".$runapplicant['stfid']."' AND `cusid`='".$runapplicant['applicantid']."' AND `taskno`='".$runapplicant['taskno']."'");
             $viewapplicant=mysqli_query($con,"SELECT * FROM `forminput` WHERE
 `taskno`='".trim($_GET['taskid'])."'");   
                while($rrow=mysqli_fetch_array($viewapplicant)){ if (!empty($rrow['docfile'])) {
                  # code...
                ?>
                
                <li class="list-group-item">
                  <b><?php echo ucwords(getupDocsName($rrow['docname'])); ?></b> <a href="../assets/docs/<?php echo ucwords($rrow['docfile']); ?>" target="_blank" class="pull-right">View</a>
                </li>
               <?php } if (!empty($rrow['docval'])) {?>
 <li class="list-group-item">
                <p>  <b style="padding-right: 25px;"><?php echo ucwords(getupDocsName($rrow['docname'])); ?></b> <?php echo ucwords($rrow['docval']); ?></p>
                </li>

<?php
           }  }//echo count($rrow);// echo $runapplicant['taskid'];?>
              </ul>
                </div>
                
                <div class="post">
                  <div class="user-block">
                    <span class="description">Download & Review</span>
                  </div>
                  <div class="row margin-bottom">
                    <div class="col-sm-12">
<ul>
<?php  $status=mysqli_query($con,"SELECT `actiontyp`, `reason`, `file`, `timedate`, `ip` FROM `formreason` WHERE `taskid`='".trim($_GET['taskid'])."' ORDER BY ID DESC LIMIT 1");
if(mysqli_num_rows($status)>0){
while($rin=mysqli_fetch_array($status)){ ?>
<b><?php echo applicationStatus($rin['actiontyp']); ?></b> <?php echo $rin['reason'] ?> <?php if(!empty($rin['file'])){?>~ <a href="../assets/docs/<?php echo $rin['file']; ?>" target="_blank"> View <?php } ?></a>
<?php } }else{echo '<legend>Under Review</legend>';}?></ul>

                    </div>
                  </div>
                </div>
<div class="col-md-12"> 

  <div class="box box-danger direct-chat direct-chat-danger ">
            <div class="box-header with-border">
              
              <h3 class="box-title">Recent Chat<?php //print_r($_GET['message']);
              $tinfoq=mysqli_query($con,"SELECT * FROM `task` WHERE id='".trim($_GET['taskid'])."'");
    $tdata=mysqli_fetch_assoc($tinfoq);
//print_r($tdata);
              // echo isset($_GET['message']);

              ?></h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages ">
                <!-- Message. Default to the left -->

                <?php 

$chatq = mysqli_query($con, "SELECT * FROM recentchat WHERE'".$tdata['taskid']."' AND (wstfid='".$tdata['stfid']."' || wstfid='".$tdata['assign']."') AND (estfid='".$tdata['stfid']."' || estfid='".$tdata['assign']."') AND taskchatid ='".$tdata['id']."'");
                while ( $chatdata = mysqli_fetch_assoc($chatq)) {
                 # code...
               ?>
            <?php if(!empty($chatdata['wchat'])){?>   <button class="btn btn-info pull-right"><!--Work--><?php echo $chatdata['wchat']?></button> <br><br/>       <p class="pull-right"> <?php echo date("M/d/Y, h:i A ", strtotime($chatdata['wtime']));//echo $chatdata['wtime'];?></p> <br><br/><br/><br/><br/><?php }?>  <?php if(!empty($chatdata['echat'])){?>
              <button class="btn btn-warning pull-left"><!--Sales--> <?php echo $chatdata['echat']?></button>
             <?php //print_r($chatdata)?>
                  <?php echo '<br><br>'.date("M/d/Y, h:i A ", strtotime($chatdata['etime']));//echo $chatdata['wtime'];?><br/><br/><br/><br/><?php }?> 
     <?php } ?>
                </div>
             
              </div>
              <!-- /.direct-chat-pane -->
            </div></div>



          </div>  
       
<?php include_once 'footer.php'; ?>