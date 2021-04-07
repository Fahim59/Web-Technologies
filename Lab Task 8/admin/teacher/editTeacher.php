<?php include "header.php";?>
<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">
  
<?php include "Sidebar.php";?>

<?php 

require_once '../../controller/teacherInfo.php';
$teacher = fetchTeacher($_GET['id']);

?>

<!DOCTYPE html>
<html>
<head>
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

    function submit1()
    {
      var nameRegex = /^[a-zA-Z-. ?!]{5,}$/;
      var fnameRegex = /^[a-zA-Z-. ?!]{5,}$/;
      var mnameRegex = /^[a-zA-Z-. ?!]{5,}$/;
      var addressRegex = /^[a-zA-Z0-9-., ?!]{6,}$/;
      var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;

      var name = document.Teacher_Profile.name.value;
      var fname = document.Teacher_Profile.fname.value;
      var mname = document.Teacher_Profile.mname.value;
      var address = document.Teacher_Profile.address.value;
      var email = document.Teacher_Profile.email.value;
      var dob = document.Teacher_Profile.dob.value;

      //Name
      if(name == "")
      {
        document.Teacher_Profile.name.focus();
        document.getElementById("errorBox").innerHTML = "Name is required, Enter Full Name";
        return false;
      }
      else if(!nameRegex.test(name))
      {
        document.Teacher_Profile.name.focus();
        document.getElementById("errorBox").innerHTML = "At least five words and can only contain letters,period,dash";
        return false;
      }
      //Mother Name
      if(mname == "")
      {
        document.Teacher_Profile.mname.focus();
        document.getElementById("errorBox").innerHTML = "Mother Name is required, Enter Full Name";
        return false;
      }
      else if(!nameRegex.test(mname))
      {
        document.Teacher_Profile.mname.focus();
        document.getElementById("errorBox").innerHTML = "At least five words and can only contain letters,period,dash";
        return false;
      }
      //Father Name
      if(fname == "")
      {
        document.Teacher_Profile.fname.focus();
        document.getElementById("errorBox").innerHTML = "Father Name is required, Enter Full Name";
        return false;
      }
      else if(!fnameRegex.test(fname))
      {
        document.Teacher_Profile.fname.focus();
        document.getElementById("errorBox").innerHTML = "At least five words and can only contain letters,period,dash";
        return false;
      }
      //Email
      if(email == "")
      {
        document.Teacher_Profile.email.focus();
        document.getElementById("errorBox").innerHTML = "Email is required";
        return false;
      }
      else if(!emailRegex.test(email))
      {
        document.Teacher_Profile.email.focus();
        document.getElementById("errorBox").innerHTML = "Invalid email format. Format: example@something.com";
        return false;
      }
      //Address
      if(address == "")
      {
        document.Teacher_Profile.address.focus();
        document.getElementById("errorBox").innerHTML = "Address is required!!";
        return false;
      }
      else if(!addressRegex.test(address))
      {
        document.Teacher_Profile.address.focus();
        document.getElementById("errorBox").innerHTML = "At least six words!!";
        return false;
      }
      //Date Of Birth
      if(dob == "")
      {
        document.Teacher_Profile.dob.focus();
        document.getElementById("errorBox").innerHTML = "Select your Date Of Birth";
        return false;
      }
    }
  </script>
<body>

 <form name="Teacher_Profile" action="../../controller/updateTeacher.php" method="POST" enctype="multipart/form-data">
  <fieldset style="width: 96%;">
    <legend class="text"><b>EDIT TEACHERS</b></legend>
    
    <form>
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td>Name</td>
        <td>:</td>
        <td><input name="name" id="name" type="text" value="<?php echo $teacher['name']?>"><div id="errorBox"></div></td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Father Name</td>
        <td>:</td>
        <td><input name="fname" id="fname" type="text" value="<?php echo $teacher['fname']?>"><div id="errorBox"></div></td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Mother Name</td>
        <td>:</td>
        <td><input name="mname" id="mname" type="text" value="<?php echo $teacher['mname']?>"><div id="errorBox"></div></td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Email</td>
        <td>:</td>
        <td>
          <input name="email" type="text" value="<?php echo $teacher['email']?>">
        </td><div id="errorBox"></div>
        <td></td>
        
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Address</td>
        <td>:</td>
        <td>
          <input name="address" type="text" value="<?php echo $teacher['address']?>">
        </td><div id="errorBox"></div>
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
          <input name="dob" type="text" value="<?php echo $teacher['dob']?>">
          <br/>
          <font size="2"><i>(dd/mm/yyyy)</i></font>
        </td><div id="errorBox"></div>
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
    <center><input type="submit" name = "updateTeacher" onClick="return submit1();" value="Update">
    <button type="submit" formaction="searchTeacher.php">Back</button>
    
  </fieldset>
</form> 

</body>
</html>
