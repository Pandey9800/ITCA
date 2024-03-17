<?php include 'sidebar.php'; 
if(isset($_POST['submit'])){
$namea=validate($_POST['name']);
$inserttype=validate($_POST['inserttype']);
$fieldtype=validate($_POST['fieldtype']);
if($_POST['fieldtype']!='optional'){$mdn=1;}else{$mdn=0;}
$servic=validate($_POST['servicetype']);
//text textarea int photo file

if ($inserttype=='text' || $inserttype=='textarea' || $inserttype=='int') {
  $fieldorfile =1;
}
if ($inserttype=='photo' || $inserttype=='file') {
  $fieldorfile =2;
}

//$docfieldtype =['text', 'textarea', 'int', 'photo', 'file'];print_r($docfieldtype);
// foreach ($docfieldtype as $key => $value) {
//  echo $key;
//  echo $value;
//  if($key==0 || $key==1 || $key==2 || ) {
//   $fieldorfile =1;

//  }
//  if ($key==3 || $key==4) {
//    $fieldorfile =2;

//  }
// }

$sql=mysqli_query($con,"INSERT INTO `documentlist`(`name`, `type`,`fieldorfile`, `mandetory`) VALUES ('$namea','$inserttype','$fieldorfile','$fieldtype')");
$lid=mysqli_insert_id($con);
$sql2= mysqli_query($con, 'SELECT * FROM documentlist WHERE id ="'.$lid.'"');
$data2=mysqli_fetch_assoc($sql2);
$query=mysqli_query($con,"INSERT INTO `servicedoc`(`serviceid`,`docid`, `document`, `type`, `fieldorfile`, `status`) VALUES ('$servic','$lid','$namea','$inserttype','$fieldorfile','$mdn')")or die(mysqli_error($con));
if($sql>0){echo "<script>window.open('documents-setup?success','_self')</script>";
}else{echo "<script>alert('Server Busy');window.open('documents-setup?failed','_self')</script>";
}       
}

if (isset($_POST['save'])) {

  if (isset($_POST['name'])) {
   $sql=mysqli_query($con,"UPDATE `documentlist` SET `name`='".trim($_POST['name'])."' WHERE `id`='".trim($_POST['eid'])."'");
   $sql=mysqli_query($con,"UPDATE `servicedoc` SET `document`='".trim($_POST['name'])."' WHERE `docid`='".trim($_POST['eid'])."'");
  }
   if (isset($_POST['inserttype'])) {
   $sql=mysqli_query($con,"UPDATE `documentlist` SET `type`='".trim($_POST['inserttype'])."' WHERE `id`='".trim($_POST['eid'])."'");
      $sql=mysqli_query($con,"UPDATE `servicedoc` SET `type`='".trim($_POST['inserttype'])."' WHERE `docid`='".trim($_POST['eid'])."'");
  }
   if (isset($_POST['fieldtype'])) {
   $sql=mysqli_query($con,"UPDATE `documentlist` SET `mandetory`='".trim($_POST['fieldtype'])."' WHERE `id`='".trim($_POST['eid'])."'");
if ($_POST['fieldtype']=='optional') {
$_POST['fieldtype']=0;
}else{$_POST['fieldtype']=1;}

     $sql=mysqli_query($con,"UPDATE `servicedoc` SET `status`='".trim($_POST['fieldtype'])."' WHERE `docid`='".trim($_POST['eid'])."'");

  }

  if($sql>0){echo "<script>window.open('documents-setup','_self')</script>";
}else{echo "<script>alert('Server Busy');window.open('documents-setup?failed','_self')</script>";}       

 } 
