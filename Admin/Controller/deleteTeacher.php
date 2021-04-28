<?php 
require_once '../Model/model.php';

if(isset($_POST['deleteTeacher']))
{
	if (deleteTeacher($_GET['id']))
	{
		echo 'Successfully Deleted!!';
		//header('Location: ../admin/teacher/editTeacher.php');
	}
}
?>
<br><b><a href="../View/admin/teacher/searchTeacher.php">Back</a>