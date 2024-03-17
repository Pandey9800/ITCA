 
  <?php include '../../function/db_connect.php'; ?>
  <?php
				 $get_c = "select * from ecounter where eno = 4";
	$run_c =mysqli_query($con,$get_c);
	while ($row = mysqli_fetch_array($run_c))
	{
	?>
    
                    <td><?php echo $row['eno']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['present_city']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                   <td><?php echo $row['qualification']; ?></td>
                   <td><?php echo $row['roll']; ?></td>
                   
                  </tr>
                  <?PHP } ?>