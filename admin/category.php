<?php 
include 'sidebar.php'; 

if(isset($_POST['submit'])){
    $name = validate($_POST['name']);
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp,"images/".$image_name);
    $description = validate($_POST['description']);
    $sql = mysqli_query($con, "INSERT INTO `cat`(`cast`, `image`, `description`) VALUES ('$name', '$image_name', '$description')");
    if($sql > 0) {
        echo "<script>window.open('category.php?success','_self')</script>";
    } else {
        echo "<script>alert('Server Busy');window.open('category?failed','_self')</script>";
    }
}

if(isset($_POST['upsubmit'])){
    $name = validate($_POST['name']);
    // Handle file upload
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp,"images/".$image_name);
    $description = validate($_POST['description']);
    $sql = mysqli_query($con,"UPDATE `cat` SET `cast`='$name', `image`='$image_name', `description`='$description' WHERE `id`='".trim($_GET['edit'])."'");
    if($sql > 0) {
        echo "<script>window.open('category.php?success','_self')</script>";
    } else {
        echo "<script>alert('Server Busy');window.open('category?failed','_self')</script>";
    }
} 

if(isset($_GET['delete'])){
    $sql = mysqli_query($con,"DELETE FROM `cat` WHERE `id`='".trim($_GET['delete'])."'");
    if($sql > 0) {
        echo "<script>window.open('category.php?success','_self')</script>";
    } else {
        echo "<script>alert('Server Busy');window.open('category?failed','_self')</script>";
    }
} 
?> 

<div class="content-wrapper">
    <section class="content-header">
        <h1><small>Manage Category</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage Category</li>
        </ol>
    </section>

    <section class="content">
        <a href="category"><< Back</a>
        <?php if(isset($_GET['add'])){ ?>
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color:#000;">Add Category</h3>
                </div>
                <div class="box-body">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <div class="form-group mb-10">
                                    <label>Category Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="name" required placeholder="Enter Here" maxlength="225" />
                                </div>
                                <div class="form-group mb-10">
                                    <label>Category Image <span style="color:red">*</span></label>
                                    <input type="file" class="form-control" name="image" required accept="image/*" />
                                </div>
                                <div class="form-group mb-10">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div align="center"><input type="submit" class="btn btn-primary" name="submit" style="width:30%;" value="Submit" /></div>
                    </form>
                </div>
            </div>
        <?php } elseif(isset($_GET['edit'])){ ?>
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color:#000;">Update</h3>
                </div>
                <div class="box-body">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <div class="form-group mb-10">
                                    <label>Category Name <span style="color:red">*</span></label>
                                    <input type="text" value="" class="form-control" name="name" required placeholder="Enter Here" maxlength="225" />
                                </div>
                                <div class="form-group mb-10">
                                    <label>Category Image</label>
                                    <?php 
                                        // Display the uploaded image above the category name in the edit section
                                        $category_image = "images/"; 
                                        if(file_exists($category_image)) {
                                            echo '<img src="' . $category_image . '" alt="Category Image" style="max-width: 200px; max-height: 200px; margin-bottom: 10px;">';
                                        }
                                    ?>
                                    <input type="file" class="form-control" name="image" accept="image/*" />
                                </div>
                                <div class="form-group mb-10">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div align="center"><input type="submit" class="btn btn-primary" name="upsubmit" style="width:30%;" value="Update" /></div>
                    </form>
                </div>
            </div>
        <?php } else { ?>
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color:#000;">Category List</h3>
                    <div class="box-tools pull-right">
                        <a href="category.php?add" type="button" class="btn btn-warning" style="border-radius:20%;color:#fff;">+ Add New</a>
                    </div>
                </div>

                <div class="box-body">
                    <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
                        <table class="table table-striped" class="example1">
                            <thead>
                                <tr>
                                    <th>Sno.</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Add On</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i=1;
                                $ress=mysqli_query($con,"SELECT `id`, `cast`, `timedate`, `image`, `description` FROM `cat` ORDER BY `timedate` DESC");
                                while($rows=mysqli_fetch_array($ress)){?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>
                                        <?php 
                                            // Display the uploaded image above the category name in the category list section
                                            $category_image = "images/" . $rows['image']; 
                                            if(file_exists($category_image)) {
                                                echo '<img src="' . $category_image . '" alt="Category Image" style="max-width: 50px; max-height: 50px; margin-right: 10px;">';
                                            }
                                        ?>
                                        <a href="category?edit=<?php echo ($rows['id']); ?> "><?php echo ucwords($rows['cast']); ?></a>
                                    </td>
                                    <td><?php echo $rows['description']; ?></td>
                                    <td><?php echo $rows['timedate']; ?></td>
                                    <td><a href="category.php?delete=<?php echo ($rows['id']); ?>"><i class="fa fa-trash text-red"></i></a></td>
                                </tr>
                                <?php  $i++;}   ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>
</div>
<?php include_once 'footer.php'; ?>
