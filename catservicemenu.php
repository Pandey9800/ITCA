<div id="mainMenu">
<div class="container">
<nav>
<ul>
	<?php 
$data = CastName() ; ?><!--Startup--> <?php 
//print_r($data[0]['cast']) ;
for ($i=0; $i <count($data); $i++) { ?>
<li class="dropdown mega-menu-item">
<a href="catpage?catid=<?php echo $data[$i]['id'];?>">
<?php echo $data[$i]['cast'];?></a>
<ul class="dropdown-menu if_threesub_menu if_threesub_menu_l">
<li class="mega-menu-content">
<div class="row">
<div class="col-lg-4 col-md-4">
<ul>
<?php $s1 = Servicelist($data[$i]['id']);
//print_r($s1);
foreach ($s1 as $key => $value) {?>
<li><a href="service.php?sid=<?php echo $value['id'];?>&catid=<?php echo $data[$i]['id'];?>"><?php    echo $value['name'];?><!--Proprietorship--></a></li>
<?php }?>

</ul>
</div>
</div>
</li>
</ul>
</li>
<?php
}
?>
<li class="d-md-none d-lg-none d-xl-none"><a href="./app">Client Portal</a></li>
<li class="d-md-none d-lg-none d-xl-none"><a href="./contact-us">Contact Us</a></li>
<li class="d-md-none d-lg-none d-xl-none"><a href="./learn/">Learning&nbsp;Center</a></li>
<li class="d-md-none d-lg-none d-xl-none"><a href="https://ledgers.cloud/">LEDGERS</a></li>
</ul>
</nav>
</div>
</div>