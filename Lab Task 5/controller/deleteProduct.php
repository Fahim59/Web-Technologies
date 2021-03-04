<?php 
require_once '../model.php';

if(isset($_POST['deleteProduct']))
{
	if (deleteProduct($_GET['id']))
	{
		header('Location: ../showAllProducts.php');
	}
}
?>