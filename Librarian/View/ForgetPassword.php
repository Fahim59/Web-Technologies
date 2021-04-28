<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
</head>
<style >
		.error
		{
			color: red;
		}
	</style>

  <script>
    
    function ValidateForgetForm() {
      var email = document.forgetpass.email.value;

      if(email==null || email==""){  
        alert("Email can't be blank");  
        return false;  
      }
    }

    function CheckMail() {
     var email = document.forgetpass.email.value;
     var emailRe = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/; 
     if (document.getElementById("email").value == "") {
          document.getElementById("emailErr").innerHTML = "Email can't be blank";
          document.getElementById("emailErr").style.color = "red";
          document.getElementById("email").style.borderColor = "red";
      }else if(!emailRe.test(email)){
        document.getElementById("emailErr").innerHTML = " Invalid email format. Format: example@something.com";
        document.getElementById("emailErr").style.color = "red";
        document.getElementById("email").style.borderColor = "red";
      }else{
        document.getElementById("emailErr").innerHTML = "";
        document.getElementById("email").style.borderColor = "black";
      }
    }
  </script>
<body>

<?php

    $email = "";
    $emailErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      if(empty($_POST["email"]))
      {
        $emailErr = "Email is required";
      }
      else
      {
        $email = $_POST["email"]; $_SESSION['email']=$email;

        if(!filter_var(($_POST["email"]), FILTER_VALIDATE_EMAIL))
        {
          $emailErr = "Invalid email format. Format: example@something.com";
        }
      }
    } 
?>
<?php include('Header.php');?>
<form method="post" action="" name="forgetpass" onsubmit="ValidateForgetForm()">
<fieldset style="margin-left: 35px">
    <legend><b>FORGOT PASSWORD</b></legend>
      <label>Email: </label>
      <input type="text" name="email" id="email" onkeyup="CheckMail()" onblur="CheckMail()" size="40">
      <span class="error" id="emailErr"><?php echo $emailErr;?></span><hr>
      <input type="submit" name="submit" value="Submit" >
</fieldset>
</form>

<?php include('Footer.php');?>
</body>
</html>