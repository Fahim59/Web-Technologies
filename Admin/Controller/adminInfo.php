<?php 

require_once '../../Model/model.php';

function fetchAllAdmins()
{
	return showAllAdmins();
}

function fetchAdmin($id)
{
	return showAdmin($id);
}
function filterTable($query)
{
	return searchAdmin($query);
}

?>
