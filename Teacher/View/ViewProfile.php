<?php include "../Model/model.php"; ?>
<?php 	include "../Controller/HeaderL.php"; ?>
<?php  	include('../Model/Sidebar.php');
		

?>

<fieldset>
	<?php
		$data=ViewProfile();
		// echo $data['uid'];
	?>
    <legend><b>PROFILE</b></legend>
	<form>
		<br/>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td>Name</td>
				<td>:</td>

					<td><?php echo $data['name']; ?></td>
					<!-- <input type="text" name="" value="<?php echo $data['name']; ?>" disabled> -->
				
				<td rowspan="7" align="center">
					<img width="128" style="margin-left: 20px;" src="../Upload/<?php echo $data['picture']; ?>"/>
                    <br/>
				</td>
			</tr>		
			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?php echo $data['email']; ?></td>
			</tr>		
			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Father's Name</td>
				<td>:</td>
				<td><?php echo $data['fname']; ?></td>
			</tr>		
			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Mother's Name</td>
				<td>:</td>
				<td><?php echo $data["mname"]; ?></td>
			</tr>		
			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Address</td>
				<td>:</td>
				<td><?php echo $data["address"]; ?></td>
			</tr>		
			<tr><td colspan="3"><hr/></td></tr>
			
			<tr>
				<td>Gender</td>
				<td>:</td>
				<td> <?php echo $data["gender"];?> </td>
			</tr>
			<!-- <tr><td colspan="3"><hr/></td></tr> -->
			<!-- <tr>
				<td>Balance</td>
				<td>:</td>
				<td> <?php echo $data["balance"];?> </td>
			</tr> -->
			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Date of Birth</td>
				<td>:</td>
				<td><?php echo $data["dob"]; ?></td>
			</tr>
		</table>	
        <hr/>
        <!-- <a href="edit_profile.php">Edit Profile</a>	 -->
	</form>
</fieldset>