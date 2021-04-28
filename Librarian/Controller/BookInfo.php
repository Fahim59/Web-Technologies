<?php 

require_once '../Model/model.php';

function FetchAllBooks(){
	return ShowAllBooks();

}

function FetchBook($id){
	return ShowBook($id);

}

function FilterTable($bname)
{
	return SearchBook($bname);
}

?>
