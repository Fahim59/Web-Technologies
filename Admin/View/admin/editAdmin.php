<?php include "header/header.php";?>
<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">

<?php include "header/Sidebar.php";?>

<?php 

require_once '../../Controller/adminInfo.php';
$admin = fetchAdmin($_GET['id']);

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../../CSS/button.css" crossorigin="anonymous">
	<title>Edit Admin</title>
    <style>
    .text
    {
        text-align: center;
    }
    #errorBox
    {
      color:#F00;
    }
    </style>
</head>

<script type="text/javascript">
    function validateForm()
    {
      var name = document.Admin_Profile.name.value;
      var address = document.Admin_Profile.address.value;
      var email = document.Admin_Profile.email.value;
      var radiobutton = document.Admin_Profile.radiobutton.value;
      var dob = document.Admin_Profile.dob.value;
      var myDate = new Date(dob);
      var today = new Date();

      if(name == "")
      {
        document.Admin_Profile.name.focus();
        document.getElementById("errorBox").innerHTML = "Name is required, Enter Full Name";
        return false;
      }
      if(email == "")
      {
        document.Admin_Profile.email.focus();
        document.getElementById("errorBox").innerHTML = "Email is required";
        return false;
      }
      if(address == "")
      {
        document.Admin_Profile.address.focus();
        document.getElementById("errorBox").innerHTML = "Address is required!!";
        return false;
      }
      
      if(document.Admin_Profile.radiobutton[0].checked == false && document.Admin_Profile.radiobutton[1].checked == false && document.Admin_Profile.radiobutton[2].checked == false)
      {
        document.Admin_Profile.radiobutton.value;
        document.getElementById("errorBox").innerHTML = "Gender must be selected";
        return false;
      }
      if(dob == "")
      {
        document.Admin_Profile.dob.focus();
        document.getElementById("errorBox").innerHTML = "Select your Date Of Birth";
        return false;
      }
      else if(myDate > Date.now())
      {
        document.Admin_Profile.dob.focus();
        document.getElementById("errorBox").innerHTML = "Future date cannot be selected";
        return false;
      }
      else if(today.getFullYear() - myDate.getFullYear() < 18)
      {
        document.Student_Reg.dob.focus();
        document.getElementById("errorBox").innerHTML = "Eligibility 18 years ONLY.";
        return false;
      }
    }
    function checkName()
    {
      var nameRegex = /^[a-zA-Z-. ?!]{5,}$/;

      if(document.getElementById("name").value == "")
      {
        document.Admin_Profile.name.focus();
        document.getElementById("errorBox").innerHTML = "Name is required, Enter Full Name";
        return false;
      }
      else if(!document.getElementById("name").value.match(nameRegex))
      {
        document.Admin_Profile.name.focus();
        document.getElementById("errorBox").innerHTML = "At least five words and can only contain letters,period,dash";
        return false;
      }
      else
      {
        document.getElementById("errorBox").innerHTML = "";
      }
    }
    function checkEmail()
    {
      var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;

      if(document.getElementById("email").value == "")
      {
        document.Admin_Profile.email.focus();
        document.getElementById("errorBox").innerHTML = "Email is required";
        return false;
      }
      else if(!document.getElementById("email").value.match(emailRegex))
      {
        document.Admin_Profile.email.focus();
        document.getElementById("errorBox").innerHTML = "Invalid email format. Format: example@something.com";
        return false;
      }
      else
      {
        document.getElementById("errorBox").innerHTML = "";
      }
    }
    function checkAddress()
    {
      var addressRegex = /^[a-zA-Z0-9-., ?!]{6,}$/;

      if(document.getElementById("address").value == "")
      {
        document.Admin_Profile.address.focus();
        document.getElementById("errorBox").innerHTML = "Address is required!!";
        return false;
      }
      else if(!document.getElementById("address").value.match(addressRegex))
      {
        document.Admin_Profile.address.focus();
        document.getElementById("errorBox").innerHTML = "At least six words!!";
        return false;
      }
      else
      {
        document.getElementById("errorBox").innerHTML = "";
      }
    }
    
  </script>
