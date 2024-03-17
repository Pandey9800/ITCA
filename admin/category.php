<?php include 'sidebar.php'; 
if(isset($_POST['submit'])){
$namea=validate($_POST['name']);
$sql =mysqli_query($con,"INSERT INTO `cat`(`cast`) VALUES ('$namea')");
if($sql>0){echo "<script>window.open('category.php?success','_self')</script>";
}else{echo "<script>alert('Server Busy');window.open('category?failed','_self')</script>";
}       
} 
if(isset($_POST['upsubmit'])){
$namea=validate($_POST['name']);
$sql =mysqli_query($con,"UPDATE `cat` SET `cast`='$namea' WHERE `id`='".trim($_GET['edit'])."'");
if($sql>0){echo "<script>window.open('category.php?success','_self')</script>";
}else{echo "<script>alert('Server Busy');window.open('category?failed','_self')</script>";
}       
} 
if(isset($_GET['delete'])){
$sql =mysqli_query($con,"DELETE FROM `cat` WHERE `id`='".trim($_GET['delete'])."'");
if($sql>0){echo "<script>window.open('category.php?success','_self')</script>";
}else{echo "<script>alert('Server Busy');window.open('category?failed','_self')</script>";
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
             <div class=col-sm-3></div>
              <div class=col-sm-6>
                    <div class="form-group mb-10">
                        <label> Category Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="name" required placeholder="Enter Here"  maxlength="225" />
                    </div>
                </div>
                
                <div class=col-sm-6></div>
              
                     </div>
                   
            <div align="center"><input type="submit" class="btn btn-primary" name="submit" style="width:30%;" value="Submit" /></div>
            
        </div>
        </form>
      </div></div>

 <?php }elseif(isset($_GET['edit'])){ ?>
            <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title" style="color:#000;">Update</h3>
            </div>
            <div class="box-body">
            <form action="#" method="post" enctype="multipart/form-data">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
             <div class=col-sm-3></div>
              <div class=col-sm-6>
                    <div class="form-group mb-10">
                        <label> Category Name <span style="color:red">*</span></label>
                        <input type="text" value="<?php echo GetCatName($_GET['edit']); ?>" class="form-control" name="name" required placeholder="Enter Here" maxlength="225" />
                    </div>
                </div>
                
                <div class=col-sm-6></div>
              
                     </div>
                   
            <div align="center"><input type="submit" class="btn btn-primary" name="upsubmit" style="width:30%;" value="Update" /></div>
            
        </div>
        </form>
      </div></div>
      <?php }else{ ?>
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
                  <tr><th>Sno.</th><th>Category</th><th>Add On</th><th></th></tr>
                </thead>
                <tbody>
                  <tr> 
                 <?php $i=1;
          $ress=mysqli_query($con,"SELECT `id`, `cast`, `timedate` FROM `cat` ORDER BY `timedate` DESC");
           while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $i; ?></td><td><a href="category?edit=<?php echo ($rows['id']); ?>"><?php echo ucwords($rows['cast']); ?></a></td><td><?php echo showdate($rows['timedate']); ?></td><td><a href="category.php?delete=<?php echo ($rows['id']); ?>"><i class="fa fa-trash text-red"></i></a></td>
                  </tr>
                  <?php  $i++;}   ?>
                 
                </tbody>
              </table>
      <?php }?>
</div></section></div>
<?php include_once 'footer.php'; ?>