<?php  include('header_footer/header1.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
</head>
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
      color: RED;
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
  </style>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">
    <legend class="legend"><b>Welcome to Registration Page</b></legend>
    <p><a href="TeacherReg.php" style="width: 100%">Register as Teacher</a>
    <p><a href="LibrarianReg.php" style="width: 100%">Register as Librarian</a>
    <p><a href="StudentReg.php" style="width: 100%">Register as Student</a>

    <p><center>Already Register? <a href="Login.php">Login</a></center>
  
</form>
</body>
</html>