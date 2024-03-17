<?php
 session_start();
 include("../function/db_connect.php"); 
 include_once 'header.php'; ?>
         
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1><br/></font>
            
          </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active"><?php echo $_GET['name']; ?></li>
                </ol>
            </section>
             <?php
				$i=0;
				 $app=mysqli_query($con,"SELECT `id`, `form`, `fdate`, `fstatus`, `counter_code`, `fname`, `mname`, `lname`, `ffname`, `fmname`, `flname`, `fmom`, `mmon`, `lmom`, `bod`, `email`, `mobile`, `gender`, `housenum`, `area_street`, `city`, `state`, `pin`, `country`, `id_type`, `add_type`, `bod_type`, `adhar_type`, `id_upload`, `add_upload`, `bod_upload`, `adbar_upload`, `photo_upload`, `upload_sign`, `filed_application`, `application_back`, `rcode`, `ip` FROM `form_details` WHERE id='".$_GET['id']."'"); 
			$fl=mysqli_fetch_array($app);
			$frmid=$fl['id'];
				$i++;?>
				<a href="./"><< Back</a>
            <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Manage</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
          
            <form action="" method="post" enctype="multipart/form-data">
            <div align="center"><label><font color="#000099">Applicant <?php echo $fl['fname']."&nbsp;".$fl['mname']."&nbsp;".$fl['lname'];  ?> &nbsp;Details</font></label></div>
                      <div class="row"  style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
                       
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
            
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Applicant Full Name<span style="color:red"></span></label>
           <input type="text" value="<?php echo $fl['fname']."&nbsp;".$fl['mname']."&nbsp;".$fl['lname']; ?>" class="form-control" name="first_name" readonly="readonly"/>
                    </div>
                </div>
               <!-- <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Middle Name<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="middle_name" />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class=form-group>
                        <label>Last Name<span style="color:red"></span></label>
                        <input type="text" class="form-control" name="last_name" />
                    </div>
                </div>-->
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Father Full  Name :<span style="color:red"></span></label>
                        <input type="text" value="<?php echo $fl['ffname']."&nbsp;".$fl['fmname']."&nbsp;".$fl['flname']; ?>" class="form-control" name="father_name" readonly="readonly"  />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Mothers Full  Name :<span style="color:red"></span></label>
                        <input type="text" value="<?php echo $fl['fmom']."&nbsp;".$fl['mmon']."&nbsp;".$fl['lmom']; ?>" class="form-control" name="father_name" readonly="readonly"  />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Date Of Birth:<span style="color:red"></span></label>
                        <input type="text" class="form-control" value="<?php echo $fl['bod']; ?>" name="present_address" readonly="readonly" />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Email :<span style="color:red"></span></label>
                        <input type="text" class="form-control" value="<?php echo $fl['email']; ?>" name="present_city" readonly="readonly" />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Mobile Number:<span style="color:red"></span></label>
                        <input type="text" class="form-control" value="<?php echo $fl['mobile']; ?>" name="present_district" readonly="readonly" />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Gender</label>
                        <input type="text" value="<?php echo $fl['gender']; ?>" class="form-control" name="present_state" readonly="readonly" />
                    </div>
                </div>
                <div class=col-sm-12>
                    <div class="form-group mb-10">
                        <label>Full Address :<span style="color:red"></span></label>
                        <input type="text" value="<?php echo $fl['housenum']."&nbsp;".$fl['area_street']."&nbsp;".$fl['city']."&nbsp;".$fl['state']."&nbsp;".$fl['country']; ?>" class="form-control" name="present_pin_code" readonly="readonly" />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Pin Code :<span style="color:red"></span></label>
                        <input type="text" value="<?php echo $fl['pin']; ?>" class="form-control" name="present_country" readonly="readonly" />
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Nationality:<span style="color:red"></span></label>
                        <input type="text" value="<?php echo $fl['country'] ?>" class="form-control" name="perm_address" readonly="readonly" />
                    </div>
                </div>
              
                  <div class=col-sm-12>
                   <legend style="color:#0000CC;">Download Sections</legend>
                    <div class="form-group mb-10">
                        <label>ID Proof:<span style="color:red"></span></label>
                       <a href="../../userpanel/images/customer/id/<?php echo $fl['id_upload']; ?>" target="_blank">Download</a>
                    </div>
                </div>
                     <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Address Proof:<span style="color:red"></span></label>
                       <a href="../../userpanel/images/customer/address/<?php echo $fl['add_upload']; ?>" target="_blank">Download</a>
                    </div>
                </div>
                 <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>BOD Proof:<span style="color:red"></span></label>
                       <a href="../../userpanel/images/customer/dob/<?php echo $fl['bod_upload']; ?>" target="_blank">Download</a>
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Aadhar Card:<span style="color:red"></span></label>
                       <a href="../../userpanel/images/customer/aadhar/<?php echo $fl['adbar_upload']; ?>" target="_blank">Download</a>
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Applicant Sign:<span style="color:red"></span></label>
                       <a href="../../userpanel/images/customer/signature/<?php echo $fl['upload_sign']; ?>" target="_blank">Download</a>
                    </div>
                </div>
                <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Applicant Photo:<span style="color:red"></span></label>
                       <a href="../../userpanel/images/customer/photo/<?php echo $fl['photo_upload']; ?>" target="_blank">Download</a>
                    </div>
                </div>
                  <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Appliccation Frant Copy:<span style="color:red"></span></label>
                       <a href="../../userpanel/images/customer/application/<?php echo $fl['filed_application']; ?>" target="_blank">Download</a>
                    </div>
                </div>
                  <div class=col-sm-4>
                    <div class="form-group mb-10">
                        <label>Appliccation Back Copy:<span style="color:red"></span></label>
                       <a href="../../userpanel/images/customer/application/<?php echo $fl['application_back']; ?>" target="_blank">Download</a>
                    </div>
                </div>                         </div>
                   
           <!-- <input type="submit" class="btn btn-block btn-primary" name="done" style=" margin-left: 555px; width: 100px;height: 50" value="Approved" />-->
            
        </div>
        </form>
        
        <?php
	
		$code=$fl['counter_code'];
		$sid="";
		$zid="";
		$tid="";
		$eid="";
		$mid="";
		$mpid="";
		$memid="";
		$fmini="";
		$zoid="";
