<?php 
 // session_start();

  
 if($_SERVER["REQUEST_METHOD"] == "POST")

                          
{
 
  $errorFlag=0;
    if(empty($_POST["id"]))  
      {  
        $eruid = "Enter User ID";
         $errorFlag=1;
        
      }


    if(empty($_POST["pass"]))
      {
          $erpass = "Password can't be empty";
          $errorFlag=1;
           
        
      }

       // else if ((strlen($_POST["pass"]) < 8) || (!preg_match('/[$%@#]/', ($_POST["pass"]))))
       // {
       //    $erpass = "Must Contain At Least 8 Characters & 1 special Character($,%,@,#)";
       //    $errorFlag=1;
       // }

       if($errorFlag==0){  
        // echo $_POST['id'];
        //  echo $_POST['pass'];
      $login=login($_POST['id'],$_POST['pass']);

       // echo $login;


  if($login['status']){

      echo "<script>location.href='Dashboard.php'</script>";
  }

  else{
    $FlashMessage=$login['msg'];

     // echo "<script>location.href='Login.php'</script>";
    // echo "Invalid";

  }

       }

  
  
  
}
	
	



	
	

?>