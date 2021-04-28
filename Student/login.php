<?php
 
    $error="";
    $success="";
    
    if(isset($_POST['submit'])){
          $uname=$_POST['uname'];
          $pass=$_POST['pass'];
          if($uname == "Shusmita Islam"){
                 if($pass == "password"){
                     $error = "";
                     $success = "Welcome Shusmita Islam";
                     header("location: middashboard2.php");
                     
                 }
                 else{
                     $error = "Invalid Password";
                     $success = "";
                 }
           }
           else{
                  $error = "Invalid Username";
                  $success = "";
           }
      }
?>


<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <title>Login Form</title>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: #666;
  padding: 30px;
  text-align: left;
  font-size: 35px;
  color: white;
}
article {
  float: Center;
  padding: 270px;
  text-align: Center;
  height: 300px; /* only for demonstration, should be removed */
}
/* Clear floats after the columns */
section::after {
  content: "";
  display: table;
  text-align: Center;
  clear: both;
}

}
</style>
</head>
<body>

<header>
<pre> <img src="midprojectlogo.jpg" alt="student" width="60" height="70"> <b>Login</b></pre> 
</header>

 <body>
   <div class="container">
     <p class="error"><?php echo $error; ?></p><p class="success"><?php echo $success; ?></p>
      <form method="post">
         <div class="form-input">
            <i class"fa fa-user fa-2x cust" aria-hidden="true"></i>
            </br></br><pre>                                                                                            
            	<input type="text" name="uname" value="" placeholder="Enter Username" required><br/>
            <i class="fa fa-lock fa-2x cust" aria-hidden="true"></i>
                                                                                            
            <input type="password" name="pass" value="" placeholder="Enter Password" required><br/>
            <input type="submit"  name="submit" value="LOGIN"><br/>
            <a href="http://localhost/php/forgotpassword.php">Forget Password</a></pre>
          </div>
         </form>
     </div>
   </body>
</html>
