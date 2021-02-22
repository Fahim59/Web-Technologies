<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  
</head>
<style >
		.error
		{
			color: red;
		}
	</style>
<body>

<?php

    $email = "";
    $eremail = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      //Email
      if(empty($_POST["email"]))
      {
        $eremail = "Email is required";
      }
      else
      {
        $email = test_input($_POST["email"]); $_SESSION['email']=$email;

        if(!filter_var(($_POST["email"]), FILTER_VALIDATE_EMAIL))
        {
          $eremail = "Invalid email format. Format: example@something.com";
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
<?php include('Header.php');?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">

<fieldset style="width: 850px;margin-left: 18% ">
    <legend><b>FORGOT PASSWORD</b></legend>
    <form action="#" method="POST">
        <table>
            <tr>
                <td>Enter Email</td>
				<td>:</td>
                <td><input type="text" name="email" value="<?php echo $email;?>" ><span class="error">  <?php echo $eremail;?> </span><br></td>
            </tr>
        </table>
        <hr/>
        <input type="submit" name="submit" value="Submit" style="width: 60px">
		
    </form>
</fieldset>
</form>

<?php include('Footer.php');?>
</body>
</html>