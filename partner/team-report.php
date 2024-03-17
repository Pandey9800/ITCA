<?php include_once 'sidebar.php'; 
if(isset($_GET['did'])){
$namea=trim($_GET['did']);
$sql =mysqli_query($con,"DELETE FROM `customer` WHERE `id`='$namea'");
if($sql>0){echo "<script>window.open('customer-report?success','_self')</script>";
}else{echo "<script>alert('Server Busy');</script>";
}       
} 
   if(isset($_POST['custsubmit'])){ 
 if( isset($_FILES['pik']["name"]) && isset($_FILES['pik']["tmp_name"]) )
        {
           $pik = array();
            $pik = $_FILES['pik']["name"];
            $pik = explode(' ', $pik);
             $pik = array_values(array_filter($pik));

           $pik_temp = array();
             $pik_temp = $_FILES['pik']["tmp_name"];
              $pik_temp = explode(' ', $pik_temp);
            $pik_temp = array_values(array_filter($pik_temp));
$z=$_FILES['pik']["name"];
             for($i=0;$i<count($pik);$i++)
            {
                $my_ext1 = pathinfo( $pik[$i], PATHINFO_EXTENSION );
            if( $my_ext1=='jpg' || $my_ext1=='png' || $my_ext1=='jpeg' || $my_ext1=='gif' ) {
                $final_name1 = $z;//.'.'.$my_ext1;
                   move_uploaded_file($pik_temp[$i],"../images/".$final_name1);
   
             }
            }

             if(isset($final_name1)) {
             $photo = $final_name1;
             // $query = mysqli_query($con,"INSERT INTO customer (photo) VALUES ('".trim($final_name1)."')");
             
            
            }else{$photo ='';}              
        }



        if(isset($_FILES['pancard']["name"]) && isset($_FILES['pancard']["tmp_name"])){
           $pancard = array();
            $pancard = $_FILES['pancard']["name"];
            $pancard = explode(' ', $pancard);
             $pancard = array_values(array_filter($pancard));
           $pancard_temp = array();
             $pancard_temp = $_FILES['pancard']["tmp_name"];
              $pancard_temp = explode(' ', $pancard_temp);
            $pancard_temp = array_values(array_filter($pancard_temp));
$z=$_FILES['pancard']["name"];

             for($i=0;$i<count($pancard);$i++)
            {

                $my_ext1 = pathinfo($pancard[$i], PATHINFO_EXTENSION );
            if( $my_ext1=='jpg' || $my_ext1=='png' || $my_ext1=='jpeg' || $my_ext1=='gif' ) {

                $final_name1 = $z;//.'.'.$my_ext1;
                // echo 'llllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll';
//echo count($pancard);
              move_uploaded_file($pancard_temp[$i],"../assets/docs/".$final_name1);

             }
            }

             if(isset($final_name1)) {
              $panphoto =$final_name1;
             // $query = mysqli_query($con,"INSERT INTO customer (panphoto) VALUES ('".trim($final_name1)."')");
             
            
            }else{$panphoto ='';}               
        }


        if( isset($_FILES['aacard']["name"]) && isset($_FILES['aacard']["tmp_name"]) )
        {
           $aacard = array();
            $aacard = $_FILES['aacard']["name"];
            $aacard = explode(' ', $aacard);
             $aacard = array_values(array_filter($aacard));

           $aacard_temp = array();
             $aacard_temp = $_FILES['aacard']["tmp_name"];
              $aacard_temp = explode(' ', $aacard_temp);
            $aacard_temp = array_values(array_filter($aacard_temp));
$z=$_FILES['aacard']["name"];
             for($i=0;$i<count($aacard);$i++)
            {
                $my_ext2 = pathinfo( $aacard[$i], PATHINFO_EXTENSION );
            if( $my_ext2=='jpg' || $my_ext2=='png' || $my_ext2=='jpeg' || $my_ext2=='gif' ) {
                $final_name2 = $z;//.'.'.$my_ext1;
                   move_uploaded_file($aacard_temp[$i],"../assets/docs/".$final_name2);
   
             }
            }

             if(isset($final_name2)) {
              $aaphoto =$final_name2;
             // $query = mysqli_query($con,"INSERT INTO customer (aaphoto) VALUES ('".trim($final_name1)."')");
             
            
            }else{$aaphoto='';}            
        }


       $query = mysqli_query( $con, "INSERT INTO `customer`( `stfid`,`name`, `contact`, `city`, `pincode`, `address`, `panno`, `panphoto`, `adharno`, `aaphoto`, `photo`) VALUES ('".$_SESSION['memid']."','".$_POST['cname']."','".$_POST['cmob']."','".$_POST['city']."','".$_POST['pincode']."','".$_POST['address']."','".$_POST['panno']."','".$panphoto."','".$_POST['adharno']."','".$aaphoto."','".$photo."')");
      }
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
              <h3 class="box-title" style="color:#000;">My Team</h3>
              
            </div>

            <div class="box-body">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px"><div class="table-responsive">
<table class="table table-striped" id="example1"><thead><tr><th>Sno.</th><th>Name</th><th>Contact</th><th>Location</th><th>Add On</th></tr></thead><tbody><tr>
<?php $i=1;
$ress=mysqli_query($con,"SELECT `eno`, `spnosor`, `username`, `memcode`, `employeetype`, `incentivetype`, `incentive`, `first_name`, `present_address`, `present_city`, `present_district`, `present_state`, `present_pin_code`, `present_country`, `sex`, `dob`, `pan_number`, `mobile_no`, `tel_phone_no`, `qualificaton`, `other_qualification`, `Email`, `Password`, `pan_wallet`, `e_wallet`, `reward_wallet`, `ecounter`, `pic`, `timedate`, `ip` FROM `ecounter` WHERE `spnosor`='".$_SESSION['partid']."'  ORDER BY `timedate` DESC");
while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $i; ?>.</td>
<th><?php echo ucwords($rows['first_name']); ?></th>
<td><?php echo ($rows['mobile_no']); ?></td>
<td><?php echo ($rows['present_city']); ?></td>
<td><?php echo showdate($rows['timedate']); ?></td>
  <!-- <a href="manage-customer?cid=<?php //echo ($rows['id']); ?>" class="btn btn-info btn-sm">Manage</a> -->
</td>
</tr><?php  $i++;}?></tbody></table></div></div></div></section></div><?php include_once 'footer.php'; ?>