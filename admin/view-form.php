<?php include 'sidebar.php'; 

// Process form submission to send message
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
  // Retrieve form data
  $taskid = $_POST['taskid'];
  $message = $_POST['message'];

  // Insert the message into the recentchat table
  $insert_query = "INSERT INTO recentchat (taskid, estfid, echat, date, time) VALUES ('$taskid', 'admin', '$message', CURDATE(), CURTIME())";
  if (mysqli_query($con, $insert_query)) {
      // Message inserted successfully
  } else {
      // Error inserting message
      echo "Error: " . mysqli_error($con);
  }
}


if(isset($_POST['submitview'])){
  $statusactive=validate($_POST['action']);
  $applicant=mysqli_query($con,"UPDATE `task` SET `status`='".$statusactive."' WHERE `id`='".trim($_GET['taskid'])."'"); 
  $uploadFolder = '../assets/docs/';
  $imageTmpName = $_FILES['file']['tmp_name'];
  $imageName =explode(".", $_FILES['file']['name']);
  $file = md5(uniqid()). '.' . end($imageName);
  $result = move_uploaded_file($imageTmpName,$uploadFolder.$file);
  if(!empty($_POST['comment'])){
     $reason=validate($_POST['comment']);
  }elseif(!empty($_POST['commenttwo'])){
     $reason=validate($_POST['commenttwo']);
  }elseif(!empty($_POST['commentthree'])){
     $reason=validate($_POST['commentthree']); 
  }
  $asdate=validate($_POST['assigndate']); 
  $sqltest=mysqli_query($con,"SELECT `formid`,`actiontyp`,`asdate`, `reason`, `file`, `ip` FROM `formreason` WHERE id='".trim($_GET['taskid'])."'");
 $n=mysqli_fetch_array($sqltest);
if (empty($_POST['comment'])) {
  $reason='';
}
if (empty($_FILES['file']['tmp_name'])) {
  $file='';
} 
$formid=$n['formid'];
//Incorrect integer value: '' for column `efillings`.`formreason`.`taskid` at row 1
  $sql=mysqli_query($con,"INSERT INTO `formreason`(`taskid`,`formid`,`actiontyp`,`asdate`, `reason`, `file`, `ip`) VALUES ('".trim($_GET['taskid'])."','".$formid."','".$statusactive."','".$asdate."','".$reason."','".$file."','".$ip."')")or die(mysqli_error($con));
  if($applicant>0 && $sql>0){
header("Location: view-form?taskid=".trim($_GET['taskid'])."&applicantid=".trim($_GET['applicantid']));
  }else{
header("Location: view-form?fail&taskid=".trim($_GET['taskid'])."&applicantid=".trim($_GET['applicantid']));
}}

// Retrieve task ID from URL
if (isset($_GET['taskid'])) {
  $taskid = $_GET['taskid'];
} else {
  // Handle the case where $taskid is not provided
  // You can redirect the user or display an error message
  exit("Task ID is not provided.");
}




if(isset($_POST['assign'])){
//assign->tskid,excutive
$sql =mysqli_query($con,"UPDATE `task` SET `assign`='".trim($_POST['excutive'])."', `status`=1 WHERE `id`='".trim($_POST['tskid'])."'");

$assignq = mysqli_query($con, 'INSERT INTO assignedlist(taskid, assign) VALUES("'.trim($_POST['tskid']).'","'.trim($_POST['excutive']).'")');
if($sql>0){
    echo "<script>alert('Assign Successfully');</script><meta http-equiv='refresh' content='0'/>";
} else {
    echo "<script>alert('Server Busy');</script><meta http-equiv='refresh' content='0'/>";
} } 
$tsl=mysqli_query($con,"SELECT `id`, `assign`, `stfid`, `applicantid`, `coupan`, `taskid`, `taskamt`, `taskdiscamt`, `assing`, `status`, `timedate`, `ip` FROM `task` WHERE `id`='".trim($_GET['taskid'])."'");
$runnx=mysqli_fetch_array($tsl); 

$custsql=mysqli_query($con,"SELECT `id`, `stfid`, `name`, `contact`, `city`, `pincode`, `address`, `panno`, `adharno`, `panphoto`, `aaphoto`, `photo`, `alternativenum`, `timedate` FROM `customer` WHERE `id`='".trim($_GET['applicantid'])."'");
 $runcust=mysqli_fetch_assoc($custsql); ?><style type="text/css">li, ul {  
list-style-type: none;  
font-weight: bold;  }</style>

<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Add New User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New User</li>
      </ol>
    </section>
            <a href="create-new-user"><< Back</a>
    <section class="content">
           <div class="row">
