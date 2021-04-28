<?php 
require_once '../Model/model.php';

if(isset($_POST['deleteLibrarian']))
{
	if (deleteLibrarian($_GET['id']))
	{
		echo 'Successfully Deleted!!';
	}
}
?>
<br><b><a href="../View/admin/librarian/searchLibrarian.php">Back</a>