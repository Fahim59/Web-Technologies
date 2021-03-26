<?php include "database/conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>

<body class="body bg">

	<?php  include('header_footer/outlay.php');?>

	<div class="Welcome">
		<ul>
			 <a href="Academics.php" style="width: 100%">Academics</a>|
			 <a href="About.php" style="width: 100%">About</a> |
			 <a href="Admission.php" style="width: 100%">Admission</a> |
			 <a href="Administration.php" style="width: 100%">Administration</a>
		</ul>

	<fieldset class="fieldset" style="height: 300px;">
		<legend class="legend"><b>NOTICE BOARD</b></legend>
		<left><img src="image/notice.png" height="100";></left><marquee>

			<p><b>
				<?php

				$sql = "select * from dashboard order by id";
				$result = mysqli_query($conn, $sql);
	
			    if(mysqli_num_rows($result)>0)
			    {
					while($row=mysqli_fetch_assoc($result))
					{
					    echo $row['id']."<span><b>. </span>".$row['date']."<span><b> --> </span>".$row['title']."<br/><br/>";
				    }
				}
				  //<marquee> 
				?>
			</p></marquee>

			<left><div class="read">
				<a href="Notice.php"><b>Read More...</a> 
			 </div>
	</fieldset>

	<fieldset class="field" style="height: 320px; width: 270px;">

		<legend class="legend"><b>CREATIVE MEDIA</b></legend><marquee>
		<img src="image/gallery.jpg" height="100";><br>
		<img src="image/annex.jpg" height="100";><br>
		<img src="image/main.jpg" height="100";><br></marquee>

	</fieldset>

	<fieldset class="field1" style="height: 320px; width: 270px;">

		<legend class="legend"><b>FACTS & FIGURE</b></legend>
		

	</fieldset>
	
	</div>

</body>
</html>