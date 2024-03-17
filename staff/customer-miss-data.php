<?php include 'sidebar.php'; ?>
<?php 
$cid= $_GET['cid'];
// documentphotosubmit starts
if (isset($_POST['documentphotosubmit'])) {

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
                   move_uploaded_file($pik_temp[$i],"../assets/docs/".$final_name1);
   
             }
            }

             if(isset($final_name1)) {
             $photo = $final_name1;
             // $query = mysqli_query($con,"INSERT INTO customer (photo) VALUES ('".trim($final_name1)."')");
             
            
            }else{$photo ='';}              
        }
if( isset($_FILES['panphoto']["name"]) && isset($_FILES['panphoto']["tmp_name"]) )
        {
           $pik = array();
            $pik = $_FILES['panphoto']["name"];
            $pik = explode(' ', $pik);
             $pik = array_values(array_filter($pik));

           $pik_temp = array();
             $pik_temp = $_FILES['panphoto']["tmp_name"];
              $pik_temp = explode(' ', $pik_temp);
            $pik_temp = array_values(array_filter($pik_temp));
$z=$_FILES['panphoto']["name"];
             for($i=0;$i<count($pik);$i++)
            {
                $my_ext2 = pathinfo( $pik[$i], PATHINFO_EXTENSION );
            if( $my_ext2=='jpg' || $my_ext2=='png' || $my_ext2=='jpeg' || $my_ext2=='gif' ) {
                $final_name2 = $z;//.'.'.$my_ext1;
                   move_uploaded_file($pik_temp[$i],"../assets/docs/".$final_name2);
   
             }
            }

             if(isset($final_name2)) {
             $panphoto = $final_name2;
             // $query = mysqli_query($con,"INSERT INTO customer (photo) VALUES ('".trim($final_name1)."')");
             
            
            }else{$panphoto ='';}              
        }
if( isset($_FILES['aaphoto']["name"]) && isset($_FILES['aaphoto']["tmp_name"]) )
        {
           $pik = array();
            $pik = $_FILES['aaphoto']["name"];
            $pik = explode(' ', $pik);
             $pik = array_values(array_filter($pik));

           $pik_temp = array();
             $pik_temp = $_FILES['aaphoto']["tmp_name"];
              $pik_temp = explode(' ', $pik_temp);
            $pik_temp = array_values(array_filter($pik_temp));
$z=$_FILES['aaphoto']["name"];
             for($i=0;$i<count($pik);$i++)
            {
                $my_ext3 = pathinfo( $pik[$i], PATHINFO_EXTENSION );
            if( $my_ext3=='jpg' || $my_ext3=='png' || $my_ext3=='jpeg' || $my_ext3=='gif' ) {
                $final_name3 = $z;//.'.'.$my_ext1;
                   move_uploaded_file($pik_temp[$i],"../assets/docs/".$final_name3);
   
             }
            }

             if(isset($final_name3)) {
             $aaphoto = $final_name3;
             // $query = mysqli_query($con,"INSERT INTO customer (photo) VALUES ('".trim($final_name1)."')");
             
            
            }else{$photo ='';}              
        }

       // $query = mysqli_query( $con, "UPDATE `customer` SET `panphoto`='".$panphoto."' WHERE `stfid`='".$_SESSION['memid']."'AND `id`='".$_POST['cid']."'");

        $query = mysqli_query( $con, "UPDATE `customer` SET `photo`='".$photo."',  `panphoto`='".$panphoto."', `aaphoto`='".$aaphoto."' WHERE (`stfid`='".$_SESSION['memid']."' || `stfid`=0) AND `id`='".$_POST['cid']."'");
echo "<script>window.open('manage-customer?cid=".$cid."&success','_self')</script>";

 //$query = mysqli_query( $con, "UPDATE `customer` SET `aaphoto`='".$aaphoto."' WHERE `stfid`='".$_SESSION['memid']."'AND `id`='".$_POST['cid']."'");




}

// documentphotosubmit ends


// piksubmit starts
if (isset($_POST['piksubmit'])) {
//	echo 'set';
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
                   move_uploaded_file($pik_temp[$i],"../assets/docs/".$final_name1);
   
             }
            }

             if(isset($final_name1)) {
             $photo = $final_name1;
             // $query = mysqli_query($con,"INSERT INTO customer (photo) VALUES ('".trim($final_name1)."')");
             
            
            }else{$photo ='';}              
        }
     $query = mysqli_query( $con, "UPDATE `customer` SET `photo`='".$photo."' WHERE (`stfid`='".$_SESSION['memid']."' || `stfid`=0)AND `id`='".$_POST['cid']."'");
