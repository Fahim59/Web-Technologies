<?php include('header_footer/header1.php');?>
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
    .text
    {
      text-align: center;
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">

<fieldset style="width: 1000px">
    <legend class="text"><b>FORGOT PASSWORD</b></legend>
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

</body>
</html>