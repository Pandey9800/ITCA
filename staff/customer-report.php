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
    <?php if(isset($_GET['add'])){ ?>
    <div class="box-body box-profile"><div class="row">
   <div class="col-md-3"></div> <div class="col-md-6"><div class="box box-default box-solid"><div class="box-header with-border">
              <h3 class="box-title">Add New Customer</h3>
            </div>
             <form method="post" enctype="multipart/form-data">
    <div class="modal-body">
       
            <label>Name*</label>
            <input type="text" name="cname" class="form-control" placeholder="enter here" required="required">
             <label>Contact</label>
            <input type="text" name="cmob" required class="form-control"  placeholder="enter here">
             <label>City</label>
            <input type="text" name="city"required class="form-control"  placeholder="enter here">
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
            <input type="text" name="adharno" class="form-control" placeholder="enter here" >
              <label>Adhaar Card</label>
            <input type="file" name="aacard" class="form-control" placeholder="enter here" >
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
    <?php }else{?>
            <div class="box-header with-border">
              <h3 class="box-title" style="color:#000;">Customer List</h3>
               <div class="box-tools pull-right">
                <a href="customer-report?add" type="button" class="btn btn-warning" style="border-radius:20%;color:#fff;">+ Add New</a>
              </div>
            </div>

            <div class="box-body">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px"><div class="table-responsive">
<table class="table table-striped" id="example1"><thead><tr><th>Sno.</th><th>Name</th><th>Contact</th><th>Location</th><th>Documents</th><th>Manage</th></tr></thead><tbody><tr>
<?php $i=1;echo $_SESSION['memid'];
$ress=mysqli_query($con,"SELECT `id`, `stfid`, `name`, `contact`, `city`, `pincode`, `address`, `panno`, `adharno`, `panphoto`, `aaphoto`, `photo`, `alternativenum`, `timedate` FROM `customer` WHERE (`stfid`='".$_SESSION['memid']."' || `stfid`=0)  ORDER BY `timedate` DESC");
while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $i; ?>.</td>
<th><?php echo ucwords($rows['name']); ?></th>
<td><?php echo ($rows['contact']); ?></td>
<td><?php echo ($rows['city']); ?> <?php echo ($rows['pincode']); ?><br/><?php echo ($rows['address']); ?></td>
<td><?php echo ' Pan No: '.$rows['panno']; ?><br/><?php echo ' AAdhar No: '.($rows['adharno']); ?></td>
<td><a href="manage-customer?cid=<?php echo ($rows['id']); ?>" class="btn btn-info btn-sm">Manage</a></td>
</tr><?php  $i++;}?></tbody></table></div></div></div><?php }?></section></div><?php include_once 'footer.php'; ?>