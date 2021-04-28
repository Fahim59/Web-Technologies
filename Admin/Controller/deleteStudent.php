<?php 
require_once '../Model/model.php';

if(isset($_POST['deleteStudent']))
{
	if (deleteStudent($_GET['id']))
	{
		echo 'Successfully Deleted!!';
	}
}
?>
<br><b><a href="../View/admin/student/searchStudent.php">Back</a>