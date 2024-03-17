.<?php include 'sidebar.php';

error_reporting(0) ?>
<?php
if (isset($_GET['did'])) {
mysqli_query($con, 'DELETE FROM coupantrns WHERE id="'.$_GET['did'].'"');
$ex=$_GET['ex'];
 echo "<script>   var x = '<?php echo $ex;?>';window.open('coupan-transfer?a=success&<script> document.write(x)</script>;','_self')</script>";

}  //echo 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq'; echo $_GET['formid'];
if(isset($_POST['submit'])){
	//Incorrect integer value: 'Select Any' for column `pan`.`coupantrns`.`formid` at row 1
 //   echo '<br/>'.
 // echo 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq'; echo empty($_POST['coupanid']);//echo $_POST['catid'];
  $form=validate($_POST['formid']);
  $cat=validate($_POST['catid']);
  //  echo '<br/>'.
 $coupan=validate($_POST['coupanid']);
   // echo '<br/>'.
    $excutive=validate($_POST['excutiveid']);
    $checkq = mysqli_query($con, 'SELECT id FROM coupantrns WHERE stfid ="'.$_GET['ex'].'" AND formid="'.$form.'" AND catid="'.$cat.'"');
   $exist = mysqli_num_rows($checkq);
   if ($exist<1) {
   if (!empty($_POST['coupanid'])) {
 $query=mysqli_query($con,"INSERT INTO `coupantrns`(`stfid`, `formid`, `catid`,`coupanid`) VALUES ('$excutive','$form','$cat','$coupan')")or die(mysqli_error($con));
   }
 }
 //echo 'gggggggggggggggggggggggggggggggggggggggggggggggggggggg';echo $form;
   if($query>0){
   echo "<script>window.open('coupan-transfer?a=success','_self')</script>";
        }else{
        echo "<script>window.open('coupan-transfer?a=failed','_self')</script>";
        }
}
?><div class="content-wrapper"><section class="content-header"><a href="<?php if(isset($_GET['ex']) || isset($_GET['a'])){echo './coupan-transfer?ex='; echo $_GET['ex'];}else{echo './index';}?>">Back</a><h1><legend><br>Manage Coupan</legend></h1><ol class="breadcrumb"><li><a href=""><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Manage Coupan</li></ol></section>
<section class="content">
<div class="row">
        <div class="col-md-4">
          <div class="box box-default">
            <div class="box-body box-profile">
              <span>Transfer Coupan</span><hr/>
<form action="#" method="post" enctype="multipart/form-data"><label>Sales Executive</label>
<select class="form-control select2" name="excutiveid"  onchange="getexcutiveid(this);"  id="select_id"><?php if(!empty($_GET['ex'])){ ?><option value="<?php echo trim($_GET['ex']); ?>"><?php echo EcounterName($_GET['ex']); ?></option><?php }else{?><option value="">Select Seles Excutive</option> 
<?php }?>
	<?php $coupansqlx=mysqli_query($con,"SELECT `eno`,`username`,`first_name`FROM `ecounter` WHERE `employeetype`!='employee'");
while($coupanrunx=mysqli_fetch_array($coupansqlx)){ ?> 
		<option value="<?php echo ($coupanrunx['eno']); ?>"><?php echo ucwords($coupanrunx['first_name']); ?> ~ <?php echo ucwords($coupanrunx['username']); ?></option>
	<?php }?>
</select><br/><br/>
<label><?php if (isset($_GET['catid'])) {
 echo 'Selected Category';
}else{echo 'Select Category';} ?></label>
<?php if(isset($_GET['acoupan'])){
$coupansqlx=mysqli_query($con,"SELECT `id`, `formid` FROM `coupan` WHERE `id`='".trim($_GET['acoupan'])."'");

$formdata= mysqli_fetch_assoc($coupansqlx);
  ?> <input type="hidden" name="formid" value="<?php echo $_GET['acoupan'];?>"> <?php } //print_r($formdata)?>

    <?php if(isset($_GET['formid'])){

$cat=$_GET['formid'];

   
}
   ?>

     <input type="hidden" name="catid" value="<?php echo $_GET['catid'];?>">
     <select class="form-control select2" <?php echo  'onchange="getvalc(this);"';?>>
  
  <option value="">Select Any</option>
<?php 
$data=CastName(); for ($i=0; $i < count($data); $i++) { 
?>
<option value="<?php echo($data[$i]['id']);?>" <?php if ($_GET['catid']==$data[$i]['id']) {
echo 'selected';
}?>><?php echo($data[$i]['cast']);?></option>
  <?php } ?>

</select>
     <label><br><?php if (isset($_GET['acoupan'])) {
 echo 'Selected Service';
}else {
echo 'Select Service';  # code...
}

//else{echo 'Select Service';} ?></label>
<select class="form-control select2" name="<?php if(isset($_GET['acoupan'])){echo 'id';};if(isset($_GET['formid'])){echo 'formid';}//else{echo 'catid'; }?>" <?php 
//if(isset($_GET['catid'])){echo  'onchange="getval(this);"';}; 

if(isset($_GET['catid'])) {
echo  'onchange="getvalf(this);"';
} ?>> 

	<?php $coupansqlx=mysqli_query($con,"SELECT `id`, `name` FROM `service`");?>
    <option value="">Select Any</option>
