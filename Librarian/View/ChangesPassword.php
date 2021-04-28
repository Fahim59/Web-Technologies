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
?>

<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<title>Change Password</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<script>
	
	function ValidateCPassForm() {
	  var current = document.changepass.current.value;
      var newp = document.changepass.new.value;
      var retype = document.changepass.retype.value;

      if(current==null || current==""){  
        alert("Current Password can't be blank");  
        return false;  
      }else if(newp==null || newp==""){  
        alert("New Password can't be blank");  
        return false;  
      }else if(retype==null || retype==""){  
        alert("Retype New Password can't be blank");  
        return false;  
      }
	}

	function CheckCPass() {
	    var current = document.changepass.current.value; 

	    if (document.getElementById("current").value == "") {
          document.getElementById("currentPassErr").innerHTML = " Current password can't be blank";
          document.getElementById("currentPassErr").style.color = "red";
          document.getElementById("current").style.borderColor = "red";
	    }else{
	        document.getElementById("currentPassErr").innerHTML = "";
	        document.getElementById("current").style.borderColor = "black";
	    }
	}

	function CheckNPass() {
	  var password = document.changepass.new.value;
      var passRe = /[$%@#]/;
      if (document.getElementById("new").value == "") {
          document.getElementById("newPassErr").innerHTML = " New Password can't be blank";
          document.getElementById("newPassErr").style.color = "red";
          document.getElementById("new").style.borderColor = "red";
      }else if(!passRe.test(password)){
        document.getElementById("newPassErr").innerHTML = " Password must contain at least one of the special characters (@, #, $, %) ";
        document.getElementById("newPassErr").style.color = "red";
        document.getElementById("new").style.borderColor = "red";
      }else if(password.length<8){
        document.getElementById("newPassErr").innerHTML = " Password must not be less than eight characters ";
        document.getElementById("newPassErr").style.color = "red";
        document.getElementById("new").style.borderColor = "red";
      }else{
        document.getElementById("newPassErr").innerHTML = "";
        document.getElementById("new").style.borderColor = "black";
      }
	}

	function CheckRPass() {
	  var password = document.changepass.new.value;
      var cpassword = document.changepass.retype.value;

      if (document.getElementById("retype").value == "") {
          document.getElementById("reTypeErr").innerHTML = " Retype password can't be blank";
          document.getElementById("reTypeErr").style.color = "red";
          document.getElementById("retype").style.borderColor = "red";
      }else if(cpassword != password){
        document.getElementById("reTypeErr").innerHTML = " Must match with new password";
        document.getElementById("reTypeErr").style.color = "red";
        document.getElementById("retype").style.borderColor = "red";
      }else{
        document.getElementById("reTypeErr").innerHTML = "";
        document.getElementById("retype").style.borderColor = "black";
      }
	}


</script>
</head>
<body>
	<?php
	include '../Controller/LoginDetails.php';
    $row = LoginData($_SESSION['userid']);
	$currentPass = $row['password'];
	$newPass = $reType = $currentPass1 = $message = "";
	$currentPassErr = $newPassErr = $reTypeErr = "";
	$check = 1;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["current"])) {
			$currentPassErr = "Current password field is empty";
			$check = 0;
		}else {
			$currentPass1 = $_POST["current"];
			if(strcmp($currentPass, $currentPass1)) {
				$currentPassErr = "Current password does not match";
				$check = 0;
			}
		}

		if (empty($_POST["new"])) {
			$newPassErr = "New password field is empty";
			$check = 0;
		}else {
			$newPass = $_POST["new"];
			$count = strlen("$newPass");
		    if ((!preg_match("([@#$%])",$newPass)) || $count < 8 ) {
		        $newPassErr = "Password must not be less than eight characters and  must contain at least one of the special characters (@, #, $, %) ";
		        $check = 0;
		    }
		    if(!strcmp($newPass, $currentPass1)) {
				$newPassErr = "Can't be same as current password";
				$check = 0;
			}
		}

		if (empty($_POST["retype"])) {
			$reTypeErr = "Retype New password field is empty";
			$check = 0;
		}else {
			$reType = $_POST["retype"];
			if(strcmp($newPass, $reType)) {
				$reTypeErr = "Must match with new password";
				$check = 0;
			}
		}

	}




	if(isset($_POST["submit"])){
		if($check == 1) {
			$data['uid'] = $rows['uid'];
			$data['password'] = $_POST["retype"];

			include '../Controller/PasswordChange.php';

			if (ChangePass($data)) {

				$message = "Password has been changed!";
				header('location:ChangesPassword.php');
			}
		}
		


	}
	?>

	<form method="post"  enctype="multipart/form-data" name="changepass" onsubmit="ValidateCPassForm()">
		<fieldset>
			<legend><b>CHANGE PASSWORD</b></legend>
			 <table>
	            <tr>
	                <td>Current Password</td>
	                <td>:</td>
	                <td><input type="password" id="current" name="current" onkeyup="CheckCPass()" onblur="CheckCPass()" ><span class="error" id="currentPassErr"><?php echo $currentPassErr;?></span><br></td>
	            </tr>

	            <tr>
                <td><span style="color: green">New Password</span></td>
                <td>:</td>
                <td><input type="password" id="new" name="new" onkeyup="CheckNPass()" onblur="CheckNPass()" ><span class="error" id="newPassErr"><?php echo $newPassErr;?></span><br>
            </tr>

            <tr>
                <td><span class="error">Retype New Password</span></td>
                <td>:</td>
                <td><input type="password" name="retype" id="retype" onkeyup="CheckRPass()" onblur="CheckRPass()"><span class="error" id="reTypeErr"><?php echo $reTypeErr;?></span><br>
            </tr>

        </table>
        <hr/>
        <input type="submit" name="submit" value="Change" style="width: 100px"><br>
        <?php echo $message; ?>

		</fieldset>
	</form>

</body>
</html>