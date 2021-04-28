<?php

    $email = "";
    $eemail = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      if(empty($_POST["email"]))
      {
        $eemail = "Please Enter Your email";
      }
      else
      {
        $email = test_input($_POST["email"]);
         $_SESSION['email']=$email;

        if(!filter_var(($_POST["email"]), FILTER_VALIDATE_EMAIL))
        {
          $eemail = "Please type valid email format";
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
