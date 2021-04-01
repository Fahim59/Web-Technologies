<?php include('header_footer/header1.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="header_footer/pass.css" crossorigin="anonymous">
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
      background-color: #4CAF50; /* Green */
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
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}
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
        if(!filter_var(($_POST["email"]), FILTER_VALIDATE_EMAIL))
        {
          $eremail = "Invalid email format. Format: example@something.com";
        }
      }
    } 
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">

<fieldset style="width: 1100px">
    <legend class="text"><b>FORGOT PASSWORD</b></legend>
    <h2><legend class="legend"><b>Forgot Password?</b></legend></h2>
    <legend class="legend"><b>You can reset your password here! </b></legend><br>

    <div class="input-container">

    <?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";?>

    <i class="fa fa-envelope icon"></i>
    <input class="input-field" style="width: 500px" type="text" placeholder="Enter Your Email" name="email"value="<?php echo $email;?>" ><span class="error">  <?php echo $eremail;?> </span><br>
    
    </div>
    <br>

    <button class="button button1" type="submit" name="submit">Reset Password</button>
    <form action="Registration.php">
    
    </form>
</fieldset>
</form>

</body>
</html>