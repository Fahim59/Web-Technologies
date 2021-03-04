<?php  
require_once '../model.php';

if(isset($_POST['updateProduct']))
{
	$data['name'] = $_POST['name'];
  $data['bprice'] = $_POST['bprice'];
  $data['sprice'] = $_POST['sprice'];
  //$data['profit'] = $_POST['profit'];
  if(isset($_POST['display']))
  {
    $data['display'] = $_POST['display'];
  }
  else
  {
    $data['display'] = '0';
  }
	
  if(updateProduct($_POST['id'], $data))
  {
  	echo 'Successfully Updated!!';
    header('Location: ../showAllProducts.php');
  }
   else
  {
	  echo 'You are not allowed to access this page.';
  }
}
?>