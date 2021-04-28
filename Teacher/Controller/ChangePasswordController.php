<?php

    // include('model.php');

    $pass = $npass = $cnpass = "";
    $epass = $enpass = $ecnpass = "";
    $msg="";
    $errorFlag=0;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["pass"]) && empty($_POST["npass"]) && empty($_POST["cnpass"]))
        {
            $epass = "Plese Enter Your Password";
            $enpass = "Please Enter Your New password";
            $ecnpass = "Please confirm Your New Password";
            $errorFlag=1;
        }
        else
        {
            $pass = test_input($_POST["pass"]);
            $npass = test_input($_POST["npass"]);
            $cnpass = test_input($_POST["cnpass"]);

            // if (strlen($_POST["pass"]) <= 7) 
            //  {
            //     $epass = "Your Password Must Contain At Least 8 Characters";
            //     $errorFlag=1;
            //  }
            // else if(!preg_match('/[$%@#]/', $pass))
            //  {
            //      $epass = "Your Password Must Contain At Least one special character(@,#,$,%)";
            //      $errorFlag=1;
            //  }

              if (strlen($_POST["npass"]) <= 7) 
             {
                $enpass = "Your Password Must Contain At Least 8 Characters";
                $errorFlag=1;
             }
            else if(!preg_match('/[$%@#]/', $npass))
             {
                 $enpass = "Your Password Must Contain At Least one special character(@,#,$,%)";
                 $errorFlag=1;
             }

            if($pass == $npass)
            {
                $enpass = "Password & New Password cannot be same";
                $errorFlag=1;
            }
            if($npass != $cnpass)
            {
                $ecnpass = "New password & Retype Password must be same";
                $errorFlag=1;
            }

            if($errorFlag==0) {
           $result= ChangePassword($pass,$npass);
           if ($result) {
               $msg= "Password Update Successfully";
           }
           else{
                 $msg= "Password Wrong";
           }

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

