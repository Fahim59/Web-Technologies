<?php 
require_once '../Model/model.php';
function LoginValidation($userid, $pass)
{
	return Logins($userid, $pass);
}
 ?>