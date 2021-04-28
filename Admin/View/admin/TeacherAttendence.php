<?php include "../headerL.php";?>
<?php include "../Adminsidebar.php";?>
<?php include "../../Model/conn.php"; ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../../CSS/button.css" crossorigin="anonymous">
  <title>Attendence</title>
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

      var dob = document.Attendence.dob.value;
      var myDate = new Date(dob);
      var today = new Date();
      var type = document.Attendence.type.value;

      //Date
      if(dob == "")
      {
        document.Attendence.dob.focus();
        document.getElementById("errorBox").innerHTML = "Select Date First";
        return false;
      }
      else if(myDate > today)
      {
        document.getElementById("errorBox").innerHTML = "Future date cannot be selected";
        return false;
      }

      //Attendence
      if(document.Attendence.type[0].checked == false && document.Attendence.type[1].checked == false)
      {
        document.Attendence.type.value;
        document.getElementById("errorBox").innerHTML = "Select Type";
        return false;
      }
    }
  </script>
</head>
<body>

<?php

$name = $dob = $type ="";
$ername = $erdob = $ertype = "";
$error = $message = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $teacher = $_POST['tcombo'];

      //Date
      if(empty($_POST["dob"]))
      {
        $erdob = "Select a date";
      }

      //Attendence
      else if(!isset($_POST["type"]))
      {
        $ertype = "At least one of the types must be selected";
      }
      else
      {
        if(file_exists('data.json'))
        {  
          $current_data = file_get_contents('data.json');  
          $array_data = json_decode($current_data, true);  
          $extra = array(
            'user'            =>     $_POST['tcombo'],
            'type'            =>     $_POST["type"],
            'dob'             =>     $_POST["dob"]);

          $array_data[] = $extra;
          $final_data = json_encode($array_data);

          if(file_put_contents('data.json', $final_data))
          {  
            $message = "<label class='text-success'>Attendence Saved Successfully</p>";
          }
        }
        else  
        {  
          $error = 'JSON File not exits';
        }
      }
    }
?>

  <form name="Attendence" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">
  <fieldset style="width: 96%;" align="left">
  <legend class="text"><b>TEACHER ATTENDENCE</b></legend>
  <center><table><div id="errorBox"></div></table></center>

  <table>

  <label for="dob" >Select Date :</label>

  <input type="date" name="dob" value="<?php echo $dob;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erdob;?></span>

  </table>

  <label for="type" >Attendence :</label>

  <?php include "teacher/Tnotice.php"; ?>

  <input  type="radio" name="type"<?php if(isset($type) && $type=="present") echo "checked";?> value="Present">Present
  <input type="radio" name="type" <?php if (isset($type) && $type=="absent") echo "checked";?> value="Absent">Absent
  
  <span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ertype;?>
  <hr>

  <center><input type="submit" class="button3" name="submit" value="Save" onClick="return submit1();" style="width: 60px">
  <button type="submit" class="button3" formaction="Data.php">Attendence</button>
  <button type="submit" class="button3" formaction="Logged_In_Dashboard.php">Back</button>

  </form>
</fieldset>
</form>
</body>
</html>