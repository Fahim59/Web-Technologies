<!DOCTYPE html>
<html>
<style >
		.error
		{
			color: red;
		}
        .npass
        {
            color: green;
        }
        .rnpass
        {
            color: red;
        }
	</style>
<body>

<?php

    $cpass = $npass = $rnpass = "";
    $cpass = "Mustafiz@";
    $ecpass = $enpass = $ernpass = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    	//Password
        if(empty($_POST["cpass"]) && empty($_POST["npass"]) && empty($_POST["rnpass"]))
        {
            $ecpass = "Old Password is requied";
            $enpass = "New Password can't be empty!";
            $ernpass = "Retype New Password";
        }
    	else
    	{
    		$cpass = test_input($_POST["cpass"]);
            $npass = test_input($_POST["npass"]);
            $rnpass = test_input($_POST["rnpass"]);

            if (strlen($_POST["cpass"]) <= 7) 
            {
                $ecpass = "Your Password Must Contain At Least 8 Characters!";
            }
            else if(!preg_match("#[a-zA-Z0-9-. ?!]+#",$cpass)) 
            {
                $ecpass = "Your Password Must Contain At Least one Number or Character!";
            }
            /*else if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pass))*/
            else if(!preg_match('/[$%@#]/', $cpass))
            {
                $ecpass = "Your Password Must Contain At Least one special character(@,#,$,%)!";
            }

            if($cpass == $npass)
            {
                $enpass = "Current password and New password cannot be same!";
            }
            if($npass != $rnpass)
            {
                $ernpass = "New password and Retype password must be same!";
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

<fieldset style="width: 700px; ">
    <legend><b>CHANGE PASSWORD</b></legend>
    <form action="#" method="POST">
        <table>
            <tr>
                <td>Current Password</td>
				<td>:</td>
                <td><input type="text" name="cpass" value="<?php echo $cpass;?>" ><span class="error">  <?php echo $ecpass;?> </span><br></td>
            </tr>

            <tr>
                <td><span class="npass">New Password</span></td>
				<td>:</td>
                <td><input type="text" name="npass" value="<?php echo $npass;?>" ><span class="error">  <?php echo $enpass;?> </span><br>
            </tr>

            <tr>
                <td><span class="rnpass">Retype New Password</span></td>
                <td>:</td>
                <td><input type="text" name="rnpass" value="<?php echo $rnpass;?>" ><span class="error">  <?php echo $ernpass;?> </span><br>
            </tr>

        </table>
        <hr/>
        <input type="submit" name="submit" value="Submit" style="width: 60px">
		
    </form>
</fieldset>
</form>

</body>
</html>