<?php include "../headerL.php";?>
<?php include "../Adminsidebar.php";?>
<?php include "../../Model/conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Send Notice</title>
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
      var title = document.Send_Notice.title.value;
      var notice = document.Send_Notice.notice.value;

      if(title == "")
      {
        document.Send_Notice.title.focus();
        document.getElementById("errorBox").innerHTML = "Title is required";
        return false;
      }
      if(notice == "")
      {
        document.Send_Notice.notice.focus();
        document.getElementById("errorBox").innerHTML = "Notice is required";
        return false;
      }
    }
    function checkTitle()
    {
      var titleRegex = /^[a-zA-Z-. ?!]{5,}$/;

      if(document.getElementById("title").value == "")
      {
        document.Send_Notice.title.focus();
        document.getElementById("errorBox").innerHTML = "Title is required";
        return false;
      }
      else if(!document.getElementById("title").value.match(titleRegex))
      {
        document.Send_Notice.title.focus();
        document.getElementById("errorBox").innerHTML = "Title should be at least five words and can only contain letters,period,dash";
        return false;
      }
      else
      {
        document.getElementById("errorBox").innerHTML = "";
      }
    }
    function checkNotice()
    {
      var noticeRegex = /^[a-zA-Z-. ?!]{10,}$/;

      if(document.getElementById("notice").value == "")
      {
        document.Send_Notice.notice.focus();
        document.getElementById("errorBox").innerHTML = "Notice is required";
        return false;
      }
      else if(!document.getElementById("notice").value.match(noticeRegex))
      {
        document.Send_Notice.notice.focus();
        document.getElementById("errorBox").innerHTML = "Notice should be at least ten words and can only contain letters,period,dash";
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
    $message = $_POST['notice'];
    $subject = $_POST['title'];
    $teacherid = $_POST['tcombo'];
    
    if($subject=="" || $message=="" || $teacherid=="")
    {
      $error =  "Title or Notice cant be empty!";
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
  <center><table><div id="errorBox"></div></table></center>
  <span class="error">  <?php echo $error;?> </span><br>

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
        <td><input name="title" type="text" id="title" onkeyup="checkTitle()" onblur="checkTitle()"></td>
        <td></td>
      </tr>

      <tr><td colspan="4"><hr/></td></tr>
      <tr>
        <td>Notice Details</td>
        <td>:</td>
        <td> <textarea name="notice" id="notice" onkeyup="checkNotice()" onblur="checkNotice()"></textarea></td>
        <td></td>
      </tr>

      <tr><td colspan="4"><hr/></td></tr>
    </table>
    <hr/>
  </form>
  
  <center><input type="submit" class="button3" name="submit" value="Send" onClick="return validateForm();" style="width: 60px">
  <button type="submit" class="button3" formaction="Logged_In_Dashboard.php">Back</button>
  <br/><br>
  </form>
</fieldset>

</form>
</body>
</html>