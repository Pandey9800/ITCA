<?php include_once 'header.php'; 
if(isset($_POST['servicesubmit'])){
	$refercode=mysqli_real_escape_string($con,$_POST['referelcode']);
	$email=mysqli_real_escape_string($con,$_POST['mail']);
	$contact=mysqli_real_escape_string($con,$_POST['cmob']);
	$city=mysqli_real_escape_string($con,$_POST['city']);
	$name=mysqli_real_escape_string($con,$_POST['cname']);
//9575126777
$sqll=mysqli_query($con,"INSERT INTO `ecounter`(`spnosor`,`username`,`employeetype`, `incentivetype`, `first_name`, `present_city`, `mobile_no`, `Email`,`Password`,`pic`,`ip`) VALUES ('$refercode','$contact','refer','commision','$name','$city','$contact','$email','$contact','userr.png','".$ip."')")or die(mysqli_error($con));

//INSERT INTO `structure`(`id`, `sponsorid`, `memid`, `pos`, `timedate`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
 
unset($getchildupline);
        $leveluplines=getchildupline($refercode);
        for($i=0;$i<count($leveluplines);$i++){
            if($leveluplines[$i]!='ADMIN'){
                $query="INSERT INTO structure(sponsorid, memid, pos) VALUES('".$refercode."','".$leveluplines[$i]."',".($i+1).")";
                mysqli_query($con,$query) or die(mysqli_error($con));
            }
        }

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

<section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Fill Inquery Form To Become Partner</h2>
        </div>

        <div class="row">

          <div class="col-lg-2" data-aos="fade-right" data-aos-delay="100"></div>
<div class="col-lg-8" data-aos="fade-left" data-aos-delay="200">
  <ul>
    <li>Kindly Provide Accurate and correct details</li>
    <li>Always use Uniq Mobile Number to Register</li>
    <li>Partner Program Approval May Take 24Hr To Active</li>
    <li>Partner Program Age Criteria is  Minimum 18 year old</li>
  </ul>
<form method="post" class="form-control">
  <div class="form-group">
<br/>
<input type="text" name="referelcode" pattern="[0-9]+" minlength="2" maxlength="30" class="form-control" id="cus_name" placeholder="Do You Have Any Refer Code?">
</div>
<div class="form-group">
<br/>
<input type="text" name="cname" pattern="^[a-z A-Z]*$" minlength="2" maxlength="30" class="form-control" id="cus_name" placeholder="Enter Name*" required="required">
</div>
<br/>
<div class="form-group">
<input type="text" name="city" minlength="2" maxlength="30" pattern="^[a-z A-Z]*$"class="form-control" id="cus_email" placeholder="Enter City*" required="required" >
</div><br/>
<div class="form-group">
<input type="text" name="cmob" minlength="10" maxlength="10" pattern="^[0-9]+" class="form-control" id="cus_phone" placeholder="Contact Number*" required="required">
</div><br/>
<div class="form-group">
<input type="email" name="mail" class="form-control" id="cus_phone" placeholder="Email Id">
</div><br/>
<div class="form-group">
  <textarea class="form-control" name="msg" id="cus_phone" placeholder="Enter Message"></textarea>
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
</div><?php include_once 'footer.php'; ?>