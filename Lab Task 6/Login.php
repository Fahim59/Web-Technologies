<?php include('header_footer/header1.php');?>
<?php include ('database/conn.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<style >
		.error
		{
			color: red;
		}
    .text
    {
      text-align: center;
    }
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
        <table>
            <tr>
                <td><b>User Name</td>
				<td><b>:</td>
                <td><input type="text" name="uid" value="<?php echo $uid;?>" ><span class="error">  <?php echo $eruid;?> </span><br></td>
            </tr>
            <tr>
                <td><b>Password</td>
				<td><b>:</td>
                <td><input type="password" name="pass" value="<?php echo $pass;?>" ><span class="error">  <?php echo $erpass;?> </span><br>
            </tr>
        </table>
        <hr/>
		<input name="remember" type="checkbox">Remember Me
		<br/><br>
        <input type="submit" name="submit" value="Login" style="width: 60px">
		
        <a href="Forget_Password.php">Forgot password?</a>
    </form>
</fieldset>
</form>

</body>
</html>