<?php include('../header_footer/headerL.php');?>
<?php include('../header_footer/Adminsidebar.php');?>
<?php include "../database/conn.php"; ?>
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
        if(empty($_POST["rnpass"]))
        {
            $ernpass = "Retype New Password";
        }
        /*if (strlen($_POST["npass"]) <= 7) 
        {
            $enpass = "Your Password Must Contain At Least 8 Characters!";
        }
        if(!preg_match("#[a-zA-Z0-9-. ?!]+#",$npass)) 
        {
            $enpass = "Your Password Must Contain At Least one Number or Character!";
        }
        if(!preg_match('/[$%@#]/',$npass))
        {
            $enpass = "Your Password Must Contain At Least one special character(@,#,$,%)!";
        }*/
        
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">
    <fieldset style="width: 100%px;" align="left">

    <legend class="text"><b>CHANGE PASSWORD</b></legend>

    <label for="cpass" >Current Password<span class="error">* </label>
    <input type="text" name="cpass" value="<?php echo $cpass;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ecpass;?> </span><br>
    <hr>

    <label for="npass" class="npass" >New Password<span class="error">* </label>
    <input type="text" name="npass" value="<?php echo $npass;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $enpass;?> </span><br>
    <hr>

    <label for="rnpass" class="error" >Retype New Password<span class="error">* </label>
    <input type="text" name="rnpass" value="<?php echo $rnpass;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ernpass;?> </span><br>
    <hr>

    <center><input type="submit" name="submit" value="Submit" style="width: 60px">
    <button type="submit" formaction="Logged_In_Dashboard.php">Back</button>
        
    </form>
</fieldset>
