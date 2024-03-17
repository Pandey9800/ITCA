<?php include 'sidebar.php';
// send starts
  $tinfoq=mysqli_query($con,"SELECT * FROM `task` WHERE id='".trim($_GET['id'])."'");
    $tdata=mysqli_fetch_assoc($tinfoq);
if (isset($_GET['message'])) {
    $tinfoq=mysqli_query($con,"SELECT * FROM `task` WHERE id='".trim($_GET['id'])."'");
    $tdata=mysqli_fetch_assoc($tinfoq);
//print_r($tdata);$MyPHPStringVar=1;
$sendq=mysqli_query($con, "INSERT INTO `recentchat`( `estfid`,`wstfid`, `echat`, `taskid`,`taskchatid`) VALUES ('".$tdata['stfid']."', '".$tdata['assign']."','".trim($_GET['message'])."','".$tdata['taskid']."','".$tdata['id']."')");
//$MyPHPStringVar=1;
  echo "<script>
  window.open('view-applicant?id=".trim($_GET['id'])."','_self')</script>";
}
// send ends
//update document start


if (isset($_POST['docupdate'])) {
  # code...

foreach ($_POST['docid'] as $key => $value) {
  $fq= mysqli_query($con, 'SELECT * FROM servicedoc WHERE id ="'.$value.'" ');
  $fdata= mysqli_fetch_assoc($fq);    
    if ($fdata['fieldorfile']==1) {
        $docvid[]=$fdata['id'];
     }
    if ($fdata['fieldorfile']==2) {
        $docid[]=$fdata['id'];
      }
}

//echo 'ssssssssssssssssssssssssssssssssssssssssssss';echo isset($_POST['docvalue']); print_r($_POST['docvalue']);
if(isset($_POST['docvalue'])){
        for ($i=0; $i <count($docvid) ; $i++) { 
          $sql=mysqli_query($con,"INSERT INTO `forminput`(`taskno`,`stfid`, `cusid`, `formid`, `docname`,`docval`) VALUES ('".$tdata['id']."','".$_SESSION['memid']."','".$tdata['applicantid']."','".$tdata['taskid']."','".$docvid[$i]."','".$_POST['docvalue'][$i]."')")or die(mysqli_error($con));
          }
 }
        $uploadFolder = '../assets/docs/';
  if(isset($_FILES['docfile'])){
          for ($i=0; $i < count($_FILES['docfile']['tmp_name']); $i++) {        if (empty($_FILES['docfile']['name'][$i])) {
$img='';
}else{
  $imageTmpName = $_FILES['docfile']['tmp_name'][$i];
  $imageName =explode(".", $_FILES['docfile']['name'][$i]);
  $img = md5(uniqid()). '.' . end($imageName);
  $result = move_uploaded_file($imageTmpName,$uploadFolder.$img);
}

          $sql=mysqli_query($con,"INSERT INTO `forminput`(`taskno`,`stfid`, `cusid`, `formid`, `docname`,`docfile`) VALUES ('".$tdata['id']."','".$_SESSION['memid']."','".$tdata['applicantid']."','".$tdata['taskid']."','".$docid[$i]."','".$img."')")or die(mysqli_error($con));
          }
  }
   echo "<script>
  window.open('view-applicant?id=".trim($_GET['id'])."','_self')</script>";

  }
//updaet document end


