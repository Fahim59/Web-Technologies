<?php include('header_footer/header1.php');?>
<?php include ('database/conn.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>Librarian Registration</title>
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
    #errorBox
    {
      color:#F00;
    }
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box}
  </style>

  <script type="text/javascript">

    function submit()
    {
      document.getElementById("Librarian_Reg").reset();
    }
    function submit1()
    {
      var nameRegex = /^[a-zA-Z-. ?!]{5,}$/;
      var addressRegex = /^[a-zA-Z0-9-., ?!]{6,}$/;
      var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
      var passRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;

      var name = document.Librarian_Reg.name.value;
      var address = document.Librarian_Reg.address.value;
      var email = document.Librarian_Reg.email.value;
      var pass = document.Librarian_Reg.pass.value;
      var cpass = document.Librarian_Reg.cpass.value;
      var radiobutton = document.Librarian_Reg.radiobutton.value;
      var dob = document.Librarian_Reg.dob.value;
      var image = document.Librarian_Reg.image.value;

      //Name
      if(name == "")
      {
        document.Librarian_Reg.name.focus();
        document.getElementById("errorBox").innerHTML = "Name is required, Enter Full Name";
        return false;
      }
      else if(!nameRegex.test(name))
      {
        document.Librarian_Reg.name.focus();
        document.getElementById("errorBox").innerHTML = "At least five words and can only contain letters,period,dash";
        return false;
      }
      //Email
      if(email == "")
      {
        document.Librarian_Reg.email.focus();
        document.getElementById("errorBox").innerHTML = "Email is required";
        return false;
      }
      else if(!emailRegex.test(email))
      {
        document.Librarian_Reg.email.focus();
        document.getElementById("errorBox").innerHTML = "Invalid email format. Format: example@something.com";
        return false;
      }
      //Address
      if(address == "")
      {
        document.Librarian_Reg.address.focus();
        document.getElementById("errorBox").innerHTML = "Address is required!!";
        return false;
      }
      else if(!addressRegex.test(address))
      {
        document.Librarian_Reg.address.focus();
        document.getElementById("errorBox").innerHTML = "At least six words!!";
        return false;
      }
      //Password
      if(pass == "")
      {
        document.Librarian_Reg.pass.focus();
        document.getElementById("errorBox").innerHTML = "Password is required!!";
        return false;
      }
      else if(!passRegex.test(pass))
      {
        document.Librarian_Reg.pass.focus();
        document.getElementById("errorBox").innerHTML = "Your Password Must Contain At Least one uppercase, lowercase letter and special character!";
        return false;
      }
      //CPassword
      if(cpass == "")
      {
        document.Librarian_Reg.cpass.focus();
        document.getElementById("errorBox").innerHTML = "Retype Password!!";
        return false;
      }
      else if(cpass !=  pass)
      {
       document.Librarian_Reg.cpass.focus();
       document.getElementById("errorBox").innerHTML = "Both Password must be same";
       return false;
      }
      //Image
      if(image == "")
      {
        document.Librarian_Reg.image.focus();
        document.getElementById("errorBox").innerHTML = "Select Your Image";
        return false;
      }
      //Gender
      if(document.Librarian_Reg.radiobutton[0].checked == false && document.Librarian_Reg.radiobutton[1].checked == false && document.Librarian_Reg.radiobutton[2].checked == false)
      {
        document.Librarian_Reg.radiobutton.value;
        document.getElementById("errorBox").innerHTML = "Gender must be selected";
        return false;
      }
      //Date Of Birth
      if(dob == "")
      {
        document.Librarian_Reg.dob.focus();
        document.getElementById("errorBox").innerHTML = "Select your Date Of Birth";
        return false;
      }

      //Alert
      if(name != '' && pass  != '' && cpass != '' && email != '' && address != '' && image != '' && radiobutton != '' && dob != '')
      {
        alert( "Submitting Registerform? ");
      }
    }
  </script>

<body>

<?php

$name = $email = $address = $pass = $cpass = $dob = $gender = $image = $uid ="";
$ername = $eremail = $eradd = $erdob = $ergender = $erpass = $ercpass = $eruid = "";
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
    $uid = "User1";
  }
  else
  {
    $temp = substr($lastid, 4);
    $temp1 = intval($temp);
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
} 
?>

<form name="Librarian_Reg" method="post" action="controller/LibrarianRegCheck.php"style="padding-top: 10px">
  <fieldset style="width: 1000px;" align="left">
  
  <legend class="text"><b>LIBRARIAN REGISTRATION</b></legend>
  
  <div class="container">

  <label for="uid"><b>User ID</b><span class="error">* </label>
  <input type="text" name="uid" readonly value="<?php echo $uid;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eruid;?> </span><br><div id="errorBox"></div>

  <label for="name" ><b>Name<span class="error">* </label>
  <input type="text" placeholder="Enter Full Name" name="name" value="<?php echo $name;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ername;?> </span><br><div id="errorBox"></div>

  <label for="email" ><b>Email<span class="error">* </label>
  <input type="text" placeholder="Enter Email" name="email" value="<?php echo $email;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eremail;?></span><br><div id="errorBox"></div>

  <label for="id" ><b>Address<span class="error">* </label>
  <input type="text" placeholder="Enter Address" name="address" value="<?php echo $address;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eradd;?></span><br><div id="errorBox"></div>

  <label for="pass" ><b>Password<span class="error">* </label>
  <input type="password" placeholder="Enter Password" name="pass" value="<?php echo $pass;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erpass;?></span><br><div id="errorBox"></div>

  <label for="cpass" ><b>Confirm Password<span class="error">* </label>
  <input type="password" placeholder="Retype Password" name="cpass" value="<?php echo $cpass;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ercpass;?></span><br><div id="errorBox"></div>

  <fieldset style="width: 1000px; ">
  <label for="image" ><b>Picture<span class="error">* </label>
  <input type="file" name="image" id="image" value="<?php echo $image;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $error;?></span><br><div id="errorBox"></div>
  </fieldset><br>
  
  <fieldset style="width: 1000px; ">
  <legend><b>Gender</b></legend>
  <input type="radio" name="radiobutton"<?php if(isset($gender) && $gender=="male") echo "checked";?> value="Male">Male

  <input type="radio" name="radiobutton" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female">Female  

  <input type="radio" name="radiobutton" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Other">Other 
  <br>  
  <span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ergender;?></span > <div id="errorBox"></div>  

  </fieldset><br>

  <fieldset style="width: 1000px; ">
  <label for="dob" ><b>Date Of Birth<span class="error">* </label>
  <input type="date" name="dob" value="<?php echo $dob;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erdob;?></span><br><div id="errorBox"></div>
  </fieldset><br>

  <center><button type="submit" class="signupbtn" name="register" onClick="return submit1();" style="width: 100px"><b>Submit</button>
  <form action="Registration.php">
  <?php echo "&nbsp&nbsp&nbsp";?>
  <button type="reset" class="cancelbtn" name="reset" onClick="return submit();" style="width: 100px"><b>Reset</button>

  </div>
  </div>
  
  <center>Already Register? <a href="Login.php">Login</a></center>
  <center><a href="Registration.php">Back</a></center>
  </form>
</fieldset>

</form>
</body>
</html>