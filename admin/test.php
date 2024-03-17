<?php include 'sidebar.php';error_reporting(0)  ?>
<div class="content-wrapper"><?php for ($i=0; $i < 20; $i++) { 
echo ';<br>';
}?>
  
<div class="content-wrapper">
  <select onchange="getval"><?php ?> >
  <option value="1"></option>
</select>
</div>
</div>




<script type="text/javascript">

  function getval(sel){
    var ids=sel.value;
   window.open('view-coupan?aform='+ids,'_self');
}

function getvalf(sel){
    var ids=sel.value;
   window.open('view-coupan?acoupan='+ids,'_self');
}</script>


     <?php include_once 'footer.php'; ?>