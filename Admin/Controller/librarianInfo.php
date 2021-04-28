<?php 

require_once '../../../Model/model.php';

function fetchAllLibrarians()
{
	return showAllLibrarians();
}

function fetchLibrarian($id)
{
	return showLibrarian($id);
}

function filterTable($query)
{
	return searchLibrarian($query);
}
?>
