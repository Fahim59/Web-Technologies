<?php include('../header_footer/headerL.php');?>
<?php include('../header_footer/Adminsidebar.php');?>
<?php include "../database/conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Send Notice</title>
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
      var titleRegex = /^[a-zA-Z-. ?!]{5,}$/;
      var noticeRegex = /^[a-zA-Z-. ?!]{10,}$/;

      var title = document.Send_Notice.title.value;
      var notice = document.Send_Notice.title.value;

      //Title
      if(title == "")
      {
        document.Send_Notice.title.focus();
        document.getElementById("errorBox").innerHTML = "Title is required";
        return false;
      }
      else if(!titleRegex.test(title))
      {
        document.Send_Notice.title.focus();
        document.getElementById("errorBox").innerHTML = "Title should be at least five words and can only contain letters,period,dash";
        return false;
      }
      //Notice
      if(notice == "")
      {
        document.Send_Notice.notice.focus();
        document.getElementById("errorBox").innerHTML = "Norice is required";
        return false;
      }
      else if(!noticeRegex.test(notice))
      {
        document.Send_Notice.notice.focus();
        document.getElementById("errorBox").innerHTML = "Notice should be at least ten words and can only contain letters,period,dash";
        return false;
      }
    }
  </script>
<body>

<?php
  
  if(isset($_POST['submit']))
  {
    $message = $_POST['notice'];
    $subject = $_POST['title'];
    $teacherid = $_POST['tcombo'];
    
    if($subject=="" || $message=="" || $teacherid=="")
    {
      echo "Subject, Message Or Teacher cant be empty!";
    }
    else
    {
      $sql = "insert into teachernotice values('','".$teacherid."','".$subject."','".$message."')";

      if(mysqli_query($conn, $sql))
      {
        echo "<br/> Notice Send Successfull!";
      }
      else
      {
        echo "<br/> SQL Error".mysqli_error($conn);
      }

      mysqli_close($conn);
    }
  }
?>

<form name="Send_Notice" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">
  <fieldset style="width: 96%;" align="left">
  
  <legend class="text"><b>SEND NOTICE TO A TEACHER</b></legend>

  <form action="#" method="POST">
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td>Teacher</td>
        <td>:</td>
        <td>
          <?php include "teacher/Tnotice.php"; ?>
        </td>
        <td></td>
      </tr>

      <tr><td colspan="4"><hr/></td></tr>
      <tr>
        <td>Title</td>
        <td>:</td>
        <td><input name="title" type="text"></td>
        <td></td><div id="errorBox"></div>
      </tr>

      <tr><td colspan="4"><hr/></td></tr>
      <tr>
        <td>Notice Details</td>
        <td>:</td>
        <td> <textarea name="notice"></textarea></td>
        <td></td><div id="errorBox"></div>
      </tr>

      <tr><td colspan="4"><hr/></td></tr>
    </table>
    <hr/>
  </form>
  
  <center><input type="submit" name="submit" value="Send" onClick="return submit1();" style="width: 60px">
  <button type="submit" formaction="Logged_In_Dashboard.php">Back</button>
  <br/><br>
  </form>
</fieldset>

</form>
</body>
</html>