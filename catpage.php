<?php include_once 'header.php'; ?>

<div><br><br><br></div>

<section class="p-b-20 p-t-20" id="dyn_con_product_cat" style="background-color: white;">
<div class="container">
<div class="row">
<div class="col-md-12 col-lg-12 custum_query1 p-t-20">
<div id="tableSection_datas">
<div class="row">
	<?php $s1 = Servicelist($_GET['catid']);
foreach ($s1 as $key => $value) {?>
<a href="service?sid=<?php echo $key;?>&"><!--Proprietorship-->

	<div class="col-lg-3" style="display:flex"><div class="category_pri_div m-b-20" style="cursor:pointer" entityname="<?php    echo $value['name'];?>" entityid="10"><a href="service?sid=<?php echo $key;?>&"> <div class="row"> <div class="col-sm-3 col-md-12 col-lg-12"> <div class="product-image1"> <img class="img-fluid" alt="<?php    echo $value['name'];?>" src=images/demo.jpg><p style="text-align:center"> <?php    echo $value['name'];?></p> </div> </div> 
</div></div></div>
</a>
<?php }?>


</div></div></section>
<?php include_once 'footer.php'; ?>