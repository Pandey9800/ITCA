 <?php include 'sidebar.php'; 
if (isset($_GET['docid'])) {
 $fq= mysqli_query($con, 'UPDATE servicedoc SET status =0 WHERE id ="'.$_GET['docid'].'" ');
}
if(isset($_POST['update'])){
$formamt=validate($_POST['formamt']);
$coupan=validate($_POST['coupancode']);
$fid=validate($_POST['formid']);
$cutid= trim($_POST['custmerid']);
    $catid = trim($_POST['catid']);
if(empty($_POST['custmerid'])){
    $applicantname=validate($_POST['applicantname']);
    $applicantcontact=validate($_POST['applicantcontact']);
    $applicantcity=validate($_POST['applicantcity']);
    $applicantaddress=validate($_POST['applicantaddress']);
$sql =mysqli_query($con,"INSERT INTO `customer`(`stfid`, `name`, `contact`, `city`,`address`) VALUES ('".$_SESSION['memid']."','$applicantname','$applicantcontact','$applicantcity','$applicantaddress')")or die(mysqli_error($con));
$cutid=mysqli_insert_id($con);
}else{
$cutid=validate($_POST['custmerid']);
}
if(!empty($coupan)){
  $seminfial = explode(" ",$coupan);
  $fial = explode("~",$seminfial[0]);
  $coupan = $fial[0];
   // if coupan then starts
$coup=mysqli_query($con,"SELECT `disamt` FROM `coupan` WHERE `pin`='$coupan'");
if(!empty(mysqli_num_rows($coup))){
  $runcoupan=mysqli_fetch_array($coup);
  $charge=$formamt-$runcoupan['disamt'];
  $sql =mysqli_query($con,"INSERT INTO `task`(`stfid`,`applicantid`,`coupan`, `taskid`,`catid`,`mrp`,`taskamt`,`status`, `taskdiscamt`,`ip`) VALUES ('".$_SESSION['memid']."','".$cutid."','".$coupan."','".$fid."','".$catid."','".$formamt."','".$charge."',1,".$runcoupan['disamt']."','$ip')")or die(mysqli_error($con));
  $lid=mysqli_insert_id($con);
  $uploadFolder = '../assets/docs/';
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
if(isset($_POST['docvalue'])){
        for ($i=0; $i <count($docvid) ; $i++) { 
          $sql=mysqli_query($con,"INSERT INTO `forminput`(`taskno`,`stfid`, `cusid`, `formid`, `docname`,`docval`) VALUES ('".$lid."','".$_SESSION['memid']."','".$_GET['custid']."','".$fid."','".$docvid[$i]."','".$_POST['docvalue'][$i]."')")or die(mysqli_error($con));
          }
 }
        $uploadFolder = '../assets/docs/';
  if(isset($_FILES['docfile'])){
          for ($i=0; $i < count($_FILES['docfile']['tmp_name']); $i++) { 
            if (empty($_FILES['docfile']['name'][$i])) { $img='';
          }else{
  $imageTmpName = $_FILES['docfile']['tmp_name'][$i];
  $imageName =explode(".", $_FILES['docfile']['name'][$i]);
  $img = md5(uniqid()). '.' . end($imageName);
  $result = move_uploaded_file($imageTmpName,$uploadFolder.$img);
}

          $sql=mysqli_query($con,"INSERT INTO `forminput`(`taskno`,`stfid`, `cusid`, `formid`, `docname`,`docfile`) VALUES ('".$lid."','".$_SESSION['memid']."','".$_GET['custid']."','".$fid."','".$docid[$i]."','".$img."')")or die(mysqli_error($con));
          }
  }
//echo 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq'.$_POST['formid'];

  //echo $coupan ;
$coupanq=mysqli_query($con, 'SELECT * FROM coupan WHERE pin ="'.$coupan.'"');
$coupandata=mysqli_fetch_assoc($coupanq);
$usedq=mysqli_query($con,'SELECT * FROM usedcoupan WHERE stfid="'.$_SESSION['memid'].'" AND formid="'.$_POST['formid'].'" AND coupanid="'.$coupandata['id'].'"' );
$nom= mysqli_num_rows($usedq);
if ($nom>0) {
$useddata=mysqli_fetch_assoc($usedq);
if ($useddata['used']>=0) {
  $used=$useddata['used'];
  $used++;
$viwq= mysqli_query($con,'UPDATE usedcoupan SET used="'.$used.'" WHERE ucid="'.$useddata["ucid"].'" ');
}
}else{ $viwq= mysqli_query($con,'INSERT INTO usedcoupan (stfid, formid, coupanid)VALUES("'.$_SESSION['memid'].'","'.$_POST['formid'].'","'.$coupandata['id'].'")');}

//print_r($used);
 
if($sql>0){
    echo "<script>window.open('form-status?id=".$lid."&custid=".$_GET['custid']."&success','_self')</script>";
} else {
   echo "<script>alert('Server Busy');window.open('fill-form?id=".trim($_GET['id'])."&name=".trim($_GET['name'])."&failed','_self')</script>";
} 

}else{
 echo "<script>alert('Invalid Coupan');window.open('fill-form?id=".trim($_GET['id'])."&name=".trim($_GET['name'])."&failed','_self')</script>";
} 
// if coupan then ends
    }else{  
     // echo 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';echo isset($_POST['docvalue']);echo print_r($_POST['docvalue']);
$cutid= trim($_POST['custmerid']);
$fid=trim($_POST['formid']);
  $formamt=trim($_POST['formamt']);
    $coupan=trim($_POST['coupancode']);
    $catid = trim($_POST['catid']);
  
$runcoupan['disamt']=0;
$charge = $formamt-$runcoupan['disamt'];
        $sql =mysqli_query($con,"INSERT INTO `task`(`stfid`,`applicantid`,`coupan`,`taskid`,`catid`,`mrp`,`taskamt`, `taskdiscamt`,`ip`) VALUES ('".$_SESSION['memid']."','".$cutid."','".$coupan."','".$fid."','".$catid."','".$formamt."','".$charge."','".$runcoupan['disamt']."','".$ip."')")or die(mysqli_error($con));
  $lid=mysqli_insert_id($con);

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

    if(isset($_POST['docvalue'])){

        for ($i=0; $i <count($docvid) ; $i++) { 
  $sql=mysqli_query($con,"INSERT INTO `forminput`(`taskno`,`stfid`, `cusid`, `formid`, `docname`,`docval`) VALUES ('".$lid."','".$_SESSION['memid']."','".$_GET['custid']."','".$fid."','".$docvid[$i]."','".$_POST['docvalue'][$i]."')")or die(mysqli_error($con));
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

  $sql=mysqli_query($con,"INSERT INTO `forminput`(`taskno`,`stfid`, `cusid`, `formid`, `docname`,`docfile`) VALUES ('".$lid."','".$_SESSION['memid']."','".$_GET['custid']."','".$fid."','".$docid[$i]."','".$img."')")or die(mysqli_error($con));
}
      }
if($sql>0){
    echo "<script>window.open('form-status?id=".$lid."&success','_self')</script>";
} else {
    echo "<script>alert('Server Busy');window.open('fill-form?id=".trim($_GET['id'])."&name=".trim($_GET['name'])."&failed','_self')</script>";
} 

    }
} 
 $custsql=mysqli_query($con,"SELECT `id`, `stfid`, `name`, `contact`, `city`, `pincode`, `address`, `panno`, `adharno`, `panphoto`, `aaphoto`, `photo`, `alternativenum`, `timedate` FROM `customer` WHERE `id`='".trim($_GET['custid'])."'");
 $runcust=mysqli_fetch_array($custsql);
