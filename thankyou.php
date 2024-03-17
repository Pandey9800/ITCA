<?php
session_start();
include_once 'admin/function/db_connect.php'; // Include header.php only once
include_once 'admin/function/function.php'; // Include function.php only once


// Check if the form is submitted using POST
if (isset($_GET['custid']) && isset($_GET['service_id']) && isset($_GET['catid'])) {
    // Sanitize and validate the input data
$ip = $_SERVER['REMOTE_ADDR'];
//custid=116&service_id=111&catid=22
$insertTaskQuery = "INSERT INTO `task` (`stfid`, `applicantid`, `coupan`, `taskid`, `catid`, `mrp`, `taskamt`, `status`, `taskdiscamt`, `ip`)
    VALUES (0, '".trim($_GET['custid'])."',0, '".trim($_GET['service_id'])."','".trim($_GET['catid'])."', 0, 0, 1, 0, '".$ip."')";    
//
    // $insertTaskQuery = "INSERT INTO task(stfid,applicantid,coupan,taskid,catid,mrp,taskamt,status,taskdiscamt,ip)
    //   VALUES(1,22,'coupan',95,25,'mrp','taskamt','status','taskdiscamt','ip')";

$result = mysqli_query($con, $insertTaskQuery);
    // if ($result) {
    //     // Redirect to the home page
    //     header("Location: ");
    //     exit();
    // } else {
    //     echo "Error: " . mysqli_error($con);
    // }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Cache-control" content="no-transform">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=6" />

<meta name="google-site-verification" content="rRK9d7XHbq7-CnvPy1sajFyGynU-NkXxSJ0Mdi1Xvgs" />
<meta name="facebook-domain-verification" content="g0x7mvffnge0593hegdjk1vosu9snk" />
<title>Thanking You Efilingsgov </title>
<meta name="keywords" content="Efilingsgov, IndiaFiling, India Filing, India Filings, Private Limited Company, Trademark, GST, Income Tax, TDS filing, Payroll, MSME registration">
<meta name="description" content="Platform for company registration, trademark filing, GST registration, GST filing and income tax filing in India. Simplify your compliance and tax filing.">
<meta name="Robots" content="INDEX,FOLLOW">
<link rel="canonical" href="./" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@indiafilings">
<meta name="twitter:title" content="Efilingsgov - MCA, Trademark, GST and Income Tax Services">
<meta name="twitter:description" content="Platform for company registration, trademark filing, GST registration, GST filing and income tax filing in India. Simplify your compliance and tax filing.">
<meta name="twitter:creator" content="@indiafilings">
<meta name="twitter:image" content="./images/Efilingsgov.jpg">
<style type="text/css">@import url('https://fonts.googleapis.com/css2?family=Khand:wght@500&display=swap');


*{
  margin:0;
  padding: 0;
  box-sizing: border-box;
}
body  { 
  overflow: hidden; /* Add this to prevent overflow */
  height: 100vh;
  display: flex;
  font-size: 14px;
  text-align: center;
  justify-content: center;
  align-items: center;
  font-family: 'Khand', sans-serif;   
  background: linear-gradient(185deg, #ff6b6b, #833ab4);
}        

.wrapperAlert {
  width: 500px;
  height: 600px;
  overflow: hidden;
  border-radius: 12px;
  border: thin solid #ddd;           
  background: linear-gradient(45deg, #2d3e50, #3498db);
}

.topHalf {
  width: 100%;
  color: white;
  overflow: hidden;
  min-height: 250px;
  position: relative;
  padding: 40px 0;
}

.topHalf p {
  margin-bottom: 30px;
}
svg {
  fill: white;
}
.topHalf h1 {
  font-size: 2.25rem;
  display: block;
  font-weight: 500;
  letter-spacing: 0.15rem;
  text-shadow: 0 2px rgba(128, 128, 128, 0.6);
}
        
/* Original Author of Bubbles Animation -- https://codepen.io/Lewitje/pen/BNNJjo */
.bg-bubbles{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;            
  z-index: 1;
}

li{
  position: absolute;
  list-style: none;
  display: block;
  width: 40px;
  height: 40px;
  background-color: rgba(255, 255, 255, 0.15);/* fade(green, 75%);*/
  bottom: -160px;

  -webkit-animation: square 20s infinite;
  animation:         square 20s infinite;

  -webkit-transition-timing-function: linear;
  transition-timing-function: linear;
}
li:nth-child(1){
  left: 10%;
}		
li:nth-child(2){
  left: 20%;

  width: 80px;
  height: 80px;

  animation-delay: 2s;
  animation-duration: 17s;
}		
li:nth-child(3){
  left: 25%;
  animation-delay: 4s;
}		
li:nth-child(4){
  left: 40%;
  width: 60px;
  height: 60px;

  animation-duration: 22s;

  background-color: rgba(white, 0.3); /* fade(white, 25%); */
}		
li:nth-child(5){
  left: 70%;
}		
li:nth-child(6){
  left: 80%;
  width: 120px;
  height: 120px;

  animation-delay: 3s;
  background-color: rgba(white, 0.2); /* fade(white, 20%); */
}		
li:nth-child(7){
  left: 32%;
  width: 160px;
  height: 160px;

  animation-delay: 7s;
}		
li:nth-child(8){
  left: 55%;
  width: 20px;
  height: 20px;

  animation-delay: 15s;
  animation-duration: 40s;
}		
li:nth-child(9){
  left: 25%;
  width: 10px;
  height: 10px;

  animation-delay: 2s;
  animation-duration: 40s;
  background-color: rgba(white, 0.3); /*fade(white, 30%);*/
}		
li:nth-child(10){
  left: 90%;
  width: 160px;
  height: 160px;

  animation-delay: 11s;
}

@-webkit-keyframes square {
  0%   { transform: translateY(0); }
  100% { transform: translateY(-500px) rotate(600deg); }
}
@keyframes square {
  0%   { transform: translateY(0); }
  100% { transform: translateY(-500px) rotate(600deg); }
}

.bottomHalf {
  align-items: center;
  padding: 35px;
  background: rgb(0,0,0);
  background: -webkit-linear-gradient(45deg, #019871, #a0ebcf);
}
.bottomHalf p {
  font-weight: 500;
  font-size: 1.05rem;
  margin-bottom: 20px;
}

button {
  border: none;
  color: white;
  cursor: pointer;
  border-radius: 12px;            
  padding: 10px 18px;            
  background-color: #019871;
  text-shadow: 0 1px rgba(128, 128, 128, 0.75);
}
button:hover {
  background-color: #85ddbf;
}

</style>
    <script>
        // Function to submit the form when the link is clicked
        function submitForm() {
            document.getElementById("thankyouForm").submit();
        }
    </script>
</head>
<?php

   // Check if custid, service_id, and catid are present in the URL
if (isset($_GET['custid'], $_GET['service_id'], $_GET['catid'])) {
  $custid = validate($_GET['custid']);
  $service_id = validate($_GET['service_id']);
  $catid = validate($_GET['catid']);

} else {
  // Handle the case where any of the parameters are missing in the URL
  echo "Required parameters not provided in the URL.";
}
    ?>
    <body>
<div class="wrapperAlert">

  <div class="contentAlert">

    <div class="topHalf">

      <p><svg viewBox="0 0 512 512" width="100" title="check-circle">
        <path d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" />
        </svg></p>
      <h1 style="font-size: 60px;">Congratulations!</h1>
      <span style="font-size:25px;color: yellow;">Your Application Submitted Successfully</span>

     <ul class="bg-bubbles">
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
     </ul>
    </div>
      <div class="bottomHalf">
      <?php
        echo '<h2>Your Customer ID Is: <span style="color: #00008B;">' . $custid . '</span></h2>';
    ?>
<!-- Inside your <form> tag -->
<form id="thankyouForm" action="thankyou.php" method="post">
    <input type="hidden" name="custid" value="<?php echo $custid; ?>">
    <input type="hidden" name="service_id" value="<?php echo $service_id; ?>">
    <input type="hidden" name="catid" value="<?php echo $catid; ?>">
</form>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    <h1>Done!, Our Excutive will contact you soon..!</h1> <br/>
  <a href="tel:" style="font-size: larger;">HelpLine <i class="fa fa-phone" style="color:red;"></i> :  +91 6262 34 3456	</a><br/>
  <a href="tel:" style="font-size: larger;">Whatsapp <i class="fa fa-whatsapp" style="color:green;"></i> : +91 6262 34 3456 </a><br/><br/>
  <a href="./" class="btn btn-info" style="font-size: x-large;"><< Back To Website</a><br><br><br><br><br><br>
      </div>
  </div>        
</div>
    </body>
</html>