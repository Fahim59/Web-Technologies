<?php
	session_start();
	if (isset($_SESSION['userid'])) 
	{

		include "LoginHeader.php";
		include "Sidebar.php";
	}
	else
	{
    echo '<script>alert("Login First!")</script>';
    echo '<script>location.href="Login.php"</script>';
	}


$message = '';  
 $check = 1;  


 $nameErr = $emailErr = $dobErr = $genderErr = $imageErr = $addressErr = "";
 $name = $email = $dd = $mm = $yyyy = $gender = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $check = 0;
  } else {
    $name = $_POST["name"];
    $count = str_word_count("$name");
    if ((!preg_match("/^[a-zA-Z-' ]*$/",$name)) || $count < 2 ){
      $nameErr = "Only letters and white space allowed and contains at least two words";
      $check = 0;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $check = 0;
  } else {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $check = 0;
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
    $check = 0;
  } else {
    $gender = $_POST["gender"];
  }

    if (empty($_POST["address"])) {
      $addressErr = "Address field is empty";
      $check = 0;
    }
      
    if (empty($_POST["dob"])) {
    $ddateErr = "Date of birth is required";
    $check = 0;
  }

 }

 
 if(isset($_POST["update"]))  
  {
    if ($check == 1) { 
        $data['uid'] = $_POST['uid'];
        $data['name'] = $_POST['name'];  
        $data['email'] = $_POST["email"];
        $data['address'] = $_POST["address"];
        $data['gender'] = $_POST["gender"];
        $data['dob'] = $_POST["dob"];
        
        include '../Controller/UpdateData.php';
        if(UpdateData($data)) {
          $message = "Data has been updated.";
        }else {
          $message = "Data hasn't updated";
        }

        header('Location:EditProfile.php');

      }
    } 

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<style>
	.error {color: #FF0000;}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script>
    	
    function ValidateEditForm(){
      var name = document.edit.name.value;
      var email = document.edit.email.value;
      var address = document.edit.address.value;

        
      if (name==null || name==""){  
        alert("Name can't be blank");  
        return false;  
      }else if(email==null || email==""){  
        alert("Email can't be blank");  
        return false;  
      }else if(address==null || address==""){  
        alert("Address can't be blank");  
        return false;  
      }
    }

    function CheckName() {
      var name = document.edit.name.value;
      var nameRe = /^[a-zA-Z-' ]*$/;
      if (document.getElementById("name").value == "") {
          document.getElementById("nameErr").innerHTML = "Name can't be blank";
          document.getElementById("nameErr").style.color = "red";
          document.getElementById("name").style.borderColor = "red";
      }else if(!nameRe.test(name)){
        document.getElementById("nameErr").innerHTML = " Only letters and white space allowed";
        document.getElementById("nameErr").style.color = "red";
        document.getElementById("name").style.borderColor = "red";

      }else if(+CountWords(name)<+2){
        document.getElementById("nameErr").innerHTML = " Name contains at least two words";
        document.getElementById("nameErr").style.color = "red";
        document.getElementById("name").style.borderColor = "red";
      }else{
        document.getElementById("nameErr").innerHTML = "";
        document.getElementById("name").style.borderColor = "black";
      }
    }

    function CountWords(str) {
    return str.trim().split(/\s+/).length;
    }

    function CheckMail() {
     var email = document.edit.email.value;
     var emailRe = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/; 
     if (document.getElementById("email").value == "") {
          document.getElementById("emailErr").innerHTML = "Email can't be blank";
          document.getElementById("emailErr").style.color = "red";
          document.getElementById("email").style.borderColor = "red";
      }else if(!emailRe.test(email)){
        document.getElementById("emailErr").innerHTML = " Invalid email format. Format: example@something.com";
        document.getElementById("emailErr").style.color = "red";
        document.getElementById("email").style.borderColor = "red";
      }else{
        document.getElementById("emailErr").innerHTML = "";
        document.getElementById("email").style.borderColor = "black";
      }
    }

     function CheckAdd() {
      if (document.getElementById("address").value == "") {
          document.getElementById("addressErr").innerHTML = "Address can't be blank";
          document.getElementById("addressErr").style.color = "red";
          document.getElementById("address").style.borderColor = "red";
      }else{
          document.getElementById("addressErr").innerHTML = "";
        document.getElementById("address").style.borderColor = "black";
      }
    }
    </script>
</head>
<body>
<fieldset>
    <legend><b>EDIT PROFILE</b></legend>
	<form method="post" enctype="multipart/form-data" name="edit" onsubmit="ValidateEditForm()">
		<br/>
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td>User ID</td>
				<td>:</td>
				<td><input name="uid" type="text" value="<?php echo $rows["uid"];?>" readonly></td>
				<td></td>
			</tr>
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Name</td>
				<td>:</td>
				<td>
					<input name="name" type="text" id="name" onkeyup="CheckName()" onblur="CheckName()" value="<?php echo $rows["name"];?>">
					<span class="error" id="nameErr"><?php echo $nameErr;?></span>
				</td>
				<td></td>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td>
					<input name="email" type="text" id="email" onkeyup="CheckMail()" onblur="CheckMail()" value="<?php echo $rows["email"];?>">
					<span class="error" id="emailErr"><?php echo $emailErr;?></span>
				</td>
				<td></td>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Address</td>
				<td>:</td>
				<td>
					<input name="address" type="text" size="80" id="address" onkeyup="CheckAdd()" onblur="CheckAdd()" value="<?php echo $rows["address"];?>">
					<span class="error" id="addressErr"><?php echo $addressErr;?></span>
				</td>
				<td></td>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Gender</td>
				<td>:</td>
				<td>   
					<input name="gender" id="gender" type="radio" <?php if ($rows["gender"] == "Male"){ echo "checked";}?> value="Male">Male
					<input name="gender" id="gender" type="radio" <?php if ($rows["gender"] == "Female"){ echo "checked";}?> value="Female">Female
					<input name="gender" id="gender" type="radio" <?php if ($rows["gender"] == "Other"){ echo "checked";}?> value="Other">Other
					<span class="error" id="genderErr"><?php echo $genderErr;?></span>
				</td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td valign="top">Date of Birth</td>
				<td valign="top">:</td>
				<td>
					<input name="dob" type="Date" id="dob" value="<?php echo $rows["dob"];?>">
					<span class="error" id="dobErr"><?php echo $dobErr;?></span>
					<br/>
				</td>
				<td></td>
			</tr>
		</table>
		<hr/>
		<input type="submit" name="update" value="Update">		
	</form>
</fieldset>

</body>
</html>