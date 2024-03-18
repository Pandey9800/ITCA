<?php include_once 'header.php'; ?>

<section id="hero">
    <div class="container">
        <div class="row justify-content-between">
        </div>
    </div>
</section><br><br><br><br>

<section id="contact" class="contact">
    <div class="container"> 

        <div class="row">
            <?php
            $catid = $_GET['catid'];
            $service_query = mysqli_query($con, "SELECT * FROM service WHERE catid = '$catid'");
            while ($service_row = mysqli_fetch_array($service_query)) {
                $service_name = $service_row['name'];
                $service_image = 'admin/images/' . $service_row['pic'];
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="custom-block bg-white shadow-lg text-center">
                    <img src="<?php echo $service_image; ?>" class="custom-block-image img-fluid mx-auto d-block" style="width:100px; height:100px;" alt="<?php echo $service_name; ?>">
                    <p style="font-size: 10px; color:black;"><?php echo ucwords($service_name); ?></p>
                    <div class="text-center">
                        <a class="btn btn-primary" href="#">Apply Now</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php include_once 'footer.php'; ?>
