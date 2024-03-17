<?php include('header.php'); ?>
<br><br><br><br>

<div class="container py-5">
    <div class="row py-3">
        <div class="col-md-8">
            
            <div class="card">
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div class="card-body">
                    <?php
                    $query = "SELECT * FROM abouts";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $row)
                        {
                            ?>

                            
                            
                            
                            <!-- echo  $row['links']; -->

                <h5 class="card-title text-center"><?php echo  $row['title']; ?></h5>
                <h6 class="text-center"> <?php echo  $row['subtitle']; ?> </h6>
                <p class="card-text"><?php echo  $row['description']; ?></p>
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                <?php  }
                    }else{
                        echo "No records Found";
                    }
                    ?>
             </div>
        </div>  
        </div>
        <div class="col-md-4">
        <div class="card">
             <div class="card-body">
                <h5 class="card-title">Notice</h5>
                <p class="card-text">This is about us page of itxca.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
             </div>
        </div>
        <hr>
        <div class="card">
             <div class="card-body">
                <h5 class="card-title">Notice</h5>
                <p class="card-text">This is about us page of itxca.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
             </div>
        </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
