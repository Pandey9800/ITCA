<?php include_once 'header.php'; 

if(isset($_POST['service_question_submit'])){
  echo 'yes';
print_r($_POST['service']);

}
if(isset($_POST['servicesubmit'])){

	$refercode=mysqli_real_escape_string($con,$_POST['refer']);
	$email=mysqli_real_escape_string($con,$_POST['mail']);
	$contact=mysqli_real_escape_string($con,$_POST['cmob']);
	$city=mysqli_real_escape_string($con,$_POST['city']);
	$name=mysqli_real_escape_string($con,$_POST['cname']);
	$service=mysqli_real_escape_string($con,$_POST['serviceid']);
	$cid=mysqli_real_escape_string($con,$_POST['catid']);
	$fcost=mysqli_real_escape_string($con,$_POST['formcost']);

$refer=mysqli_query($con,"SELECT `eno` FROM `ecounter` WHERE `memcode`='$refercode'")or die(mysqli_error($con));
if(empty(mysqli_num_rows($refer))){
$refermem=0;
}else{
$referrn=mysqli_fetch_array($refer);
$refermem=$referrn['eno'];
}

$checkq=mysqli_query($con,"SELECT id FROM customer WHERE contact='$contact'")or die(mysqli_error($con));
if(empty(mysqli_num_rows($checkq))){
$query=mysqli_query($con,"INSERT INTO `customer`(`name`,`contact`,`city`) VALUES ('$name','$contact','$city')")or die(mysqli_error($con));
 $custid_id=mysqli_insert_id($con);
}else{
$rrr=mysqli_fetch_array($checkq);
$custid_id=$rrr['id'];
}
$sqll=mysqli_query($con,"INSERT INTO `task`(`applicantid`,`taskid`,`catid`,`mrp`,`status`,`ip`) VALUES ('$custid_id','$service','$refermem','$fcost',1,'$ip')")or die(mysqli_error($con));
if($sqll>0){
	header("Location: thankyou");
}else{
    echo "<script>alert('Server Busy')</script>";
}
}
?><section id="hero">

    <div class="container">
      <div class="row justify-content-between">

</div></div></section>
<!-- personal ifo -->
<?php if(isset($_POST['data'])){?>
<section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Fill Inquery Form & Get  Call on 5min</h2>
        </div>

        <div class="row">

          <div class="col-lg-2" data-aos="fade-right" data-aos-delay="100"></div>
<div class="col-lg-8" data-aos="fade-left" data-aos-delay="200">
<form method="post" >
<div class="form-group">
<input type="radio"  name="service" required>


<input type="radio" name="cname" pattern="^[a-z A-Z]*$" minlength="2" maxlength="30"  id="cus_name" placeholder="Applicant Name*" required="required">
</div>
<br/>
<div class="form-group">
<input type="radio" name="city" minlength="2" maxlength="30" pattern="^[a-z A-Z]*$" id="cus_email" placeholder="Your City*" required="required" >
</div><br/>
<div class="form-group">
<input type="radio" name="cmob" minlength="10" maxlength="10" pattern="^[0-9]+"  id="cus_phone" placeholder="Contact Number*" required="required">
</div><br/>
<div class="form-group">
<input type="email" name="mail"  id="cus_phone" placeholder="Email Id">
</div><br/>
<div class="form-group">
<input type="radio" name="refer"  id="cus_phone" placeholder="Referel Code?">
</div><br/>
</div>
<div class="form-group text-center"><div align="center"><br/>
<button type="submit" name="servicesubmit" class="btn btn-primary btn-lg">Submit</button></div>
</div>
</form>
              
          </div>

        </div>

      </div>
    </section>
<?php } else{?>
    <!-- personal info -->

    <!-- service question -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Answer Few Questions and Continue</h2>
        </div>

        <div class="row">

          <div class="col-lg-2" data-aos="fade-right" data-aos-delay="100"></div>
<div class="col-lg-8" data-aos="fade-left" data-aos-delay="200">
<form method="post" >
  <?php $q = mysqli_query($con, 'SELECT * FROM form_question');
  while ($r = mysqli_fetch_assoc($q)){
  ?>

  <div class="conatinere">
    <div class="row">
      
      <div class="col-lg-10">
        <div class="form-group"><?php echo $r['question']; ?> &nbsp;&nbsp;

 

        </div>

      </div>
<div class="col-lg-2">
  
  Yes <input type="radio"  name="service[]" checked="" > No  <input type="radio"  name="service[]" checked="" >

</div>

    </div>

  </div>

<br/>
<?php } ?>

<br/>
<br/>
<br/>
<br/>
</div>
<div class="form-group text-center"><div align="center"><br/>
<button type="submit" name="service_question_submit" class="btn btn-primary btn-lg">Submit</button></div>
</div>
</form>
              
          </div>

        </div>

      </div>
    </section>
  <?php } ?>
    <!-- service question -->
</div><?php include_once 'footer.php'; ?>