echo "<script>window.open('manage-customer?cid=".$cid."&success','_self')</script>";

         }

         //aadhar photo starts
if(isset($_FILES['aaphoto']["name"]) && isset($_FILES['aaphoto']["tmp_name"]))
        {
           $pik = array();
            $pik = $_FILES['aaphoto']["name"];
            $pik = explode(' ', $pik);
             $pik = array_values(array_filter($pik));

           $pik_temp = array();
             $pik_temp = $_FILES['aaphoto']["tmp_name"];
              $pik_temp = explode(' ', $pik_temp);
            $pik_temp = array_values(array_filter($pik_temp));
$z=$_FILES['aaphoto']["name"];
             for($i=0;$i<count($pik);$i++)
            {
                $my_ext1 = pathinfo( $pik[$i], PATHINFO_EXTENSION );
            if( $my_ext1=='jpg' || $my_ext1=='png' || $my_ext1=='jpeg' || $my_ext1=='gif' ) {
                $final_name1 = $z;//.'.'.$my_ext1;
                   move_uploaded_file($pik_temp[$i],"../assets/docs/".$final_name1);
   
             }
            }

             if(isset($final_name1)) {
             $aaphoto = $final_name1;
             // $query = mysqli_query($con,"INSERT INTO customer (photo) VALUES ('".trim($final_name1)."')");
             
            
            }else{$photo ='';}
              $query = mysqli_query( $con, "UPDATE `customer` SET `aaphoto`='".$aaphoto."' WHERE (`stfid`='".$_SESSION['memid']."' || `stfid`=0) AND `id`='".$_POST['cid']."'");
echo "<script>window.open('manage-customer?cid=".$cid."&success','_self')</script>";

        }   
       

       //aadhar photo ends

        // aadhar no starts
        if (isset($_POST['aadharnosubmit'])) {

        if (isset($_POST['aadharno'])) {
$query = mysqli_query( $con, "UPDATE `customer` SET `adharno`='".$_POST['aadharno']."' WHERE `stfid`='".$_SESSION['memid']."'AND `id`='".$_POST['cid']."'");


        }
       // $query = mysqli_query( $con, "UPDATE `customer` SET `photo`='".$photo."' WHERE (`stfid`='".$_SESSION['memid']."' || `stfid`=0)AND `id`='".$_POST['cid']."'");
echo "<script>window.open('manage-customer?cid=".$cid."&success','_self')</script>";


        }
//aadhar no ends

        //pan photo starts
if (isset($_POST['panphotosubmit'])) {
//  echo 'set';
 if( isset($_FILES['panphoto']["name"]) && isset($_FILES['panphoto']["tmp_name"]) )
        {
           $pik = array();
            $pik = $_FILES['panphoto']["name"];
            $pik = explode(' ', $pik);
             $pik = array_values(array_filter($pik));

           $pik_temp = array();
             $pik_temp = $_FILES['panphoto']["tmp_name"];
              $pik_temp = explode(' ', $pik_temp);
            $pik_temp = array_values(array_filter($pik_temp));
$z=$_FILES['panphoto']["name"];
             for($i=0;$i<count($pik);$i++)
            {
                $my_ext1 = pathinfo( $pik[$i], PATHINFO_EXTENSION );
            if( $my_ext1=='jpg' || $my_ext1=='png' || $my_ext1=='jpeg' || $my_ext1=='gif' ) {
                $final_name1 = $z;//.'.'.$my_ext1;
                   move_uploaded_file($pik_temp[$i],"../assets/docs/".$final_name1);
   
             }
            }

             if(isset($final_name1)) {
             $panphoto = $final_name1;
             // $query = mysqli_query($con,"INSERT INTO customer (photo) VALUES ('".trim($final_name1)."')");
             
            
            }else{$panphoto ='';}              
        }

        $query = mysqli_query( $con, "UPDATE `customer` SET `panphoto`='".$panphoto."' WHERE (`stfid`='".$_SESSION['memid']."' || `stfid`=0) AND `id`='".$_POST['cid']."'");

echo "<script>window.open('manage-customer?cid=".$cid."&success','_self')</script>";

        }


