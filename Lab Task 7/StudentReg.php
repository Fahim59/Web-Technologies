<?php include('header_footer/header1.php');?>
<?php include ('database/conn.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Registration</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="header_footer/registration.css" crossorigin="anonymous">
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
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box}
  </style>
<body>

<?php

$name = $mname = $fname = $email = $address = $pass = $cpass = $dob = $gender = $image = $uid = $class ="";
$ername = $ermname = $erfname = $eremail = $eradd = $erdob = $ergender = $erpass = $ercpass = $eruid = $erclass ="";
$error = $message = "";

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "school";
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  $query = "SELECT uid FROM login ORDER BY uid DESC LIMIT 1";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

  $lastid = $row['uid'];

  if ($lastid == null)
  {
    //return "USER1";
    $uid = "User1";
  }
  else
  {
    $temp = substr($lastid, 4);
    $temp1 = intval($temp);
    //return "USER".($temp1 + 1);
     $uid = "User".($temp1 + 1);
  }

if($_SERVER["REQUEST_METHOD"] == "POST")
{
      if(empty($_POST["uid"]))  
      {  
        $eruid = "Enter User ID";
      }
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
      //Password
      if(empty($_POST["pass"]) && empty($_POST["cpass"]))
      {
        $erpass = "Password can't be empty!";
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
      }
      //Class
      if(empty($_POST["class"]))  
      {  
        $erclass = "Enter Your Class";
      }
      else if(!filter_var(($_POST["class"]),FILTER_VALIDATE_INT,array('options' => array('min_range' => 6,'max_range' => 10))))
      {
        $erclass = "6 to 10 Only";
      }
} 
?>

<form method="post" action="controller/StudentRegCheck.php"style="padding-top: 10px">
  <fieldset style="width: 1000px;" align="left">
  
  <legend class="text"><b>STUDENT REGISTRATION</b></legend>

  <div class="container">
  
  <label for="name" ><b>User ID</b><span class="error">* </label>
  <input type="text" name="uid" readonly value="<?php echo $uid;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eruid;?> </span><br>

  <label for="name" ><b>Name<span class="error">* </label>
  <input required type="text" placeholder="Enter Full Name" name="name" value="<?php echo $name;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ername;?> </span><br>

  <label for="mname" ><b>Mother Name<span class="error">* </label>
  <input required type="text" placeholder="Enter Mother Name" name="mname" value="<?php echo $mname;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ermname;?> </span><br>

  <label for="fname" ><b>Father Name<span class="error">* </label>
  <input required type="text" placeholder="Enter Father Name" name="fname" value="<?php echo $fname;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erfname;?> </span><br>

  <label for="email" ><b>Email<span class="error">* </label>
  <input required type="text" placeholder="Enter Email" name="email" value="<?php echo $email;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eremail;?></span><br>

  <label for="id" ><b>Address<span class="error">* </label>
  <input required type="text" placeholder="Enter Address" name="address" value="<?php echo $address;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eradd;?></span><br>

  <label for="pass" ><b>Password<span class="error">* </label>
  <input required type="password" placeholder="Enter Password" name="pass" value="<?php echo $pass;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erpass;?></span><br>

  <label for="cpass" ><b>Confirm Password<span class="error">* </label>
  <input required type="password" placeholder="Retype Password" name="cpass" value="<?php echo $cpass;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ercpass;?></span><br>

  <label for="class" ><b>Class<span class="error">* </label>
  <input required type="text" placeholder="Enter Your Class" name="class" value="<?php echo $class;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erclass;?></span><br>

  <fieldset style="width: 1000px; ">
  <label for="image" ><b>Picture<span class="error">* </label>
  <input required type="file" name="image" id="image" value="<?php echo $image;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $error;?></span><br>
  </fieldset><br>

  
  <fieldset style="width: 1000px; ">
  <legend><b>Gender</b></legend>
  <input type="radio" name="gender"<?php if(isset($gender) && $gender=="male") echo "checked";?> value="Male">Male

  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female">Female  

  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Other">Other  
  <span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ergender;?></span >   
<br><br>
  </fieldset><br>

  <fieldset style="width: 1000px; ">
  <label for="dob" ><b>Date Of Birth<span class="error">* </label>
  <input required type="date" name="dob" value="<?php echo $dob;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erdob;?></span>
  </fieldset><br>

  <div class="clearfix">

  <center><button type="submit" class="signupbtn" name="register" style="width: 100px"><b>Submit</button>
  <form action="Registration.php">
  <?php echo "&nbsp&nbsp&nbsp";?>
  <button type="reset" class="cancelbtn" name="reset" style="width: 100px"><b>Reset</button>

  </div>
  </div>

  <center>Already Register? <a href="Login.php">Login</a></center>
  <center><a href="Registration.php">Back</a></center>
  </form>
</fieldset>

</form>
</body>
</html>