<!DOCTYPE html>
<?php include('../header_footer/headerL.php');?>
<?php include('../header_footer/Adminsidebar.php');?>
<html>
<head>
  <title>Admin Profile</title>
  <style>
    .text
    {
      text-align: center;
    }
  </style>
</head>
<body>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Profile</title>
  <style>
    .text
    {
      text-align: center;
    }
  </style>
</form>
</head>
</body>

<?php

$name = $email = $address = $dd = $mm = $yyyy = $dob = $gender ="";
$ername = $eremail = $eradd = $erdob = $ergender ="";
$error = $message = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
  {
      //Name
      if(empty($_POST["name"]))  
      {  
        $ername = "Enter Name";
        //echo "ID or Password can't be empty!";
      }
      
      if(preg_match("/^[0-9]/", ($_POST["name"])))
      {
        $ername = "Letters Only";
      } 
      if(!preg_match("/^[a-zA-Z-. ?!]{2,}$/",($_POST["name"])))
      {
        $ername = "At least two words and can only contain letters,period,dash";
      }

      //Email
      if(empty($_POST["email"]))
      {
        $eremail = "Email is required";
      }
      
      if(!filter_var(($_POST["email"]), FILTER_VALIDATE_EMAIL))
      {
        $eremail = "Invalid email format. Format: example@something.com";
      }

      //Date Of Birth
      /*if(empty($_POST["dd"]) or empty($_POST["mm"]) or empty($_POST["yyyy"]))
      {
        $erdob = "Fill up all the fields";
      }
      
      if( !filter_var(($_POST["dd"]),FILTER_VALIDATE_INT,array('options' => array(
                'min_range' => 1, 
                'max_range' => 31
            )))|!filter_var(($_POST["mm"]),FILTER_VALIDATE_INT,array('options' => array(
                'min_range' => 1, 
                'max_range' => 12
            )))|!filter_var(($_POST["yyyy"]),FILTER_VALIDATE_INT,array('options' => array(
                'min_range' => 1950, 
                'max_range' => 2000
            ))))
      {
        $erdob = "Must be valid numbers(dd:1-31,mm: 1-12,yyyy: 1950-2000)";
      }*/
      if(empty($_POST["dob"]))
      {
        $erdob = "Must be valid numbers(dd:1-31,mm: 1-12,yyyy: 1950-2000)";
        $check = 0;
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
      
      if(preg_match("/^[0-9]/", ($_POST["address"])))
      {
        $eradd = "Letters Only";
      } 
      if(!preg_match("/^[a-zA-Z0-9-., ?!]{6,}$/",($_POST["address"])))
      {
        $eradd = "At least six words";
      }
  }
?>
<form method="post" action="Edit_ProfileCheck.php"style="padding-top: 10px">
<fieldset>
    <legend class="text"><b>ADMIN PROFILE</b></legend>
  <form>
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td>Name</td>
        <td>:</td>
        <td><input name="name" id="name" type="text" value="<?php echo $_SESSION["name"];?>"></td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Email</td>
        <td>:</td>
        <td>
          <input name="email" type="text" value="<?php echo $_SESSION["email"];?>">
        </td>
        <td></td>
        
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Address</td>
        <td>:</td>
        <td>
          <input name="address" type="text" value="<?php echo $_SESSION["address"];?>">
        </td>
        <td></td>
        
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Gender</td>
        <td>:</td>
        <td>   
          <input name="gender" type="radio" value="Male" <?php if($_SESSION["gender"]=="Male") echo "checked"; ?>>Male
          <input name="gender" type="radio" value="Female" <?php if($_SESSION["gender"]=="Female") echo "checked"; ?>>Female
          <input name="gender" type="radio" value="Other" <?php if($_SESSION["gender"]=="Other") echo "checked"; ?>>Other
        </td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>
      
      <tr>
        <td valign="top">Date of Birth</td>
        <td valign="top">:</td>
        <td>
          <input name="dob" type="text" value="<?php echo $_SESSION["dob"]; ?>">
          <br/>
          <font size="2"><i>(dd/mm/yyyy)</i></font>
        </td>
        <td></td>
      </tr>
    </table>
    <hr/>
    <center><input type="submit" name="update" value="Update">
    <button type="submit" formaction="Logged_In_Dashboard.php">Back</button>
  </form>
</fieldset>

</body>
</html>