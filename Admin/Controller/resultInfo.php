<?php 

require_once '../../Model/model.php';

function fetchAllResults()
{
	return showAllResults();
}

function fetchResult($id)
{
	return showResult($id);
}
function filterTable($query)
{
	return searchResult($query);
}

?>
