<?php include "../headerL.php";?>
<?php include "../Adminsidebar.php";?>
<?php include "../../Model/conn.php"; ?>
<?php include "../../Model/dbConnection.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../../CSS/button.css" crossorigin="anonymous">
  <title>Student Results</title>
</head>
<style>
    .error
    {
      color: RED;
    }
    .text
    {
      text-align: center;
    }
    #errorBox
    {
      color:#F00;
      font-size:15px;
    }
  </style>

  <script type="text/javascript">

    function submit1()
    {
      var valueToSearch = document.Result.valueToSearch.value;

      //Student
      if(valueToSearch == "")
      {
        document.Result.valueToSearch.focus();
        document.getElementById("errorBox").innerHTML = "Enter Student Id";
        return false;
      }
    }
  </script>

<?php
require_once '../../Controller/resultInfo.php';
  $valueToSearch='';
  $results = "";

  if(isset($_POST['search']))
  {
    $valueToSearch = $_POST['valueToSearch'];
    $results  = filterTable($valueToSearch);
  }
  else
  {
    $results  = filterTable($valueToSearch);
  }
  
?>

<?php
$name = $uid = $class = $error ="";
$totlcount = 0;
  
  if(isset($_POST['valueToSearch']))
  {
    $sql = "SELECT u.name, e.uid, e.class, e.subject, e.mid, e.final, e.mid*0.4 + e.final*0.6 as total FROM result AS e INNER JOIN student AS u ON e.uid = u.uid where e.uid ='".$valueToSearch."'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>=1)
    {
      while($row=mysqli_fetch_assoc($result))
      {
        $name=$row['name'];
        $uid=$row['uid'];
        $class=$row['class'];
      }
    }
    else
    {
      //echo "Student result not available!!";
      $error = "Student result not available!!";
    }
  }
?>

<form name="Result" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">
  <fieldset style="width: 96%;" align="left">
  <legend class="text"><b>SHOW STUDENT RESULT</b></legend>
  <form action="#" method="POST">

  <center><input class="text" type="text" name="valueToSearch" placeholder="Value To Search" value=<?php echo $valueToSearch ?>>
  <input type="submit" name="search" class="button3" value="Search" onClick="return submit1();"><br><br><center><div id="errorBox" style="font-size:18px;"></div>
  <span class="error" style="font-size:20px;"><?php echo "&nbsp&nbsp"?><?php echo $error;?> </span><br>

  <table border=1 width=100%>

    <tr>
    <td>
      <table width=100%>
        <center><h><b><font size='5'>Student Grade Report</center>
        <tr><td><font size='3'><b>Student Name: <?php echo "$name"; ?></font></td></tr>
        <tr><td><font size='3'><b>Student ID: <?php echo "$uid"?></font></td></tr>
        <tr><td><font size='3'><b>Class: <?php echo "$class"?></font></td></tr>
      </table>
    </td>
    </tr>
    <tr>
    <td>
      <table border=1 width=100%>

        <th><i>Subject name</i></th><th><i>Mid Marks</i></th><th><i>Final Marks</i></th><th><i>Total Marks</i></th></tr>

        <?php foreach ($results as $i => $result): ?>

        <?php
          $count=1; 
          $totlcount+=$result['total'];
          $count++;
        ?>

        <td><?php echo $result['subject'] ?></td><td><?php echo $result['mid'] ?></td><td><?php echo $result['final'] ?></td><td><?php echo $result['total'] ?></td></tr>
        
        <?php endforeach; ?>

        <tr><td></td><td></td><td></td><td><font size='3'><b>Total: <?php echo htmlentities($totlcount) ?></font></td></tr>
      </table>
    </td>
    </tr>
  </table>
</center>
</html>