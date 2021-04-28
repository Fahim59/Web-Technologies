<?php include "../headerL.php";?>
<?php include "../Adminsidebar.php";?>
<?php include "../../Model/conn.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Assign Teacher</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../../CSS/button.css" crossorigin="anonymous">
    <style>
      label
      {
        display: inline-block;
        width: 20%;
        padding: 1%; 
      }
      hr
      {
        style="border: 0.01px solid;
      }
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
    }

  </style>

  <script type="text/javascript">

    function submit1()
    {
      var combo = document.Assign_Teacher.combo.value;
      var scombo = document.Assign_Teacher.scombo.value;
      var tcombo = document.Assign_Teacher.tcombo.value;

      //Class
      if(combo == "")
      {
        document.Assign_Teacher.combo.focus();
        document.getElementById("errorBox").innerHTML = "Class is required";
        return false;
      }

      //Subject
      if(scombo == "")
      {
        document.Assign_Teacher.scombo.focus();
        document.getElementById("errorBox").innerHTML = "Subject Name is required";
        return false;
      }

      //Teacher
      if(tcombo == "")
      {
        document.Assign_Teacher.tcombo.focus();
        document.getElementById("errorBox").innerHTML = "Teacher Name is required";
        return false;
      }
    }
  </script>

<?php
$error ="";
  if(isset($_POST['submit']))
  {
    $class = $_POST['combo'];
    $subject = $_POST['scombo'];
    $teacher = $_POST['tcombo'];
  
    if($class == "")
    {
      $error =  "Select Class First!";
    }
    else
    {
      if($class==6)
      {
        $sql1 = "UPDATE classsix SET uid='".$teacher."' where subject='".$subject."'";
        $sql3 = "UPDATE allsubjects SET uid='".$teacher."' where subject='".$subject."' AND class='6'";
        $sql2 = "SELECT uid from classsix where subject='".$subject."'";

        mysqli_query($conn, $sql1);
        mysqli_query($conn, $sql3);

        if ($result=mysqli_query($conn,$sql2))
        {
          $rowcount=mysqli_num_rows($result);

          if($rowcount > 0)
            echo "Teacher Assign Successfull";
          else
            echo "Teacher Assign Failed, Subject not available!!";

          mysqli_free_result($result);
        }
      }

      else if($class==7)
      {
        $sql1 = "UPDATE classseven SET uid='".$teacher."' where subject='".$subject."'";
        $sql3 = "UPDATE allsubjects SET uid='".$teacher."' where subject='".$subject."' AND class='7'";
        $sql2 = "SELECT uid from classseven where subject='".$subject."'";

        mysqli_query($conn, $sql1);
        mysqli_query($conn, $sql3);

        if ($result=mysqli_query($conn,$sql2))
        {
          $rowcount=mysqli_num_rows($result);

          if($rowcount > 0)
            echo "Teacher Assign Successfull";
          else
            echo "Teacher Assign Failed, Subject not available!!";

          mysqli_free_result($result);
        }
      }

      else if($class==8)
      {
        $sql1 = "UPDATE classeight SET uid='".$teacher."' where subject='".$subject."'";
        $sql3 = "UPDATE allsubjects SET uid='".$teacher."' where subject='".$subject."' AND class='8'";
        $sql2 = "SELECT uid from classeight where subject='".$subject."'";

        mysqli_query($conn, $sql1);
        mysqli_query($conn, $sql3);

        if ($result=mysqli_query($conn,$sql2))
        {
          $rowcount=mysqli_num_rows($result);

          if($rowcount > 0)
            echo "Teacher Assign Successfull";
          else
            echo "Teacher Assign Failed, Subject not available!!";

          mysqli_free_result($result);
        }
      }

      else if($class==9)
      {
        $sql1 = "UPDATE classnine SET uid='".$teacher."' where subject='".$subject."'";
        $sql3 = "UPDATE allsubjects SET uid='".$teacher."' where subject='".$subject."' AND class='9'";
        $sql2 = "SELECT uid from classnine where subject='".$subject."'";

        mysqli_query($conn, $sql1);
        mysqli_query($conn, $sql3);

        if ($result=mysqli_query($conn,$sql2))
        {
          $rowcount=mysqli_num_rows($result);

          if($rowcount > 0)
            echo "Teacher Assign Successfull";
          else
            echo "Teacher Assign Failed, Subject not available!!";

          mysqli_free_result($result);
        }
      }

      else if($class==10)
      {
        $sql1 = "UPDATE classten SET uid='".$teacher."' where subject='".$subject."'";
        $sql3 = "UPDATE allsubjects SET uid='".$teacher."' where subject='".$subject."' AND class='10'";
        $sql2 = "SELECT uid from classten where subject='".$subject."'";

        mysqli_query($conn, $sql1);
        mysqli_query($conn, $sql3);

        if ($result=mysqli_query($conn,$sql2))
        {
          $rowcount=mysqli_num_rows($result);

          if($rowcount > 0)
            echo "Teacher Assign Successfull";
          else
            echo "Teacher Assign Failed, Subject not available!!";

          mysqli_free_result($result);
        }
      }
      mysqli_close($conn);
    }
  }
?>

<body>

<form name="Assign_Teacher" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">
  <fieldset style="width: 96%;" align="left">
  <legend class="text"><b>ASSIGN TEACHER TO A SUBJECT</b></legend>
  <center><table><div id="errorBox"></div></table></center>
  <span class="error">  <?php echo $error;?> </span>

<form>
  <br/>
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td>Class</td>
        <td>:</td>
        <td>
        <select name="combo">
        <option value="">Select a Class:</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        </select>
       </td>
      <td></td>
      </tr>
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Subject Name</td>
        <td>:</td>
        <td>
        
        <?php include "AllSubject.php"; ?>
        </td>
        
        <td></td>
      </tr>

      <tr><td colspan="4"><hr/></td></tr>
      <tr>
        <td>Select Teacher Id</td>
        <td>:</td>
        <td>
        <?php include "teacher/Tnotice.php"; ?>
        </td>
        
        <td></td>
      </tr>

      <tr><td colspan="4"><hr/></td></tr>
    </table>
    <hr/>
  </form>
  
  <center><input type="submit" class="button3" name="submit" value="Assign" onClick="return submit1();" style="width: 60px">
  <button type="submit" class="button3" formaction="Logged_In_Dashboard.php">Back</button>
  <button type="submit" class="button3" formaction="ViewTeachers.php">Assigned Teacher</button>
  <br/><br>
  </form>
</fieldset>

</form>

</body>
</html>