<?php
include "../function/db_connect.php";

$id = $_POST['id'];

$result = $con->query("SELECT * FROM block_list where dist_id = '$id'");
	
    if($result->num_rows > 0)
    {
	echo '<option value="">---Select City---</option>';

	// Fetch the table data	
	while ($row = $result->fetch_assoc()) 
	{
	    echo '<option value="'.$row['id'].'">'.$row['block_name'].'</option>';
	}
    }
    else
    {
	echo '<option value="">---No City Found---</option>';
    }
?>