<?php include "header.php";?>
<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">
<?php include "Sidebar.php";?>

<?php 

require_once '../../../Controller/librarianInfo.php';
$librarian = fetchLibrarian($_GET['id']);

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../../../CSS/button.css" crossorigin="anonymous">
	<title>Edit Librarian</title>
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
      var name = document.Librarian_Profile.name.value;
      var address = document.Librarian_Profile.address.value;
      var email = document.Librarian_Profile.email.value;
      var dob = document.Librarian_Profile.dob.value;
      var myDate = new Date(dob);
      var today = new Date();

      if(name == "")
      {
        document.Librarian_Profile.name.focus();
        document.getElementById("errorBox").innerHTML = "Name is required, Enter Full Name";
        return false;
      }
      if(email == "")
      {
        document.Librarian_Profile.email.focus();
        document.getElementById("errorBox").innerHTML = "Email is required";
        return false;
      }
      if(address == "")
      {
        document.Librarian_Profile.address.focus();
        document.getElementById("errorBox").innerHTML = "Address is required!!";
        return false;
      }
      if(dob == "")
      {
        document.Librarian_Profile.dob.focus();
        document.getElementById("errorBox").innerHTML = "Select your Date Of Birth";
        return false;
      }
      else if(myDate > Date.now())
      {
        document.Librarian_Profile.dob.focus();
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
        document.Librarian_Profile.name.focus();
        document.getElementById("errorBox").innerHTML = "Name is required, Enter Full Name";
        return false;
      }
      else if(!document.getElementById("name").value.match(nameRegex))
      {
        document.Librarian_Profile.name.focus();
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
        document.Librarian_Profile.email.focus();
        document.getElementById("errorBox").innerHTML = "Email is required";
        return false;
      }
      else if(!document.getElementById("email").value.match(emailRegex))
      {
        document.Librarian_Profile.email.focus();
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
        document.Librarian_Profile.address.focus();
        document.getElementById("errorBox").innerHTML = "Address is required!!";
        return false;
      }
      else if(!document.getElementById("address").value.match(addressRegex))
      {
        document.Librarian_Profile.address.focus();
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

 <form name="Librarian_Profile" action="../../../Controller/updateLibrarian.php" method="POST" enctype="multipart/form-data">
  <fieldset style="width: 96%;">
    <legend class="text"><b>EDIT LIBRARIANS</b></legend>
    <center><table><div id="errorBox"></div></table></center>
    
    <form>
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td>Name</td>
        <td>:</td>
        <td><input name="name" id="name" onkeyup="checkName()" onblur="checkName()" type="text" value="<?php echo $librarian['name']?>"></td>
        
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Email</td>
        <td>:</td>
        <td>
          <input name="email" type="text" id="email" onkeyup="checkEmail()" onblur="checkEmail()" value="<?php echo $librarian['email']?>">
        </td>
        <td></td>
        
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Address</td>
        <td>:</td>
        <td>
          <input name="address" type="text" id="address" onkeyup="checkAddress()" onblur="checkAddress()" value="<?php echo $librarian['address']?>">
        </td>
        <td></td>
        
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Gender</td>
        <td>:</td>
        <td>   
          <input name="gender" type="radio" value="Male" <?php if($librarian['gender']=="Male") echo "checked"; ?>>Male
          <input name="gender" type="radio" value="Female" <?php if($librarian['gender']=="Female") echo "checked"; ?>>Female
          <input name="gender" type="radio" value="Other" <?php if($librarian['gender']=="Other") echo "checked"; ?>>Other
        </td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>
      
      <tr>
        <td valign="top">Date of Birth</td>
        <td valign="top">:</td>
        <td>
          <input name="dob"  type="date" value="<?php echo $librarian['dob']?>">
          <br/>
          <font size="2"><i>(mm/dd/yyyy)</i></font>
        </td>
        <td></td>
      </tr>
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Picture</td>
        <td>:</td>
        <td>
          <img name="picture" width="100px" src="../../image/<?php echo $librarian['picture'] ?>">
        </td>
        <td></td>
      </tr>
    </table>
    <hr/>

    <input type="hidden" uid="uid" name="uid" value="<?php echo $librarian['uid']?>"><br>
    <center><input type="submit" class="button3" name = "updateLibrarian" onClick="return validateForm();" value="Update">
    <button type="submit" class="button3" formaction="searchLibrarian.php">Back</button>
    
  </fieldset>
</form> 

</body>
</html>
