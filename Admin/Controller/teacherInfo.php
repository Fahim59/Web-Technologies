<?php 

require_once '../../../Model/model.php';

function fetchAllTeachers()
{
	return showAllTeachers();
}

function fetchTeacher($id)
{
	return showTeacher($id);
}

function filterTable($query)
{
	return searchTeacher($query);
}
?>
