<?php  
require_once '../model.php';

if (isset($_POST['addProduct']))
{
	$data['name'] = $_POST['name'];
	$data['bprice'] = $_POST['bprice'];
	$data['sprice'] = $_POST['sprice'];

	if(isset($_POST['display']))
	{
		$data['display'] = $_POST['display'];
	}
	else
	{
		$data['display'] = '0';
	}

    if(addProduct($data))
    {
  	    echo 'Successfully Added!!';
  	    header('Location: ../addProduct.php');
    }
}
else 
{
	echo 'You are not allowed to access this page';
}
?>