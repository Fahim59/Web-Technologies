<?php 
require_once '../Model/model.php';

if(isset($_POST['delete']))
{
	if (DeleteBooks($_GET['bid']))
	{
		header('Location: ../View/FindBook.php');
	}
}
?>