<?php  include('header_footer/headerL.php');?>
<?php  include('header_footer/Adminsidebar.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Logged In Dashboard</title>
	
</head>
<body>

<?php 

$id="Mustafiz";
$pass="admin123@";

//session_start();

if (isset($_SESSION['id'])) 
{
	$data = file_get_contents("database/admin/data.json");
    $data = json_decode($data, true);
    foreach($data as $row){}

	//echo "<h1> Welcome ".$_SESSION['id']."</h2>";
    echo "<h1> Welcome ".$row["name"]."</h2>";
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
		echo "Username or Password incorrect!";
		echo "<script>location.href='Login.php'</script>";
	}
}
?>

</body>
</html>