<?php include 'sidebar.php'; 
if(isset($_POST['submit'])){
$namea=validate($_POST['name']);
$sql =mysqli_query($con,"INSERT INTO `cat`(`cast`) VALUES ('$namea')");
if($sql>0){echo "<script>window.open('category?success','_self')</script>";
}else{echo "<script>alert('Server Busy');window.open('category?failed','_self')</script>";
}       
} 
?> 
<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Form Manage</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Form Manage</li>
      </ol>
    </section>
    <section class="content">
            <a href="./"><< Back</a>
<div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title" style="color:#000;">Form List</h3>
               <div class="box-tools pull-right">
                <a href="category?add" type="button" class="btn btn-warning" style="border-radius:20%;color:#fff;">+ Add New</a>
              </div>
            </div>

            <div class="box-body">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
           <table class="table table-striped" class="example1">
                <thead>
                  <tr><th>Sno.</th><th>Name</th><th>Status</th><th>Add On</th></tr>
                </thead>
                <tbody>
                  <tr>
                 <?php $i=1;
          $ress=mysqli_query($con,"SELECT `id`, `form`, `fdate`, `fstatus`, `counter_code`, `fname`, `mname`, `lname`, `ffname`, `fmname`, `flname`, `fmom`, `mmon`, `lmom`, `bod`, `email`, `mobile`, `gender`, `housenum`, `area_street`, `city`, `state`, `pin`, `country`, `id_type`, `add_type`, `bod_type`, `adhar_type`, `id_upload`, `add_upload`, `bod_upload`, `adbar_upload`, `photo_upload`, `upload_sign`, `filed_application`, `application_back`, `rcode`, `ip` FROM `form_details`  ORDER BY `fdate` DESC");
           while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $i; ?>.</td><td><?php echo ucwords($rows['form']); ?></td><td><?php echo ucwords($rows['fstatus']); ?></td><td><?php echo showdate($rows['fdate']); ?></td>
                  </tr>
                  <?php  $i++;}?> 
</tbody></table></div></section></div><?php include_once 'footer.php'; ?>