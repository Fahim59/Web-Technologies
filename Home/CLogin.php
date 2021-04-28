<?php  include('header1.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../CSS/mycss.css" crossorigin="anonymous">
<link rel="stylesheet" href="../CSS/registration.css" crossorigin="anonymous">
    <style>
      label
      {
        display: inline-block;
        width: 20%;
        padding: 1%; 
      }
      hr
      {
        style="border: 0.01px solid;
      }
    .error
    {
      color: red;
    }
    .text
    {
      text-align: center;
    }
    .legend
    {
      font-size: 20px;
      font-family: Arial, Helvetica, sans-serif;
    }
    p
    {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 18px;
    }

    body {font-family: Arial, Helvetica, sans-serif;}
    form {border: 3px solid #f1f1f1;}
  </style>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">
    <legend class="legend"><b>Welcome to Login Page</b></legend>

    <div class="imgcontainer">
    <img src="../Admin/View/image/reg.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container" style="background-color:#FAF0E6">

    <p><b><a class="two" href="../Admin/View/Login.php">Login as Admin</a></b></p>
    <p><b><a class="two" href="../Teacher/View/Login.php">Login as Teacher</a></b></p>
    <p><b><a class="two" href="../Librarian/View/Login.php">Login as Librarian</a></b></p>
    <p><b><a class="two" href="StudentReg.php">Login as Student</a></b></p>
      
    </div>

    <p><b><center>Did not Register yet? <a href="Registration.php">Register</a></center>
  
</form>
</body>
</html>