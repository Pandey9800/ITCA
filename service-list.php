<?php include_once 'header.php'; ?>

<style>
    .header-fixed {
        position: fixed;
        top: 0;
        width: 100%;
        background-color: #fff; /* Adjust background color if needed */
        z-index: 1000;
    }
    /* Adjust padding/margin of the content to avoid overlapping with fixed header */
    #content {
        padding-top: 100px; /* Adjust the value according to the height of your header */
    }
</style>

<?php 
$catqz=mysqli_query($con,"SELECT `id`, `cast`, `timedate` FROM `cat` WHERE `id`='".trim($_GET['sid'])."'");
$catrunz=mysqli_fetch_array($catqz);
?>

<section>
    <div id="content">
        <div class="container" style="text-align: center;">
            <?php if(isset($catrunz)): ?>
                <h4>Service</h4>
                <p><?php echo ucwords($catrunz['cast']); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <?php 
        if(isset($con)) {
            $catq=mysqli_query($con,"SELECT `id`, `catid`, `name`, `sdetail`, `cost`, `cashback`, `advrequired`, `advper`, `duedays`, `duepay`, `type`, `pic`, `timedate` FROM `service` WHERE `catid`='".trim($_GET['sid'])."'");
            while($catrun=mysqli_fetch_array($catq)){
        ?>
        <div class="col-lg-3 col-md-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                <i class="bi bi-check" style="color:green;"></i>
                <h3><a href="apply?service_id=<?php echo $catrun['id']; ?>"><?php echo ucwords($catrun['name']); ?></a></h3>
            </div>
            <br/>
        </div>
        <?php 
            }
        }
        ?>
    </div>
</section>

<?php include_once 'footer.php'; ?>
