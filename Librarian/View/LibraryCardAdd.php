<?php  

  session_start();
  if (isset($_SESSION['userid'])) 
  {

    include "LoginHeader.php";
    include "Sidebar.php";
  }
  else
  {
    echo '<script>alert("Login First!")</script>';
    echo '<script>location.href="Login.php"</script>';
  }

 $message = '';  
 $check = 1;  


 $nameErr = $idErr = $classErr = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Student name is required";
    $check = 0;
  }else {
    $name = $_POST["name"];
    $count = str_word_count("$name");
    if ((!preg_match("/^[a-zA-Z-' ]*$/",$name)) || $count < 2 ){
      $nameErr = "Only letters and white space allowed and contains at least two words";
      $check = 0;
    }
  }

  if (empty($_POST["id"])) {
    $idErr = "Student id is required";
    $check = 0;
  }

  if (empty($_POST["class"])) {
    $classErr = "Student class is required";
    $check = 0;
  }else{
    $class = $_POST['class'];
    if ($class < 6 || $class > 10) {
       $classErr = "Only class 6 to 10 is appplicable";
       $check = 0;
    }
  }

 }

 
 if(isset($_POST["submit"]))  
  {
    if ($check == 1) { 
        $data['id'] = $_POST["id"];
        $data['name'] = $_POST['name'];    
        $data['class'] = $_POST["class"];
    
        include '../Controller/CardSave.php';
        if(CardSave($data)) {
          $message = "Card has been issued.";
        }else {
          $message = "Card has't issued.";
        }

      }
    }
?> 

 <!DOCTYPE html>
 <html>
 <head>
  <title>Issue Card</title>
 <style>
.error {color: #FF0000;}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 </head>

 <script>
   
   function ValidateCardForm() {
     var id = document.card.id.value;
     var name = document.card.name.value;
     var Class = document.card.class.value;

     if(id==null || id==""){  
          alert("Student ID can't be blank");  
          return false;  
     }else if (name==null || name==""){  
        alert("Student Name can't be blank");  
        return false;  
      }else if (Class==null || Class==""){  
        alert("Class can't be blank");  
        return false;  
      }
   }

   function CheckID() {
      if (document.getElementById("id").value == "") {
          document.getElementById("idErr").innerHTML = "Student ID can't be blank";
          document.getElementById("idErr").style.color = "red";
          document.getElementById("id").style.borderColor = "red";
      }else{
        document.getElementById("idErr").innerHTML = "";
        document.getElementById("id").style.borderColor = "black";
      }
    }

    function CheckName() {
      var name = document.card.name.value;
      var nameRe = /^[a-zA-Z-' ]*$/;
      if (document.getElementById("name").value == "") {
          document.getElementById("nameErr").innerHTML = "Name can't be blank";
          document.getElementById("nameErr").style.color = "red";
          document.getElementById("name").style.borderColor = "red";
      }else if(!nameRe.test(name)){
        document.getElementById("nameErr").innerHTML = " Only letters and white space allowed";
        document.getElementById("nameErr").style.color = "red";
        document.getElementById("name").style.borderColor = "red";

      }else if(+CountWords(name)<+2){
        document.getElementById("nameErr").innerHTML = " Name contains at least two words";
        document.getElementById("nameErr").style.color = "red";
        document.getElementById("name").style.borderColor = "red";
      }else{
        document.getElementById("nameErr").innerHTML = "";
        document.getElementById("name").style.borderColor = "black";
      }
    }

    function CountWords(str) {
    return str.trim().split(/\s+/).length;
    }

    function CheckClass() {
       var Class = document.card.class.value; 
      if (document.getElementById("class").value == "") {
          document.getElementById("classErr").innerHTML = " Class can't be blank";
          document.getElementById("classErr").style.color = "red";
          document.getElementById("class").style.borderColor = "red";
      }else if(Class < 6 || Class > 10){
        document.getElementById("classErr").innerHTML = " Only class 6 to 10 is appplicable ";
        document.getElementById("classErr").style.color = "red";
        document.getElementById("class").style.borderColor = "red";
      }else{
        document.getElementById("classErr").innerHTML = "";
        document.getElementById("class").style.borderColor = "black";
      }
    }
 </script>
 <body>
  <form method="post" enctype="multipart/form-data" name="card" onsubmit="ValidateCardForm()">
    <fieldset>
      <legend><b>Issue Card</b></legend>
      <label>Student ID: </label>
      <input type="text" name="id" id="id" onkeyup="CheckID()" onblur="CheckID()">
      <span class="error" id="idErr"><?php echo $idErr;?></span><hr>
      <label>Student Name: </label>
      <input type="text" name="name" id="name" onkeyup="CheckName()" onblur="CheckName()">
      <span class="error" id="nameErr"><?php echo $nameErr;?></span><hr>
      <label>Class: </label>
      <input type="text" name="class" id="class" onkeyup="CheckClass()" onblur="CheckClass()">
      <span class="error" id="classErr"><?php echo $classErr;?></span><hr>
      </fieldset><hr><br><br>
      <input type="submit" name="submit" value="Submit">
      <input type="reset" name="reset" value="Reset">
    </fieldset><br><br>

    <?php   
      if(isset($message))  
        {  
          echo $message;  
        }
    ?> 
  </form>
 </body>
 </html>