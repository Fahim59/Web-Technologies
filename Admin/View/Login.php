<?php include('header1.php');?>
<?php include ('../Model/conn.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="mycss.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<style >
	.error
	{
		color: red;
	}
    .text
    {
      text-align: center;
    }
    #errorBox
    {
      color:#F00;
    }

    body {font-family: Arial, Helvetica, sans-serif;}
    form {border: 3px solid #f1f1f1;}

	</style>

  <script type="text/javascript">

    function submit1()
    {
      var uid = document.Login.uid.value;
      var pass = document.Login.pass.value;

      if(uid == "")
      {
        document.Login.uid.focus();
        document.getElementById("errorBox").innerHTML = "User Id is required";
        return false;
      }
      if(pass == "")
      {
        document.Login.pass.focus();
        document.getElementById("errorBox").innerHTML = "Password is required";
        return false;
      }  
    }
    function checkUId()
    {
      if(document.getElementById("uid").value == "")
      {
        document.Login.uid.focus();
        document.getElementById("errorBox").innerHTML = "User Id is required";
        return false;
      }
      else
      {
        document.getElementById("errorBox").innerHTML = "";
      }
    }
    function checkPass()
    {
      if(document.getElementById("pass").value == "")
      {
        document.Login.pass.focus();
        document.getElementById("errorBox").innerHTML = "Password is required";
        return false;
      }
      else
      {
        document.getElementById("errorBox").innerHTML = "";
      }
    }

    function myFunction()
    {
        var x = document.getElementById("pass");
        if (x.type === "password")
        {
            x.type = "text";
        }  
    }
    function mOut(obj)
    {
        var x = document.getElementById("pass");
        if (x.type === "text")
        {
            x.type = "password";
        } 
    }
  </script>
<body>

<?php

    $uid = $pass = "";
    $eruid = $erpass = "";

    session_start();
    error_reporting(0);

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      //User ID
      if(empty($_POST["uid"]))
      {
        $eruid = "Username is requied";
      }
      
      //Password
      if(empty($_POST["pass"]))
      {
        $erpass = "Password can't be empty!";
      }
    }

    if(isset($_COOKIE['uid']) && isset($_COOKIE['type']))
    {
      if($_COOKIE["type"]=="a")
        header("Location:admin/Logged_In_Dashboard.php");

      else if($_COOKIE["type"]=="t")
        header("Location:teacher/Teacher_panel.php");

      else if($_COOKIE["type"]=="s")
        header("Location:student/Student_panel.php");

      else if($_COOKIE["type"]=="l")
        header("Location:librarian/Dashboard.php");
    }
    else
    {
      if(isset($_SESSION['uid']) && isset($_SESSION['type']))
      {
        if($_SESSION["type"]=="a")
          header("Location:admin/Logged_In_Dashboard.php");

        else if($_SESSION["type"]=="t")
          header("Location:teacher/Teacher_panel.php");

        else if($_SESSION["type"]=="s")
          header("Location:student/Student_panel.php");

        else if($_SESSION["type"]=="l")
        header("Location:librarian/Dashboard.php");
      }
    }


    if(isset($_POST["submit"]))
    {
      if($_POST["uid"]=="" || $_POST["pass"]=="")
        echo "ID or Password can't be empty!";

      else
      {
        $remember = $_POST["remember"];
      
        $sql = "select * from login where uid='".$_POST["uid"]."' and password='".$_POST["pass"]."'";
  
        $result = mysqli_query($conn, $sql);
  
        if(mysqli_num_rows($result)==1)
        {
          while($row=mysqli_fetch_assoc($result))
          {
            if($row['status']=="a")
            {
              $_SESSION["uid"]=$row['uid'];
              $_SESSION["type"]=$row['type'];
              $_SESSION["pass"]=$row['password'];

              if (isset($_POST['remember']))
              {
                setcookie("uid", $row['uid'], time() + (86400 * 30)); 
                setcookie("pass", $row['password'], time() + (86400 * 30)); 
              }

              if($_SESSION["type"]=="a")
              {
                header("Location:admin/Logged_In_Dashboard.php");
                setcookie("pass", $_SESSION["pass"], time() + (86400 * 30), "/");
              }

              else if($_SESSION["type"]=="t")
              {
                header("Location:teacher/Teacher_panel.php");
              }

              else if($_SESSION["type"]=="s")
              {
                header("Location:student/Student_panel.php");
              }

              else if($_SESSION["type"]=="l")
              {
                header("Location:librarian/Dashboard.php");
              }
            }
            else if($row['status']=="p")
              echo "Your Account Is Pending! Contact Administrator For More Details!";
            else if($row['status']=="r")
              echo "Your Account Is Rejected! Contact Administrator For More Details!";
          }
        }
        else
        {
          echo "Invalid UserId or Password!!";
        }

        mysqli_close($conn);
      }
    }
?>

<fieldset style="width: 1000px">
<legend class="text"><b>LOGIN</b></legend>
<form name="Login" action="#" method="POST">

  <div class="imgcontainer">
    <img src="image/login.jpg" alt="Avatar" class="avatar">
  </div>
  <center><table><div id="errorBox"></div></table></center>

  <div class="container">
    <b>User Name: <input type="text" placeholder="Enter Username" name="uid" id="uid" onkeyup="checkUId()" onblur="checkUId()" style="width: 250px" value="<?php if (isset($_COOKIE["uid"])){echo $_COOKIE["uid"];}?>" ><span class="error">  <?php echo $eruid;?> </span><br>

    <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password: <?php echo "&nbsp";?> <input type="password" placeholder="Enter Password" name="pass" id="pass" onkeyup="checkPass()" onblur="checkPass()" style="width: 250px" value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>">
    <i class="far fa-eye" id="togglePassword" onmouseover="myFunction()" onmouseout="mOut()"></i>
    <span class="error"><?php echo $erpass;?> </span><br>
    
    <button type="submit" name="submit" style="width: 100px" onClick="return submit1();"><b>Login</button>

    <label>

    <div class="container" style="background-color:#f1f1f1">
    <input name="remember" type="checkbox" <?php if (isset($_COOKIE["uid"]) && isset($_COOKIE["pass"])){ echo "checked";}?> >Remember Me
    <br><br>
    Forgot <a href="Forget_Password.php">password?</a>
      
    </label>
  </div>

  </div>

</fieldset>
</form>

</body>
</html>