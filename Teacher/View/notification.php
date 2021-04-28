<?php  include('../model/model.php');?>
<?php include "../controller/HeaderL.php"; ?>
<?php  include('../Model/Sidebar.php');?>


			<h1>Notice From Admin</h1>
			
<?php
	
	$result=NoticeFromAdmin();

	
	if(mysqli_num_rows($result)>0){?>
	
		<ol>
		<?php while($row=mysqli_fetch_assoc($result)){?>
			<li><input type="button" value="<?php echo $row['title'];?>" onclick="shownotice('<?php echo $row['notice'];?>')" /></li>
			<br>
	<?php } ?> 
		</ol>
	
	<?php
	}else
	{
		echo "You Have No Notice!";
	}


	
	?>
			
		<script>

		function shownotice(i){
			// var x=i;
			alert(i);
		}
		</script>
