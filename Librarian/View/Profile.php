<?php
	session_start();
	if (isset($_SESSION['userid'])) 
	{

		include "LoginHeader.php";
		include "Sidebar.php";
	}
	else
	{
    echo '<script>alert("Login First!")</script>';
    echo '<script>location.href="Login.php"</script>';	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<fieldset>
    <legend><b>PROFILE</b></legend>
	<form>
		
		<br/>
		<table cellpadding="0" cellspacing="0">
			<tr>

				<td>Name</td>
				<td>:</td>
				<td><?php echo $rows["name"];?></td>

				<td rowspan="10" align="right">
					<img width="250" height="300" src="uploads/<?php echo $rows["picture"] ?>" alt="<?php echo $rows["name"] ?>"/><br/>
                    <br/>
				</td>
			</tr>

			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?php echo $rows["email"];?></td>
			</tr>

			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Gender</td>
				<td>:</td>
				<td><?php echo $rows["gender"];?></td>
			</tr>

			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Date of Birth</td>
				<td>:</td>
				<td><?php echo $rows["dob"];?></td>
			</tr>
			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Address</td>
				<td>:</td>
				<td><?php echo $rows["address"];?></td>
			</tr>
		</table>	
        <hr/>
        <a href="EditProfile.php">Edit Profile</a>	
	</form>
</fieldset>

</body>
</html>