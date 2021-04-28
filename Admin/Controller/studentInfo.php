<?php 

require_once '../../../Model/model.php';

function fetchAllStudents()
{
	return showAllStudents();
}

function fetchStudent($id)
{
	return showStudent($id);
}

function filterTable($query)
{
	return searchStudent($query);
}
?>
