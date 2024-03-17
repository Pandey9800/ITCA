<?php include 'sidebar.php'; 
if(isset($_POST['submit'])){
$namea=validate($_POST['name']);
$sql =mysqli_query($con,"INSERT INTO `cat`(`cast`) VALUES ('$namea')");
if($sql>0){echo "<script>window.open('category?success','_self')</script>";
}else{echo "<script>alert('Server Busy');window.open('category?failed','_self')</script>";
}       
} 
?> 
<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Add Category</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Category</li>
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
                        <input type="text" class="form-control" name="name" required placeholder="Enter Here" maxlength="225" />
                    </div>
                </div>
                
                <div class=col-sm-6></div>
              
                     </div>
                   
            <div align="center"><input type="submit" class="btn btn-primary" name="submit" style="width:30%;" value="Submit" /></div>
            
        </div>
        </form>
      </div></div>
      <?php }else{ ?>
<div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title" style="color:#000;">Category List</h3>
               <div class="box-tools pull-right">
                <a href="category?add" type="button" class="btn btn-warning" style="border-radius:20%;color:#fff;">+ Add New</a>
              </div>
            </div>

            <div class="box-body">
            <div class="row" style="margin-top: 20px; margin-left: 5px;margin-right: 5px">
           <table class="table table-striped" class="example1">
                <thead>
                  <tr><th>Sno.</th><th>Category</th><th>Add On</th></tr>
                </thead>
                <tbody>
                  <tr>
                 <?php $i=1;
          $ress=mysqli_query($con,"SELECT `id`, `cast`, `timedate` FROM `cat` ORDER BY `timedate` DESC");
           while($rows=mysqli_fetch_array($ress)){?>
<td><?php echo $i; ?></td><td><?php echo ucwords($rows['cast']); ?></td><td><?php echo showdate($rows['timedate']); ?></td>
                  </tr>
                  <?php  }   ?>
                 
                </tbody>
              </table>
      <?php }?>
</div></section></div>
<?php include_once 'footer.php'; ?>