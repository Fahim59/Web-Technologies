<?php include "../headerL.php";?>
<?php include "../Adminsidebar.php";?>
<?php include "../../Model/conn.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Add New Subject</title>
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
    function validateForm()
    {
      var combo = document.Add_Subject.combo.value;
      var sname = document.Add_Subject.sname.value;

      if(combo == "")
      {
        document.Add_Subject.combo.focus();
        document.getElementById("errorBox").innerHTML = "Class is required";
        return false;
      }
      if(sname  == "")
      {
        document.Add_Subject.sname .focus();
        document.getElementById("errorBox").innerHTML = "Subject Name is required";
        return false;
      }
    }
    function checkSubject()
    {
      var snameRegex = /^[a-zA-Z-. ?!]{2,}$/;

      if(document.getElementById("sname").value == "")
      {
        document.Add_Subject.sname.focus();
        document.getElementById("errorBox").innerHTML = "Subject Name is required";
        return false;
      }
      else if(!document.getElementById("sname").value.match(snameRegex))
      {
        document.Add_Subject.sname.focus();
        document.getElementById("errorBox").innerHTML = "At least five words and can only contain letters,period,dash";
        return false;
      }
      else
      {
        document.getElementById("errorBox").innerHTML = "";
      }
    }
    
  </script>
<body>

<?php
$error = "";
  if(isset($_POST['submit']))
  {
    $class = $_POST['combo'];
    $subject = $_POST['sname'];
    
    if($class=="")
    {
      $error = "Class cant be empty!";
    }
    else if($subject=="")
    {
      //echo "Subject cant be empty!";
      $error = "Subject cant be empty!";
    }
    else
    {
      if($class==6)
      {
        $sql1 = "insert into classsix values('','".$subject."','')";
        $sql2 = "insert into allsubjects values('',6,'".$subject."')";
        mysqli_query($conn, $sql1);
        mysqli_query($conn, $sql2);

        echo "<br/> Subject Successfully Added to class 6!";
      }
      else if($class==7)
      {
        $sql1 = "insert into classseven values('','".$subject."','')";
        $sql2 = "insert into allsubjects values('',7,'".$subject."')";
        mysqli_query($conn, $sql1);
        mysqli_query($conn, $sql2);

        echo "<br/> Subject Successfully Added to class 7!";
      }
      else if($class==8)
      {
        $sql1 = "insert into classeight values('','".$subject."','')";
        $sql2 = "insert into allsubjects values('',8,'".$subject."')";
        mysqli_query($conn, $sql1);
        mysqli_query($conn, $sql2);

        echo "<br/> Subject Successfully Added to class 8!";
      }
      else if($class==9)
      {
        $sql1 = "insert into classnine values('','".$subject."','')";
        $sql2 = "insert into allsubjects values('',9,'".$subject."')";
        mysqli_query($conn, $sql1);
        mysqli_query($conn, $sql2);

        echo "<br/> Subject Successfully Added to class 9!";
      }
      else if($class==10)
      {
        $sql1 = "insert into classten values('','".$subject."','')";
        $sql2 = "insert into allsubjects values('',10,'".$subject."')";
        mysqli_query($conn, $sql1);
        mysqli_query($conn, $sql2);

        echo "<br/> Subject Successfully Added to class 10!";
      }

      mysqli_close($conn);
    }
  }

?>

<form name="Add_Subject" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">
  <fieldset style="width: 96%;" align="left">
  
  <legend class="text"><b>ADD NEW SUBJECT</b></legend>
  <center><table><div id="errorBox"></div></table></center>

  <form action="#" method="POST">
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td>Class</td>
        <td>:</td>
        <td>
          <select name = "combo">
          <option value="">Select Class</option>
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
        <td><input name="sname" id="sname" onkeyup="checkSubject()" onblur="checkSubject()" type="text"></td><span class="error">  <?php echo $error;?> </span><br>
      </tr>
      <tr><td colspan="4"><hr/></td></tr>
    </table>
    <hr/>
  </form>
  
  <center><input type="submit" class="button3" name="submit" value="Add" class="button1" onClick="return validateForm();" style="width: 60px">
  <button type="submit" class="button3" formaction="Logged_In_Dashboard.php">Back</button>
  <br/><br>
  </form>
</fieldset>

</form>
</body>
</html>