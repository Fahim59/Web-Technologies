<?php include ('database.php');?>
<?php include ('newdb.php');?>


<!DOCTYPE html>
<html>
<head>
  <title>Register Here</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="registration.css" crossorigin="anonymous">
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
    #errorBox
    {
      color:#F00;
    }
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box}
  </style>

<body>

<?php

$name = $mname = $fname = $email = $address = $pass = $cpass = $dob = $radiobutton = $picture = $uid = $x ="";
$ername = $ermname = $erfname = $eremail = $eradd = $erdob = $ergender = $erpass = $ercpass = $eruid = $erclass ="";
$error = $message = "";
$check = 1;

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "webtech";
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  $query = "SELECT uid FROM login ORDER BY uid DESC LIMIT 1";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

  $lastid = $row['uid'];

  if ($lastid == null)
  {
    //$uid = "User1";
    //return "1000";
    $uid = "1000";
  }
  else
  {
    //$temp = substr($lastid, 4);
    //$temp1 = intval($temp);
    //$uid = "User".($temp1 + 1);
    $uid = $lastid ++;
    //return $lastid + 1;
  }

if($_SERVER["REQUEST_METHOD"] == "POST")
{
      if(empty($_POST["uid"]))  
      {  
        $eruid = "Enter User ID";
        $check = 0;
      }
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
      if(!isset($_POST["radiobutton"]))
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
      else if (strlen($_POST["pass"]) <= 7) 
      {
        $erpass = "Your Password Must Contain At Least 8 Characters!";
        $check = 0;
      }
      else if(!preg_match("#[a-zA-Z0-9-. ?!]+#",($_POST["pass"]))) 
      {
        $erpass = "Your Password Must Contain At Least one Number or Character!";
        $check = 0;
      }
      else if(!preg_match('/[$%@#]/', ($_POST["pass"])))
      {
        $erpass = "Your Password Must Contain At Least one special character(@,#,$,%)!";
        $check = 0;
      }
      else if(($_POST["pass"]) != ($_POST["cpass"]))
      {
        $ercpass = "Password and Confirm password must be same!";
        $check = 0;
      }
      //Class
      if(empty($_POST["x"]))  
      {  
        $erclass = "Enter Class";
        $check = 0;
      }

      $target_dir = "image/";
      $target_file = $target_dir . basename($_FILES["picture"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      if ($_FILES["picture"]["size"] > 4194304)
      {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }

      if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg")
      {
        move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
      }
      else
      {
        $error = "Select an Image";
        $check=0; 
      }

      if ($check==1)
      {
        registration();
        echo "<meta http-equiv='refresh' content='0'>";
      }
} 
?>
<script>
    function handleOnfocus(x)
    {
        x.style.color="light blue";
    }

</script>


<form name="Student_Reg" action="" method="post" style="padding-top: 10px" enctype="multipart/form-data">
  <fieldset style="width: 1000px;" align="left">
  
  <legend class="text"><b>STUDENT REGISTRATION</b></legend>

  <div class="container">

  <label for="uid"><b>User ID</b><span class="error">* </label>
  <input type="text" name="uid" readonly value="<?php echo $uid;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eruid;?> </span><br>

  <label for="name" ><b>Name<span class="error">* </label>
  <input type="text" placeholder="Enter your name" name="name" id="name"  onfocus="handleOnfocus(this) value="<?php echo $name;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ername;?> </span><br>

  <label for="mname" ><b>Mother Name<span class="error">* </label>
  <input type="text" placeholder="Enter Mother Name" name="mname" onfocus="handleOnfocus(this) value="<?php echo $mname;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ermname;?> </span><br>

  <label for="fname" ><b>Father Name<span class="error">* </label>
  <input type="text" placeholder="Enter Father Name" name="fname" onfocus="handleOnfocus(this) value="<?php echo $fname;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erfname;?> </span><br>

  <label for="email" ><b>Email<span class="error">* </label>
  <input type="text" placeholder="Enter Email" name="email" onfocus="handleOnfocus(this) value="<?php echo $email;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eremail;?></span><br>

  <label for="id" ><b>Address<span class="error">* </label>
  <input type="text" placeholder="Enter Address" name="address" onfocus="handleOnfocus(this) value="<?php echo $address;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eradd;?></span><br>

  <label for="pass" ><b>Password<span class="error">* </label>
  <input type="password" placeholder="Enter Password" name="pass" onfocus="handleOnfocus(this) value="<?php echo $pass;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erpass;?></span><br>

  <label for="cpass" ><b>Confirm Password<span class="error">* </label>
  <input type="text" placeholder="Retype Password" name="cpass" onfocus="handleOnfocus(this) value="<?php echo $cpass;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ercpass;?></span><br>

  <label for="class" ><b>Class<span class="error">* </label>
  <input type="text" onfocus="handleOnfocus(this) placeholder="Enter Your Class" name="x"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erclass;?></span><br>

  <fieldset style="width: 1000px; ">
  <label for="picture" ><b>Picture<span class="error">* </label>
  <input type="file" name="picture" id="picture" value="<?php echo $picture;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $error;?></span><br>
  </fieldset><br>
  
  <fieldset style="width: 1000px; ">
  <legend><b>Gender</b></legend>
  <input type="radio"   name="radiobutton"<?php if(isset($radiobutton) && $radiobutton=="male") echo "checked";?> value="Male">Male

  <input type="radio"  name="radiobutton" <?php if (isset($radiobutton) && $radiobutton=="female") echo "checked";?> value="Female">Female  

  <input type="radio" name="radiobutton" <?php if (isset($radiobutton) && $radiobutton=="other") echo "checked";?> value="Other">Other 
  <br>  
  <span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ergender;?></span >

  </fieldset><br>

  <fieldset style="width: 1000px; ">
  <label for="dob" ><b>Date Of Birth<span class="error">* </label>
  <input type="date" name="dob"  value="<?php echo $dob;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erdob;?></span><br>
  </fieldset><br>

  <div class="clearfix">

  <center><button type="submit" class="signupbtn" name="register" style="width: 100px"><b>Submit</button>
  <form action="Registration.php">
  <?php echo "&nbsp&nbsp&nbsp";?>

  </div>
  </div>

  <center>Already Register? <a href="Login.php">Login</a></center>
  <center><a href="Registration.php">Back</a></center>
  </form>
</fieldset>

</form>
</body>
</html>