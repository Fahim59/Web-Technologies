<?php include('header_footer/header1.php');?>
<?php include ('database/conn.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>Teacher Registration</title>
</head>
    <style>
      label
      {
        display: inline-block;
        width: 20%;
        padding: 1%; 
      }
      hr
      {
        style="border: 0.01px solid;
      }
    .error
    {
      color: RED;
    }
    .text
    {
      text-align: center;
    }
  </style>
<body>

<?php

$name = $mname = $fname = $email = $address = $pass = $cpass = $dob = $gender = $image = $uid ="";
$ername = $ermname = $erfname = $eremail = $eradd = $erdob = $ergender = $erpass = $ercpass = $eruid = "";
$error = $message = "";
$check = 1;

  /*$sql = "select * from teacher order by uid desc limit 1";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $lastid = mysqli_insert_id($conn);
  //$lastid = $row['uid'];

  if($lastid == "")
  {
    $uid = "100";
  }
  else
  {
    $uid = substr($lastid,3);
    $uid = intval($uid);
    $uid = "100".($lastid + 1);
  }*/

if($_SERVER["REQUEST_METHOD"] == "POST")
{
      if(empty($_POST["uid"]))  
      {  
        $eruid = "Enter User ID";
      }
      //$uid = $_POST[$uid];
      //Name
      if(empty($_POST["name"]))  
      {  
        $ername = "Enter Name";
        $check = 0;
      }
      else if(preg_match("/^[0-9]/", ($_POST["name"])))
      {
        $ername = "Letters Only";
        $check = 0;
      } 
      else if(!preg_match("/^[a-zA-Z-. ?!]{2,}$/",($_POST["name"])))
      {
        $ername = "At least two words and can only contain letters,period,dash";
        $check = 0;
      }
      //Mother Name
      if(empty($_POST["mname"]))  
      {  
        $ermname = "Enter Mother Name";
        $check = 0;
      }
      else if(preg_match("/^[0-9]/", ($_POST["mname"])))
      {
        $ermname = "Letters Only";
        $check = 0;
      } 
      else if(!preg_match("/^[a-zA-Z-. ?!]{2,}$/",($_POST["mname"])))
      {
        $ermname = "At least two words and can only contain letters,period,dash";
        $check = 0;
      }
      //Father Name
      if(empty($_POST["fname"]))  
      {  
        $erfname = "Enter Father Name";
        $check = 0;
      }
      else if(preg_match("/^[0-9]/", ($_POST["fname"])))
      {
        $erfname = "Letters Only";
        $check = 0;
      } 
      else if(!preg_match("/^[a-zA-Z-. ?!]{2,}$/",($_POST["fname"])))
      {
        $erfname = "At least two words and can only contain letters,period,dash";
        $check = 0;
      }
      //Email
      if(empty($_POST["email"]))
      {
        $eremail = "Email is required";
        $check = 0;
      }
      else if(!filter_var(($_POST["email"]), FILTER_VALIDATE_EMAIL))
      {
        $eremail = "Invalid email format. Format: example@something.com";
        $check = 0;
      }
      //Date Of Birth
      if(empty($_POST["dob"]))
      {
        $erdob = "Must be valid numbers(dd:1-31,mm: 1-12,yyyy: 1950-2000)";
        $check = 0;
      }
      //Gender
      if(!isset($_POST["gender"]))
      {
        $ergender = "At least one of the Gender must be selected";
        $check = 0;
      }

      //Address
      if(empty($_POST["address"]))
      {
        $eradd = "Address is requied";
        $check = 0;
      }
      else if(preg_match("/^[0-9]/", ($_POST["address"])))
      {
        $eradd = "Letters Only";
        $check = 0;
      } 
      else if(!preg_match("/^[a-zA-Z0-9-., ?!]{6,}$/",($_POST["address"])))
      {
        $eradd = "At least six words";
        $check = 0;
      }
      //Password
      if(empty($_POST["pass"]) && empty($_POST["cpass"]))
      {
        $erpass = "Password can't be empty!";
        $check = 0;
      }
      /*else if (strlen($_POST["pass"]) <= 7) 
      {
        $erpass = "Your Password Must Contain At Least 8 Characters!";
      }
      else if(!preg_match("#[a-zA-Z0-9-. ?!]+#",($_POST["pass"]))) 
      {
        $erpass = "Your Password Must Contain At Least one Number or Character!";
      }
      else if(!preg_match('/[$%@#]/', ($_POST["pass"])))
      {
        $erpass = "Your Password Must Contain At Least one special character(@,#,$,%)!";
      }*/
      else if(($_POST["pass"]) != ($_POST["cpass"]))
      {
        $ercpass = "Password and Confirm password must be same!";
        $check = 0;
      }
      if(empty($_POST["image"]))  
      {  
        $error = "Enter Image";
        $check = 0;
      }
}
if(isset($_POST["register"]))  
  {
    if ($check == 1) 
    { 
        $uid = $_POST["uid"];
        $name=$_POST["name"];
        $mname=$_POST["mname"];
        $fname=$_POST["fname"];
        $email=$_POST["email"];
        $dob=$_POST["dob"];
        $gender=$_POST["gender"];
        $address=$_POST["address"];
        $pass=$_POST["pass"];
        $cpass=$_POST["cpass"];
        $image=$_POST["image"];
    }
    else
    {
    	echo "FILL -------------";
    }
  }
if(isset($_POST["back"]))
    {
      header("Location: Registration.php");
    } 
?>

<form method="post" action="TeacherRegCheck.php"style="padding-top: 10px">
  <fieldset style="width: 1000px;" align="left">
  
  <legend class="text"><b>TEACHER REGISTRATION</b></legend>
  
  <label for="name" >User ID<span class="error">* </label>
  <input type="text" name="uid" value="<?php echo $uid;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eruid;?> </span><br>
  <hr>

  <label for="name" >Name<span class="error">* </label>
  <input type="text" name="name" value="<?php echo $name;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ername;?> </span><br>
  <hr>

  <label for="mname" >Mother Name<span class="error">* </label>
  <input type="text" name="mname" value="<?php echo $mname;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ermname;?> </span><br>
  <hr>

  <label for="fname" >Father Name<span class="error">* </label>
  <input type="text" name="fname" value="<?php echo $fname;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erfname;?> </span><br>
  <hr>

  <label for="email" >Email<span class="error">* </label>
  <input type="text" name="email" value="<?php echo $email;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eremail;?></span><br>
  <hr>

  <label for="id" >Address<span class="error">* </label>
  <input type="text" name="address" value="<?php echo $address;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eradd;?></span><br>
  <hr>

  <label for="pass" >Password<span class="error">* </label>
  <input type="password" name="pass" value="<?php echo $pass;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erpass;?></span><br>
  <hr>

  <label for="cpass" >Confirm Password<span class="error">* </label>
  <input type="password" name="cpass" value="<?php echo $cpass;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ercpass;?></span><br>
  <hr>

  <label for="image" >Picture<span class="error">* </label>
  <input type="file" name="image" id="image" value="<?php echo $image;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $error;?></span><br>
  <hr>
  
  <fieldset style="width: 1000px; ">
  <legend><b>Gender</b></legend>
  <input  type="radio" name="gender"<?php if(isset($gender) && $gender=="male") echo "checked";?> value="Male">Male

  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female">Female  

  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Other">Other 
  <br>  
  <span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ergender;?></span >   

  </fieldset>

  <label for="dob" >Date Of Birth<span class="error">* </label>
  <input type="date" name="dob" value="<?php echo $dob;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erdob;?></span><br>
  <hr>

  <center><input type="submit" name="register" value="Submit" style="width: 60px">
  <form action="Registration.php">
  <input type="reset" value="Reset" name="reset" style="width: 60px">
  <input type="submit" value="Back" name="back" style="width: 60px">
  <br/><br>
  <center>Already Register? <a href="Login.php">Login</a></center>
  </form>
</fieldset>

</form>
</body>
</html>