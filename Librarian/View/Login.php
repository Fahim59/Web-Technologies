<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	    <script>
    	function ValidateForm(){  
			var id = document.login.uid.value;  
			var password = document.login.password.value;   
			  
			if (id==null || id==""){  
			  alert("ID can't be blank");  
			  return false;  
			}else if(password==null || password==""){  
			  alert("Password can't be blank");  
			  return false;  
			}

		}

		function CheckId() {
			if (document.getElementById("uid").value == "") {
			  	document.getElementById("idErr").innerHTML = "User ID can't be blank";
			  	document.getElementById("idErr").style.color = "red";
			  	document.getElementById("uid").style.borderColor = "red";
			}else{
			  	document.getElementById("idErr").innerHTML = "";
				document.getElementById("uid").style.borderColor = "black";
			}
		}

			function CheckPass() {
			if (document.getElementById("password").value == "") {
			  	document.getElementById("passErr").innerHTML = " Password can't be blank";
			  	document.getElementById("passErr").style.color = "red";
			  	document.getElementById("password").style.borderColor = "red";
			}else{
			  	document.getElementById("passErr").innerHTML = "";
				document.getElementById("password").style.borderColor = "black";
			}
			}

			 function myFunction()
		    {
		        var x = document.getElementById("password");
		        if (x.type === "password")
		        {
		            x.type = "text";
		        }  
		    }
		    function mOut(obj)
		    {
		        var x = document.getElementById("password");
		        if (x.type === "text")
		        {
		            x.type = "password";
		        } 
		    }  


    </script>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../CSS/mycss.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<style >
    .text
    {
      text-align: center;
    }

    body {font-family: Arial, Helvetica, sans-serif;}
    form {border: 3px solid #f1f1f1;}

	</style>
<body>
	
    <?php include('Header.php');?>

	<fieldset style="width: 1000px">
	<legend class="text"><b>LOGIN</b></legend>
	<form name="login" method="post" action="Dashboard.php" onsubmit="ValidateForm()" enctype="multipart/form-data">

	  <div class="imgcontainer">
	    <img src="image/login.jpg" alt="Avatar" class="avatar">
	  </div>

	  <div class="container">
	    <b>User ID: <input type="text" placeholder="Enter Username" name="uid" id="uid" onkeyup="CheckId()" onblur="CheckId()" style="width: 250px" value="<?php if (isset($_COOKIE["userid"])){echo $_COOKIE["userid"];}?>" ><br><span id="idErr"></span><br>

	    <b>Password: <input type="password" placeholder="Enter Password" name="password" id="password" onkeyup="CheckPass()" onblur="CheckPass()" style="width: 250px">
	    <i class="far fa-eye" id="togglePassword" onmouseover="myFunction()" onmouseout="mOut()"></i>
	    <br><span id="passErr"></span> </span><br>
	    <input type="checkbox" name="remember" id="remember" <?php if (isset($_COOKIE["userid"])){ echo "checked";}?>>Remember Me<br>
	    <br><input type="submit" name="submit" style="width: 100px" value="Login"><hr>

	    <label>
	    <div class="container" style="background-color:#f1f1f1">
	    <a href="ForgetPassword.php">Forgot Password?</a>
	    </label>
	  </div>

	  </div>
	 </form>
	</fieldset>
	
    <?php include('Footer.php');?>
</body>
</html>