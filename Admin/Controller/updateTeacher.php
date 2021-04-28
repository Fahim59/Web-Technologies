<?php
require_once '../Model/model.php';

if(isset($_POST['updateTeacher']))
{
  $data['name'] = $_POST['name'];
  $data['fname'] = $_POST['fname'];
  $data['mname'] = $_POST['mname'];
  $data['address'] = $_POST['address'];
  $data['email'] = $_POST['email'];
  $data['gender'] = $_POST['gender'];
  $data['dob'] = $_POST['dob'];

  
  if(updateTeacher($_POST['uid'], $data))
  {
    echo 'Successfully Updated!!';
    //header('Location: ../admin/teacher/editTeacher.php');
  }
   else
  {
    echo 'You are not allowed to access this page.';
  }
}
?>
<br><b><a href="../View/admin/teacher/searchTeacher.php">Back</a>