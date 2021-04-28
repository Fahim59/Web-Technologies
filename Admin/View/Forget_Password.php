<?php include('header1.php');?>
<?php include ('../Model/conn.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../CSS/pass.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style >
    .error
    {
      color: red;
    }
    .text
    {
      text-align: center;
    }
    .button 
    {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 10px 25px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      transition-duration: 0.4s;
    }
    .button1
    {
      background-color: white; 
      color: black; 
      border: 2px solid #4CAF50;
    }
    .button1:hover
    {
      background-color: #4CAF50;
      color: white;
    }
    #errorBox
    {
      color:#F00;
    }
    img.avatar 
    {
      width: 10%;
      border-radius: 20%;
    }
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}
  </style>

  <script type="text/javascript">

    function submit1()
    {
      var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
      var email = document.Forget_Password.email.value;

      if(email == "")
      {
        document.Forget_Password.email.focus();
        document.getElementById("errorBox").innerHTML = "Email is required";
        return false;
      }
      else if(!emailRegex.test(email))
      {
        document.Forget_Password.email.focus();
        document.getElementById("errorBox").innerHTML = "Invalid email format. Format: example@something.com";
        return false;
      }
      else
      {
        document.getElementById("errorBox").innerHTML ="";
      }
    }
  </script>

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
        if(!filter_var(($_POST["email"]), FILTER_VALIDATE_EMAIL))
        {
          $eremail = "Invalid email format. Format: example@something.com";
        }
      }
    }
?>

<form name="Forget_Password" method="post" enctype="multipart/form-data" style="padding-top: 10px">

<fieldset style="width: 1100px">
    <legend class="text"><b>FORGOT PASSWORD</b></legend>

    <div class="imgcontainer">
    <img src="image/password.png" alt="Avatar" class="avatar">
    </div>

    <h2><legend class="legend"><b>Forgot Password?</b></legend></h2>
    <legend class="legend"><b>You can reset your password here! </b></legend><br>
    <center><table><div id="errorBox"></div></table></center>

    <div class="input-container">

    <?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";?>

    <i class="fa fa-envelope icon"></i>
    <input class="input-field" value="<?php echo $email;?>" style="width: 500px" type="text" placeholder="Enter Your Email" name="email" onkeyup="submit1()" onblur="submit1()"><span class="error">  <?php echo $eremail;?> </span>
    
    </div>
    <br>

    <button class="button button1" type="submit" name="submit" onClick="return submit1();">Reset Password</button>
    <form action="Registration.php">
    
    </form>
</fieldset>
</form>

</body>
</html>