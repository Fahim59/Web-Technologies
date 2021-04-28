<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		a:link
		{
			color: #FFFFFF;
			text-decoration: none;
		}
		a:visited 
		{
		  	color: #FFFFFF;
		  	text-decoration: none;
		}
		.color
		{
			color: #A52A2A 
		}
		.h2
		{
			font-family: Arial, Helvetica, sans-serif;
			text-align: left;
		}
		.padding
		{
			padding-left: 100%
		}
		.header 
		{
			position: fixed;
			top: 0;
			background-color:#008B8B;
			color: white;
			padding: 0.2%;
		}
		.shadow
		{
			text-shadow: 0 0 8px #e60000;
		}
	</style>
</head>
<body>

<header class="header">

	<table >
		<tr>
			<th>
				<img src="../Admin/View/image/logo.png" alt="school logo" width="80px" height="80px" >
			</th>

			<th style="width: 50%">
				<h2 class="h2 shadow">&nbsp;&nbsp;Welcome to Creative International High School</h2>
			</th>

			<th style="width: 100%; text-align: right;" class="h2" >

			<?php if(isset($_SESSION["id"])) :?>
				<span class="color">LOGGED IN AS</span> <a href="" style="width: 100%" ><?php echo $row["name"];?></a> |
				<a href="Logout.php" style="width: 100%" >LOG OUT</a> 
			<?php else : ?>
				<a href="Index.php" style="width: 100%">Home</a> |
				<a href="CLogin.php" style="width: 100%" >Login</a> |
				<a href="Registration.php" style="width: 100%" >Registration</a>
			<?php endif; ?>

			</th>
		</tr>
	</table>
</header>

</body>
</html>