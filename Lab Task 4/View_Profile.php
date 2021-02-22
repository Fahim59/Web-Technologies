<!DOCTYPE html>
<html>
<head>
	<title>View Profile</title>  
</head>
<body>

<?php include "HeaderL.php"; ?>
<?php include "Sidebar.php"; ?>
<fieldset>
    <legend><b>PROFILE</b></legend>
	<form>
		
		<br/>
		<table cellpadding="0" cellspacing="0">
			<tr>
				
                <?php 

                $data = file_get_contents("data.json");
                $data = json_decode($data, true);
                foreach($data as $row){}

                ?>

				<td>Name</td>
				<td>:</td>
				<td><?php echo $row["name"];?></td>

				<td rowspan="10" align="center">
					<img width="157" height="173" src="profile.png"/><br/>
					<input type="submit" name="submit" value="Change" style="width: 60px">
					<input name="image" type="file">
                    <br/>
				</td>
			</tr>

			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?php echo $row["email"];?></td>
			</tr>

			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Gender</td>
				<td>:</td>
				<td><?php echo $row["gender"];?></td>
			</tr>

			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Date of Birth</td>
				<td>:</td>
				<td><?php echo $row["dd"]."-".$row["mm"]."-".$row["yyyy"];?></td>
			</tr>
		</table>	
        <hr/>
        <a href="Edit_Profile.php">Edit Profile</a>	
	</form>
</fieldset>

</body>
</html>