//pan photo ends
//aadhar photo starts
        if (isset($_POST['aaphotosubmit'])) {
//  echo 'set';
 if( isset($_FILES['aaphoto']["name"]) && isset($_FILES['aaphoto']["tmp_name"]) )
        {
           $pik = array();
            $pik = $_FILES['aaphoto']["name"];
            $pik = explode(' ', $pik);
             $pik = array_values(array_filter($pik));

           $pik_temp = array();
             $pik_temp = $_FILES['aaphoto']["tmp_name"];
              $pik_temp = explode(' ', $pik_temp);
            $pik_temp = array_values(array_filter($pik_temp));
$z=$_FILES['aaphoto']["name"];
             for($i=0;$i<count($pik);$i++)
            {
                $my_ext1 = pathinfo( $pik[$i], PATHINFO_EXTENSION );
            if( $my_ext1=='jpg' || $my_ext1=='png' || $my_ext1=='jpeg' || $my_ext1=='gif' ) {
                $final_name1 = $z;//.'.'.$my_ext1;
                   move_uploaded_file($pik_temp[$i],"../assets/docs/".$final_name1);
   
             }
            }

             if(isset($final_name1)) {
             $aaphoto = $final_name1;
             // $query = mysqli_query($con,"INSERT INTO customer (photo) VALUES ('".trim($final_name1)."')");
             
            
            }else{$photo ='';}              
        }

        $query = mysqli_query( $con, "UPDATE `customer` SET `aaphoto`='".$aaphoto."' WHERE (`stfid`='".$_SESSION['memid']."' || `stfid`=0) AND `id`='".$_POST['cid']."'");

echo "<script>window.open('manage-customer?cid=".$cid."&success','_self')</script>";

        }
//aadhar photo ends
        //aadhar no starts
        if (isset($_POST['aadharnosubmit'])) {

        if (isset($_POST['aadharno'])) {
$query = mysqli_query( $con, "UPDATE `customer` SET `adharno`='".$_POST['aadharno']."' WHERE (`stfid`='".$_SESSION['memid']."' || `stfid`=0) AND `id`='".$_POST['cid']."'");


        }
echo "<script>window.open('manage-customer?cid=".$cid."&success','_self')</script>";
        }
//aadhar no ends

        //pan no starts
        if (isset($_POST['pannosubmit'])) {

        if (isset($_POST['panno'])) {
$query = mysqli_query( $con, "UPDATE `customer` SET `panno`='".$_POST['panno']."' WHERE (`stfid`='".$_SESSION['memid']."' || `stfid`=0) AND `id`='".$_POST['cid']."'");

echo "<script>window.open('manage-customer?cid=".$cid."&success','_self')</script>";
        }
//echo 'llllllllllllll';
        }
        //pan no ends
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
            <a href="./manage-customer.php?cid=<?php echo $_GET['cid'];?>"><< Back</a>


<div class="box box-solid">
	<div class="box-body">

	 <form method="post" enctype="multipart/form-data">
	









 <?php
 $photoquery = mysqli_query($con, "SELECT photo FROM customer WHERE(`stfid`='".$_SESSION['memid']."' || `stfid`=0) AND `id`='".$_GET['cid']."'");
$photoresult = mysqli_fetch_assoc($photoquery);

