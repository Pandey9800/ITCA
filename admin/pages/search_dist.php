<?php
include "../function/db_connect.php";
$id = $_POST['id'];
$result = $con->query("SELECT * FROM dist_list where zone_id = '$id'");
	
    if($result->num_rows > 0)
    {
        echo '<option value="">---Select State---</option>';

	// Fetch the table data	
	while ($row = $result->fetch_assoc()) 
	{
	    echo '<option value="'.$row['id'].'">'.$row['dist_name'].'</option>';
	}
    }
    else
    {
	echo '<option value="">---No State Found---</option>';
    }
?>