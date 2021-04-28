<?php include "../Admin/Model/conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Public Home Page</title>
</head>
<style>
ul
{
  list-style-type: none;
  margin: 0;
  padding: 5;
  overflow: hidden;
  background-color: #008080;
}

li
{
  float: left;
}

li a
{
  display:block;
  color: white;
  text-align: center;
  padding: 12px 20px;
  text-decoration: none;
  width:200px;
}

li a:hover:not(.active)
{
  background-color: #111;
}

</style>

<body class="body bg">

	<?php  include('outlay.php');?>

	<div class="Welcome">
		<ul id= "nav">

	<div class="dropdown">
    <button class="dropbtn">Academics 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="https://www.aiub.edu/faculties/fst">Faculties</a>
      <a href="https://www.aiub.edu/academic-calendar">Academic Calender</a>
      <a href="https://www.aiub.edu/academic-regulations">Academic Rules & Regulations</a>
      <a href="https://www.aiub.edu/tuition-fee">Tuition Fees</a>
      <a href="https://www.aiub.edu/partnerships/academic-partners">Academic Partners</a>
    </div>
</div>

<div class="dropdown">
    <button class="dropbtn">Admission
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="https://www.aiub.edu/admission">Admission Process</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">About 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="https://www.aiub.edu/about/Information">Information</a>
      <a href="https://www.aiub.edu/about/general-information">General Information</a>
      <a href="https://www.aiub.edu/about/Why-Study-Here">Why Study Here</a>
    </div>
  </div> 

  <div class="dropdown">
    <button class="dropbtn">Administration 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="https://www.aiub.edu/Administration/The-Vice-Chancellor">The Principal</a>
      <a href="https://www.aiub.edu/Administration/The-Chairman">The Chairman</a>
      <a href="https://www.aiub.edu/Administration/The-Founders">The Founder</a>
    </div>
  </div> 
		</ul>

	<fieldset class="fieldset" style="height: 300px;">
		<legend class="legend"><b>NOTICE BOARD</b></legend>
		<left><img src="../Admin/View/image/notice.png" height="100";></left><marquee>

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

		<legend class="legend"><b>CREATIVE MEDIA</b></legend>
		<img src="../Admin/View/image/gallery.jpg" height="100";><br>
		<img src="../Admin/View/image/annex.jpg" height="100";><br>
		<img src="../Admin/View/image/main.jpg" height="100";><br>

	</fieldset>

	<fieldset class="field1" style="height: 230px; width: 270px;">

		<legend class="legend"><b>FACTS & FIGURE</b></legend>
		
		<?php

			$sql = "SELECT COUNT(uid) as id FROM admin;";
			$result = mysqli_query($conn, $sql);
	
			if(mysqli_num_rows($result)>0)
			{
				while($row=mysqli_fetch_assoc($result))
			    {
			    	$res=$row['id'];
			    	echo "<br/><br/>";
					echo "Total Admin: ".$res."<br/><br/>";
				}
		    }
		?>
		<?php

			$sql = "SELECT COUNT(uid) as tid FROM teacher;";
			$result = mysqli_query($conn, $sql);
	
			if(mysqli_num_rows($result)>0)
			{
				while($row=mysqli_fetch_assoc($result))
			    {
			    	$res=$row['tid'];
					echo "Total Teachers: ".$res."<br/><br/>";
				}
		    }
		?>
		<?php

			$sql = "SELECT COUNT(uid) as sid FROM student;";
			$result = mysqli_query($conn, $sql);
	
			if(mysqli_num_rows($result)>0)
			{
				while($row=mysqli_fetch_assoc($result))
			    {
			    	$res=$row['sid'];
					echo "Total Students: ".$res."<br/><br/>";
				}
		    }
		?>
		<?php

			$sql = "SELECT COUNT(uid) as lid FROM librarian;";
			$result = mysqli_query($conn, $sql);
	
			if(mysqli_num_rows($result)>0)
			{
				while($row=mysqli_fetch_assoc($result))
			    {
			    	$res=$row['lid'];
					echo "Total Librarians: ".$res."<br/><br/>";
				}
		    }
		?>
	</fieldset>
	
	</div>

</body>
</html>