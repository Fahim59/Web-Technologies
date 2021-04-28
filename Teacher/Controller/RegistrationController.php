<?php

include( '../Model/model.php');
session_start();

$name=$fname=$mname=$email=$uname=$address=$pass=$cpass=$dob=$gender = $image = $uid ="";
$ename=$efname=$emname=$eemail=$eimg=$eaddress=$epass=$ecpass=$edob=$egender=  $eruid = "";
$error=$message = "";
$errorFlag=0;



if($_SERVER["REQUEST_METHOD"] == "POST")
    {

    if(empty($_POST["uid"]))  
      {  
        $eruid = "Enter User ID";
         $errorFlag=1;
        
      }
      //$uid = $_POST[$uid];
    
      if(empty($_POST["name"]))  
      {  
          $ename = "Please Enter your Name";
          $errorFlag=1;
           
      }
    
       else {
       $name = $_POST["name"];
       $count = str_word_count("$name");
      if ((!preg_match("/^[a-zA-Z-' ]*$/",$name)) || $count < 2 ){
        $ename = "Only letters and white space allowed and contains at least two words";
        $errorFlag=1;
         
       } 
       }

      if(empty($_POST["fname"]))  
      {  
          $efname = "Please Enter your Father Name";
          $errorFlag=1;
            
      }
     
       else {
       $fname = $_POST["fname"];
       $count = str_word_count("$fname");
        if ((!preg_match("/^[a-zA-Z-' ]*$/",$fname)) || $count < 2 ){
        $efname = "Only letters and white space allowed and contains at least two words";
        $errorFlag=1;
          
       } 
       }
      if(empty($_POST["mname"]))  
      {  
          $emname = "Please Enter your Mother Name";
          $errorFlag=1;
           
      }
      
          else {
       $mname = $_POST["mname"];
       $count = str_word_count("$mname");
      if ((!preg_match("/^[a-zA-Z-' ]*$/",$mname)) || $count < 2 ){
        $emname = "Only letters and white space allowed and contains at least two words";
        $errorFlag=1;
          
       } 
       }
      if(empty($_POST["email"]))
      {
          $eemail = "Please Enter your Email Address ";
          $errorFlag=1;
            
      }
      else if(!filter_var(($_POST["email"]), FILTER_VALIDATE_EMAIL))
      {
          $eemail = "Invalid email format";
          $errorFlag=1;
          
      }


      if(empty($_POST["dob"]))
      {
          $edob = "  Please Select ";
          $errorFlag=1;
            
      }
      
     

      if(!isset($_POST["gender"]))
      {
          $egender = "At least one of the Gender must be selected";
          $errorFlag=1;
           
      }

       if(empty($_POST["address"]))
      {
          $eaddress = "Please Enter your Address";
          $errorFlag=1;
         
      }
     else if( strlen($_POST["address"])<4)
      {
        
         $eaddress = "AT least 4 letter ";
         $errorFlag=1;
          
      }
   

       if(empty($_POST["cpass"]))
      {
          $ecpass = "Confirm Password can't be empty";
          $errorFlag=1;
            
        
      }
      
      if(empty($_POST["pass"]))
      {
          $epass = "Password can't be empty";
          $errorFlag=1;
           
        
      }

       else if ((strlen($_POST["pass"]) < 8) || (!preg_match('/[$%@#]/', ($_POST["pass"]))))
       {
          $epass = "Must Contain At Least 8 Characters & 1 special Character($,%,@,#)";
          $errorFlag=1;
       }

       else if(($_POST["pass"]) != ($_POST["cpass"]))
       {
          $ecpass = "Password and Confirm password must be same";
          $errorFlag=1;
       }

      // Image upload 
    $target_dir = "../Upload/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if file already exists
   /* if (file_exists($target_dir)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }*/
    // Check file size
    if ($_FILES["picture"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats

        if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg")
        {
             if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                        echo "The file ".$target_dir. basename( $_FILES["picture"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }

        }

        else{
           $eimg = "Select Image";
        $errorFlag=1;
          
        }
 
  
if ($errorFlag==0) 
{



   registration();
    
   
  }

  // else{
  //   echo " You have a error";
  //     }

 }
?>

