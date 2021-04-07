<?php include "header.php";?>
<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">
<?php include "Sidebar.php";?>

<?php 

require_once '../../controller/studentInfo.php';
$student = fetchStudent($_GET['id']);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Student</title>
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

      var name = document.Student_Profile.name.value;
      var fname = document.Student_Profile.fname.value;
      var mname = document.Student_Profile.mname.value;
      var address = document.Student_Profile.address.value;
      var email = document.Student_Profile.email.value;
      var dob = document.Student_Profile.dob.value;

      //Name
      if(name == "")
      {
        document.Student_Profile.name.focus();
        document.getElementById("errorBox").innerHTML = "Name is required, Enter Full Name";
        return false;
      }
      else if(!nameRegex.test(name))
      {
        document.Student_Profile.name.focus();
        document.getElementById("errorBox").innerHTML = "At least five words and can only contain letters,period,dash";
        return false;
      }
      //Mother Name
      if(mname == "")
      {
        document.Student_Profile.mname.focus();
        document.getElementById("errorBox").innerHTML = "Mother Name is required, Enter Full Name";
        return false;
      }
      else if(!nameRegex.test(mname))
      {
        document.Student_Profile.mname.focus();
        document.getElementById("errorBox").innerHTML = "At least five words and can only contain letters,period,dash";
        return false;
      }
      //Father Name
      if(fname == "")
      {
        document.Student_Profile.fname.focus();
        document.getElementById("errorBox").innerHTML = "Father Name is required, Enter Full Name";
        return false;
      }
      else if(!fnameRegex.test(fname))
      {
        document.Student_Profile.fname.focus();
        document.getElementById("errorBox").innerHTML = "At least five words and can only contain letters,period,dash";
        return false;
      }
      //Email
      if(email == "")
      {
        document.Student_Profile.email.focus();
        document.getElementById("errorBox").innerHTML = "Email is required";
        return false;
      }
      else if(!emailRegex.test(email))
      {
        document.Student_Profile.email.focus();
        document.getElementById("errorBox").innerHTML = "Invalid email format. Format: example@something.com";
        return false;
      }
      //Address
      if(address == "")
      {
        document.Student_Profile.address.focus();
        document.getElementById("errorBox").innerHTML = "Address is required!!";
        return false;
      }
      else if(!addressRegex.test(address))
      {
        document.Student_Profile.address.focus();
        document.getElementById("errorBox").innerHTML = "At least six words!!";
        return false;
      }
      //Date Of Birth
      if(dob == "")
      {
        document.Student_Profile.dob.focus();
        document.getElementById("errorBox").innerHTML = "Select your Date Of Birth";
        return false;
      }
    }
  </script>
<body>

 <form name="Student_Profile" action="../../controller/updateStudent.php" method="POST" enctype="multipart/form-data">
  <fieldset style="width: 96%;">
    <legend class="text"><b>EDIT STUDENTS</b></legend>
    
    <form>
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td>Name</td>
        <td>:</td>
        <td><input name="name" id="name" type="text" value="<?php echo $student['name']?>"><div id="errorBox"></div></td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Father Name</td>
        <td>:</td>
        <td><input name="fname" id="fname" type="text" value="<?php echo $student['fname']?>"></td>
        <td></td>
        <div id="errorBox"></div>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Mother Name</td>
        <td>:</td>
        <td><input name="mname" id="mname" type="text" value="<?php echo $student['mname']?>"></td>
        <td></td>
        <div id="errorBox"></div>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Email</td>
        <td>:</td>
        <td>
          <input name="email" type="text" value="<?php echo $student['email']?>">
        </td>
        <td></td>
        <div id="errorBox"></div>
        
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Address</td>
        <td>:</td>
        <td>
          <input name="address" type="text" value="<?php echo $student['address']?>">
        </td>
        <td></td>
        <div id="errorBox"></div>
        
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Gender</td>
        <td>:</td>
        <td>   
          <input name="gender" type="radio" value="Male" <?php if($student['gender']=="Male") echo "checked"; ?>>Male
          <input name="gender" type="radio" value="Female" <?php if($student['gender']=="Female") echo "checked"; ?>>Female
          <input name="gender" type="radio" value="Other" <?php if($student['gender']=="Other") echo "checked"; ?>>Other
        </td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>
      
      <tr>
        <td valign="top">Date of Birth</td>
        <td valign="top">:</td>
        <td>
          <input name="dob" type="text" value="<?php echo $student['dob']?>">
          <br/>
          <font size="2"><i>(dd/mm/yyyy)</i></font>
        </td>
        <td></td>
        <div id="errorBox"></div>
      </tr>

      <tr>
        <td>Class</td>
        <td>:</td>
        <td>
          <input name="class" type="text" readonly value="<?php echo $student['class']?>">
        </td>
        <td></td>
      </tr>
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Picture</td>
        <td>:</td>
        <td>
          <img name="picture" width="100px" src="../../image/<?php echo $student['picture'] ?>">
        </td>
        <td></td>
      </tr>

    </table>
    <hr/>

    <input type="hidden" uid="uid" name="uid" value="<?php echo $student['uid']?>"><br>
    <center><input type="submit" name = "updateStudent" onClick="return submit1();" value="Update">
    <button type="submit" formaction="searchStudent.php">Back</button>
    
  </fieldset>
</form> 

</body>
</html>
