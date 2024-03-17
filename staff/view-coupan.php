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
?><div class="content-wrapper"><section class="content-header"><h1><small>Coupan Report</small></h1><ol class="breadcrumb"><li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Coupan Report</li></ol></section>
<section class="content">
<div class="row">
  <?php $service=mysqli_query($con,"SELECT `id`, `catid`, `name`, `cost`, `advrequired`, `advper`, `duedays`, `duepay`, `type`,`pic`, `timedate` FROM `service` ORDER BY `name` ASC");
            while($roww=mysqli_fetch_array($service)){?>
       <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><?php  
$formq=mysqli_query($con, 'SELECT * FROM service WHERE name="'.$roww['name'].'"');
$formdata = mysqli_fetch_assoc($formq);
$usedq=mysqli_query($con,'SELECT * FROM usedcoupan WHERE stfid="'.$_SESSION['memid'].'" AND formid="'.$formdata['id'].'"' );
 
//$nom= mysqli_num_rows($usedq);

$useddata=mysqli_fetch_assoc($usedq);

              echo ucwords($roww['name']);?></h3>
              </div>
            </div>
            <div class="box-body">
              <ul>
                <li><i class="fa fa-check-circle-o"></i> Used: <?php $nom= mysqli_num_rows($usedq);if ($nom>0) {
             echo $useddata['used'];}else{echo $useddata=0;}
              ?></li>
        
              </ul>
            </div>
          </div>
          <?php }?>
      </div>
  </div>
</section>
</div>

     <?php include_once 'footer.php'; ?>