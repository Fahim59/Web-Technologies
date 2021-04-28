<?php

$class = $subject = $sid = $mid = $final="";
$eclass = $esubject = $esid = $emarks = "";
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
      if(empty($_POST["sid"]))  
      {  
           $esid = "Select ID";  
           $errorFlag=1;

      }
      
      // if(empty($_POST["mid"]))  
      // {  
      //      $emarks = "Enter Marks";  
      //      $errorFlag=1;
      // }  

      //  if(empty($_POST["final"]))  
      // {  
      //      $emarks = "Enter Marks";  
      //      $errorFlag=1;
      // } 
      if($errorFlag==0)
      {
        

        // $class=$_GET['class'];

        // StudentResult($uid,$class,$subject,$mid,$final)
       $result= StudentResult($_POST["sid"],$_POST["class"],$_POST["subject"],$_POST["mid"],$_POST["final"]);
       // echo $result;

      if($result==1){
        echo "<h3 style='color:RED'>Submitted</h3>";
      }
     // echo GetStudentByClass($class);
  

     
      // echo $_POST['data'];
      // echo GetSubForClass($_POST['data']);
       //echo GetStudentByClass($_POST['data']));
      

      
        
      }
      else{
        echo "Erros";
      }
   }
?>