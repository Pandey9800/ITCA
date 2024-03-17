<?php 
function showdate($id){ 
    return date('d-M-Y',strtotime($id));
}
function getCities() {
    global $con;
    $query = "SELECT * FROM cities";
    $result = mysqli_query($con, $query);
    $cities = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $cities[] = $row['city_name'];
    }
    return $cities;
}
function applicationStatus($id){
    if($id==1){
        $val= '<span class="label label-info btn-lg">Applied</span>';
    }elseif($id==2){
        $val= '<span class="label label-success  btn-lg">Progress</span>';
    }elseif($id==3){
         $val= '<span class="label label-danger  btn-lg">Done</span>';
    }else{
       $val= '<span class="label label-primary  btn-lg">Cancelled</span>';  
    }
    return $val;
}
function setehsile($teh){ 
    $tehsiln="";
    global $con;
    $query=mysqli_query($con,"SELECT `id`, `tehsil` FROM `level` WHERE id='$teh'");
    while($row=mysqli_fetch_array($query)){
        $tehsiln=$row['tehsil'];
    }
    return $tehsiln;
}
function setdist($sdi){ 
      $distn="";
    global $con;
  $query=mysqli_query($con,"SELECT `id`, `dist` FROM `level` WHERE id='$sdi'");
    while($row=mysqli_fetch_array($query)){
        $distn=$row['dist'];
    }
    return $distn;
}
function setstate($sid){ 
    $state="";
    global $con;
    $query=mysqli_query($con,"SELECT `id`, `state` FROM `level` WHERE id='$sid'");
    while($row=mysqli_fetch_array($query)){
        $state=$row['state'];
    }
    return $state;
}
function validate($id){
    global $con;
    return mysqli_real_escape_string($con,$id);
}
function getServiceList($sid){ 
    $state=array();
    global $con;
    $query=mysqli_query($con,"SELECT `document` FROM `servicedoc` WHERE `serviceid`='$sid'");
    while($row=mysqli_fetch_array($query)){
        $state[]=$row['document'];
    }
    return $state;
}
function EcounterType($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `eno` FROM `ecounter` WHERE `employeetype`='$sid'");
  $row=mysqli_num_rows($query);
    return $row;
}
function ServiceName($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `name` FROM `service` WHERE `id`='$sid'");
   if(!empty(mysqli_num_rows($query))){
   $row=mysqli_fetch_array($query);
    $vall=$row['name'];
}else{
$vall=0;
}
return  $vall;
}

function Servicelist($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `id`, `name` FROM `service` WHERE `catid`='$sid'");
    $n =mysqli_num_rows($query);
   if($n>0){
   while($row=mysqli_fetch_array($query))
    {$vall[]=$row;}
}else{
$vall=0;
}
return  $vall;
}
function ServiceNameAmt($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `cost` FROM `service` WHERE `id`='$sid'");
    if(!empty(mysqli_num_rows($query))){
  $row=mysqli_fetch_array($query);
    $vall=$row['cost'];
}else{
$vall=0;
}
return  $vall;
}
function ServiceCashAmt($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `cashback` FROM `service` WHERE `id`='$sid'");
    if(!empty(mysqli_num_rows($query))){
  $row=mysqli_fetch_array($query);
    $vall=$row['cashback'];
}else{
$vall=0;
}
return  $vall;
}
function getServiceName($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `document` FROM `servicedoc` WHERE `serviceid`='$sid'");
    $row=mysqli_fetch_array($query);
    $state=$row['document'];
    return $state;
}
function getServiceNamelist($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `document` FROM `servicedoc` WHERE `serviceid`='$sid'");
while($row=mysqli_fetch_array($query)){
        $state[]=$row;}
if (!empty($state)) {
 return $state;    # code...
}else{ return $state='NULL';}
}

function getupDocsName($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `document` FROM `servicedoc` WHERE `id`='$sid'");
$row=mysqli_fetch_array($query);
        $state=$row['document'] ?? null;

    return $state;
}
function GetCatName($sid) { 
    global $con;
    $query = mysqli_query($con, "SELECT `cast` FROM `cat` WHERE `id`='$sid'");
    $row = mysqli_fetch_array($query);
    
    // Check if $row is not null and 'cast' key is set
    if ($row !== null && isset($row['cast'])) {
        // Use ucwords only if 'cast' is a non-empty string
        $state = is_string($row['cast']) ? ucwords($row['cast']) : $row['cast'];
    } else {
        // Default value if 'cast' is not present or null
        $state = null;
    }
    return $state;
}

