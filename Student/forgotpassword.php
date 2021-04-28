<!DOCTYPE html>
<html>
<head>
<style>
.error {color: red;}
</style>
</head>
<body>


<?php
$Email = "";
$email = "";

///forgot password validation
if(empty($_POST["email"]))
{
$email = "Please insert your email address";
}
else
{
$Email = $_POST["Email"];
if(!filter_var($Email, FILTER_VALIDATE_EMAIL))
{
$email = "Invalid email address. Format: example@type.com";
}
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">
<fieldset style="width:400px ">
<legend><b>Forgot Password</b></legend>
<input type="text" name="Email" value=""><span class="error"> <?php echo $email;?></span><br>
<hr style="border: 0.01px solid;">
</fieldset>

<input type="submit" Name="submit6" value="Submit" style="width:70px">
</form>


</body>
</html>