// echo !empty($photoresult['photo']);
//  if(isset($_GET['aadharadd']) && ($_GET['aadharadd']=='aaphoto'))
//  {
//     if(isset($_GET['panadd']) && ($_GET['panadd']=='panphoto'))
//         { 
//             if(empty($photoresult['photo']))
// {
// echo 'dsgdgsdfgsdfgdsfgsdfgdfsgdfgdfgdfgsdfgsdfg';
//  }
// }
// }
 if(isset($_GET['aadharadd']) && ($_GET['aadharadd']=='aaphoto') && isset($_GET['panadd']) && ($_GET['panadd']=='panphoto') && empty($photoresult['photo'])){

//if(empty($photoresult['photo'])){
    //echo 'ist pik';# code...



?>  
                <label>Photo</label><?php //if (isset($_POST['piksubmit'])) {echo 'set';}?>
            <input type="file" name="pik" class="form-control"  placeholder="enter here">
            <input type="hidden" name="cid" value="<?php echo $_GET['cid'];?>">
          <br>

<!-- <input type="submit" class="btn btn-info" name="piksubmit"> -->

<?php ?>

<!-- pan, aadhar, pik photo starts -->
     <?php
if(isset($_GET['panadd']) && $_GET['panadd']=='panphoto') {
    //echo 'ist pik';# code...


$panquery = mysqli_query($con, "SELECT panphoto FROM customer WHERE (`stfid`='".$_SESSION['memid']."' || `stfid`=0) AND `id`='".$_GET['cid']."'");
$panresult= mysqli_fetch_assoc($photoquery);

if(empty($panresult['panphoto'])){

?>  
                <label>PAN Photo</label><?php //if (isset($_POST['piksubmit'])) {echo 'set';}?>
            <input type="file" name="panphoto" class="form-control"  placeholder="enter here">
           


<?php }}?>

     <?php
if (isset($_GET['aadharadd']) && $_GET['aadharadd']=='aaphoto') {
    //echo 'ist pik';# code...
$aaquery = mysqli_query($con, "SELECT aaphoto FROM customer WHERE(`stfid`='".$_SESSION['memid']."' || `stfid`=0) AND `id`='".$_GET['cid']."'");
$aaresult=mysqli_fetch_assoc($aaquery);

if(empty($aaresult['aaphoto'])){
?>  <br><br>
                <label>AADHAR Photo</label><?php //if (isset($_POST['piksubmit'])) {echo 'set';}?>
            <input type="file" name="aaphoto" class="form-control"  placeholder="enter here">
           <br>
            &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="documentphotosubmit" class="btn btn-primary">Submit</button>


<?php }}}else{?>


 <?php
if (isset($_GET['newadd']) && $_GET['newadd']=='pik') {
    //echo 'ist pik';# code...



?>  
                <label>Photo</label><?php //if (isset($_POST['piksubmit'])) {echo 'set';}?>
            <input type="file" name="pik" class="form-control"  placeholder="enter here">
            <input type="hidden" name="cid" value="<?php echo $_GET['cid'];?>">
            &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="piksubmit" class="btn btn-primary">Submit</button>


<?php }?>
     <?php
if(isset($_GET['panadd']) && $_GET['panadd']=='panphoto') {
    //echo 'ist pik';# code...

$panquery = mysqli_query($con, "SELECT panphoto FROM customer WHERE (`stfid`='".$_SESSION['memid']."' || `stfid`=0)AND `id`='".$_GET['cid']."'");
$panresult= mysqli_fetch_assoc($panquery);
//echo empty($panresult['panphoto']);
if(empty($panresult['panphoto'])){

?>  
                <label>PAN Photo</label><?php //if (isset($_POST['piksubmit'])) {echo 'set';}?>
            <input type="file" name="panphoto" class="form-control"  placeholder="enter here">
            <input type="hidden" name="cid" value="<?php echo $_GET['cid'];?>"><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="panphotosubmit" class="btn btn-primary">Submit</button>


<?php }}?>

     <?php
if (isset($_GET['aadharadd']) && $_GET['aadharadd']=='aaphoto') {
    //echo 'ist pik';# code...
$aaquery = mysqli_query($con, "SELECT aaphoto FROM customer WHERE (`stfid`='".$_SESSION['memid']."' || `stfid`=0) AND `id`='".$_GET['cid']."'");
$aaresult=mysqli_fetch_assoc($aaquery);

if(empty($aaresult['aaphoto'])){
?>  <br><br>
                <label>AADHAR Photo</label><?php //if (isset($_POST['piksubmit'])) {echo 'set';}?>
            <input type="file" name="aaphoto" class="form-control"  placeholder="enter here">
            <input type="hidden" name="cid" value="<?php echo $_GET['cid'];?>"><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="aaphotosubmit" class="btn btn-primary">Submit</button>


<?php }}}?>

<!-- AAdhar No -->
<?php 
if (isset($_GET['newadd']) && $_GET['newadd']=='aadharno') {
	//echo 'ist aadhar no';# code...
?>

                <label>AADHAR No.</label><?php //if (isset($_POST['piksubmit'])) {echo 'set';}?>
            <input type="text" name="aadharno" minlength="12"  maxlength="12" pattern="[0-9]{12}" required class="form-control"  placeholder="enter here only numbers "><br>
            <input type="hidden" name="cid" value="<?php echo $_GET['cid'];?>">
            &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="aadharnosubmit" class="btn btn-primary">Submit</button>


<?php }?>
<!-- Aadhar No -->
<!-- Pan No -->
<?php
if (isset($_GET['newadd']) && $_GET['newadd']=='panno') {
  //  echo 'ist Pan no';# code...
?>

                <label>PAN No.</label><?php //if (isset($_POST['piksubmit'])) {echo 'set';}?>
            <input type="text" name="panno" minlength="10"  maxlength="10" size="10"  required class="form-control"  placeholder="enter here Pan no number only "><br>
            <input type="hidden" name="cid" value="<?php echo $_GET['cid'];?>">
            &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="pannosubmit" class="btn btn-primary">Submit</button>


<?php }?>
<!-- Pan No -->
  </div>  </form>
</div>






        </section></div></section></div>


        <?php include_once 'footer.php'; ?>