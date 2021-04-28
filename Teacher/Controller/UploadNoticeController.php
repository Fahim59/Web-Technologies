<?php
session_start();
include('../Model/model.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
	// echo $_POST['data'];
	echo GetSubForClass($_POST['data']);
}



?>