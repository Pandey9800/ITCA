<?php
include_once 'function/db_connect.php';
include_once 'function/function.php';
include 'sidebar.php';

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_btn'];
    $query = "DELETE FROM abouts WHERE id = '$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is DELETED";
        header('Location: abouts.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location: abouts.php');
    }
}


if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $title = $_POST['edit_title'];
    $subtitle = $_POST['edit_subtitle'];
    $description = $_POST['edit_description'];
    $links = $_POST['edit_links'];

    $query = "UPDATE abouts SET title='$title', subtitle='$subtitle', description='$description', links='$links'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['succss'] = "Your Data is Updated";
        header('Location: abouts.php');
    }
    else{
        $_SESSION['success'] = "Your Data is NOT Updated";
        header('Location: abouts.php');
    }
}

if(isset($_POST['about_save']))
{
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $links = $_POST['links'];
    
    $query = "INSERT INTO abouts (title,subtitle,description,links) VALUES ('$title', '$subtitle', '$description', '$links')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['success'] = "About us Added";
        header('Location: abouts.php');
    }else{
        $_SESSION['status'] = "About us Not Added";
        header('Location: abouts.php');
    }
}


if(isset($_POST['edit_btn'])) {
    $id = $_POST['edit_id'];

    $query = "SELECT * FROM abouts WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    foreach($query_run as $row)
    {
        ?>

        <?php
    }
}
?>



<style>
    .modal-backdrop {
height: auto;
}
</style>

<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Manage Category</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Category</li>
      </ol>
    </section>
    <section class="content">
        <div class="modal fade" id="ABOUTUSMODAL" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel">Add Content for About Page</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="abouts.php" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label> Title </label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Title">
                                </div>
                                <div class="form-group">
                                    <label> Sub Title </label>
                                    <input type="text" name="subtitle" class="form-control" placeholder="Enter Title">
                                </div>
                                <div class="form-group">
                                    <label> Description </label>
                                    <textarea type="text" name="description" class="form-control" placeholder="Enter Title"> </textarea>
                                </div>
                                <div class="form-group">
                                    <label> Links </label>
                                    <input type="text" name="links" class="form-control" placeholder="Enter Title">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="about_save" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">About Us
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ABOUTUSMODAL">Add</button>
                    </h6>
                </div>

                <div class="container card-body">
                    <?php
                    if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
                        echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].'</h2>';
                        unset($_SESSION['success']);
                    }

                    if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
                        echo '<h2 class="bg-danger text-white"> '.$_SESSION['$status'].'</h2>';
                        unset($_SESSION['status']);
                    }
                    ?>
                    <div class="table-responsive">

                    <?php
                    $query = "SELECT * FROM abouts";
                    $query_run = mysqli_query($con, $query);
                    ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Description</th>
                                    <th>Links</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($query_run))
                                    {
                                ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['subtitle']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td><?php echo $row['links']; ?></td> <br>
                                    <td>
                                        <form action="abouts_edit.php" method="POST">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-success"> Edit</button>
                                        </form>
                                    </td> <section></section>
                                    <td>
                                        <form action="abouts.php" method="POST">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger"> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                                }

                                else{
                                    echo "No Records Found";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    
    


</div>





<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
<?php include_once 'footer.php'; ?>
