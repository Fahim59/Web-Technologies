<?php 
	require_once '../Model/model.php';
	function BookSave($data)
	{
		AddBook($data);

		return true;
	}

 ?>