<!DOCTYPE html>
<html>
<head>
	<title>Logged In Dashboard</title>
	
</head>
<body>

<?php include "HeaderL.php"; ?>
<?php include "Sidebar.php"; ?>


<?php 

$id="Mustafiz";
$pass="admin123@";

//session_start();

if (isset($_SESSION['id'])) 
{

	echo "<h1> Welcome ".$_SESSION['id']."</h2>";
}
else
{
	if ($_POST['id']==$id && $_POST['pass']==$pass)
	{
		$_SESSION['id'] = $id;
		echo "<script>location.href='Logged_In_Dashboard.php'</script>";
	}
	else
	{
		echo "<script>alert(Username or Password incorrect!)</script>";
		echo "<script>location.href='Login.php'</script>";
	}
}
?>

</body>
</html>