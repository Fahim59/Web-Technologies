<?php
require_once '../Model/model.php';

if(isset($_POST['updateLibrarian']))
{
  $data['name'] = $_POST['name'];
  $data['address'] = $_POST['address'];
  $data['email'] = $_POST['email'];
  $data['gender'] = $_POST['gender'];
  $data['dob'] = $_POST['dob'];

  
  if(updateLibrarian($_POST['uid'], $data))
  {
    echo 'Successfully Updated!!';
  }
   else
  {
    echo 'You are not allowed to access this page.';
  }
}
?>
<br><b><a href="../View/admin/librarian/searchLibrarian.php">Back</a>