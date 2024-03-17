<?php include 'sidebar.php';
$applicant=mysqli_query($con,"SELECT `id`,`applicantid`, `stfid`, `coupan`, `taskid`,`catid`, `taskamt`, `taskdiscamt`, `status`, `timedate`, `ip` FROM `task` WHERE `id`='".trim($_GET['id'])."'");
$runapplicant=mysqli_fetch_array($applicant); 
  
if(isset($_POST['submit'])){
  $statusactive=validate($_POST['action']);
  $applicant=mysqli_query($con,"UPDATE `task` SET `status`='".$statusactive."' WHERE `id`='".trim($_GET['id'])."'"); 
  $uploadFolder = '../assets/docs/';
  $imageTmpName = $_FILES['file']['tmp_name'];
  $imageName =explode(".", $_FILES['file']['name']);
  $file = md5(uniqid()). '.' . end($imageName);
  $result = move_uploaded_file($imageTmpName,$uploadFolder.$file);
  if(!empty($_POST['comment'])){
     $reason=validate($_POST['comment']);
  }elseif(!empty($_POST['commenttwo'])){
     $reason=validate($_POST['commenttwo']);
  }elseif(!empty($_POST['commentthree'])){
     $reason=validate($_POST['commentthree']); 
  }
  $asdate=validate($_POST['assigndate']); 
  $sqltest=mysqli_query($con,"SELECT `formid`,`actiontyp`,`asdate`, `reason`, `file`, `ip` FROM `formreason` WHERE id='".trim($_GET['id'])."'");
 $n=mysqli_num_rows($sqltest);
if (empty($_POST['comment'])) {
  $reason='';
}
if (empty($_FILES['file']['tmp_name'])) {
  $file='';
}
$formid = $_POST['formid'];
	$sql=mysqli_query($con,"INSERT INTO `formreason`(`taskid`,`formid`,`actiontyp`,`asdate`, `reason`, `file`, `ip`) VALUES ('".trim($_GET['id'])."','".$formid."','".$statusactive."','".$asdate."','".$reason."','".$file."','".$ip."')");

  if($applicant>0 && $sql>0){

    echo "<script>window.open('view-applicant-form?id=".trim($_GET['id'])."&success','_self')</script>";

  }else{

    echo "<script>window.open('view-applicant-form?id=".trim($_GET['id'])."&fail','_self')</script>";

  }
}

// send starts
if(isset($_GET['message'])) {
    $tinfoq=mysqli_query($con,"SELECT * FROM `task` WHERE id='".trim($_GET['id'])."'");
    $tdata=mysqli_fetch_assoc($tinfoq);
//print_r($tdata);$MyPHPStringVar=1;
$sendq=mysqli_query($con,"INSERT INTO `recentchat`( `estfid`,`wstfid`, `wchat`, `taskid`,`taskchatid`) VALUES ('".$tdata['stfid']."', '".$tdata['assign']."','".trim($_GET['message'])."','".$tdata['taskid']."','".$tdata['id']."')");
//$MyPHPStringVar=1;
//header("Location: view-applicant-form?id=".trim($_GET['id']));
  echo "<script>window.open('view-applicant-form?id=".trim($_GET['id'])."','_self')</script>";
}
// send ends
?><style type="text/css">li, ul {  
list-style-type: none;  
font-weight: bold;  

}</style>
<div class="content-wrapper"><a href="dashboard"><< Back</a>
    <section class="content-header">
      <h1><legend>View Applicant Details</legend></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Applicant Details</li>
      </ol>
    </section>
