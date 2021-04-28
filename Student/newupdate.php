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
    $uid = "1000";
  }
  else
  {
    
    $uid = $lastid ++;
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




<!DOCTYPE html>
<html>
<head>
<title>Register Here</title>
<style>
/* Style the header */
header {
  background-color: #666;
  padding: 30px;
  text-align: Center;
  font-size: 35px;
  color: white;
}
</style>
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

<header>
  <img src="midprojectlogo.jpg" alt="student" width="50" height="60"> Register Here
</header>
	<script >  
		function checkEmpty() {
		  	if (document.myform.name.value = "") {
		  		alert("Name can't be blank");
		        return false;  
		  	}
		  }  
       function checkName() {
                        var namereg = /^[a-zA-Z-. ?!]{2,}$/;
 
			if (document.getElementById("name").value == "") {
			  	document.getElementById("nameErr").innerHTML = "Name can't be blank";
			  	document.getElementById("nameErr").style.color = "red";
			  	document.getElementById("name").style.borderColor = "red";

			}else if (!document.getElementById("name").value.match(namereg)) {
			  	document.getElementById("nameErr").innerHTML = "At least two words and can only contain letters,period,dash";
			  	document.getElementById("nameErr").style.color = "red";
			  	document.getElementById("name").style.borderColor = "red";

			}else{
			  	document.getElementById("nameErr").innerHTML = "";
				document.getElementById("name").style.borderColor = "black";
			}
		
        }
        function checkMName() {
                        var mnamereg = /^[a-zA-Z-. ?!]{2,}$/;
 
			if (document.getElementById("mname").value == "") {
			  	document.getElementById("mnameErr").innerHTML = "Mother Name can't be blank";
			  	document.getElementById("mnameErr").style.color = "red";
			  	document.getElementById("mname").style.borderColor = "red";

			}else if (!document.getElementById("mname").value.match(mnamereg)) {
			  	document.getElementById("mnameErr").innerHTML = "At least two words and can only contain letters,period,dash";
			  	document.getElementById("mnameErr").style.color = "red";
			  	document.getElementById("mname").style.borderColor = "red";

			}else{
			  	document.getElementById("mnameErr").innerHTML = "";
				document.getElementById("mname").style.borderColor = "black";
			}
		
        }
        function checkFName() {
                        var fnamereg = /^[a-zA-Z-. ?!]{2,}$/;
 
			if (document.getElementById("fname").value == "") {
			  	document.getElementById("fnameErr").innerHTML = "Father Name can't be blank";
			  	document.getElementById("fnameErr").style.color = "red";
			  	document.getElementById("mname").style.borderColor = "red";

			}else if (!document.getElementById("fname").value.match(fnamereg)) {
			  	document.getElementById("fnameErr").innerHTML = "At least two words and can only contain letters,period,dash";
			  	document.getElementById("fnameErr").style.color = "red";
			  	document.getElementById("fname").style.borderColor = "red";

			}else{
			  	document.getElementById("fnameErr").innerHTML = "";
				document.getElementById("fname").style.borderColor = "black";
			}
		
        }
   function checkDOB(){
   var dob=document.getElementById("dob").value;
   var myDate = new Date(dob);
   var today = new Date();
  
     if (document.getElementById("dob").value == "") {
			  	document.getElementById("dobErr").innerHTML = "Date of Brith can't be blank";
			  	document.getElementById("dobErr").style.color = "red";
			  	document.getElementById("dob").style.borderColor = "red";

			}else if (myDate > Date.now()) {
			  	document.getElementById("dobErr").innerHTML = "Future date cannot be selected";
			  	document.getElementById("dobErr").style.color = "red";
			  	document.getElementById("dob").style.borderColor = "red";

			}else if (today.getFullYear() - myDate.getFullYear() < 11) {
			  	document.getElementById("dobErr").innerHTML = "Eligibility 11 years ONLY.";
			  	document.getElementById("dobErr").style.color = "red";
			  	document.getElementById("dob").style.borderColor = "red";

			}else{
			  	document.getElementById("dobErr").innerHTML = "";
				document.getElementById("dob").style.borderColor = "black";
			}
 
  }

        function checkGENDER() {
 
			if (document.getElementById("gender").value == "") {
			  	document.getElementById("genderErr").innerHTML = "At least one of the Gender must be selected";
			  	document.getElementById("genderErr").style.color = "red";
			  	document.getElementById("gender").style.borderColor = "red";

			}else{
			  	document.getElementById("genderErr").innerHTML = "";
				document.getElementById("gender").style.borderColor = "black";
			}
		
        }
        function checkPASSWORD() {
 
			if (document.getElementById("password").value == "") {
			  	document.getElementById("passwordErr").innerHTML = "Password must be selected";
			  	document.getElementById("passwordErr").style.color = "red";
			  	document.getElementById("password").style.borderColor = "red";

			}else{
			  	document.getElementById("passwordErr").innerHTML = "";
				document.getElementById("password").style.borderColor = "black";
			}
		
        }
        function checkCLASS() {
         
 
			if (document.getElementById("class").value == "") {
			  	document.getElementById("classErr").innerHTML = "Class must be selected.";
			  	document.getElementById("classErr").style.color = "red";
			  	document.getElementById("class").style.borderColor = "red";

			}else{
			  	document.getElementById("classErr").innerHTML = "";
				document.getElementById("class").style.borderColor = "black";
			}
		
        }
       
        function checkADDRESS() {
 
			var addressreg = /^[a-zA-Z0-9-., ?!]{6,}$/;
 
			if (document.getElementById("address").value == "") {
			  	document.getElementById("addressErr").innerHTML = "Address can't be blank";
			  	document.getElementById("addressErr").style.color = "red";
			  	document.getElementById("address").style.borderColor = "red";

			}else if (!document.getElementById("address").value.match(addressreg)) {
			  	document.getElementById("addressErr").innerHTML = "At least six words";
			  	document.getElementById("addressErr").style.color = "red";
			  	document.getElementById("address").style.borderColor = "red";

			}else{
			  	document.getElementById("addressErr").innerHTML = "";
				document.getElementById("address").style.borderColor = "black";
			}
		
        }
        function checkEMAIL() {
 
			var emailreg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
 
			if (document.getElementById("email").value == "") {
			  	document.getElementById("emailErr").innerHTML = "Email can't be blank";
			  	document.getElementById("emailErr").style.color = "red";
			  	document.getElementById("email").style.borderColor = "red";

			}else if (!document.getElementById("email").value.match(emailreg)) {
			  	document.getElementById("emailErr").innerHTML = "Invalid email formate.";
			  	document.getElementById("emailErr").style.color = "red";
			  	document.getElementById("email").style.borderColor = "red";

			}else{
			  	document.getElementById("emailErr").innerHTML = "";
				document.getElementById("email").style.borderColor = "black";
			}
		
        }
        

      
</script>  
</head>

<body>
<form name="myform" method="post" action="" onsubmit="validateform()" style="padding-top: 10px " enctype="multipart/form-data" >
<fieldset style="width: 1490px;" align="left">  
       <div class="container">

  <label for="uid"><b>User ID</b><span class="error">* </label>
  <input type="text" name="uid" readonly value="<?php echo $uid;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eruid;?> </span><br>

<br>

       <label for="name" ><b>Name<span class="error">* </label> <input type="text" name="name" id="name" onkeyup="checkName()" onblur="checkName()" onfocus="handleOnfocus(this) value="<?php echo $name;?>" >  <span id="nameErr"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ername;?></span>

<br>


<label for="fname" ><b>Father Name<span class="error">* </label><input type="text" name="fname" id="fname" onkeyup="checkFName()" onblur="checkFName()" onfocus="handleOnfocus(this) value="<?php echo $fname;?>">  <span id="fnameErr"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erfname;?></span>

<br>

 <label for="mname" ><b>Mother Name<span class="error">* </label><input type="text" name="mname" id="mname" onkeyup="checkMName()" onblur="checkMName()" onfocus="handleOnfocus(this) value="<?php echo $mname;?>">  <span id="mnameErr"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ername;?></span>

<br>
     
       <label for="email" ><b>Email<span class="error">* </label><input type="text" name="email" id="email" onkeyup="checkEMAIL()" onblur="checkEMAIL()" onfocus="handleOnfocus(this) value="<?php echo $email;?>">  <span id="emailErr"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eremail;?></span>

<br>   
        
        
  <label for="dob" ><b>Date Of Birth<span class="error">* </label><input type="date" name="dob" id="dob" onkeyup="checkDOB()" onblur="checkDOB()"alue="<?php echo $dob;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erdob;?><span id="dobErr"></span> 
<div class="clearfix">  

<br>
        
<label for="gender" ><b>Gender<span class="error">*</label><input type="radio"   name="radiobutton"<?php if(isset($radiobutton) && $radiobutton=="male") echo "checked";?> value="Male">Male<input type="radio"  name="radiobutton" <?php if (isset($radiobutton) && $radiobutton=="female") echo "checked";?> value="Female">Female  <input type="radio" name="radiobutton" <?php if (isset($radiobutton) && $radiobutton=="other") echo "checked";?> value="Other">Other 
  <span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ergender;?></span ><br>

<br>

     <label for="class" ><b>Class</b><span class="error">* </label><input type="text" name="class" id="class" onkeyup="checkCLASS()" onblur="checkCLASS()" onfocus="handleOnfocus(this) placeholder="Enter Your Class" name="x"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erclass;?>  <span id="classErr"></span>

<br>
   
    <label for="id" ><b>Address</b><span class="error">* </label><input type="text" name="address" id="address" onkeyup="checkADDRESS()" onblur="checkADDRESS()" onfocus="handleOnfocus(this) value="<?php echo $address;?>">  <span id="addressErr"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eradd;?></span>

<br> 

   <label for="pass" ><b>Password</b><span class="error">* </label><input type="text" name="password" id="password" onkeyup="checkPASSWORD()" onblur="checkPASSWORD()"onfocus="handleOnfocus(this) value="<?php echo $pass;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erpass;?> <span id="passwordErr"></span>

<br>

<label for="cpass" ><b>Confirm Password</b><span class="error">* </label>
  <input type="text" placeholder="Retype Password" name="cpass" onfocus="handleOnfocus(this) value="<?php echo $cpass;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ercpass;?></span>

<br>

    
  <label for="picture" ><b>Picture</b><span class="error">* </label><input type="file" name="picture" id="picture" onkeyup="checkPICTURE()" onblur="checkPICTURE()"value="<?php echo $picture;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $error;?><span id="pictureErr"></span>            


<br>
                          
                             <center><button type="submit" class="signupbtn" name="register" style="width: 100px" value="register"><b>Submit</button>
  <form action="Registration.php">
  <?php echo "&nbsp&nbsp&nbsp";?>
  <button type="reset" class="cancelbtn" name="reset"  style="width: 100px"><b>Reset</button>

  </div>
  </div>

  <center>Already Register? <a href="Login.php">Login</a></center>
  <center><a href="Registration.php">Back</a></center>
  </form>
</fieldset>
</form>  
</body>
</html>