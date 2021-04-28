<?php include "../headerL.php";?>
<?php include "../Adminsidebar.php";?>
<?php include "../../Model/conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Upload Notice</title>
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
      var title = document.Upload_Notice.title.value;
      var notice = document.Upload_Notice.notice.value;

      if(title == "")
      {
        document.Upload_Notice.title.focus();
        document.getElementById("errorBox").innerHTML = "Title is required";
        return false;
      }
      if(notice == "")
      {
        document.Upload_Notice.notice.focus();
        document.getElementById("errorBox").innerHTML = "Notice is required";
        return false;
      }
    }
    function checkTitle()
    {
      var titleRegex = /^[a-zA-Z-. ?!]{5,}$/;

      if(document.getElementById("title").value == "")
      {
        document.Upload_Notice.title.focus();
        document.getElementById("errorBox").innerHTML = "Title is required";
        return false;
      }
      else if(!document.getElementById("title").value.match(titleRegex))
      {
        document.Upload_Notice.title.focus();
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
        document.Upload_Notice.notice.focus();
        document.getElementById("errorBox").innerHTML = "Notice is required";
        return false;
      }
      else if(!document.getElementById("notice").value.match(noticeRegex))
      {
        document.Upload_Notice.notice.focus();
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

  if($subject=="" || $message=="")
  {
    $error =  "Title or Notice cant be empty!";
  }

  else
  {
    $sql1 = "insert into dashboard values('','".$subject."','".$message."',CURDATE())";
    
    if(mysqli_query($conn, $sql1))
    {
      echo "Notice Upload Successful! ";
    }
    else
    {
      echo "Notice Upload Failed! ";
    }
    mysqli_close($conn);
  }
}
?>

<form name="Upload_Notice" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">
  <fieldset style="width: 96%;" align="left">
  
  <legend class="text"><b>UPLOAD NOTICE</b></legend>
  <center><table><div id="errorBox"></div></table></center>
  <span class="error">  <?php echo $error;?> </span><br>

  <form action="#" method="POST">
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td>Title</td>
        <td>:</td>
        <td><input name="title" type="text" id="title" onkeyup="checkTitle()" onblur="checkTitle()"></td>
        <td></td>
      </tr>

      <tr><td colspan="4"><hr/></td></tr>
      <tr>
        <td>Details Notice</td>
        <td>:</td>
        <td><textarea name="notice" id="notice" onkeyup="checkNotice()" onblur="checkNotice()" rows="4" cols="50"></textarea></td>
        <td></td>
      </tr>

      <tr><td colspan="4"><hr/></td></tr>

    </table>
    <hr/>
  </form>
  
  <center><input type="submit" class="button3" name="submit" value="Upload" onClick="return validateForm();" style="width: 60px">
  <button type="submit" class="button3" formaction="Logged_In_Dashboard.php">Back</button>
  <br/><br>
  </form>
</fieldset>

</form>
</body>
</html>