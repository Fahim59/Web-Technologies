<?php include "header.php";?>
<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">
<?php include "Sidebar.php";?>

<?php 

require_once '../../controller/librarianInfo.php';
$librarian = fetchLibrarian($_GET['id']);

?>

<!DOCTYPE html>
<html>
<head>
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

    function submit1()
    {
      var nameRegex = /^[a-zA-Z-. ?!]{5,}$/;
      var addressRegex = /^[a-zA-Z0-9-., ?!]{6,}$/;
      var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;

      var name = document.Librarian_Profile.name.value;
      var address = document.Librarian_Profile.address.value;
      var email = document.Librarian_Profile.email.value;
      var dob = document.Librarian_Profile.dob.value;

      //Name
      if(name == "")
      {
        document.Librarian_Profile.name.focus();
        document.getElementById("errorBox").innerHTML = "Name is required, Enter Full Name";
        return false;
      }
      else if(!nameRegex.test(name))
      {
        document.Librarian_Profile.name.focus();
        document.getElementById("errorBox").innerHTML = "At least five words and can only contain letters,period,dash";
        return false;
      }
      //Email
      if(email == "")
      {
        document.Librarian_Profile.email.focus();
        document.getElementById("errorBox").innerHTML = "Email is required";
        return false;
      }
      else if(!emailRegex.test(email))
      {
        document.Librarian_Profile.email.focus();
        document.getElementById("errorBox").innerHTML = "Invalid email format. Format: example@something.com";
        return false;
      }
      //Address
      if(address == "")
      {
        document.Librarian_Profile.address.focus();
        document.getElementById("errorBox").innerHTML = "Address is required!!";
        return false;
      }
      else if(!addressRegex.test(address))
      {
        document.Librarian_Profile.address.focus();
        document.getElementById("errorBox").innerHTML = "At least six words!!";
        return false;
      }
      //Date Of Birth
      if(dob == "")
      {
        document.Librarian_Profile.dob.focus();
        document.getElementById("errorBox").innerHTML = "Select your Date Of Birth";
        return false;
      }
    }
  </script>
<body>

 <form name="Librarian_Profile" action="../../controller/updateLibrarian.php" method="POST" enctype="multipart/form-data">
  <fieldset style="width: 96%;">
    <legend class="text"><b>EDIT LIBRARIANS</b></legend>
    
    <form>
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td>Name</td>
        <td>:</td>
        <td><input name="name" id="name" type="text" value="<?php echo $librarian['name']?>"></td>
        <div id="errorBox"></div>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Email</td>
        <td>:</td>
        <td>
          <input name="email" type="text" value="<?php echo $librarian['email']?>">
        </td><div id="errorBox"></div>
        <td></td>
        
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Address</td>
        <td>:</td>
        <td>
          <input name="address" type="text" value="<?php echo $librarian['address']?>">
        </td><div id="errorBox"></div>
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
          <input name="dob" type="text" value="<?php echo $librarian['dob']?>">
          <br/>
          <font size="2"><i>(dd/mm/yyyy)</i></font>
        </td>
        <td></td><div id="errorBox"></div>
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
    <center><input type="submit" name = "updateLibrarian" onClick="return submit1();" value="Update">
    <button type="submit" formaction="searchLibrarian.php">Back</button>
    
  </fieldset>
</form> 

</body>
</html>
