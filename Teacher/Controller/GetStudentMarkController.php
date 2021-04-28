<?php
session_start();
include('../Model/model.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
	// echo $_POST['sid'];
	echo GetStudentMark($_POST['sid'],$_POST['student_class'],$_POST['subject']);
}



?>