$applicant=mysqli_query($con,"SELECT `id`, `stfid`,`applicantid`, `coupan`, `taskid`, `taskamt`, `taskdiscamt`, `status`, `timedate`, `ip` FROM `task` WHERE `id`='".trim($_GET['id'])."'");
$runapplicant=mysqli_fetch_array($applicant);?> <style type="text/css">li, ul {  
list-style-type: none;  
font-weight: bold;  

}</style>
<?php if (isset($_GET['update'])) {?>
<div class="content-wrapper"><a href="form-status"><< Back</a>
    <section class="content-header">
      <h1><small>Update Applicant Details</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Applicant Details</li>
      </ol>
    </section>
<form action="" method="post" enctype="multipart/form-data">

<?php $filldq=mysqli_query($con,"SELECT `id`, `docid`, `serviceid`, `document`, `type`, `status` FROM `servicedoc` WHERE (`serviceid`='".trim($tdata['taskid'])."') ORDER BY `document` ASC");
  while($rrow=mysqli_fetch_array($filldq)){?>

<div class="col-lg-6 col-md-12">
<br>
<label><?php echo ucwords($rrow['document']); ?> <?php if($rrow['status']!=0){ ?> <b style=color:red;>*</b>
<?php } ?></label><?php if($rrow['type']=='text'){ ?>
 <input type="<?php echo $rrow['type']; ?>" name="docvalue[]" placeholder="<?php echo ucwords($rrow['document']); ?>"  class="form-control"  <?php if ($rrow['document']=='Pan No' || $rrow['document']=='Pan no' || $rrow['document']=='pan No' || $rrow['document']=='pan no' || $rrow['document']=='Pan No.' || $rrow['document']=='Pan no.' || $rrow['document']=='pan No.' || $rrow['document']=='pan no.') {
echo 'pattern="^[a-zA-Z0-9_.-]*$"';echo ' maxlength="10" ';//echo $rrow['document']; 
 }

if ($rrow['document']=='Driving License No' || $rrow['document']=='Driving License no' || $rrow['document']=='driving license No' || $rrow['document']=='driving license no' || $rrow['document']=='Driving License No.' || $rrow['document']=='Driving License no.' || $rrow['document']=='driving license No.' || $rrow['document']=='driving license no.' || $rrow['document']=='Driving License' || $rrow['document']=='Driving License' || $rrow['document']=='driving license' || $rrow['document']=='driving license' || $rrow['document']=='Driving License.' || $rrow['document']=='Driving License.' || $rrow['document']=='driving license.' || $rrow['document']=='driving license.') {
echo 'pattern="^[a-zA-Z0-9_.-]*$"';echo ' maxlength="15" '; 
 }
  ?><?php if($rrow['status']!=0){ echo 'required';} ?>> 

<!-- <input type="textarea" name="docvalue[]"> -->

<!-- <input  type="int"name="docvalue[]"> -->
<?php }elseif($rrow['type']=='textarea'){ ?>
<textarea name="docvalue[]" placeholder="<?php echo ucwords($rrow['document']); ?>"  class="form-control" <?php if($rrow['status']!=0){ echo 'required';} ?>></textarea>
<?php }elseif($rrow['type']=='int'){ //print_r($_POST['docvalue']);
?>
<input type="<?php echo $rrow['type']; ?>" name="docvalue[]" placeholder="<?php echo ucwords($rrow['document']); ?>"  class="form-control" <?php if ($rrow['document']=='Aadhar No' || $rrow['document']=='Aadhar no' || $rrow['document']=='aadhar No' || $rrow['document']=='aadhar no' || $rrow['document']=='Aadhar No.' || $rrow['document']=='Aadhar no.' || $rrow['document']=='aadhar No.' || $rrow['document']=='aadhar no.') {
echo 'pattern="^[0-9]*$"';echo 'maxlength="12"'; 
 } ?><?php if($rrow['status']!=0){ echo 'required';} ?>>


<?php //echo isset($_POST['docvlaue']); echo print_r($_POST['docvlaue'])?>

<?php }elseif($rrow['type']=='photo'){?> 
<input type="file" name="docfile[]" placeholder="<?php echo ucwords($rrow['document']); ?>"  class="form-control" <?php if($rrow['status']!=0){ echo 'required';} ?> accept="image/*"> 
<?php }elseif($rrow['type']=='file'){ //echo $rrow['type'];?> 
 <input type="<?php echo $rrow['type']; ?>" name="docfile[]" placeholder="<?php echo ucwords($rrow['document']); ?>"  class="form-control" <?php if($rrow['status']!=0){ echo 'required';} ?>>
<?php }?>
<input type="hidden" name="docid[]"  class="form-control" value="<?php echo $rrow['id']; ?>"><?php //echo $rrow['id']; ?>


</div>


<?php }?>
<div style="padding-top: 300px; text-align: center;">
<input type="submit" name="docupdate" value="Update" class="btn btn-info"></div>
</form>
</div>
<?php }else{?>
<div class="content-wrapper"><a href="form-status"><< Back</a>
    <section class="content-header">
      <h1><small>View Applicant Details</small></h1>
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
              <h3 class="profile-username text-center">
                  
                  <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo ucwords(ServiceName($runapplicant['taskid'])); ?></h3>

            </div>
          </div></h3>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item"><br/><br/><br/>
                	<a href="#" class="btn btn-default btn-block btn-lg"><b><?php echo applicationStatus($runapplicant['status']); ?></b></a><br/><br/><br/>
                </li>
  <?php 

$cid = $runapplicant['applicantid'];

  $viewapplicant=mysqli_query($con,"SELECT `id`, `stfid`, `cusid`, `formid`, `fieldvalue`, `fieldname` FROM `forminput` WHERE  `formid`='".$runapplicant['taskid']."' AND `cusid`='".$cid."' AND (`stfid`='".$runapplicant['stfid']."')");
                while($rrow=mysqli_fetch_array($viewapplicant)){ ?>
                <li class="list-group-item">        <?php echo $rrow['fieldname'];?></li>
              <?php }//echo empty($rrow);echo $runapplicant['stfid']?>
              </ul>
            </div>
          </div>
         </div>
        <div class="col-md-5">
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
                ?>Perosnal Document
                <li class="list-group-item">
                  <b><?php //if (!empty($runcust['pincode'])) {
             // echo 'Pin Code: ';echo $runcust['pincode'];
             //     } ?><?php if (!empty($runcust['alternativenum'])) {
              echo '<br>Alternate Number: ';echo $runcust['alternativenum'];
                  } ?><?php if (!empty($runcust['city'])) {
              echo '<br>City: ';echo $runcust['city'];
                  } ?><?php if (!empty($runcust['address'])) {
              echo '<br>Adress: ';echo $runcust['address'];
                  } ?><?php if (!empty($runcust['panno'])) {
              echo '<br>Pan No: ';echo $runcust['panno'];
                  } ?><?php if (!empty($runcust['panphoto'])) {
              echo '<br>'.' Pan Photo '.'<a href="'.'../assets/docs/'.$runcust['panphoto'].'" target="_blank">'.'View'.'</a>';?>
              <?php
                  } ?><?php if (!empty($runcust['aaphoto'])) {
              echo '<br>'.' Aadhar Photo '.'<a href="'.'../assets/docs/'.$runcust['aaphoto'].'" target="_blank">'.'View'.'</a>';?>
              <?php
                  } ?></b> <br>
                </li>
