<?php  include('header_footer/header1.php');?>
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

    $id = $pass = $cpass ="";
    $erid = $erpass = $ercpass ="";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      //User Name
      if(empty($_POST["id"]))
      {
        $erid = "Username is requied";
      }
      else
      {
        $id = test_input($_POST["id"]); $_SESSION['id']=$id;
        if(!preg_match("/^[a-zA-Z0-9-. ?!]{2,}$/",($_POST["id"])))
        {
          $erid = "At least two characters and can only contain alpha numeric characters,letters,period,dash";
        }
      }
      //Password
      if(empty($_POST["pass"]))
      {
        $erpass = "Password can't be empty!";
      }
      else
      {
        $pass = test_input($_POST["pass"]); $_SESSION['pass']=$pass;

        if(empty($_POST["pass"]))
        {
          $erpass = "Password can't be empty!";
        }
        else if(empty($_POST["cpass"]))
        {
          $ercpass = "Password can't be empty!";
        }

        else if (strlen($_POST["pass"]) <= 7) 
        {
          $erpass = "Your Password Must Contain At Least 8 Characters!";
        }
        else if(!preg_match("#[a-zA-Z0-9-. ?!]+#",($_POST["pass"]))) 
        {
          $erpass = "Your Password Must Contain At Least one Number or Character!";
        }
        /*else if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pass))*/
        else if(!preg_match('/[$%@#]/', ($_POST["pass"])))
        {
          $erpass = "Your Password Must Contain At Least one special character(@,#,$,%)!";
        }
      }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }  
?>

<form method="post" action="Logged_In_Dashboard.php"style="padding-top: 10px">

<fieldset style="width: 1000px">
    <legend class="text"><b>LOGIN</b></legend>
    <form action="#" method="POST">
        <table>
            <tr>
                <td><b>User Name</td>
				<td><b>:</td>
                <td><input type="text" name="id" value="<?php echo $id;?>" ><span class="error">  <?php echo $erid;?> </span><br></td>
            </tr>
            <tr>
                <td><b>Password</td>
				<td><b>:</td>
                <td><input type="text" name="pass" value="<?php echo $pass;?>" ><span class="error">  <?php echo $erpass;?> </span><br>
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