<?php include "conn.php"; ?>
<?php

	$id = $_GET['id'];
	$view = $_GET['view'];

	$sql = "UPDATE login SET status='r' where uid=".$id;
	
	if(mysqli_query($conn,$sql))
	{?>
		<?php include "AllStudents.php"; ?><?php
	}
?>