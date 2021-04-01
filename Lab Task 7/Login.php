<?php include('header_footer/header1.php');?>
<?php include ('database/conn.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="header_footer/mycss.css" crossorigin="anonymous">
<style >
		.error
		{
			color: red;
		}
    .text
    {
      text-align: center;
    }

    body {font-family: Arial, Helvetica, sans-serif;}
    form {border: 3px solid #f1f1f1;}

	</style>
<body>

<?php

    $uid = $pass = "";
    $eruid = $erpass = "";

    session_start();
    error_reporting(0);

    if(isset($_COOKIE['uid']) && isset($_COOKIE['type']))
    {
      if($_COOKIE["type"]=="a")
        header("Location:admin/Logged_In_Dashboard.php");

      /*else if($_COOKIE["type"]=="t")
        header("Location:teacher/Teacher_panel.php");

      else if($_COOKIE["type"]=="s")
        header("Location:student/Student_panel.php");*/
    }
    else
    {
      if(isset($_SESSION['uid']) && isset($_SESSION['type']))
      {
        if($_SESSION["type"]=="a")
          header("Location:admin/Logged_In_Dashboard.php");

        /*else if($_SESSION["type"]=="t")
          header("Location:teacher/Teacher_panel.php");

        else if($_SESSION["type"]=="s")
          header("Location:student/Student_panel.php");*/
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

              if($remember=="on")
              {
                setcookie("uid", $_SESSION["uid"], time() + (86400 * 30), "/");
                setcookie("type", $_SESSION["type"], time() + (86400 * 30), "/");
              }

              if($_SESSION["type"]=="a")
                header("Location:admin/Logged_In_Dashboard.php");
                setcookie("pass", $_SESSION["pass"], time() + (86400 * 30), "/");

              /*else if($_SESSION["type"]=="t")
                header("Location:teacher/Teacher_panel.php");

              else if($_SESSION["type"]=="s")
                header("Location:student/Student_panel.php");*/
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
<form action="#" method="POST">

  <div class="imgcontainer">
    <img src="image/login.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <b>User Name: <input type="text" placeholder="Enter Username" name="uid" style="width: 250px" value="<?php echo $uid;?>" ><span class="error">  <?php echo $eruid;?> </span><br>

    <b>Password: <?php echo "&nbsp";?> <input type="password" placeholder="Enter Password" name="pass" style="width: 250px" value="<?php echo $pass;?>" ><span class="error">  <?php echo $erpass;?> </span><br>
    
    <button type="submit" name="submit" style="width: 100px"><b>Login</button>

    <label>

    <div class="container" style="background-color:#f1f1f1">
    <input name="remember" type="checkbox">Remember Me
    <br><br>
    Forgot <a href="Forget_Password.php">password?</a>
      
    </label>
  </div>

  </div>

</fieldset>
</form>

</body>
</html>