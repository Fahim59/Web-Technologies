//this function actives the submit button when all required fields have been filled
function checkform()
{
    var f = document.forms["registration"].elements;
    var cansubmit = true;

    for (var i = 0; i < f.length; i++) {
        if (f[i].value.length == 0) cansubmit = false;
    }

    if (cansubmit) {
        document.getElementById('submit').disabled = false;
    }
    else {
        document.getElementById('submit').disabled = 'disabled';
    }
}

//this function actives the submit button for step 2 when all required fields have been filled
function checkform2()
{
var f = document.getElementById("PName").value.length;
    var cansubmit = true;

    
        if (f == 0) cansubmit = false;
    

    if (cansubmit) {
        document.getElementById('submit2').disabled = false;
    }
    else {
        document.getElementById('submit2').disabled = 'disabled';
    }
}

//this is for the submit button for step 1 of the registration process
function Submit(){
 var uname = document.getElementById("ID").value;
 var uemail = document.getElementById("Email").value;
 var upass = document.getElementById("Password").value;
 var upass2 = document.getElementById("Password2").value;
 
 if (upass != upass2)
 {
	 window.alert("Passwords do not match!");
 }
	 else
		 if(/^\w+([\.-]?\ w+)*@\w+([\.-]?\ w+)*(\.\w{2,3})+$/.test(uemail)){
			  document.getElementById('submit').disabled = 'disabled';
	document.getElementById("registration").style.display="none";
	document.getElementById("registration2").style.display="block";
	document.getElementById("step1").innerHTML = "<h3> " + "Step 1: Fill in log in details" + " </h3>";
		 }
		 else
		 {
			 window.alert("Email is not Valid!");
		 }
	
 document.getElementById("ID1").value = uname;
 document.getElementById("Email1").value = uemail;
 document.getElementById("Password1").value = upass;
}


//this is for the submit button for step 2 of the registration process
function Submit2(){
 var upname = document.getElementById("PName").value;
 var uemail = document.getElementById("addinfo").value;
 var uinfo = document.getElementById("addinfo").value;
 var uDD = document.getElementById("dd").value;
 var uMMM = document.getElementById("mmm").value;
 var uYYYY = document.getElementById("yyyy").value;
 
 if (uDD == 'dd'){
	 window.alert('Date of Birth is not valid!');
 }
 else
	 if (uMMM == 'mmm'){
		 window.alert('Date of Birth is not valid!');
	 }
	 else
		 if (uYYYY == 'yyyy'){
			 window.alert('Date of Birth is not valid!');
		 }
		 else{
	 
 
	document.getElementById("registration2").style.display="none";
	document.getElementById("CompleteReg").style.display="block";
		 
	document.getElementById("PName1").value = upname;
	
	document.getElementById("DOB1").value = uDD + "/" + uMMM + "/" + uYYYY;
	document.getElementById("addinfo1").value = uinfo;
	document.getElementById("step2").innerHTML = "<h3> " + "Step 3: Confirm registration details" + " </h3>"
		 }
 
}

//this is for the first back button, which takes the user from step 2 to step 1
function back1(){
	document.getElementById("step1").innerHTML = "<h3 class='highlight'> " + "Step 1: Fill in log in details" + " </h3>";
	document.getElementById('submit').disabled = false;
	document.getElementById("registration2").style.display="none";
	document.getElementById("registration").style.display="block";
}

//this is for the first back button, which takes the user from step 3 to step 2
function back2(){
	document.getElementById("step2").innerHTML = "<h3 class='highlight'> " + "Step 2: Fill in personal details" + " </h3>";
	document.getElementById('submit2').disabled = false;
	document.getElementById("CompleteReg").style.display="none";
	document.getElementById("registration2").style.display="block";
}

//this is the remaining word counter code used for addition information box.
function textCounter(){
 var max_length = 512;
 var text_length = document.getElementById("addinfo").value.length;
 var text_remaining = max_length - text_length;
 document.getElementById("textarea_feedback").innerHTML = text_remaining + ' characters remaining';
}

//This is for the button on step 3 that completes the registration process
function confirm1(){
	document.getElementById("CompleteReg").style.display="none";
	document.getElementById("FinishReg").style.display="block";
	document.getElementById("step3").innerHTML = "<h3> " + "Step 2: Fill in personal details" + " </h3>"
}