?><div class="content-wrapper"><section class="content-header"><h1><a href="dashboard"><< Back</a><br><small><?php if(!isset($_GET['fillform'])){ echo ucwords(GetCatName($_GET['catid'])); }else{ echo ucwords(ServiceName($_GET['fillform']));} ?><?php if(isset($_GET['fillform'])){  ?>&nbsp;&nbsp;<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default">Coupan <i class="fa fa-tags"></i>
</button><?php }?></small></h1><ol class="breadcrumb"><li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li><li class="active"><?php if(!isset($_GET['fillform'])){ echo ucwords(GetCatName($_GET['catid'])); }else{ echo ucwords(ServiceName($_GET['fillform']));} ?></li></ol></section>
<section class="content"><div class="box box-default">
<div class="box-body box-profile"><div class="row">
<?php if(isset($_GET['id'])){ ?>
<table class="table table-striped" id="example1">
<thead>
<tr><th>Sno.</th><th>Service</th><th>Required Documents</th><th>Action</th></tr>
</thead>
<tbody>
<tr> 
<?php $x=1;
$ress=mysqli_query($con,"SELECT `id`, `catid`, `name`, `cost`, `advrequired`, `advper`, `duedays`, `duepay`, `type`, `timedate` FROM `service` WHERE `id`='".trim($_GET['id'])."' ORDER BY `name` ASC");
while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $x; ?>.</td><td><?php echo ucwords($rows['name']); ?><br/>(<?php echo GetCatName($_GET['catid']); ?>)</td><td><ul><?php
for($i=0; $i < count(getServiceList($rows['id'])); $i++) { 
  echo '<li>'.getServiceList($rows['id'])[$i].'</li>'; 
}?></ul></td>
<td><a href="fill-form?fillform=<?php echo $rows['id'].'&catid='.$_GET['catid']; ?>&custid=<?php echo $_GET['custid'];//.'&docid=';?>" class="btn btn-default btn-sm">Apply</a></td>
                  </tr>
                  <?php  $x++;} ?>
                 
                </tbody>
              </table><?php }else{?>
<form action="#" method="post" enctype="multipart/form-data">
  <input type="hidden" name="fillform" value="<?php echo $_GET['fillform'];?>">
    <input type="hidden" name="catid" value="<?php echo $_GET['catid'];?>">

<div class="col-md-1"></div><div class="col-md-10"><legend>
  <?php if(isset($_GET['fillform'])){ echo ucwords(ServiceName($_GET['fillform']));} ?></legend>
<h3 class="box-title"><small>Fill Details<?php //echo print_r($_POST['docid']);?></small></h3>
<div style="text-align:right;">Charge <b>&#8377;:<?php echo $tskid=ServiceNameAmt($_GET['fillform']);?></b></div>
<input type="hidden" class="form-control" value="<?php echo $_GET['custid']; ?>" placeholder="enter here" name="custmerid">
<div class="col-lg-6 col-md-12"><label>Applicant Name</label>
<input type="text" class="form-control" value="<?php echo $runcust['name']; ?>" placeholder="enter here" name="applicantname" required></div>
<div class="col-lg-6 col-md-12"><br><label>Applicant Contact</label>
<input type="text" class="form-control" placeholder="enter here" name="applicantcontact" value="<?php echo $runcust['contact']; ?>" required></div>
<div class="col-lg-6 col-md-12"><br><label>City</label>
<input type="text" class="form-control" placeholder="enter here" name="applicantcity" value="<?php echo $runcust['city']; ?>"></div>
<div class="col-lg-6 col-md-12"><br><label>Address</label>
<input type="text" class="form-control" placeholder="enter here" name="applicantaddress" value="<?php echo $runcust['address']; ?>"></div>
<div class="col-lg-12 col-md-12"><br/><br>
<span><i class="fa fa-check-circle text-green"></i>&nbsp;Additional Document for " <?php echo ServiceName(trim($_GET['fillform'])); ?> "</span></div>
<?php $filldq=mysqli_query($con,"SELECT `id`, `docid`, `serviceid`, `document`, `type`, `status` FROM `servicedoc` WHERE (`serviceid`='".trim($_GET['fillform'])."') ORDER BY `document` ASC");
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
<?php }elseif($rrow['type']=='int'){ ?>
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
</div>
 <div class="col-md-1"></div>
 <div class="col-md-2"></div><div class="col-md-6"><br/>

<div class="input-group">
<div class="input-group-addon ">Coupan:</div>
<input type="hidden" class="form-control" value="<?php echo trim($_GET['fillform']);?>" name="formid">
<input type="hidden" class="form-control" value="<?php echo $tskid;?>" name="formamt">
<input type="text" class="form-control" placeholder="Enter Coupan" name="coupancode">
</div>
<div align="center"><br/><button type="submit" class="btn btn-info btn-lg" name="update" style="border-radius:40px;">Save & Submit</button></div>
 <div class="col-lg-3">
</div></div></form><?php }?></div></div></div>
<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" >Coupan</h4>
              </div>
              <div class="modal-body">
              	<table class="table table-bordered"><thead><tr><th >Coupan</th><th>Copy</th></tr></thead><tbody>
              	<?php 
                $cop=mysqli_query($con,"SELECT `id`, `stfid`, `formid`, `coupanid`, `timedate` FROM `coupantrns` WHERE `stfid`='".$_SESSION['memid']."' AND `formid`='".trim($_GET['fillform'])."'");
               while($rr=mysqli_fetch_array($cop)){ ?> 
               	<tr>
               		<td><input type="text" value="<?php echo id2pin($rr['coupanid']); ?>" id="myInput" readonly="readonly"></td>
               		<td><button onclick="myFunction()">Copy text</button></td>
               	</tr>
               <?php }?></tbody>
           </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div></div></div></div>
       <script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999); 
  navigator.clipboard.writeText(copyText.value);
  alert("Copied the text: " + copyText.value);
}
 function getreq(sel){
 var ids=sel.value;
   window.open('fill-form?custid='+ids,'_self');
}

</script></div><?php include_once 'footer.php'; ?>