<?php
include_once('connection.php');
$result=mysqli_query($db,"select * from studentnotice;");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>View Notice</title>
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
  <img src="midprojectlogo.jpg" alt="student" width="50" height="60"> View Notice
</header>

<section>
<table align="center" border="1px" style="width:600px; line-height:40px;">
   <tr>
      <th colspan="5"><h2>Notice Record</h2></th>
   </tr>
   <t>
      <th>Id</th>
      <th>Class</th>
      <th>Subject</th>
      <th>Title</th>
      <th>Notice</th>
   </t>
    <?php 
       while($rows=mysqli_fetch_assoc($result)){
     ?>
         <tr>
            <td><?php echo $rows['id'];?></td>
            <td><?php echo $rows['class'];?></td>
            <td><?php echo $rows['subject'];?></td>
            <td><?php echo $rows['title'];?></td>
            <td><?php echo $rows['notice'];?></td>
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
