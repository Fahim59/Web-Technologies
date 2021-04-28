<?php include "../headerL.php";?>
<?php include "../Adminsidebar.php";?>
<?php include "../../Model/conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../../CSS/button.css" crossorigin="anonymous">
<style >
    label
        {
            display: inline-block;
            width: 20%;
            padding: 1%; 
        }
        .error
        {
            color: red;
        }
        .npass
        {
            color: green;
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
      var cpass = document.Change_Password.cpass.value;
      var npass = document.Change_Password.npass.value;
      var rnpass = document.Change_Password.rnpass.value;

      if(cpass == "")
      {
        document.Change_Password.cpass.focus();
        document.getElementById("errorBox").innerHTML = "Password is required";
        return false;
      }
      if(npass == "")
      {
        document.Change_Password.npass.focus();
        document.getElementById("errorBox").innerHTML = "New Password is required";
        return false;
      }
      if(rnpass == "")
      {
        document.Change_Password.rnpass.focus();
        document.getElementById("errorBox").innerHTML = "Retype your new Password";
        return false;
      }
      else if(rnpass != npass)
      {
        document.Change_Password.rnpass.focus();
        document.getElementById("errorBox").innerHTML = "Passwords Must be Same!!";
        return false;
      }
    }
    function checkPassword()
    {
      var passRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;

      if(document.getElementById("cpass").value == "")
      {
        document.Change_Password.cpass.focus();
        document.getElementById("errorBox").innerHTML = "Password is required!!";
        return false;
      }
      else if(!document.getElementById("cpass").value.match(passRegex))
      {
        document.Change_Password.cpass.focus();
        document.getElementById("errorBox").innerHTML = "Your Password Must Contain At Least one uppercase, lowercase letter and special character!";
        return false;
      }
      else
      {
        document.getElementById("errorBox").innerHTML = "";
      }
    }
    function checkCPassword()
    {
      var passRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;

      if(document.getElementById("npass").value == "")
      {
        document.Change_Password.npass.focus();
        document.getElementById("errorBox").innerHTML = "Retype Password!!";
        return false;
      }
      else if(!document.getElementById("npass").value.match(passRegex))
      {
        document.Change_Password.npass.focus();
        document.getElementById("errorBox").innerHTML = "Your Password Must Contain At Least one uppercase, lowercase letter and special character!";
        return false;
      }
      else
      {
        document.getElementById("errorBox").innerHTML = "";
      }
    }
    
  </script>
<body>
</body>
</html>
<?php

    $cpass = $npass = $rnpass = "";
    $ecpass = $enpass = $ernpass = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["cpass"]))
        {
            $ecpass = "Old Password is requied";
        }
        
        if(empty($_POST["npass"]))
        {
            $enpass = "New Password can't be empty!";
        }
        else if(empty($_POST["rnpass"]))
        {
            $ernpass = "Retype New Password";
        }
        if (strlen($_POST["npass"]) <= 7) 
        {
            $enpass = "Your Password Must Contain At Least 8 Characters!";
        }
        else if(!preg_match('/[$%@#]/',$npass))
        {
            $enpass = "Your Password Must Contain At Least one special character(@,#,$,%)!";
        }
        
        if(isset($_POST["submit"]))
        {
            if($_POST["cpass"] == $_SESSION["pass"])
            {
                if($_POST["npass"] == $_POST["rnpass"] && strlen($_POST["npass"]) >= 7)
                {
                    $sql = "UPDATE login SET password='".$_POST["npass"]."' where uid='".$_SESSION["uid"]."'";
    
                    if(mysqli_query($conn,$sql))
                    {
                        echo "Password Change successfull!";
                    }
                }
                else
                    echo "New password and Retype password must be same and Password Must Contain At Least 8 Characters!";
            }
            else
                echo "Current password is not correct!";
        }
    }
?>
<form name="Change_Password" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">
    <fieldset style="width: 100%px;" align="left">

    <legend class="text"><b>CHANGE PASSWORD</b></legend>
    <center><table><div id="errorBox"></div></table></center>

    <label for="cpass" >Current Password<span class="error">* </label>
    <input type="text" name="cpass" id="cpass" onkeyup="checkPassword()" onblur="checkPassword()" value="<?php echo $cpass;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ecpass;?> </span><br><div id="errorBox"></div>
    <hr>

    <label for="npass" class="npass" >New Password<span class="error">* </label>
    <input type="text" name="npass" id="npass" onkeyup="checkCPassword()" onblur="checkCPassword()" value="<?php echo $npass;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $enpass;?> </span><br><div id="errorBox"></div>
    <hr>

    <label for="rnpass" class="error" >Retype New Password<span class="error">* </label>
    <input type="text" name="rnpass" value="<?php echo $rnpass;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ernpass;?> </span><br><div id="errorBox"></div>
    <hr>

    <center><input type="submit" class="button3" name="submit" value="Submit" onClick="return validateForm();" style="width: 60px">
    <button type="submit" class="button3" formaction="Logged_In_Dashboard.php">Back</button>
        
    </form>
</fieldset>
