<?php
include_once('connection.php');
$result6=mysqli_query($db,"SELECT id,subject FROM classsix");
$result7=mysqli_query($db,"SELECT id,subject FROM classseven");
$result8=mysqli_query($db,"SELECT id,subject FROM classeight");
$result9=mysqli_query($db,"SELECT id,subject FROM classnine");
$result10=mysqli_query($db,"SELECT id,subject FROM classten");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>View Subjects</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: #666;
  padding: 30px;
  text-align: Center;
  font-size: 35px;
  color: white;
}
article {
  float: Center;
  padding: 270px;
  text-align: Center;
  height: 300px; /* only for demonstration, should be removed */
}
/* Clear floats after the columns */
section::after {
  content: "";
  display: table;
  text-align: Center;
  clear: both;
}

/* Style the footer */
footer {
  background-color: #666;
  padding: 10px;
  text-align: left;
  color: white;
}

}
</style>
</head>
<body>

<header>
  <img src="midprojectlogo.jpg" alt="student" width="50" height="60"> View Subject
</header>

<section>
<table align="center" border="1px" style="width:600px; line-height:40px;">
   <tr>
      <th colspan="2"><h2>Subject for class-6</h2></th>
   </tr>
   <t>
      <th>Id</th>
      <th>Subject</th>
   </t>
    <?php 
       while($rows=mysqli_fetch_assoc($result6)){
     ?>
         <tr>
            <td><?php echo $rows['id'];?></td>
            <td><?php echo $rows['subject'];?></td>
         </tr>
      <?php
      }
      ?>
</table><br><br>
</section>
<section>
<table align="center" border="1px" style="width:600px; line-height:40px;">
   <tr>
      <th colspan="2"><h2>Subject for class-7</h2></th>
   </tr>
   <t>
      <th>Id</th>
      <th>Subject</th>
   </t>
    <?php 
       while($rows=mysqli_fetch_assoc($result7)){
     ?>
         <tr>
            <td><?php echo $rows['id'];?></td>
            <td><?php echo $rows['subject'];?></td>
         </tr>
      <?php
      }
      ?>
</table><br><br>
</section>
<section>
<table align="center" border="1px" style="width:600px; line-height:40px;">
   <tr>
      <th colspan="2"><h2>Subject for class-8</h2></th>
   </tr>
   <t>
      <th>Id</th>
      <th>Subject</th>
   </t>
    <?php 
       while($rows=mysqli_fetch_assoc($result8)){
     ?>
         <tr>
            <td><?php echo $rows['id'];?></td>
            <td><?php echo $rows['subject'];?></td>
         </tr>
      <?php
      }
      ?>
</table><br><br>
</section>
<section>
<table align="center" border="1px" style="width:600px; line-height:40px;">
   <tr>
      <th colspan="2"><h2>Subject for class-9</h2></th>
   </tr>
   <t>
      <th>Id</th>
      <th>Subject</th>
   </t>
    <?php 
       while($rows=mysqli_fetch_assoc($result9)){
     ?>
         <tr>
            <td><?php echo $rows['id'];?></td>
            <td><?php echo $rows['subject'];?></td>
         </tr>
      <?php
      }
      ?>
</table><br><br>
</section>
<section>
<table align="center" border="1px" style="width:600px; line-height:40px;">
   <tr>
      <th colspan="2"><h2>Subject for class-10</h2></th>
   </tr>
   <t>
      <th>Id</th>
      <th>Subject</th>
   </t>
    <?php 
       while($rows=mysqli_fetch_assoc($result10)){
     ?>
         <tr>
            <td><?php echo $rows['id'];?></td>
            <td><?php echo $rows['subject'];?></td>
         </tr>
      <?php
      }
      ?>
</table><br><br>
</section>


<footer>
  <pre>Creative International High School</br>408/1,Kuratoli.Khilkhet,Dhaka 1229,Bangldesh</br>info@creative.edu</pre>
</footer>

</body>
</html>
