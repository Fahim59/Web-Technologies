<?php include('../header_footer/headerL.php');?>
<?php include('../header_footer/Adminsidebar.php');?>
<?php include "../database/conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Upload Notice</title>
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

      var title = document.Upload_Notice.title.value;
      var notice = document.Upload_Notice.title.value;

      //Title
      if(title == "")
      {
        document.Upload_Notice.title.focus();
        document.getElementById("errorBox").innerHTML = "Title is required";
        return false;
      }
      else if(!titleRegex.test(title))
      {
        document.Upload_Notice.title.focus();
        document.getElementById("errorBox").innerHTML = "Title should be at least five words and can only contain letters,period,dash";
        return false;
      }
      //Notice
      if(notice == "")
      {
        document.Upload_Notice.notice.focus();
        document.getElementById("errorBox").innerHTML = "Norice is required";
        return false;
      }
      else if(!noticeRegex.test(notice))
      {
        document.Upload_Notice.notice.focus();
        document.getElementById("errorBox").innerHTML = "Notice should be at least ten words and can only contain letters,period,dash";
        return false;
      }
    }
  </script>
<body>

<?php

if(isset($_POST['submit']))
{
  if($_POST['title']=="")
  {
    echo "Title Cannot Be Empty!";
  }
  else if($_POST['notice']=="")
  {
    echo "Notice Cannot Be Empty!";
  }

  else
  {
    $sql1 = "insert into dashboard values('','".$_POST['title']."','".$_POST['notice']."',CURDATE())";
    
    if(mysqli_query($conn, $sql1))
      echo "Notice Upload Successful! ";
    else
      echo "Notice Upload Failed! ";
  }
}
?>

<form name="Upload_Notice" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">
  <fieldset style="width: 96%;" align="left">
  
  <legend class="text"><b>UPLOAD NOTICE</b></legend>

  <form action="#" method="POST">
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td>Title</td>
        <td>:</td>
        <td><input name="title" type="text"></td>
        <td></td><div id="errorBox"></div>
      </tr>

      <tr><td colspan="4"><hr/></td></tr>
      <tr>
        <td>Details Notice</td>
        <td>:</td>
        <td><textarea name="notice" type="text" rows="4" cols="50"> </textarea></td>
        <td></td><div id="errorBox"></div>
      </tr>

      <tr><td colspan="4"><hr/></td></tr>

    </table>
    <hr/>
  </form>
  
  <center><input type="submit" name="submit" value="Upload" onClick="return submit1();" style="width: 60px">
  <button type="submit" formaction="Logged_In_Dashboard.php">Back</button>
  <br/><br>
  </form>
</fieldset>

</form>
</body>
</html>