<?php

$class = $subject = $title = $notice= $nsubject = $message = "";
$eclass = $esubject = $etitle = $enmessage = "";
$error = $message = "";
$errorFlag=0;

if($_SERVER["REQUEST_METHOD"] == "POST")
  {  
   

      if(empty($_POST["class"]))  
      {  
           $eclass = "Please select a class";  
           $errorFlag=1;
      } 
      if(empty($_POST["subject"]))  
      {  
           $esubject = "Please select a Subject"; 
           $errorFlag=1; 
      }  

      if(empty($_POST["title"]))  
      {  
           $etitle = "Enter notice title"; 
           $errorFlag=1; 
      }
        if(strlen($_POST["title"])<3)  
      {  
           $etitle = "Title must be at least 3 character";  
           $errorFlag=1;
      }
    
      if(empty($_POST["notice"]))  
      {  
           $enmessage = "Please write the notice body";  
           $errorFlag=1;
      } 
      if(strlen($_POST["notice"])<5)  
      {  
           $enmessage = "Notice must be at least 5 character";  
           $errorFlag=1;
      }
      if($errorFlag==0)
      { 
        // $class,$subject,$title,$notice
       $res=  StudentNoticeSend($_POST['class'],$_POST['subject'],$_POST['title'],$_POST['notice']);
       if($res>0){
        echo "Successfully send";
       }
        
       }
        // else  
        // {  
        //   $error = 'Error';
        // }
    }
?>