<div align="center"><b style="font-size:20px;"><?php echo ServiceName($runnx['taskid']); ?></b></div>
            <div class="col-md-4">
               
               
          <div class="nav-tabs-custom">
            <div align="center"><span>Required Personal Document</span></div>
            <ul>
               <?php  $rdocument=mysqli_query($con,"SELECT `docname` FROM `forminput` WHERE `taskno`='".trim($_GET['taskid'])."'");   
                while($row=mysqli_fetch_array($rdocument)){ ?>
              <li><i class="fa fa-check-circle text-green"></i> <?php echo ucwords(getupDocsName($row['docname'])); ?></li>
            <?php }?>
            </ul> 
              
              <div class="tab-pane" id="tab_2">
                  <div align="center"><a href="#" class="btn btn-default btn-block btn-lg"><b style="font-size:30px;"><?php echo applicationStatus($runnx['status']); ?></b></a></div>
              </div>
            </div>
          </div>
         <form method="post">
 <div class="col-md-4">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Applicant Details</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                
               
                <table class="table table-bordered">
                  <?php if(!empty($runcust['photo'])){ ?><tr><th colspan="2"><img src="../images/<?php echo $runcust['photo']; ?>"></th></tr><?php } ?>
                  <tr><th>Applicant</th><td><input type="text" value="<?php  echo ucwords($runcust['name'] ??null); ?>"></td></tr>
                  <tr><th>Contact Number</th><td><input type="text" value="<?php  echo ($runcust['contact'] ??null); ?>"></td></tr>
                  <tr><th>City Name</th><td><input type="text" value="<?php echo ucwords($runcust['city'] ??null); ?>"></td></tr>
                   <tr><th>Pincode </th><td><input type="text" value="<?php  echo ($runcust['pincode'] ??null); ?>"></td></tr>
                     <tr><th>Address </th><td><input type="text" value="<?php  echo ucwords($runcust['address'] ??null); ?>"></td></tr>
                      <tr><th>Pan No. </th><td><input type="text" value="<?php  echo ($runcust['panno'] ??null); ?>"></td></tr>
                       <tr><th>Adhaar Card No. </th><td><input type="text" value="<?php  echo ($runcust['adharno' ??null]); ?>"></td></tr>
                        <tr><th>Alernative Number </th><td><input type="text" value="<?php  echo ($runcust['alternativenum'] ??null); ?>"></td></tr>
                </table>
               
                <div class="box box-danger direct-chat direct-chat-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Recent Chat</h3>
    </div>
    <div class="box-body">
        <div class="direct-chat-messages">
            <?php
            $chat_query = mysqli_query($con, "SELECT * FROM recentchat WHERE taskid = '$taskid' ORDER BY date DESC, time DESC LIMIT 10");
            while ($chat_data = mysqli_fetch_assoc($chat_query)) {
                // Display each chat message
                echo '<div class="direct-chat-msg">';
                echo '<div class="direct-chat-info clearfix">';
                echo '<span class="direct-chat-name pull-left">' . $chat_data['estfid'] . '</span>';
                echo '<span class="direct-chat-timestamp pull-right">' . $chat_data['date'] . ' ' . $chat_data['time'] . '</span>';
                echo '</div>';
                echo '<div class="direct-chat-text">' . $chat_data['echat'] . '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <div class="box-footer">
        <form method="POST" action="">
            <div class="input-group">
                <input type="hidden" name="taskid" value="<?php echo $taskid; ?>">
                <input type="text" name="message" placeholder="Type message here..." class="form-control">
                <span class="input-group-btn">
                    <button type="submit" name="submit" class="btn btn-danger btn-flat">Send</button>
                </span>
            </div>
        </form>
    </div>
</div>
</div>
<div align="center"><button class="btn btn-primary" name="submit" type="submit">Submit</button><br/></div>
<br/></div> 
      </div></div></form>
<div class="col-md-4">
 <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Final Status</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                
                <div class="post">
                  <div class="user-block">
                    <span class="description">Status</span>
                  </div>
                  <div class="row margin-bottom">
                    <div class="col-sm-12">
                <form method="post" enctype="multipart/form-data">
                  <?php

$status=mysqli_query($con,"SELECT `taskid` FROM `task` WHERE `id`='".trim($_GET['taskid'])."'");
  
$rin=mysqli_fetch_array($status);

 // print_r($rin);?><input type="hidden" name="formid" value="<?php echo $rin['taskid']?>">
                     <select class="form-control" name="action" id="finalaction" onchange="showDiv(this)" required="required">
                      <option value="1">Applied</option>
                      <option value="2">Progress</option>
                      <option value="3">Success</option>
                      <option value="4">Rejected</option>
                     </select>

                     <div id="done_div" style="display:none;">

  <label>Done</label><br/> </div><div id="hold_div" style="display:none;">
  <span>Hold</span><br/></div> <div id="reject_div" style="display:none;">
                    <span>Reject</span><br/></div>

                      <label>Comment</label>
                      <input type="text" placeholder="enter here" name="comment" class="form-control">
                      <label>Submit Date</label>
                      <input type="date" placeholder="enter here" name="assigndate" value="<?php echo date('Y-m-d')?>"class="form-control">
                      <label>Upload File</label>
                      <input type="file" name="file" class="form-control">
<br/>
 <button class="btn btn-primary btn-sm" name="submitview" type="submit">Submit</button>
                     </div>
                 </form>
          </div>

</div>

    </div></section></div>
<?php include_once 'footer.php'; ?>