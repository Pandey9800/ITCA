 <ul class="sidebar-menu"><br><br>
         <!--    <li class="header"><br/>Manage:</li> -->
<li class="active treeview">
              <a href="dashboard" style="color:#fff;">
                <i class="fa fa-dashboard"></i> <span>Home</span> </a></li>
           <!--  <li class="treeview">
              <a href="" style="color:#fff;">
                <i class="fa fa-tree"></i>
                <span>Counter Manage</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="create-new-user"><i class="fa fa-circle-o"></i>User List</a></li>
                <li><a href="create-new-user?add"><i class="fa fa-circle-o"></i>Add User</a></li>
                <li><a href="new_entry/notification.php"><em class="fa fa-circle-o"></em>Nofication</a></li>
              </ul>
            </li> -->

<?php if($emptyp!='employee'){?>

<!--   <li class="treeview">
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
              <a href="" style="color:#fff;">
                <i class="fa fa-files-o"></i>
                <span>Application Management</span><i class="fa fa-angle-left pull-right"></i>
                <!--<span class="label label-primary pull-right">4</span>-->
              </a>
              <ul class="treeview-menu">
                <li><a href="form-status"><i class="fa fa-circle-o"></i>Application</a></li>
                 <li><a href="application-approved"><i class="fa fa-circle-o"></i>Approved </a></li>
                
              </ul>
            </li> 
          <?php }else{?>
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
              <a href="" style="color:#fff;">
                <i class="fa fa-files-o"></i>
                <span>Application Management</span><i class="fa fa-angle-left pull-right"></i>
                <!--<span class="label label-primary pull-right">4</span>-->
              </a>
              <ul class="treeview-menu">
                <li><a href="all-applications"><i class="fa fa-circle-o"></i>All</a></li>
                <?php $applicationsql=mysqli_query($con,"SELECT DISTINCT `taskid` FROM `task` WHERE (`assing`=0 || `assing`='".$_SESSION['memid']."')");
                while($rrr=mysqli_fetch_array($applicationsql)){?>
                 <li><a href="application?type=<?php echo $rrr['taskid']; ?>"><i class="fa fa-circle-o"></i><?php echo ServiceName($rrr['taskid']); ?></a></li>
                <?php }?>
              </ul>
            </li> 
          <?php }?><?php if($emptyp!='employee'){?>
 <li class="treeview">
              <a href="#" style="color:#fff;">
                <i class="fa fa-book"></i>
                <span>Report</span><i class="fa fa-angle-left pull-right"></i>              </a>
              <ul class="treeview-menu">
                  <li><a href="customer-report"><em class="fa fa-circle-o"></em>Customer</li>
                <li><a href="view-coupan"><em class="fa fa-circle-o"></em>Used Coupan</li>
                <li><a href="my-income"><em class="fa fa-circle-o"></em>My Income</li>
              </ul>
            </li>   
          <?php }?>
          </ul>