function Service2Catid($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `catid` FROM `service` WHERE `id`='$sid'");
    $row=mysqli_fetch_array($query);
    $state=($row['catid']);
    return $state;
}
function EcounterName($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `first_name` FROM `ecounter` WHERE `eno`='$sid'");
  $row=mysqli_fetch_array($query);
    return $row['first_name'];
}
function Formid2pin($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `formid` FROM `coupan` WHERE `id`='$sid'");
  $row=mysqli_fetch_array($query);
    return $row['formid'];
}

function Formid2pin2($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `formid` FROM `coupan` WHERE `formid`='$sid'");
  $row=mysqli_fetch_array($query);
    return $row['formid'];
}
function id2pin($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `id`, `formid`, `pin`, `amt`, `disamt`, `status`, `timedate`, `ip` FROM `coupan` WHERE `id`='$sid'");
  $row=mysqli_fetch_array($query);
    return $row['pin'].'~ Discount Amt.'.$row['disamt'];
}
function id2pin2($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `id`, `formid`, `pin`, `amt`, `disamt`, `status`, `timedate`, `ip` FROM `coupan` WHERE `formid`='$sid'");
  while($row=mysqli_fetch_array($query)){
  $coupandata[]=$row['pin'].'~ Discount Amt.'.$row['disamt'];}
    return $coupandata;
}
function id2pin3($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `id`, `formid`, `pin`, `amt`, `disamt`, `status`, `timedate`, `ip` FROM `coupan` WHERE `id`='$sid'");
  $row=mysqli_fetch_array($query);
    return $row['pin'];//.'~ Discount Amt.'.$row['disamt'];
}
function id2pin4($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `id`, `formid`, `pin`, `amt`, `disamt`, `status`, `timedate`, `ip` FROM `coupan` WHERE `id`='$sid'");
  $row=mysqli_fetch_array($query);
    return $row['amt'];//.'~ Discount Amt.'.$row['disamt'];
}
function id2pinmrp($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `amt` FROM `coupan` WHERE `id`='$sid'");
  $row=mysqli_fetch_array($query);
    return $row['amt'];
}
function id2pindiscmrp($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `disamt` FROM `coupan` WHERE `id`='$sid'");
  $row=mysqli_fetch_array($query);
    return $row['disamt'];
}
function CustNameM($sid) { 
    global $con;
    $query = mysqli_query($con, "SELECT  `name`, `contact` FROM `customer` WHERE `id`='$sid'");
    $row = mysqli_fetch_array($query);

    // Check if $row is not null and if $row['name'] and $row['contact'] are set before applying ucwords
    if ($row !== null && isset($row['name']) && isset($row['contact'])) {
        return ucwords($row['name']) . '<br/>' . $row['contact'];
    } else {
        return ''; // or any default value you prefer
    }
}

function CastName() { 
    global $con;
    $query = mysqli_query($con, "SELECT `id`, `cast` FROM `cat`");
    $catdata = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $catdata[] = $row;
    }
    return $catdata;
}
function CastNamebyid($id){ 
    global $con;
    $query=mysqli_query($con,"SELECT `id`, `cast` FROM `cat` WHERE `id`='$id'");
  $row=mysqli_fetch_assoc($query);
    $catdata=$row['cast'];
    return $catdata; //ucwords($row['cast']).'<br/>'.$row['id'];
}
function CatidByCatid($id) { 
    global $con;
    $query = mysqli_query($con, "SELECT `catid` FROM `service` WHERE `id`='$id'");
    $row = mysqli_fetch_array($query);
    // Check if $row is not null and if $row['catid'] is set before assigning to $catdata
    $catdata = ($row !== null && isset($row['catid'])) ? $row['catid'] : null;
    return $catdata;
}


function getchildupline($memberid){
    global $con;
    global $getchilddownlines;
    $query=mysqli_query($con,"SELECT `spnosor` FROM `ecounter` WHERE `username`='".$memberid."'");
    while($row=mysqli_fetch_array($query)){
        $childdownlines=$row['spnosor'];
        
            $getchilddownlines[]=$childdownlines;
            getchildupline($childdownlines);
        
    }
    return $getchilddownlines;
}
function id2userid($sid){ 
    global $con;
    $query=mysqli_query($con,"SELECT `username` FROM `ecounter` WHERE `eno`='$sid'");
  $row=mysqli_fetch_array($query);
    return $row['username'];
}
?>