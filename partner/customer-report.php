<?php include_once 'sidebar.php'; 

?> 
<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Customer Manage</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customer Manage</li>
      </ol>
    </section>
    <section class="content">
            <a href="./"><< Back</a>
<div class="box box-solid">
   
            <div class="box-header with-border">
              <h3 class="box-title" style="color:#000;">Customer List</h3>
               <div class="box-tools pull-right">
                <a href="new-work" type="button" class="btn btn-warning" style="border-radius:20%;color:#fff;">+ Add New</a>
              </div>
            </div>

            <div class="box-body">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px"><div class="table-responsive">
<table class="table table-striped" id="example1"><thead><tr><th>Sno.</th><th>Name</th><th>Contact</th><th>Location</th><th>Add On</th><th>Service</th></tr></thead><tbody><tr>
<?php $i=1;
$ress=mysqli_query($con,"SELECT `id`, `stfid`, `name`, `contact`, `city`,`encounterservice`,`pincode`, `address`, `panno`, `adharno`, `panphoto`, `aaphoto`, `photo`, `alternativenum`, `timedate` FROM `customer` WHERE `stfid`='".$_SESSION['partid']."'  ORDER BY `timedate` DESC");
while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $i; ?>.</td>
<th><?php echo ucwords($rows['name']); ?></th>
<td><?php echo ($rows['contact']); ?></td>
<td><?php echo ($rows['city']); ?> <?php echo ($rows['pincode']); ?><br/><?php echo ($rows['address']); ?></td>
<td><?php echo showdate($rows['timedate']); ?></td>
<td><?php echo ServiceName($rows['encounterservice']); ?>
  <!-- <a href="manage-customer?cid=<?php //echo ($rows['id']); ?>" class="btn btn-info btn-sm">Manage</a> -->
</td>
</tr><?php  $i++;}?></tbody></table></div></div></div></section></div><?php include_once 'footer.php'; ?>