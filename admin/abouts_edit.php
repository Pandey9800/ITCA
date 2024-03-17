<?php
include_once 'function/db_connect.php';
include_once 'function/function.php';
include 'sidebar.php';
?>

<div class="content-wrapper">
<section class="content-header">
      <h1><small>Edit About Us</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Category</li>
      </ol>
    </section>
    <section class="content">
<div class="container">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit About Us Page</h6>
    </div>
    <div class="card-body">
        <?php

    if(isset($_POST['edit_btn'])) {
    $id = $_POST['edit_id'];

    $query = "SELECT * FROM abouts WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    foreach($query_run as $row)
    {
        ?>

    <div class="body">
                    <form action="abouts.php" method="POST">
                     <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                    <div class="form-group">
                                    <label> Title </label>
                                    <input type="text" name="edit_title" value="<?php echo $row['title'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Sub Title </label>
                                    <input type="text" name="edit_subtitle" value="<?php echo $row['subtitle'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Description </label>
                                    <textarea style="width:1140px; height:250px;" type="text" name="edit_description"><?php echo $row['description'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label> Links </label>
                                    <input type="text" name="edit_links" class="form-control" value="<?php echo $row['links'] ?>">
                                </div>
                            </div>
                            <a href="abouts" class="btn btn-danger"> Cancel </a>
                            <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
                        </form>
        <?php
    }}
        ?>
    </div>
</div>

</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<?php include_once 'footer.php'; ?>