<section class="content">

      <div class="row">
        <div class="col-md-3">
          <div class="box box-default">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center"><small>Applied For</small><br/><?php  echo ucwords(ServiceName($runapplicant['taskid'])); echo '<br>'.'('.GetCatName($runapplicant['catid']).')'; ?></h3>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item"><br/><br/><br/><br/>
                	<span>Current Status:</span><br/><br/>
                	<a href="#" class="btn btn-default btn-block btn-lg"><b style="font-size:30px;"><?php echo applicationStatus($runapplicant['status']); ?></b></a><br/><br/><br/><br/>
                 
                </li>
              </ul>

            </div>
          </div>

         </div>
          <div class="col-md-4">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Status</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                   <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><small style="color:#000;">Applicatant:</small><br/><?php  echo CustNameM($runapplicant['applicantid']); 
             // echo 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq';?></h3>

            </div>
          </div>
                
                <div class="post">



                  <div class="col-sm-12">

                       <?php 
       $custsql=mysqli_query($con,"SELECT `id`, `stfid`, `name`, `contact`, `city`, `pincode`, `address`, `panno`, `adharno`, `panphoto`, `aaphoto`, `photo`, `alternativenum`, `timedate` FROM `customer` WHERE `id`='".$runapplicant['applicantid']."'");
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

 $docqq=mysqli_query($con,"SELECT * FROM `servicedoc` WHERE serviceid='".$runapplicant['taskid']."'"); $fd=0;
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
 `taskno`='".$runapplicant['id']."'");   
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
 `taskno`='".$runapplicant['id']."'");   
                while($rrow=mysqli_fetch_array($viewapplicant)){ if (!empty($rrow['docfile'])) {
                  # code...
                ?>
                
                <li class="list-group-item">
                  <b><?php echo ucwords(getupDocsName($rrow['docname'])); ?></b> <a href="../assets/docs/<?php echo ucwords($rrow['docfile']); ?>" target="_blank" class="pull-right">View</a>
                </li>
               <?php } if (!empty($rrow['docval'])) {?>
 <li class="list-group-item">
                <p>  <b style="padding-right: 55px;"><?php echo ucwords(getupDocsName($rrow['docname'])); ?></b> <?php echo ucwords($rrow['docval']); ?></p>
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
<?php  $status=mysqli_query($con,"SELECT `taskid`,`formid`,`actiontyp`, `reason`, `file`, `timedate`, `ip` FROM `formreason` WHERE `taskid`='".trim($_GET['id'])."' ORDER BY ID DESC LIMIT 1");
if(mysqli_num_rows($status)>0){
while($rin=mysqli_fetch_array($status)){ ?>
<b><?php echo applicationStatus($rin['actiontyp']); ?></b> <?php echo $rin['reason'] ?> <?php if(!empty($rin['file'])){?>~ <a href="../assets/docs/<?php echo $rin['file']; ?>" target="_blank"> View <?php } ?></a>
<?php } }else{echo '<legend>Under Review</legend>';}?></ul>
                    </div>
                  </div>
                </div>
              </div>
           </div>
         </div></div>

        <div class="col-md-5">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Action</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="post"> 
                 <!--  <p class="text-muted text-center">Uploaded Documents</p> -->
                <b>Applicant Name: <?php echo CustNameM(trim($runapplicant['applicantid']));// print_r($runapplicant)?></b>
                 <ul class="list-group list-group-unbordered">
              	<?php $viewapplicant=mysqli_query($con,"SELECT `id`, `stfid`, `cusid`, `formid`, `docname`, `docfile` FROM `forminput` WHERE `cusid`='".trim($_GET['id'])."' AND `formid`='".$runapplicant['taskid']."'");
              	while($rrow=mysqli_fetch_array($viewapplicant)){ ?>
                <li class="list-group-item">
                  <b><?php echo ucwords(getupDocsName($rrow['docname'])); ?></b> <a href="assets/docs/<?php echo ucwords($rrow['docfile']); ?>" target="_blank" class="pull-right">View & Download</a>
                </li>
               <?php }?>
              </ul>

                </div>
                
                <div class="post">
                  <div class="user-block">
                    <span class="description">Comment*</span>
                  </div>
                  <div class="row margin-bottom">
                    <div class="col-sm-6">
                <form method="post" enctype="multipart/form-data">
                  <?php

$status=mysqli_query($con,"SELECT `taskid` FROM `task` WHERE `id`='".trim($_GET['id'])."'");
  
$rin=mysqli_fetch_array($status);

 // print_r($rin);?><input type="hidden" name="formid" value="<?php echo $rin['taskid']?>">
                     <select class="form-control" name="action" id="finalaction" onchange="showDiv(this)" required="required">
                     	<option value="">---Choose Status---</option>
                     	<option value="2">Done</option>
                     	<option value="1">Hold</option>
                     	<option value="3">Reject</option>
                     </select>

                     <div id="done_div" style="display:none;">

	<label>Done</label><br/> </div><div id="hold_div" style="display:none;">
  <span>Hold</span><br/></div> <div id="reject_div" style="display:none;">
                    <span>Reject</span><br/></div>

                     	<label>Comment</label>
                     	<input type="text" placeholder="enter here" name="comment" class="form-control">
                      <label>Assign Date</label>
                      <input type="date" placeholder="enter here" name="assigndate" value="<?php echo date('Y-m-d')?>"class="form-control">
                     	<label>Upload File</label>
                     	<input type="file" name="file" class="form-control">
<br/>
 <button class="btn btn-primary btn-sm" name="submit" type="submit">Submit</button>
                     </div>
                 </form>
          </div>



  <ul>
<?php  $status=mysqli_query($con,"SELECT `id`,`taskid`,`formid`,`actiontyp`, `reason`, `file`, `timedate`, `ip` FROM `formreason` WHERE `taskid`='".trim($_GET['id'])."' ORDER BY ID DESC LIMIT 1");
while($rin=mysqli_fetch_array($status)){?>
<!--<li>--><b><?php echo applicationStatus($rin['actiontyp']); ?></b> ~ <?php echo $rin['reason'];//.$rin['id'] ?> <?php if (!empty($rin['file'])) {
?>~ <?php }?><a href="../assets/docs/<?php echo $rin['file']; ?>"><?php if (!empty($rin['file'])) {
?> View <?php }?></a><!--</li>-->
<?php }?></ul>
</div>

                  </div></div></div></div></div>
<div class="col-sm-12">
  
          <div class="box box-danger direct-chat direct-chat-danger">

            <div class="box-header with-border">
              <h3 class="box-title">Recent Chat<?php //print_r($_GET['message']);
              $tinfoq=mysqli_query($con,"SELECT * FROM `task` WHERE id='".trim($_GET['id'])."'");
    $tdata=mysqli_fetch_assoc($tinfoq);
//print_r($tdata);
              // echo isset($_GET['message']);

              ?></h3>
            
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
          
                <?php 

$chatq = mysqli_query($con, "SELECT * FROM recentchat WHERE'".$tdata['taskid']."' AND (wstfid='".$tdata['stfid']."' || wstfid='".$tdata['assign']."') AND (estfid='".$tdata['stfid']."' || estfid='".$tdata['assign']."')  AND taskchatid ='".$tdata['id']."' ");
                while ( $chatdata = mysqli_fetch_assoc($chatq)) {
                 # code...
               ?><?php if(!empty($chatdata['echat'])){?>
              <button class="btn btn-warning pull-right"><!--Sales--> <?php echo $chatdata['echat']?></button>
              <br><br/><p class="pull-right"> <?php echo date("M/d/Y, h:i A ", strtotime($chatdata['etime']));//echo $chatdata['wtime'];?></p> <br><br/><br/><br/><br/><?php }?>  <?php if(!empty($chatdata['wchat'])){?><?php //print_r($chatdata)?>
                  <button class="btn btn-info pull-left"> <!--Work--><?php echo $chatdata['wchat']?></button><?php echo '<br><br>'.date("M/d/Y, h:i A ", strtotime($chatdata['wtime']));//echo $chatdata['wtime'];?><br/><br/><br/><?php }?>
     <?php } ?>
                </div>
             
              </div>

              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <form action="#" >
                <div class="input-group">
                  <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                  <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-danger btn-flat">Send</button>
                      </span>
                </div>
              </form>
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
        </div>
<?php include_once 'footer.php'; ?>
<script type="text/javascript">
  function showDiv(select){
   if(select.value=='2'){
    document.getElementById('done_div').style.display = "block";
    document.getElementById('hold_div').style.display = "none";
    document.getElementById('reject_div').style.display = "none";
   } else if(select.value=='1'){
    document.getElementById('done_div').style.display = "none";
    document.getElementById('hold_div').style.display = "block";
    document.getElementById('reject_div').style.display = "none";
   }  else if(select.value=='3'){
    document.getElementById('done_div').style.display = "none";
    document.getElementById('hold_div').style.display = "none";
    document.getElementById('reject_div').style.display = "block";
   }
}


</script>