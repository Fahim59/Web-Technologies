
<?php 
session_start();
if(isset($_SESSION['uid'])){
    header("location: Dashboard.php");
}
$eruid=$erpass= "";
 include( '../Model/model.php');


include( '../Controller/LoginController.php');
?>



<?php  include('../Model/header1.php');?>


<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../CSS/mycss.css" crossorigin="anonymous">
<style >
    .error
    {
      color: red;
    }
    .text
    {
      text-align: center;
    }

    body {font-family: Arial, Helvetica, sans-serif;}
    form {border: 3px solid #f1f1f1;}

         label
      {
        display: inline-block;
        width: 10%;
        padding: .5%; 
      }
    
       .error {color: #FF0000;}

  </style>
   
  
</head>
<body>
  <?php 



if(isset($FlashMessage)){
   
    echo $FlashMessage;
}
?>




<!-- <div id='errmsg' style="color: red;"></div> -->




<fieldset style="width: 1000px">
<legend class="text"><b>LOGIN</b></legend>
<form method="post" onsubmit="return validateForm()">

  <div class="imgcontainer">
    <img src="../Upload/login.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <b>User Id: <input placeholder="Enter ID"   onkeyup="checkUid()" onblur="checkUid()" style="width: 250px" type="text" id="loginid" name="id" value="<?php if (isset($_COOKIE["userid"])){echo $_COOKIE["userid"];}?>"><span id="erruid" class="error">  <?php echo $eruid;?> </span><br>

    <b>Password: <?php echo "&nbsp";?> <input placeholder="Enter Password" onkeyup="checkPassword()" onblur="checkPassword()" style="width: 250px" type="password" name="pass" id="pass" value="<?php if (isset($_COOKIE["password"])){echo $_COOKIE["password"];}?>"><span id="errpass"class="error">  <?php echo $erpass;?> </span><br>
    
    <button type="submit" name="submit" style="width: 100px"><b>Login</button>

    

    <div class="" style="background-color:#f1f1f1">
   
     <input type="checkbox" name="remember" <?php if (isset($_COOKIE["userid"]) && isset($_COOKIE["password"])){ echo "checked";}?>>Remember Me<br><br>
    Forgot <a href="ForgetPassword.php">password?</a>
      
  
  </div>

  </div>

</fieldset>
</form>



 <?php  include('../Model/FooterL.php');?>


<script type="text/javascript">
   function validateForm(){
  //    document.getElementById("erruid").innerHTML = "";
  //    document.getElementById("errpass").innerHTML = "";
  //   var regx=/[$%@#]/;
  //   var id =  document.getElementById("loginid").value;
  //   var pass =  document.getElementById("pass").value;

  //   // console.log(pass.length);
  //   var errorflag=0;
  //   if(id=='' ){
  //     document.getElementById("erruid").innerHTML = "UID Is required";
  //     var errorflag=1;
  //     // return false;
  //   }

  //   if(pass==''){
  //     document.getElementById("errpass").innerHTML = "Password is required";
  //    var errorflag=1;
  //    // return false;
  //   }
  //   if(errorflag==1){
  //     return false;

  //   }    
    
  //   return true;
  }


 
   
    
    function checkUid() {
      if (document.getElementById("loginid").value == "") {
          document.getElementById("erruid").innerHTML = "UID is required";
          document.getElementById("erruid").style.color = "red";
          document.getElementById("loginid").style.borderColor = "red";
      }else{
          document.getElementById("erruid").innerHTML = "";
        document.getElementById("loginid").style.borderColor = "black";
      }
      
        }
        function checkPassword(){
          if (document.getElementById("pass").value == "") {
          document.getElementById("errpass").innerHTML = "Password can't be blank";
          document.getElementById("errpass").style.color = "red";
          document.getElementById("pass").style.borderColor = "red";
      }
  
      else{
        document.getElementById("errpass").innerHTML = "";
          document.getElementById("errpass").style.color = "red";
        document.getElementById("pass").style.borderColor = "black";
      }

        return true;
        }
        
 


</script>

</body>
</html>


