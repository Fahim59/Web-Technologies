<?php  include('../header_footer/headerL.php');?>
<?php  include('../header_footer/Adminsidebar.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Logged In Dashboard</title>
	
</head>
<body>

<?php
echo "<h1> Welcome ".$_SESSION['name']."</h2>";
?>

</body>
</html>