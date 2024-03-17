<?php include 'sidebar.php'; ?>
<?php 
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
?><div class="content-wrapper"><section class="content-header"><h1><small>Coupan Report</small></h1><ol class="breadcrumb"><li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Coupan Report</li></ol></section>
<section class="content">
<div class="row">
      <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <div align="left"><span>Coupan Report List</span></div>
<table class="table table-bordered table-responsive" id="example1"><thead>
<tr><th>Sno.</th><th>Coupan</th><th>Form</th><th>Discount</th><th>Status</th></tr></thead><tbody>
<?php $i=1; $coupansql=mysqli_query($con,"SELECT `id`, `formid`, `pin`, `amt`, `disamt`, `status`, `timedate`, `ip` FROM `coupan`");
while($coupanrun=mysqli_fetch_array($coupansql)){?> 
	<tr> 
		<td><?php echo $i;?>.</td>
		<td><?php echo $coupanrun['pin']; ?></td>
		<td><?php echo ucwords(ServiceName($coupanrun['formid'])); ?></td>
		<td><?php echo $coupanrun['disamt']; ?></td>
		<td><?php if($coupanrun['status']!=1){ ?><b style="color:green;">Unused</b><?php }else{?><b style="color:red;"></b><?php }?></td>
			</tr>
<?php $i++;}?></tbody></table></div></div></div></div></section></div><?php include_once 'footer.php'; ?>