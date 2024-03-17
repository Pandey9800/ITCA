<?php include 'sidebar.php';
if(isset($_POST['custsubmit'])){
$cname=validate($_POST['cname']);
$cmob=validate($_POST['cmob']);
$city=validate($_POST['city']);

$coup=mysqli_query($con,"INSERT INTO `customer`(`stfid`, `name`, `contact`, `city`) VALUES ('".$_SESSION['memid']."','$cname','$cmob','$city')");

if($coup>0){
    echo "<meta http-equiv='refresh' content='0'/>";
} else {
    echo "<script>alert('Server Busy Faild')</script><meta http-equiv='refresh' content='0'/>";
} 

} 
if(isset($_POST['formsubmit'])){
     
    echo "<script>window.open('fill-form?catid=".$_POST['catid']."&id=".$_POST['serviceid']."&custid=".$_POST['custid']."','_self');</script>";
}
//fill-form?id
?><div class="content-wrapper"><a href="dashboard"><< Home</a><section class="content-header"><h1><!--<small><?php //echo ucwords(trim($_GET['name'])); ?><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-default">Coupan <i class="fa fa-tags"></i>
</button></small>--></h1><ol class="breadcrumb"><li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li><li class="active"><?php //echo ucwords(trim($_GET['name'])); ?></li></ol></section>
<section class="content"><div class="">
<div class="box-body box-profile"><div class="row"><br><br><br><br>
   <div class="col-md-4"></div> <div class="col-md-4"><div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Work</h3>
            </div>
            <div class="box-body">
             <form action="#" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="selectform" value="<?php echo $_GET['acoupan'];?>">
     <input type="hidden" name="catid" value="<?php echo $_GET['catid'];?>">
     <input type="hidden" name="cust" value="<?php echo $_GET['cust'];?>">
 <input type="hidden" name="serviceid" value="<?php echo $_GET['aform'];?>">

                  <div class="form-group">
                <label>Select Customer</label><?php //echo $_GET['cust'];?>
                <select class="form-control select2" style="width: 100%;" id="myselect" name="custid" onchange="getvalc(this);" required>
                    <option value="">search</option>
                    <option value="newcust">+ New Customer</option>
                  <?php $cust=mysqli_query($con,"SELECT `id`, `stfid`, `name`, `contact` FROM `customer` ORDER BY `id` DESC");
            while($roww=mysqli_fetch_array($cust)){?>
                  <option value="<?php echo $roww['id']; ?>"<?php if ($roww['id']==$_GET['cust']) {
              echo 'selected';
                  }?>><?php echo $roww['name']; ?> <?php echo $roww['contact']; ?></option>
               <?php }?>
                </select>
              </div>
              
<div class="form-group">

<label><?php if (isset($_GET['catid'])) {
 echo 'Selected Category';
} else{
echo 'Select Category';  # code...
}?></label>
  <select class="form-control select2" <?php echo  'onchange="getval(this);"';?>>
    <option> Select Any</option>
<?php 
$data=CastName(); for ($i=0; $i < count($data); $i++) { 
?>
<option value="<?php echo($data[$i]['id']);echo '&cust='.$_GET['cust'];?>" <?php if ($_GET['catid']==$data[$i]['id']) {
echo 'selected';
}?>><?php echo($data[$i]['cast']);?></option>
  <?php } ?>

  </select>
                <label><?php if (isset($_GET['aform'])) {
 echo 'Selected Service';
} else{
echo 'Select Service';  # code...
}?></label><?php //echo $_GET['aform'];?><?php //echo empty(GetCatName($_GET['cat']))?>
                <select class="form-control select2" style="width: 100%;" name=
                "<?php //if(isset($_GET['aform'])){echo 'id';}elseif(isset($_GET['aform'])){echo 'serviceid';}else{echo 'cat'; }?>"
                <?php if(isset($_GET['catid'])){echo  'onchange="getvalf(this);"';} ?> required>
                    <option value="search">search</option>

                 <?php 
if (isset($_GET['catid'])) {
 $coupansqlx=mysqli_query($con,"SELECT `id` FROM `service`");?>

<?php while($coupanrunx=mysqli_fetch_array($coupansqlx)){?>
<!-- service name here starts-->

  <option value="<?php  echo ($coupanrunx['id']).'&catid='.$_GET['catid'].'&cust='.$_GET['cust']; ?>" <?php if ($_GET['aform']==$coupanrunx['id'] ) {
    echo 'selected';
  }?>><?php //echo GetCatName($_GET['cat']);echo ' ~ ';
  echo ucwords(ServiceName($coupanrunx['id']));?></option>
  <!-- service name ends -->
    <?php
}
   }
?>
               
                </select>
              </div>
              
<div align="center"><br/><button type="submit" class="btn btn-info" name="formsubmit">Submit</button></div>
 <div class="col-lg-3">
</div></div></form>
            </div>
          </div>
    
    


</div></div></div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Customer</h4>
      </div>
      <div class="modal-body">
        <form method="post">

            <label>Name*</label>
            <input type="text" name="cname" class="form-control" placeholder="enter here" required="required">
             <label>Contact</label>
            <input type="text" name="cmob" class="form-control"  placeholder="enter here">
             <label>City</label>
            <input type="text" name="city" class="form-control"  placeholder="enter here">
      <br/>
      <div class="box box-success  collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Full Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <label>Photo</label>
            <input type="file" name="pik" class="form-control"  placeholder="enter here">
              <label>Pan No.</label>
            <input type="text" name="panno" class="form-control" placeholder="enter here" >
              <label>Pan Card</label>
            <input type="file" name="pancard" class="form-control" placeholder="enter here" >
            <label>Adhaar No.</label>
            <input type="text" name="panno" class="form-control" placeholder="enter here" >
              <label>Adhaar Card</label>
            <input type="file" name="pancard" class="form-control" placeholder="enter here" >
             <label>Address</label>
            <input type="text" name="address" class="form-control"  placeholder="enter here">
             <label>Pincode</label>
            <input type="text" name="pincode" class="form-control"  placeholder="enter here">
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="custsubmit" class="btn btn-primary">Submit</button>
      </div></form>
    </div>
  </div>
</div>
      </div><?php include_once 'footer.php'; ?> <script>
$(document).ready(function(){ //Make script DOM ready
    $('#myselect').change(function() { //jQuery Change Function
        var opval = $(this).val(); //Get value from select element
        if(opval=="newcust"){ //Compare it and if true
            $('#myModal').modal("show"); //Open Modal
        }
    });
});
</script>

<script type="text/javascript">

  function getval(sel){
    var ids=sel.value;
   window.open('new-work?catid='+ids,'_self');
}

function getvalf(sel){
    var ids=sel.value;
   window.open('new-work?aform='+ids,'_self');
}

function getvalc(sel){
    var ids=sel.value;
    if (ids=='newcust') {$('#myModal').modal("show");}
   else{window.open('new-work?cust='+ids,'_self');}
}
</script>