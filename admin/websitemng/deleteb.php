<?php include("../function/db_connect.php"); 
$rid=$_GET['id'];
if(mysqli_query($con,"DELETE FROM `team` WHERE `id`='$rid'"))
             	{
             		
             		//header("Refresh:0");
             		//$msg1 = "User updated Sussesfully!";
                    echo '<script>alert("DELETED"),window.open("boarmember.php","_self")</script>';
             		

             	}else
             	{
				 echo '<script>alert("Fail")</script>,<meta http-equiv="refresh" content="0">';
				 }
?>