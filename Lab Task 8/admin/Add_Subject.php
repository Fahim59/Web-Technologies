<?php include "../header_footer/headerL.php";?>
<?php include "../header_footer/Adminsidebar.php";?>
<?php include "../database/conn.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Add New Subject</title>
</head>
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
      var snameRegex = /^[a-zA-Z-. ?!]{2,}$/;

      var combo = document.Add_Subject.combo.value;
      var sname = document.Add_Subject.sname.value;

      //Class
      if(combo == "")
      {
        document.Add_Subject.combo.focus();
        document.getElementById("errorBox").innerHTML = "Class is required";
        return false;
      }

      //Subject
      if(sname == "")
      {
        document.Add_Subject.sname.focus();
        document.getElementById("errorBox").innerHTML = "Subject Name is required";
        return false;
      }
      else if(!snameRegex.test(sname))
      {
        document.Add_Subject.sname.focus();
        document.getElementById("errorBox").innerHTML = "At least two words and can only contain letters,period,dash";
        return false;
      }
    }
  </script>
<body>

<?php
  if(isset($_POST['submit']))
  {
    $class = $_POST['combo'];
    $subject = $_POST['sname'];
  
    if($subject=="")
    {
      echo "Subject cant be empty!";
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
        <td><input name="sname" type="text"></td><div id="errorBox"></div>
      </tr>
      <tr><td colspan="4"><hr/></td></tr>
    </table>
    <hr/>
  </form>
  
  <center><input type="submit" name="submit" value="Add" onClick="return submit1();" style="width: 60px">
  <button type="submit" formaction="Logged_In_Dashboard.php">Back</button>
  <br/><br>
  </form>
</fieldset>

</form>
</body>
</html>