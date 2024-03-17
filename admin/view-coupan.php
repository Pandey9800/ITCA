<?php include 'sidebar.php';error_reporting(0)  ?>
<?php if ($_GET['a']=='already') {
  $success_message='Coupan already exists.';
}if($_GET['a']=='success')
{ $success_message='Coupan successfully added.';}

if (isset($_GET['did'])) {
mysqli_query($con, 'DELETE FROM coupan WHERE id = "'.$_GET['did'].'"');
}
if(isset($_POST['submit'])){
    $cat=validate($_POST['catid']);
    $quantitystatus=" Invalid Quantity<br>";
 //echo 'gggggggggggggggggggggggggggggggggggggggggggggggggggggg';//echo $cat;

     $selectforma=trim($_POST['selectform']);
    $quantityvalid=false;
    $amount=300;
    $disamount=150;
    $package="Package Amount 300";
    $formpricea=ServiceNameAmt($_POST['selectform']);
    $dispricea=trim($_POST['disprice']);
    $coupancodeg=trim($_POST['coupancode']);

  $queryc=mysqli_query($con,'SELECT id FROM coupan WHERE pin="'.$coupancodeg.'"');//echo !empty(mysqli_num_rows($queryc));
            if(empty(mysqli_num_rows($queryc))){
    $query="INSERT INTO coupan(catid, formid, pin, amt, disamt, timedate, ip) VALUES('".$cat."','".$selectforma."','".$coupancodeg."',".$formpricea.",".$dispricea.",'".date('Y-m-d')."','".$ip."')";
    mysqli_query($con,$query) or die(mysqli_error($con));
   echo "<script>window.open('view-coupan?a=success','_self')</script>";
        }else{
           echo "<script>window.open('view-coupan?a=already','_self')</script>";
        }
}
?><div class="content-wrapper"><section class="content-header"><?php if ($_GET['a']=='success') {?><div class="callout callout-success">
      
      <p><?php 
   echo $success_message;
       ?></p>
      </div><?php }if($_GET['a']=='already'){?><div class="callout callout-success">
      
      <p><?php 
   echo $success_message;
       ?></p>
      </div><?php } ?><a href="<?php if( isset($_GET['cat'])|| isset($_GET['a']) || isset($_GET['formid'])){echo './view-coupan';}else{echo './index';}?>">Back</a><h1><legend><br>Manage Coupan</legend></h1><ol class="breadcrumb"><li><a href=""><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Manage Coupan</li></ol>

    </section>
<section class="content">
<div class="row">
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <label>Generate Coupan</label><?php echo isset($query)//$_GET['formid'];?>
<form action="#" method="post" enctype="multipart/form-data">
  <input type="hidden" name="selectform" value="<?php echo $_GET['formid'];?>">
     <input type="hidden" name="catid" value="<?php echo $_GET['catid'];?>">
<label><br><?php if(isset($_GET['catid'])){echo 'Selected';}else{echo 'Select';}?> Category</label>
     <select class="form-control select2" <?php echo  'onchange="getval(this);"';?>>
  
  <option value="">Select Any</option>
<?php 
$data=CastName(); for ($i=0; $i < count($data); $i++) { 
?>
<option value="<?php echo($data[$i]['id']);?>" <?php if ($_GET['catid']==$data[$i]['id']) {
echo 'selected';
}?>><?php echo($data[$i]['cast']);?></option>
  <?php } ?>

</select>


<label><br><?php  if(isset($_GET['formid'])){
 echo 'Selected Service';}else{
echo 'Select Service';  # code...
}

//else{echo 'Select Service';} ?></label>
<!-- <select class="form-control" name="selectform"> -->



	<select class="form-control select2" name="<?php if(isset($_GET['formid'])){echo 'id';}elseif(isset($_GET['catid'])){echo 'selectform';}else{echo 'catid'; }?>" <?php echo  'onchange="getvalf(this);"'; ?>>

     <option value="">Select Any</option>
<?php if(isset($_GET['catid'])){$coupansqlx=mysqli_query($con,"SELECT `id`, `name` FROM `service` ");?>
   
<?php while($coupanrunx=mysqli_fetch_array($coupansqlx)){?>
<!-- service name here starts-->

  <option value="<?php  echo ($coupanrunx['id']).'&catid='.$_GET['catid']; ?>" <?php if ($coupanrunx['id']==$_GET['formid']) {
    echo 'selected';
  }?>><?php //echo GetCatName($_GET['catid']);echo ' ~ ';
  echo ucwords($coupanrunx['name']);?></option>
  <!-- service name ends -->
    <?php
}
  }//if(isset($_GET['formid'])){ ?><option value="<?php //echo trim($_GET['formid']); ?>"><?php  //echo GetCatName($_GET['catid']);echo ' ~ ';echo ServiceName(Formid2pin2($_GET['formid'])); ?></option><?php  ?>



  <?php //} ?>
  
</select>
<label><br>Discount Price*</label> 
<input type="number" name="disprice" placeholder="enter here" class="form-control" required="required">
<!-- <label>Coupan Quantity</label>
<input type="text" name="quantity" placeholder="enter here" class="form-control" required="required"> -->
<hr/>
<label style="background-color:yellow;color:#000;">Coupan Code*</label>
<input type="text" value="BBform" name="coupancode" placeholder="enter here" class="form-control" required="required"><br/>
<div align="center"><button type="submit" class="btn btn-warning" name="submit">Submit</button></div>
            </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <div align="left"><span>Coupan List</span></div>
              <div class="table-responsive">
<table class="table table-bordered ">
<tr><th>Sno.</th><th>Coupan</th><th>Category</th><th>Form</th><th>MRP</th><th>Discount</th><th>Actual(Charge) Amount</th><th>Delete</th></tr>
<?php $i=1; $coupansql=mysqli_query($con,"SELECT `id`, `catid`,`formid`, `pin`, `amt`, `disamt`, `status`, `timedate`, `ip` FROM `coupan` WHERE `status`!=1");
while($coupanrun=mysqli_fetch_array($coupansql)){?> 
	<tr> 
		<td><?php echo $i++;?>.</td>
		<th><?php echo $coupanrun['pin']; ?></th>
            <td><?php echo ucwords(GetCatName($coupanrun['catid'])); ?></td>
		<td><?php echo ucwords(ServiceName($coupanrun['formid'])); ?></td>
		<td><?php echo $coupanrun['amt']; ?></td><th><?php echo $coupanrun['disamt']; ?></th><td><?php echo abs(($coupanrun['amt'])-($coupanrun['disamt'])); ?></td><td><a href="?did=<?php echo $coupanrun['id']; ?>"><i class="fa fa-trash" style="color:red;"></i></a>&nbsp; <!-- <a href="?eid=<?php echo $coupanrun['id']; ?>"><i class="fa fa-edit" style="color:lightblue;"></i></a> --></td>
	
			</tr>
<?php //$i++;
}?>
</table></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
  </div>
</section>
</div>
<script type="text/javascript">

  function getval(sel){
    var ids=sel.value;
   window.open('view-coupan?catid='+ids,'_self');
}

function getvalf(sel){
    var ids=sel.value;
   window.open('view-coupan?formid='+ids,'_self');
}</script>
     <?php include_once 'footer.php'; ?>