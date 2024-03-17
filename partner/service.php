<?php include 'sidebar.php'; 
if(isset($_POST['submit'])){
$categorya=validate($_POST['category']);
$namea=validate($_POST['name']);
$servicecosta=validate($_POST['servicecost']);
$advancea=validate($_POST['advance']);
$advancepercentagea=validate($_POST['advancepercentage']);
$serviceduedaysa=validate($_POST['serviceduedays']);
$paymentduedaysa=validate($_POST['paymentduedays']);
$servicetypea=validate($_POST['servicetype']);
$sql =mysqli_query($con,"INSERT INTO `service`(`catid`, `name`, `cost`, `advrequired`, `advper`, `duedays`, `duepay`, `type`) VALUES ('$categorya','$namea','$servicecosta','$advancea','$advancepercentagea','$serviceduedaysa','$paymentduedaysa','$servicetypea')");
$lid=mysqli_insert_id($con);
foreach ($_POST['documents'] as $key => $value) {
  $sql=mysqli_query($con,"INSERT INTO `servicedoc`(`serviceid`, `document`) VALUES ('$lid','$value')");
}

if($sql>0){echo "<script>window.open('service?success','_self')</script>";
}else{echo "<script>alert('Server Busy');window.open('service?failed','_self')</script>";
}       
} 
?> 
<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Add Service</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Service</li>
      </ol>
    </section>
    <section class="content">
            <a href="category"><< Back</a>
            <?php if(isset($_GET['add'])){ ?>
            <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title" style="color:#000;">Add Service</h3>
            </div>
            <div class="box-body">
           <form action="#" method="post" enctype="multipart/form-data">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
               <div class=col-sm-3>
                    <div class="form-group mb-10">
                        <label>Service Category :<span style="color:red"></span></label>
                        <select class="form-control" name="category">
                          <?php $service=mysqli_query($con,"SELECT `id`, `cast`, `timedate` FROM `cat` ORDER BY `cast` ASC");while($runservice=mysqli_fetch_array($service)){?>
                            <option value="<?php echo $runservice['id']; ?>"><?php echo ucwords($runservice['cast']); ?></option>
                          <?php }?>
                        </select>
                    </div>
                </div>
            <div class=col-sm-6>
                    <div class="form-group mb-10">
                        <label> Service Name<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="name" maxlength="225" required placeholder="Enter Here" />
                    </div>
                </div>
                <div class=col-sm-3>
                    <div class="form-group mb-10">
                        <label> Service Cost<span style="color:red">*</span></label>
                        <input type="text" pattern="[0-9]+" class="form-control" name="servicecost" maxlength="10" required placeholder="Enter Here" />
                    </div>
                </div>
                <div class=col-sm-5>
                    <div class="form-group mb-10">
                        <label> Advance Required </label>
                       <select class="form-control" name="advance">
<option value="yes">Yes</option>
<option value="no">No</option></select>
                    </div>
                </div>
               
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Advance Percentage</label>
                        <input type="text" pattern="[0-9]+" class="form-control" name="advancepercentage" placeholder="Enter Here"/>
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Service Due Days </label>
                        <input type="text" pattern="[0-9]+" class="form-control" name="serviceduedays" placeholder="Enter Here" />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Paymen Due Days </label>
                        <input type="text" pattern="[0-9]+" class="form-control" name="paymentduedays" placeholder="Enter Here" />
                    </div>
                </div>
<div class=col-sm-12></div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Service Type</label>
                <select class="form-control" name="servicetype">
<option value="onetime">One Time</option>
<option value="recurrent">Recurrent</option>
</select>
                    </div>
                </div>
                <div class=col-sm-8>
                    <div class="form-group mb-10">
                        <label>Document Required :<span style="color:red"></span></label>
                        <select class="form-control" name="documents[]" id="documentlist" multiple="multiple">
<?php $docts=mysqli_query($con,"SELECT `id`, `name`, `timedate` FROM `documentlist` ORDER BY `name` ASC");while($doctsrun=mysqli_fetch_array($docts)){?>
<option value="<?php echo ucwords($doctsrun['name']); ?>"><?php echo ucwords($doctsrun['name']); ?></option>
<?php }?></select></div>
                    <div id="result"></div>
                </div>
                </div>
               
                <div class=col-sm-12></div>
                   
            <div align="center"><br/><input type="submit" class="btn btn-primary" name="submit" style="width:30%;" value="Submit" /></div>
            
        </div>
        </form>
      </div></div>
      <?php }else{ ?>
<div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title" style="color:#000;">Category List</h3>
               <div class="box-tools pull-right">
                <a href="service?add" type="button" class="btn btn-warning" style="border-radius:20%;color:#fff;">+ Add New</a>
              </div>
            </div>

            <div class="box-body">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
           <table class="table table-striped" class="example1">
                <thead>
                  <tr><th>Sno.</th><th>Service</th><th>Cost</th><th>Required Advance</th><th>Advance Per</th><th>Documents List</th><th>Add On</th></tr>
                </thead>
                <tbody>
                  <tr>
                 <?php $i=1;
          $ress=mysqli_query($con,"SELECT `id`, `catid`, `name`, `cost`, `advrequired`, `advper`, `duedays`, `duepay`, `type`, `timedate` FROM `service` ORDER BY `name` ASC");
           while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $i; ?></td><th><?php echo ucwords($rows['name']); ?></th><td><?php echo ($rows['cost']); ?></td><td><?php echo ($rows['advrequired']); ?></td><td><?php echo ($rows['advper']); ?></td><td><ul><?php
for($i=0; $i < count(getServiceList($rows['id'])); $i++) { 
  echo '<li>'.getServiceList($rows['id'])[$i].'</li>'; 
}?></ul></td>
<td><?php echo showdate($rows['timedate']); ?></td>
                  </tr>
                  <?php  $i++;} ?>
                 
                </tbody>
              </table>
      <?php }?>
</div></section></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">

$('#documentlist').on('change',function(){
  var vl=$(this).val();
for (var i = 0, count = vl.length; i < count; i++) {
  //alert(count);
    message += '<li><span>' + vl[i] + '</span><span>';
}
 $('#result').html(message);  
});
</script>
<?php include_once 'footer.php'; ?>