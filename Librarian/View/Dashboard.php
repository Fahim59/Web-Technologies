<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

</body>
</html>
<?php
session_start();
if (isset($_POST['submit'])) {
	

	$userid = $_POST['uid'];
	$pass = $_POST['password'];
	include '../Controller/LoginValidate.php';
	$row = LoginValidation($userid, $pass);
}


	if (isset($_SESSION['userid'])) 
	{
		include "LoginHeader.php";
		include "Sidebar.php"; 
		echo "<h1> Welcome ".$rows['name']."</h2>";
	}
	else
	{
		if (($row == null) || ($row['status'] != "a")) {
			echo '<script>alert("Username or Password incorrect! or account is not activated")</script>';
			echo '<script>location.href="Login.php"</script>';
			//header('location:Login.php');
		}else{
			$_SESSION['userid'] = $row['uid'];
			if (isset($_POST['remember'])){
					setcookie("userid", $row['uid'], time() + (86400 * 30)); 
					//setcookie("password", $row['password'], time() + (86400 * 30)); 
			}
	 
			
			header('location:Dashboard.php');

		}
	}
?>
