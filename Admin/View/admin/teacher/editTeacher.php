<?php include "header.php";?>
<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">
  
<?php include "Sidebar.php";?>

<?php 

require_once '../../../Controller/teacherInfo.php';
$teacher = fetchTeacher($_GET['id']);

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../../../CSS/button.css" crossorigin="anonymous">
	<title>Edit Teacher</title>
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
      var name = document.Teacher_Profile.name.value;
      var fname = document.Teacher_Profile.fname.value;
      var mname = document.Teacher_Profile.mname.value;
      var address = document.Teacher_Profile.address.value;
      var email = document.Teacher_Profile.email.value;
      var dob = document.Teacher_Profile.dob.value;
      var myDate = new Date(dob);
      var today = new Date();

      if(name == "")
      {
        document.Teacher_Profile.name.focus();
        document.getElementById("errorBox").innerHTML = "Name is required, Enter Full Name";
        return false;
      }
      if(fname == "")
      {
        document.Teacher_Profile.fname.focus();
        document.getElementById("errorBox").innerHTML = "Father Name is required, Enter Full Name";
        return false;
      }
      if(mname == "")
      {
        document.Teacher_Profile.mname.focus();
        document.getElementById("errorBox").innerHTML = "Mother Name is required, Enter Full Name";
        return false;
      }
      if(email == "")
      {
        document.Teacher_Profile.email.focus();
        document.getElementById("errorBox").innerHTML = "Email is required";
        return false;
      }
      if(address == "")
      {
        document.Teacher_Profile.address.focus();
        document.getElementById("errorBox").innerHTML = "Address is required!!";
        return false;
      }
      if(dob == "")
      {
        document.Teacher_Profile.dob.focus();
        document.getElementById("errorBox").innerHTML = "Select your Date Of Birth";
        return false;
      }
      else if(myDate > Date.now())
      {
        document.Teacher_Profile.dob.focus();
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
        document.Teacher_Profile.name.focus();
        document.getElementById("errorBox").innerHTML = "Name is required, Enter Full Name";
        return false;
      }
      else if(!document.getElementById("name").value.match(nameRegex))
      {
        document.Teacher_Profile.name.focus();
        document.getElementById("errorBox").innerHTML = "At least five words and can only contain letters,period,dash";
        return false;
      }
      else
      {
        document.getElementById("errorBox").innerHTML = "";
      }
    }
    function checkMName()
    {
      var mnameRegex = /^[a-zA-Z-. ?!]{5,}$/;

      if(document.getElementById("mname").value == "")
      {
        document.Teacher_Profile.mname.focus();
        document.getElementById("errorBox").innerHTML = "Mother Name is required, Enter Full Name";
        return false;
      }
      else if(!document.getElementById("mname").value.match(mnameRegex))
      {
        document.Teacher_Profile.mname.focus();
        document.getElementById("errorBox").innerHTML = "At least five words and can only contain letters,period,dash";
        return false;
      }
      else
      {
        document.getElementById("errorBox").innerHTML = "";
      }
    }
    function checkFName()
    {
      var fnameRegex = /^[a-zA-Z-. ?!]{5,}$/;

      if(document.getElementById("fname").value == "")
      {
        document.Teacher_Profile.fname.focus();
        document.getElementById("errorBox").innerHTML = "Father Name is required, Enter Full Name";
        return false;
      }
      else if(!document.getElementById("fname").value.match(fnameRegex))
      {
        document.Teacher_Profile.fname.focus();
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
        document.Teacher_Profile.email.focus();
        document.getElementById("errorBox").innerHTML = "Email is required";
        return false;
      }
      else if(!document.getElementById("email").value.match(emailRegex))
      {
        document.Teacher_Profile.email.focus();
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
        document.Teacher_Profile.address.focus();
        document.getElementById("errorBox").innerHTML = "Address is required!!";
        return false;
      }
      else if(!document.getElementById("address").value.match(addressRegex))
      {
        document.Teacher_Profile.address.focus();
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

$name = $mname = $fname = $email = $address = $pass = $cpass = $dob = $gender = $image = $class ="";
$ername = $ermname = $erfname = $eremail = $eradd = $erdob = $ergender = $erpass = $ercpass = $erclass = "";
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
      //Mother Name
      if(empty($_POST["mname"]))  
      {  
        $ermname = "Enter Mother Name";
      }
      else if(preg_match("/^[0-9]/", ($_POST["mname"])))
      {
        $ermname = "Letters Only";
      } 
      else if(!preg_match("/^[a-zA-Z-. ?!]{2,}$/",($_POST["mname"])))
      {
        $ermname = "At least two words and can only contain letters,period,dash";
      }
      //Father Name
      if(empty($_POST["fname"]))  
      {  
        $erfname = "Enter Father Name";
      }
      else if(preg_match("/^[0-9]/", ($_POST["fname"])))
      {
        $erfname = "Letters Only";
      } 
      else if(!preg_match("/^[a-zA-Z-. ?!]{2,}$/",($_POST["fname"])))
      {
        $erfname = "At least two words and can only contain letters,period,dash";
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
      //Address
      if(empty($_POST["class"]))
      {
        $erclass = "Class is requied";
      }
} 
?>

 <form name="Teacher_Profile" action="../../../Controller/updateTeacher.php" method="POST" enctype="multipart/form-data">
  <fieldset style="width: 96%;">
    <legend class="text"><b>EDIT TEACHERS</b></legend>
    <center><table><div id="errorBox"></div></table></center>
    
    <form>
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td>Name</td>
        <td>:</td>
        <td><input name="name" id="name" type="text" onkeyup="checkName()" onblur="checkName()" value="<?php echo $teacher['name']?>"></td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Father Name</td>
        <td>:</td>
        <td><input name="fname" id="fname" onkeyup="checkFName()" onblur="checkFName()" type="text" value="<?php echo $teacher['fname']?>"></td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Mother Name</td>
        <td>:</td>
        <td><input name="mname" id="mname" onkeyup="checkMName()" onblur="checkMName()" type="text" value="<?php echo $teacher['mname']?>"></td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Email</td>
        <td>:</td>
        <td>
          <input name="email" type="text" id="email" onkeyup="checkEmail()" onblur="checkEmail()" value="<?php echo $teacher['email']?>">
        </td>
        <td></td>
        
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Address</td>
        <td>:</td>
        <td>
          <input name="address" type="text" id="address" onkeyup="checkAddress()" onblur="checkAddress()" value="<?php echo $teacher['address']?>">
        </td>
        <td></td>
        
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Gender</td>
        <td>:</td>
        <td>   
          <input name="gender" type="radio" value="Male" <?php if($teacher['gender']=="Male") echo "checked"; ?>>Male
          <input name="gender" type="radio" value="Female" <?php if($teacher['gender']=="Female") echo "checked"; ?>>Female
          <input name="gender" type="radio" value="Other" <?php if($teacher['gender']=="Other") echo "checked"; ?>>Other
        </td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>
      
      <tr>
        <td valign="top">Date of Birth</td>
        <td valign="top">:</td>
        <td>
          <input name="dob" type="date" value="<?php echo $teacher['dob']?>">
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
          <img name="picture" width="100px" src="../../image/<?php echo $teacher['picture'] ?>">
        </td>
        <td></td>
    </table>
    <hr/>

    <input type="hidden" uid="uid" name="uid" value="<?php echo $teacher['uid']?>"><br>
    <center><input type="submit" class="button3" name = "updateTeacher" onClick="return validateForm();" value="Update">
    <button type="submit" class="button3" formaction="searchTeacher.php">Back</button>
    
  </fieldset>
</form> 

</body>
</html>