$fminid=mysqli_query($con,"SELECT `eno`,`prev`,`state`, `zone`, `dist`, `tehsil`, `ecounter`, `minicounter`, `minicounter_parentid` FROM `ecounter` WHERE `eno`='".$_GET['cname']."'");
while($minfind=mysqli_fetch_array($fminid)){
$fmini=$minfind['minicounter_parentid'];
//echo $fmini.'main';
}
//echo $fmini.'mmmmmmm';
$gcname=$_GET['cname'];
if($fmini==""){$fmini=$gcname;}
//echo $fmini.'vvvvvvvv';
$fid=mysqli_query($con,"SELECT `eno`,`prev`,`state`, `zone`, `dist`, `tehsil`, `ecounter`, `minicounter`, `minicounter_parentid` FROM `ecounter` WHERE `eno`=$fmini");
		$find=mysqli_fetch_array($fid);
		$sid=$find['state'];
		$zid=$find['zone'];
		$did=$find['dist'];
		$tid=$find['tehsil'];
		$eid=$find['ecounter'];
		$mid=$find['minicounter'];
		$mpid=$find['minicounter_parentid'];
		
		
		//f
		if(isset($_POST['done'])){
		$qrys=mysqli_query($con,"UPDATE `form_details` SET `fstatus`='DONE' WHERE `id`='".$_GET['id']."'");
		//zone if three
		 $qry11="SELECT `id`, `form_name`, `section_name`, `commission` FROM `commission` WHERE `section_name`='Zone'";
		$qry11_run=mysqli_fetch_array(mysqli_query($con,$qry11));
		$c1=$qry11_run['commission'];
		$fzone=mysqli_query($con,"SELECT eno,zone FROM ecounter WHERE prev='ZONE'");
		while($rzone=mysqli_fetch_array($fzone)){
		$vz= $rzone['zone'];
		$zoinid=explode(',',$vz);
		//echo $did;
		//print_r ($zoinid);
		if(in_array($did, $zoinid)){
		$zoid= $rzone['eno'];
		$qry1="UPDATE `ecounter` SET `reward_wallet`=reward_wallet+'$c1' WHERE `eno`=$zoid";
		$q1 = mysqli_query($con, $qry1);
		echo "<script>alert('Form IS Excepted! Commission Passed To ZONE')</script>";
		}
		//print_r ($zoinid);
		}
		
		
		//1
		$mem=mysqli_query($con,"SELECT eno FROM `ecounter` WHERE `tehsil`=$tid AND `prev`='TEHSIL'");
		$gmem=mysqli_fetch_array($mem);
		$memid=$gmem['eno'];
	    //for state
	    $qry11="SELECT `id`, `form_name`, `section_name`, `commission` FROM `commission` WHERE `section_name`='TEHSIL'";
		$qry11_run=mysqli_fetch_array(mysqli_query($con,$qry11));
		$c1=$qry11_run['commission'];
	    $qry12 = "INSERT INTO `transactions`(`transfer_from`, `transfer_to`, `transaction_for`, `transaction_for_id`, `amount`, `date_time`, `ip`) VALUES ('ADMIN','".$_GET['cname']."','PAN','$frmid','$c1',NOW(),'".$_SERVER['REMOTE_ADDR']."')";
	$qry1="UPDATE `ecounter` SET `reward_wallet`=reward_wallet+'$c1' WHERE `eno`='$memid'";
		 //state code end
		$q1 = mysqli_query($con, $qry1);
		$q2 = mysqli_query($con, $qry12);
		echo "<script>alert('Form IS Excepted! Commission Passed To Tehsil')</script>";
		 //2
		     $mem=mysqli_query($con,"SELECT `eno` FROM `ecounter` WHERE `dist`=$did  AND `prev`='District'");
		$gmem=mysqli_fetch_array($mem);
		$memid=$gmem['eno'];
		//for state
	    $qry11="SELECT `id`, `form_name`, `section_name`, `commission` FROM `commission` WHERE `section_name`='District'";
		$qry11_run=mysqli_fetch_array(mysqli_query($con,$qry11));
		$c1=$qry11_run['commission'];
	    $qry12 = "INSERT INTO `transactions`(`transfer_from`, `transfer_to`, `transaction_for`,`transaction_for_id`, `amount`, `date_time`, `ip`) VALUES ('ADMIN','".$_GET['cname']."','PAN','$frmid','$c1',NOW(),'".$_SERVER['REMOTE_ADDR']."')";
	$qry1="UPDATE `ecounter` SET `reward_wallet`=reward_wallet+'$c1' WHERE `eno`='$memid'";
		 //state code end
		$q1 = mysqli_query($con, $qry1);
		$q2 = mysqli_query($con, $qry12);
		echo "<script>alert('Form Is Excepted! Commission Passed To District')</script>";
		//3
		$mem=mysqli_query($con,"SELECT `eno` FROM `ecounter` WHERE `state`=$sid AND `prev`='STATE'");
		$gmem=mysqli_fetch_array($mem);
		$memid=$gmem['eno'];
		//for state
	    $qry11="SELECT `id`, `form_name`, `section_name`, `commission` FROM `commission` WHERE `section_name`='STATE'";
		$qry11_run=mysqli_fetch_array(mysqli_query($con,$qry11));
		$c1=$qry11_run['commission'];
	    $qry12 = "INSERT INTO `transactions`(`transfer_from`, `transfer_to`, `transaction_for`, `transaction_for_id`, `amount`, `date_time`, `ip`) VALUES ('ADMIN','".$_GET['cname']."','PAN','$frmid','$c1',NOW(),'".$_SERVER['REMOTE_ADDR']."')";
	$qry1="UPDATE `ecounter` SET `reward_wallet`=reward_wallet+'$c1' WHERE `eno`='$memid'";
		 //state code end
		$q1 = mysqli_query($con, $qry1);
		$q2 = mysqli_query($con, $qry12);
		echo "<script>alert('Form IS Excepted! Commission Passed To STATE')</script>";
		echo "<script>alert('This Application is successfuuly approvied'),window.open('index.php','_self')</script>";
		//4
		}
		 ?>
   

  </div></div>
<?php include_once '../footer.php'; ?>   <!-- ./wrapper -->
    <!-- jQuery 2.1.3 -->
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="../plugins/chartjs/Chart.min.js" type="text/javascript"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard2.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js" type="text/javascript"></script>
</body>

</html>