<?php while($coupanrunx=mysqli_fetch_array($coupansqlx)){$sdata[]=$coupanrunx;?>
<!-- service name here starts-->

  <option value="<?php  echo ($coupanrunx['id']).'&catid='.$_GET['catid']; ?>" <?php if ($coupanrunx['id']==$_GET['acoupan']) {
    echo 'selected';
  }?>><?php //echo GetCatName($_GET['formid']);echo ' ~ ';
  echo ucwords($coupanrunx['name']);?></option>
  <!-- service name ends -->
    <?php
}
  if(isset($_GET['acoupan'])){ ?><option value="<?php echo trim($_GET['acoupan']); ?>"><?php  echo ServiceName(Formid2pin2($_GET['acoupan'])); ?></option><?php  ?>



  <?php }
 ?> 
	<?php //}?>
</select>
<?php if(isset($_GET['acoupan'])){ ?>
<label>Available Coupan<?php //print_r($sdata);?></label> > <span style="color:#FF8433;"><?php
$coupandata=id2pin2($_GET['acoupan']);
//print_r($coupandata);
foreach ($coupandata as $key => $value) {
 echo '<br>';echo $value;
}
// echo ucwords(id2pin2($_GET['acoupan'])); ?></span>
<select class="form-control" name="coupanid">
	<?php $coupansqlx=mysqli_query($con,"SELECT `id`, `pin`,`amt` FROM `coupan` WHERE `formid`='".trim($_GET['acoupan'])."'");?>
<option value="">Select Any</option>
  <?php
while($coupanrunx=mysqli_fetch_array($coupansqlx)){?> 
		<option value="<?php echo ($coupanrunx['id']); ?>"><?php echo $coupanrunx['pin']; ?> ~ <?php echo $coupanrunx['amt']; ?></option>
	<?php }?>
</select><?php }?>

<hr/>

<div align="center"><button type="submit" class="btn btn-warning" name="submit">Submit</button></div>
            </form>
            </div>
          </div>
      </div>

      
      <div class="col-md-8">
          <div class="box box-default">
            <div class="box-body box-profile">
              <div align="left"><span>Transfer Coupan List</span></div>
              <?php if(!empty($_GET['ex'])){?>
                <div class= "table-responsive">
<table class="table table-bordered ">
<tr><th>Sno.</th><th>Coupan</th><th>Category</th><th>Form</th><th>MRP</th><th>Discount Price</th><th>Actual(Charge) Amount</th><th>Delete</th></tr>
<?php $i=1; $coupansql=mysqli_query($con,"SELECT `id`, `stfid`, `formid`, `catid`,`coupanid`, `timedate` FROM `coupantrns` WHERE `stfid`='".trim($_GET['ex'])."' ORDER BY `id` DESC ");
$num = mysqli_num_rows($coupansql);
while($coupanrun=mysqli_fetch_array($coupansql)){?> 
	<tr> 
		<td><?php echo $i;//echo  $exist//echo $num;?>.</td>
		<th><?php echo id2pin3($coupanrun['coupanid']); ?></th>
    <th><?php echo GetCatName($coupanrun['catid']);?></th>
		<td><?php echo ucwords(ServiceName($coupanrun['formid'])); ?></td>
		<td><?php echo id2pinmrp($coupanrun['coupanid']); ?></td><th><?php echo id2pindiscmrp($coupanrun['coupanid']); ?></th><td><?php echo abs(id2pinmrp($coupanrun['coupanid'])-id2pindiscmrp($coupanrun['coupanid'])); ?></td>
	<td><a href="?ex=<?php if (isset($_GET['ex'])) {
echo $ex=$_GET['ex']; } ?>&did=<?php echo $coupanrun['id']; ?>"><i class="fa fa-trash" style="color:red;"></i></a></td>
			</tr>
<?php $i++;}?>
</table></div><?php }else{ echo '<legend style="color:gray;"> No Data Found</legend>';}?>
      </div></div></div></div></section></div><script type="text/javascript">

function getexcutiveid(sel){
    var ids=sel.value;
    //alert(ids);
   window.open('coupan-transfer?ex='+ids,'_self');
}
  
// function getval(sel){
//     var ids=sel.value;
//    window.open('coupan-transfer?ex=<?php echo trim($_GET['ex']); ?>&acoupan='+ids,'_self');
// }
function getvalc(sel){
    var ids=sel.value;
   window.open('coupan-transfer?ex=<?php echo trim($_GET['ex']); ?>&catid='+ids,'_self');
}

function getval(sel){
    var ids=sel.value;
   window.open('coupan-transfer?ex=<?php echo trim($_GET['ex']); ?>&formid='+ids,'_self');
}

function getvalf(sel){
    var ids=sel.value;
   window.open('coupan-transfer?ex=<?php echo trim($_GET['ex']); ?>&acoupan='+ids,'_self');
}
</script>
     <?php include_once 'footer.php'; ?><script type="text/javascript">$('#select_id').change(function(){
    
     var ids=$(this).val();
    //alert(ids);
   window.open('coupan-transfer?ex='+ids,'_self');
})</script>