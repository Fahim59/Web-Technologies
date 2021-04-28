<?php include "../Admin/Model/conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Notices</title>
</head>

<body class="body bg">

	<?php  include('outlay.php');?>

	<div class="Welcome">

	<fieldset class="fieldset" style="height: 300px;">
		<legend class="legend"><b>NOTICE BOARD</b></legend>

			<p><b>
				<?php

				$sql = "select * from dashboard order by id";
				$result = mysqli_query($conn, $sql);
	
			    if(mysqli_num_rows($result)>0)
			    {
					while($row=mysqli_fetch_assoc($result))
					{
					    echo $row['id']."<span><b>. </span>".$row['date']."<span><b> --> </span>".$row['notice']."<br/><br/>";
				    }
				}
				   
				?>
			</p>
	</fieldset>
	
	</div>

</body>
</html>