<!DOCTYPE html>
<html>
<style >
		.error
		{
			color: red;
		}
	</style>
<body>

<?php

    $id = $pass = "";
    $euname = $epass ="";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    	//User_Name
        if(empty($_POST["id"]) && empty($_POST["pass"]))
        {
            $euname="Username is requied";
            $epass="Password can't be empty!";
        }
    	else
    	{
    		$id = test_input($_POST["id"]);
            $pass = test_input($_POST["pass"]);

            if (!preg_match("/^[a-zA-Z0-9-. ?!]{2,}$/",$id))
    		{
    			$euname = "At least two characters and can only contain alpha numeric characters,letters,period,dash";
    		}

            if (strlen($_POST["pass"]) <= 7) 
            {
                $epass = "Your Password Must Contain At Least 8 Characters!";
            }
            else if(!preg_match("#[a-zA-Z0-9-. ?!]+#",$pass)) 
            {
                $epass = "Your Password Must Contain At Least one Number or Character!";
            }
            /*else if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pass))*/
            else if(!preg_match('/[$%@#]/', $pass))
            {
                $epass = "Your Password Must Contain At Least one special character(@,#,$,%)!";
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

<fieldset style="width: 850px; ">
    <legend><b>LOGIN</b></legend>
    <form action="#" method="POST">
        <table>
            <tr>
                <td>User Name</td>
				<td>:</td>
                <td><input type="text" name="id" value="<?php echo $id;?>" ><span class="error">  <?php echo $euname;?> </span><br></td>
            </tr>
            <tr>
                <td>Password</td>
				<td>:</td>
                <td><input type="text" name="pass" value="<?php echo $pass;?>" ><span class="error">  <?php echo $epass;?> </span><br>
            </tr>
        </table>
        <hr/>
		<input name="remember" type="checkbox">Remember Me
		<br/>
        <input type="submit" name="submit" value="Submit" style="width: 60px">
		
        <a href="Change_Pass.php">Forgot password?</a>
    </form>
</fieldset>
</form>

</body>
</html>