if(isset($_GET['removeid'])){
  $sql=mysqli_query($con,"DELETE FROM `documentlist` WHERE `id`='".trim($_GET['removeid'])."'");
  $sqll=mysqli_query($con,"DELETE FROM `servicedoc` WHERE `docid`='".trim($_GET['removeid'])."'");
if($sql>0){echo "<script>window.open('documents-setup','_self')</script>";
}else{echo "<script>alert('Server Busy');window.open('documents-setup?failed','_self')</script>";}       
} 
?> 
<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Manage Field</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Field</li>
      </ol>
    </section>
    <section class="content">
            <a href="documents-setup"><< Back</a>
            <div class="box box-default box-solid">
                 <?php if (isset($_GET['eid'])) {  $sql=mysqli_query($con,"SELECT * FROM `documentlist` WHERE `id`='".trim($_GET['eid'])."'"); $data= mysqli_fetch_assoc($sql);?>
               <div class="box-header with-border">
              <h3 class="box-title" style="color:#000;">Edit Field</h3>
            </div>
         
            <div class="box-body">
            <form action="#" method="post" enctype="multipart/form-data">
              <input type="hidden" name="eid" value="<?php echo $_GET['eid'];?>">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
            <div class=col-sm-6>
                    <div class="form-group mb-10">
                      <label> Service <span style="color:red">*</span></label>
                       <select class="form-control select2" name="servicetype" data-placeholder="Select a State"
                        style="width: 100%;">
                         <option value="0">General</option>
                         <?php 
          $resslk=mysqli_query($con,"SELECT `id`,`catid`,`name` FROM `service` ORDER BY `name` ASC");
           while($rows=mysqli_fetch_array($resslk)){?>
                         <option value="<?php echo $rows['id']; ?>"><?php echo ucwords($rows['name']); ?>(<?php echo GetCatName($rows['catid']); ?>)</option>
                       <?php }?>
                       </select>

                        <label> Document Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="name" maxlength="125" required placeholder="Enter Here" maxlength="225" value="<?php echo $data['name'];
                          ?>">
                         <label> Insert Type <span style="color:red">*</span></label>
                       <select class="form-control" name="inserttype">
                         <option value="text" <?php if ($data['type']=='text') {
                         echo 'selected';
                          }?>>Text</option>
                         <option value="textarea" <?php if ($data['type']=='textarea') {
                         echo 'selected';
                          }?>>Long Text</option>
                         <option value="int" <?php if ($data['type']=='int') {
                         echo 'selected';
                          }?>>Number</option>
                          <option value="photo" <?php if ($data['type']=='photo') {
                         echo 'selected';
                          }?>>Photo</option>
                          <option value="file" <?php if ($data['type']=='file') {
                         echo 'selected';
                          }?>>File</option>
                           <!-- <option value="checkbox">Check Box</option> -->

                       </select>

                       <label>Field Type</label><br/> 
                       Optional: <input type="radio" name="fieldtype" value="optional" <?php if ($data['mandetory']=='optional') {
                         echo 'checked';
                          }?> ><br/>
                       Mandatory: <input type="radio" name="fieldtype" value="mandatory" <?php if ($data['mandetory']=='mandatory') {
                         echo 'checked';
                          }?>>
                   <hr/><input type="submit" class="btn btn-primary" name="save" style="width:30%;" value="Save" /></div></form></div>

            <?php }else{?>
            <div class="box-header with-border">
              <h3 class="box-title" style="color:#000;">Add Field</h3>
            </div>
         
            <div class="box-body">
            <form action="#" method="post" enctype="multipart/form-data">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
            <div class=col-sm-6>
                    <div class="form-group mb-10">
                      <label> Service <span style="color:red">*</span></label>
                       <select class="form-control select2" name="servicetype" data-placeholder="Select a State"
                        style="width: 100%;">
                         <option value="0">General</option>
                         <?php 
          $resslk=mysqli_query($con,"SELECT `id`,`catid`,`name` FROM `service` ORDER BY `name` ASC");
           while($rows=mysqli_fetch_array($resslk)){?>
                         <option value="<?php echo $rows['id']; ?>"><?php echo ucwords($rows['name']); ?>(<?php echo GetCatName($rows['catid']); ?>)</option>
                       <?php }?>
                       </select>

                        <label> Document Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="name" maxlength="125" required placeholder="Enter Here" maxlength="225">
                         <label> Insert Type <span style="color:red">*</span></label>
                       <select class="form-control" name="inserttype">
                         <option value="text">Text</option>
                         <option value="textarea">Long Text</option>
                         <option value="int">Number</option>
                          <option value="photo">Photo</option>
                          <option value="file">File</option>
                           <!-- <option value="checkbox">Check Box</option> -->

                       </select>

                       <label>Field Type</label><br/> 
                       Optional: <input type="radio" name="fieldtype" value="optional" checked="checked"><br/>
                       Mandatory: <input type="radio" name="fieldtype" value="mandatory">
                   <hr/><input type="submit" class="btn btn-primary" name="submit" style="width:30%;" value="Submit" /></div></form></div>

                <?php }?>
                <div class=col-sm-6><div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title" style="color:#000;">Field List</h3>
             <!--   <div class="box-tools pull-right">
                <a href="documents-setup?add" type="button" class="btn btn-warning" style="border-radius:20%;color:#fff;">+ Add New</a>
              </div> -->
            </div>
                  <table class="table table-striped" id="example1">
                <thead>
                  <tr><th>Sno.</th><th>Name</th><th>Type</th><th>Action</th></tr>
                </thead>
                <tbody>
                  <tr>
                 <?php $x=1;
          $ress=mysqli_query($con,"SELECT `id`, `name`, `type`, `mandetory`, `timedate` FROM `documentlist` ORDER BY `name` ASC");
           while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $x; ?>.</td><td><?php echo ucwords($rows['name']); ?><?php if($rows['mandetory']!='optional'){  echo '<b style="color:red;">*</b>';;}else{ echo '';} ?> </td><td><?php echo strtoupper($rows['type']); ?></td>
<td><a href="documents-setup?removeid=<?php echo $rows['id']; ?>" onclick="return confirm('Do You Want To Remove')"><i class="fa fa-trash" style="color:red;"></i> </a><a href="?eid=<?php echo $rows['id']; ?>" class="fa fa-edit"></a></td>
                  </tr><?php $x++;}?></tbody>
              </table>
                </div>
           <div class="box-body">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
                   
    </div>
</div></section></div>
<?php include_once 'footer.php'; ?>