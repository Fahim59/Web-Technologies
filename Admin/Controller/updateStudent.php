<?php
require_once '../Model/model.php';

if(isset($_POST['updateStudent']))
{
  $data['name'] = $_POST['name'];
  $data['fname'] = $_POST['fname'];
  $data['mname'] = $_POST['mname'];
  $data['address'] = $_POST['address'];
  $data['email'] = $_POST['email'];
  $data['gender'] = $_POST['gender'];
  $data['dob'] = $_POST['dob'];
  $data['class'] = $_POST['class'];

  
  if(updateStudent($_POST['uid'], $data))
  {
    echo 'Successfully Updated!!';
  }
   else
  {
    echo 'You are not allowed to access this page.';
  }
}
?>
<br><b><a href="../View/admin/student/searchStudent.php">Back</a>