<body>

<?php

$name = $email = $address = $dob = $gender = "";
$ername = $eremail = $eradd = $erdob = $ergender = "";
$error = $message = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
      //Name
      if(empty($_POST["name"]))  
      {  
        $ername = "Enter Name";
      }
      else if(preg_match("/^[0-9]/", ($_POST["name"])))
      {
        $ername = "Letters Only";
      } 
      else if(!preg_match("/^[a-zA-Z-. ?!]{2,}$/",($_POST["name"])))
      {
        $ername = "At least two words and can only contain letters,period,dash";
      }
      
      //Email
      if(empty($_POST["email"]))
      {
        $eremail = "Email is required";
      }
      else if(!filter_var(($_POST["email"]), FILTER_VALIDATE_EMAIL))
      {
        $eremail = "Invalid email format. Format: example@something.com";
      }
      //Date Of Birth
      if(empty($_POST["dob"]))
      {
        $erdob = "Must be valid numbers(dd:1-31,mm: 1-12,yyyy: 1950-2000)";
      }
      //Gender
      if(!isset($_POST["gender"]))
      {
        $ergender = "At least one of the Gender must be selected";
      }

      //Address
      if(empty($_POST["address"]))
      {
        $eradd = "Address is requied";
      }
      else if(preg_match("/^[0-9]/", ($_POST["address"])))
      {
        $eradd = "Letters Only";
      } 
      else if(!preg_match("/^[a-zA-Z0-9-., ?!]{6,}$/",($_POST["address"])))
      {
        $eradd = "At least six words";
      }
} 
?>

 <form name="Admin_Profile" action="../../Controller/updateAdmin.php" method="POST" enctype="multipart/form-data">
  <fieldset style="width: 96%;">
    <legend class="text"><b>EDIT ADMIN</b></legend>
    <center><table><div id="errorBox"></div></table></center>

    <form>
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td>Name</td>
        <td>:</td>
        <td><input name="name" id="name" onkeyup="checkName()" onblur="checkName()" type="text" value="<?php echo $admin['name']?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ername;?> </span><br></td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Email</td>
        <td>:</td>
        <td>
          <input name="email" id="email" onkeyup="checkEmail()" onblur="checkEmail()" type="text" value="<?php echo $admin['email']?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eremail;?> </span><br>
        </td>
        <td></td>
        
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Address</td>
        <td>:</td>
        <td>
          <input name="address" id="address" onkeyup="checkAddress()" onblur="checkAddress()" type="text" value="<?php echo $admin['address']?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eradd;?> </span><br>
        </td>
        <td></td>
        
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Gender</td>
        <td>:</td>
        <td>   
          <input name="gender" type="radio" value="Male" <?php if($admin['gender']=="Male") echo "checked"; ?>>Male
          <input name="gender" type="radio" value="Female" <?php if($admin['gender']=="Female") echo "checked"; ?>>Female
          <input name="gender" type="radio" value="Other" <?php if($admin['gender']=="Other") echo "checked"; ?>>Other
        </td>
        <span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ergender;?></span >
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>
      
      <tr>
        <td valign="top">Date of Birth</td>
        <td valign="top">:</td>
        <td>
          <input name="dob" id="dob" type="date" value="<?php echo $admin['dob']?>">
          <br/>
          <font size="2"><i>(yyyy/mm/dd)</i></font>
        </td>
        <span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erdob;?></span >
        <td></td>
      </tr>

      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Picture</td>
        <td>:</td>
        <td>
          <img name="picture" width="100px" src="../image/<?php echo $admin['picture'] ?>">
        </td>
        <td></td>
        
    </table>
    <hr/>

    <input type="hidden" uid="uid" name="uid" value="<?php echo $admin['uid']?>"><br>
    <center><input type="submit" class="button3" name = "updateAdmin" onClick="return validateForm();" value="Update">
    <button type="submit" class="button3" formaction="searchAdmin.php">Back</button>
  </fieldset>
</form> 

</body>
</html>