<?php if (empty($runcust['photo']) || empty($runcust['city']) || empty($runcust['panno']) || empty($runcust['panphoto'])) {
  # code...
 ?>
          Required Personal Document(<a href="manage-customer?cid=<?php echo trim($runapplicant['applicantid']);?>">Update</a>) <br>    
<li>
 <ul><br>
  <b><?php //if (empty($runcust['pincode'])) {
            //  echo 'Pin Code';
            //      } ?>
                <?php  if (empty($runcust['photo'])) {
              echo '<br>'.'Photo';
                  } ?><?php //if (empty($runcust['alternativenum'])) {
            //  echo '<br>Alternate Number';
               //   } ?><?php if (empty($runcust['city'])) {
              echo '<br>City';
                  } ?><?php //if (empty($runcust['address'])) {
             // echo '<br>Adress';
                //  } ?><?php if (empty($runcust['panno'])) {
              echo '<br>Pan No';
                  } ?><?php if (empty($runcust['panphoto'])) {
              echo '<br>Pan Photo';
                  } ?><?php if (empty($runcust['aaphoto'])) {
              echo '<br>Aadhar Photo';
                  } ?></b> <br>

</li>

</ul>
<?php }?>

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
          Required Form Document(<a href="view-applicant?id=<?php echo trim($_GET['id']);?>&update">Update</a>) <br> 
<?php 

}?>
<li>
 <ul>
  <b>
  <?php 
 //                $viewapplicant=mysqli_query($con,"SELECT `id`, `stfid`, `cusid`, `formid`, `docname`, `docfile` FROM `forminput` WHERE
 // `stfid`='".$runapplicant['stfid']."' AND `cusid`='".$runapplicant['applicantid']."' AND `taskno`='".$runapplicant['taskno']."'");
             $viewapplicant=mysqli_query($con,"SELECT * FROM `forminput` WHERE `taskno`='".$runapplicant['id']."'");   
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
<?php  $status=mysqli_query($con,"SELECT `actiontyp`, `reason`, `file`, `timedate`, `ip` FROM `formreason` WHERE `taskid`='".trim($_GET['id'])."' ORDER BY ID DESC LIMIT 1"); $check =mysqli_num_rows($status);
if($check>0){
while($rin=mysqli_fetch_array($status)){ ?>
<b><?php echo applicationStatus($rin['actiontyp']); ?></b> <?php echo $rin['reason'] ?> ~ <a href="../assets/docs/<?php echo $rin['file']; ?>" target="_blank"> View </a>
<?php } }else{echo '<legend>Under Review</legend>';}?></ul>

                    </div>
                  </div>
                </div>
              </div>
           </div>
         </div></div>

           <div class="col-md-12">
             <style type="text/css">
    </style>
   <div class="box box-danger direct-chat direct-chat-danger ">
            <div class="box-header with-border">
              <h3 class="box-title">Recent Chat<?php //print_r($_GET['message']);
              $tinfoq=mysqli_query($con,"SELECT * FROM `task` WHERE id='".trim($_GET['id'])."'");
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
$chatq = mysqli_query($con, "SELECT * FROM recentchat WHERE taskid='".$tdata['taskid']."' AND (wstfid='".$tdata['stfid']."' || wstfid='".$tdata['assign']."') AND (estfid='".$tdata['stfid']."' || estfid='".$tdata['assign']."') AND taskchatid ='".$tdata['id']."'");
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
            </div>
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
           </div>
    </section>


</li></div></div></div></div></div></div></div></section></div>
<?php }?>
<?php include_once 'footer.php'; ?>