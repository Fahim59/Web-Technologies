<?php include('header_footer/headerL.php');?>
<?php include('header_footer/Adminsidebar.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    
</head>
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
        .rnpass
        {
            color: red;
        }
        .text
        {
            text-align: center;
        }
    </style>
<body>
</body>
</html>
<?php

    $cpass = $npass = $rnpass = "";
    $cpass = "";
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
    <fieldset style="width: 100%px;" align="left">

    <legend class="text"><b>CHANGE PASSWORD</b></legend>

    <label for="cpass" >Current Password<span class="error">* </label>
    <input type="text" name="cpass" value="<?php echo $cpass;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ecpass;?> </span><br>
    <hr>

    <label for="npass" class="npass" >New Password<span class="error">* </label>
    <input type="text" name="npass" value="<?php echo $npass;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $enpass;?> </span><br>
    <hr>

    <label for="rnpass" class="rnpass" >Retype New Password<span class="error">* </label>
    <input type="text" name="rnpass" value="<?php echo $ernpass;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ernpass;?> </span><br>
    <hr>

    <center><input type="submit" name="submit" value="Submit" style="width: 60px"></center>
        
    </form>
</fieldset>
