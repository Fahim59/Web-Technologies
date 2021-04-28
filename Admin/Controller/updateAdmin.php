<?php  
require_once '../Model/model.php';

if(isset($_POST['updateAdmin']))
{
	$data['name'] = $_POST['name'];
  $data['email'] = $_POST['email'];
  $data['address'] = $_POST['address'];
  $data['gender'] = $_POST['gender'];
  $data['dob'] = $_POST['dob'];
	
  if(updateAdmin($_POST['uid'], $data))
  {
  	echo 'Successfully Updated!!';
  }
   else
  {
	  echo 'You are not allowed to access this page.';
  }
}
?>
<br><b><a href="../View/admin/searchAdmin.php">Back</a>