<?php 
session_start();
include '../model/model.php';
$class=$_GET['class'];

echo GetStudentByClass($class);
	?>