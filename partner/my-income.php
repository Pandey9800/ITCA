<?php include 'sidebar.php'; 
if(isset($_POST['submit'])){
    $quantitystatus=" Invalid Quantity<br>";
    $quantity=trim($_POST['quantity']);
    $selectforma=trim($_POST['selectform']);
    $quantityvalid=false;
    $amount=300;
    $disamount=150;
    $package="Package Amount 300";
    $formpricea=trim($_POST['formprice']);
    $dispricea=trim($_POST['disprice']);

    if(preg_match("/^[0-9]+$/", $quantity) && $quantity>0){
        $quantityvalid=true;
        $quantitystatus="";
    }

    if($quantityvalid){
        $epin=array();
        for($i=0;$i<$quantity;$i++){
            reepin:
            $epincheck=((mt_rand(1,9)*1000000000)+mt_rand(111111111,999999999))."";
            $query=mysqli_query($con,"SELECT pin FROM coupan WHERE pin=".$epincheck."");
            while($row=mysqli_fetch_array($query)){
                goto reepin;
            }
            $epin[]=$epincheck;
        }
        for($i=0;$i<$quantity;$i++){
            $query="INSERT INTO coupan(formid, pin, amt, disamt, timedate, ip) VALUES('$selectforma','".$epin[$i]."',".$formpricea.",".$dispricea.",'".date('Y-m-d')."','".$ip."')";
            mysqli_query($con,$query) or die(mysqli_error($con));
        }
        header('location: view-coupan?a=success');
        exit();
    }
}
?><div class="content-wrapper"><section class="content-header"><h1><small>Income Report</small></h1><ol class="breadcrumb"><li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Income Report</li></ol></section>
<section class="content">
<div class="row">
  <div class="col-md-3">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">My Income</h3>
            </div>
            <div class="box-body">
              &#8377; : 0.00
            </div>
          </div>
        </div> 
        <div class="col-md-3"></div>
   <div class="col-md-3">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">My Bonus</h3>
            </div>
            <div class="box-body">
              &#8377; : 0.00
            </div>
          </div>
        </div> 
  </div><div class="box">
            <div class="box-header">
              <h3 class="box-title">Report</h3>
            </div>
  <div class="box-body"><div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Bonus</th>
                  <th>Against</th>
                  <th>Release date</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>0.00</td>
                  <td>GST Fill
                  </td>
                  <td></td>
                </tr>
               
                </tfoot>
              </table></div>
            </div>
</section>
</div>

     <?php include_once 'footer.php'; ?>