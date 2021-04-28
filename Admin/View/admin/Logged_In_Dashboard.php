<?php  include('../headerL.php');?>
<?php  include('../Adminsidebar.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Logged In Dashboard</title>
	
</head>
<style> 
body 
{
  background-image: url("../image/B.jpg");
  background-repeat: no-repeat, repeat;
  background-position: 73% 39%;
}
</style>
<body>

<?php
echo "<h1> Welcome, ".$_SESSION['name']."</h1>";
?>

</body>
</html>