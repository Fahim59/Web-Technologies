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
			  	document.getElementById("classErr").innerHTML = "At least one of the class must be selected";
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
<pre>
       <b>Name:</b> <input type="text" name="name" id="name" onkeyup="checkName()" onblur="checkName()">  <span id="nameErr"></span>

<b>Father Name:</b> <input type="text" name="fname" id="fname" onkeyup="checkFName()" onblur="checkFName()">  <span id="fnameErr"></span>

<b>Mother Name:</b> <input type="text" name="mname" id="mname" onkeyup="checkMName()" onblur="checkMName()">  <span id="mnameErr"></span>
     
      <b>Email:</b> <input type="text" name="email" id="email" onkeyup="checkEMAIL()" onblur="checkEMAIL()">  <span id="emailErr"></span>   
        
        <b>DOB:</b> <input type="date" name="dob" id="dob" onkeyup="checkDOB()" onblur="checkDOB()">  <span id="dobErr"></span> 
        
     <b>Gender:</b><input type="radio" name="gender" id="male" onkeyup="checkGENDER()" onblur="checkGENDER()">Male<input type="radio" name="gender" id="female" onkeyup="checkGENDER()" onblur="checkGENDER()">Female<input type="radio" name="gender" id="Others" onkeyup="checkGENDER()" onblur="checkGENDER()">Others  
               <span id="genderErr"></span>                           <br>      
      <b>Class: </b><select name="class" id="class" onkeyup="checkCLASS()" onblur="checkCLASS()"  style="width:165px; height:20px" onChange="do_get_rest_popup(this.value)" >
              <section>
                <option value="<?php echo "$class";?>">6</option> 
                <option value="<?php echo "$class";?>">7</option> 
                <option value="<?php echo "$class";?>">8</option> 
                <option value="<?php echo "$class";?>">9</option> 
             </select><span id="classErr"></span>
   
    <b>Address:</b> <input type="text" name="address" id="address" onkeyup="checkADDRESS()" onblur="checkADDRESS()">  <span id="addressErr"></span> 
   <b>Password:</b> <input type="text" name="password" id="password" onkeyup="checkPASSWORD()" onblur="checkPASSWORD()">  <span id="passwordErr"></span>
    <b>Picture:</b> <input type="file" name="picture" id="picture" onkeyup="checkPICTURE()" onblur="checkPICTURE()"><span id="pictureErr"></span>            
<br>
                           <input type="submit" value="register">  </pre>
</fieldset>
</form>  
</body>
</html>