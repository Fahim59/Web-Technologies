<?php include "header_footer/headerL.php";?>
<?php include "header_footer/Adminsidebar.php";?>

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
  </style>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">
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
          <option >Select Class</option>
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
        <td><input name="sname" type="text"></td>
        <td></td>
      </tr>
      <tr><td colspan="4"><hr/></td></tr>
    </table>
    <hr/>
  </form>
  
  <center><input type="submit" name="submit" value="Add" style="width: 60px">
  <input type="reset" name="reset" value="Reset" style="width: 60px">
  <br/><br>
  </form>
</fieldset>

</form>
</body>
</html>