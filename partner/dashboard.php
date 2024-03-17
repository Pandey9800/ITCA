<?php include 'sidebar.php'; ?>
<div class="content-wrapper"><section class="content-header"><h1>Welcome<small>Back</small>
</h1><ol class="breadcrumb"><li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Dashboard</li></ol></section>

<section class="content">
  
          <div class="row"><div class="col-md-12 col-sm-12 col-xs-12">
              <div class="box box-white box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Available Service</h3>

              <div class="box-tools pull-right">
                <a href="new-work"  class="btn btn-success btn-lg" style="border-radius:150px;"> + New Lead</a>
              </div><hr/>
            <div class="box-body">

 <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Service</th>
                  <th>Documents</th>
                  <th>Charge</th>
                </tr>
                </thead>
                <tbody>
                  <?php $service=mysqli_query($con,"SELECT `id`, `catid`, `name`, `sdetail`, `cost`, `advrequired`, `advper`, `duedays`, `duepay`, `type`, `pic`, `timedate` FROM `service` ORDER BY `name` ASC");
            while($roww=mysqli_fetch_array($service)){?>
                <tr>
                  <td><?php echo ucwords($roww['name']); ?></td>
                   <td><?php $sqll=mysqli_query($con,"SELECT `id`, `docid`, `serviceid`, `document`, `type`, `fieldorfile`, `status` FROM `servicedoc` WHERE `serviceid`='".trim($roww['id'])."'");
                   while($rw=mysqli_fetch_array($sqll)){
                    echo ucwords($rw['document']).'<br/>';}?></td>
                     <td>&#8377;<?php echo ($roww['cost']); ?></td>
                </tr>
              <?php }?>
              </tbody>
            </table>
        </div></div></div></div></div></section></div>
     <?php include_once 'footer.php'; ?>