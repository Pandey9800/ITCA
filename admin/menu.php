<ul class="sidebar-menu">
<!-- <li class="header"><br/>Manage:</li> -->
<li class="active treeview">
<a href="dashboard.php" style="color:#fff;">
<i class="fa fa-dashboard"></i> <span>Home</span> </a></li>

<li class="active treeview">
<a href="add_city.php" style="color:#fff;">
<i class="fa fa-dashboard"></i> <span>Add Cities</span> </a></li>

<li class="treeview-menu">
        <a href="#" style="color:#fff;">
            <li><a href="see-customers.php" style="color: #fff;"><i class="fa fa-eye"></i> See Customers</a></li>
            </a>
    </li>

<li class="treeview">
<a  style="color:#fff;">
<i class="fa fa-cog"></i>
<span>Settings</span><i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
    <li><a href="abouts.php"><i class="fa fa-circle-o"></i>About Us</a></li>
<li><a href="#"><i class="fa fa-circle-o"></i>Contact Us</a></li>
<li><a href="#"><em class="fa fa-circle-o"></em>Terms of Service</a></li>
<li><a href="#"><em class="fa fa-circle-o"></em>Privacy Policy</a></li>
</ul>
</li>

<!-- <li class="treeview">
<a href="" style="color:#fff;">
<i class="fa fa-male"></i>
<span>New Customers</span><i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="newcustomer?self"><i class="fa fa-circle-o"></i>By Website</a></li>
<li><a href="newcustomer?staff"><i class="fa fa-circle-o"></i>By Staff </a></li>
</ul>
</li> -->

<li class="treeview">
<a  style="color:#fff;">
<i class="fa fa-database"></i>
<span>Service Manage</span><i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="category.php"><i class="fa fa-circle-o"></i>Category Manage</a></li>
<li><a href="service.php"><i class="fa fa-circle-o"></i>Service Manage</a></li>
<li><a href="documents-setup.php"><em class="fa fa-circle-o"></em>Documents Setup</a></li>
</ul>
</li>
<li class="treeview">
<a style="color:#fff;">
<i class="fa fa-files-o"></i>
<span>Applied Form</span><i class="fa fa-angle-left pull-right"></i>
<!--<span class="label label-primary pull-right">4</span>-->
</a>
<ul class="treeview-menu">
<li><a href="all-form.php"><i class="fa fa-circle-o"></i>New Form</a></li>
<li><a href="assign-task-list.php"><i class="fa fa-circle-o"></i>Assigned Form</a></li>
<li><a href="form-status.php"><i class="fa fa-circle-o"></i>Form Status</a></li>

</ul>
</li> 

<li class="treeview">
<a style="color:#fff;">
<i class="fa fa-files-o"></i>
<span>Inquired Form</span><i class="fa fa-angle-left pull-right"></i>
<!--<span class="label label-primary pull-right">4</span>-->
</a>
<ul class="treeview-menu">
<li><a href="all-form.php"><i class="fa fa-circle-o"></i>New Form</a></li>
<!-- <li><a href="assign-task-list.php"><i class="fa fa-circle-o"></i>Assigned Form</a></li>
<li><a href="form-status.php"><i class="fa fa-circle-o"></i>Form Status</a></li> -->

</ul>
</li> 


<li class="treeview">
<a  style="color:#fff;">
<i class="fa fa-users"></i>
<span>User Mangement</span><i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="create-new-user.php"><i class="fa fa-circle-o"></i>User List</a></li>
<li><a href="create-new-user.php?add"><i class="fa fa-circle-o"></i>Add User</a></li>
</ul>
</li>
<!-- <li class="active treeview">
<a href="website-manage" style="color:#fff;">
<i class="fa fa-dashboard"></i> <span>Website Management</span> </a></li>   --> 
<li class="treeview">
<a  style="color:#fff;">
<i class="fa fa-files-o"></i>
<span>Form List</span><i class="fa fa-angle-left pull-right"></i>
<!--<span class="label label-primary pull-right">4</span>-->
</a>
<ul class="treeview-menu">
<?php
$formsql=mysqli_query($con,"SELECT `id`,`name` FROM `service` ORDER BY `name` ASC");
while($rows=mysqli_fetch_array($formsql)){?>
<li><a href="form?id=<?php echo $rows['id']; ?>"><em class="fa fa-circle-o"></em><?php echo ucwords($rows['name']); ?></a></li>
<?php }?>
</ul>
</li>  
 
<li class="treeview">
<a style="color:#fff;">
<i class="fa fa-files-o"></i>
<span>Coupon Manage</span><i class="fa fa-angle-left pull-right"></i>
<!--<span class="label label-primary pull-right">4</span>-->
</a>
<ul class="treeview-menu">
<li><a href="view-coupan.php"><em class="fa fa-circle-o"></em>Coupon Manage</a></li>
<li><a href="coupan-transfer.php"><em class="fa fa-circle-o"></em>Coupon Transfer</a></li>
<li><a href="coupan-report.php"><em class="fa fa-circle-o"></em>Coupon Report</a></li>
</ul>
</li>   

<li class="treeview">
<a  style="color:#fff;">
<i class="fa fa-money"></i>
<span>Earning & Team</span><i class="fa fa-angle-left pull-right"></i>
<!--<span class="label label-primary pull-right">4</span>-->
</a>
<ul class="treeview-menu">
<li><a href="#income"><em class="fa fa-circle-o"></em>Income List</li>
<li><a href="#team"><em class="fa fa-circle-o"></em>Coupon Transfer</li>
</ul>
</li>   
</ul>