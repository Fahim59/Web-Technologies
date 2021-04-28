<?php  include('../Model/header1.php');?>
<?php include('../Controller/RegistrationController.php');?>

<!DOCTYPE html>
<html>
<head>
  <title>Teacher Registration</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../CSS/registration.css" crossorigin="anonymous">
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
  $userId= GetNewUserId();

?>

<div id="ename" style="color: red;"></div>
<form method="post" name="Reg_Form" onsubmit=" return validation();" enctype="multipart/form-data" style="padding-top: 10px">


  <fieldset style="width: 1000px;" align="left">
  
  <legend class="text"><b>TEACHER REGISTRATION</b></legend>

  <div class="container">

  <label for="name"><b>User ID</b><span class="error"> </label>
  <input type="text" name="uid"  value="<?php echo $userId;?>" readonly><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eruid;?> </span><br>

  <label for="name" ><b>Name<span class="error"> </label>
  <input  type="text" placeholder="Enter Full Name"  onkeyup="checkName()" name="name" value="" ><span class="error" id="errname"><?php echo "&nbsp&nbsp"?><?php echo $ename;?> </span><br>

 
  <label for="fname" ><b>Father Name<span class="error"> </label>
  <input  type="text" placeholder="Enter Father Name" onkeyup="checkFname()" name="fname" value="" ><span class="error" id="errfname"><?php echo "&nbsp&nbsp"?><?php echo $efname;?> </span><br>

   <label for="mname" ><b>Mother Name<span class="error"> </label>
  <input  type="text" placeholder="Enter Mother Name"  onkeyup="checkMname()" name="mname" value="" ><span class="error" id="errmname"><?php echo "&nbsp&nbsp"?><?php echo $emname;?> </span><br>


  <label for="email" ><b>Email<span class="error"> </label>
  <input type="text" placeholder="Enter Email" onkeyup="checkEmail()" name="email" value=""><span class="error" id="erremail"><?php echo "&nbsp&nbsp"?><?php echo $eemail;?></span><br>

  <label for="id" ><b>Address<span class="error"> </label>
  <input  type="text" placeholder="Enter Address"  onkeyup="checkAdress()" name="address" value=""><span class="error" id="erraddress"><?php echo "&nbsp&nbsp"?><?php echo $eaddress;?></span><br>

  <label for="pass" ><b>Password<span class="error"> </label>
  <input type="password" placeholder="Enter Password" onkeyup="checkPassword()" name="pass" value=""><span class="error" id="errpass"><?php echo "&nbsp&nbsp"?><?php echo $epass;?></span><br>

  <label for="cpass" ><b>Confirm Password<span class="error"> </label>
  <input type="password" placeholder="Retype Password"  onkeyup="checkConfirmPassword()" name="cpass" value=""><span class="error" id="errcpass"><?php echo "&nbsp&nbsp"?><?php echo $ecpass;?></span><br>

  <fieldset style="width: 1000px; ">
  <label for="image" ><b>Picture<span class="error"> </label>
  <input  type="file" name="picture" id="image"  onkeyup="checkImage()" value=""><span class="error" id="errimg"><?php echo "&nbsp&nbsp"?><?php echo $eimg;?></span><br>
  </fieldset><br>
  
  <fieldset style="width: 1000px; ">
  <legend><b>Gender</b></legend>
  <input type="radio" name="gender"<?php if(isset($gender) && $gender=="male") echo "checked";?> value="Male">Male

  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female">Female  

  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Other">Other 
  <br>  
  <span class="error " id="errgender"><?php echo "&nbsp&nbsp"?><?php echo $egender;?></span >   

  </fieldset><br>

  <?php

  $time = strtotime("-18 year", time());
  $date = date("Y-m-d", $time);

  // echo $date;
  ?>

  <fieldset style="width: 1000px; ">
  <label for="dob" ><b>Date Of Birth<span class="error"> </label>
  <input type="date" name="dob" max='<?php echo $date; ?>' onkeyup="checkDob()" value=""><span class="error" id="errdob"><?php echo "&nbsp&nbsp"?><?php echo $edob;?></span><br>
  </fieldset><br>

  <div class="clearfix">

<center><button type="submit" class="submit" name="submit" style="width: 100px"><b>Submit</button>
  <!-- <center><button type="submit" class="signupbtn" name="register" style="width: 100px"><b>Submit</button> -->
  <!-- <form action="Registration.php"> -->
  <?php echo "&nbsp&nbsp&nbsp";?>
  <button type="reset" class="cancelbtn" name="reset" style="width: 100px"><b>Reset</button>

  </div>
  </div>

  <center>Already Register? <a href="Login.php">Login</a></center>
  <center><a href="../../Home/Registration.php">Back</a></center>
  </form>
</fieldset>

</form>


 <script type="text/javascript">
  function checkFname(){
     var fname = document.Reg_Form.fname.value;
      var nameRegex = /^[a-zA-Z-' ]*$/;
     if(fname == "")
      {
        document.Reg_Form.fname.focus();
        document.getElementById("errfname").innerHTML = "Father Name is required, Enter Full Name";
        return false;
       
      }
      else if(!nameRegex.test(fname))
      {
        document.Reg_Form.fname.focus();
        document.getElementById("errfname").innerHTML = "At least two words and can only contain letters,period,dash";
        return false;
       
      }
      else if(+countWords(fname)<+2){
        document.Reg_Form.fname.focus();
        document.getElementById("errfname").innerHTML = "Father Name At least two words and can only contain letters,period,dash";
        return false;

        
       
      }
     document.getElementById("errfname").innerHTML = "";
  }
  
  function checkName(){
     var name = document.Reg_Form.name.value;
      var nameRegex = /^[a-zA-Z-' ]*$/;
     if(name == "")
      {
        document.Reg_Form.name.focus();
        document.getElementById("errname").innerHTML = "Name is required, Enter Full Name";
        return false;
      }
      if(!nameRegex.test(name))
      {
        document.Reg_Form.name.focus();
        document.getElementById("errname").innerHTML = "At least two words and can only contain letters,period,dash";
        
        return false;
      }
      if(+countWords(name)<+2){
        document.Reg_Form.name.focus();
        document.getElementById("errname").innerHTML = "Name At least two words and can only contain letters,period,dash";

        
        return false;
      }

   document.getElementById("errname").innerHTML = "";
  }

 


  function checkDob(){
   var dob=document.Reg_Form.dob.value;
   var myDate = new Date(dob);
   var today = new Date();
  
  
        if(dob == "")
      {
        document.Reg_Form.dob.focus();
        document.getElementById("errdob").innerHTML = "Select your Date Of Birth";
        return false;
      }
      else if(myDate > Date.now())
      {
        document.Reg_Form.dob.focus();
        document.getElementById("errdob").innerHTML = "Future date cannot be selected";
        return false;
      }
      else if(today.getFullYear() - myDate.getFullYear() < 18)
      {
        document.Reg_Form.dob.focus();
        document.getElementById("errdob").innerHTML = "Eligibility 18 years ONLY.";
        return false;
      }
  }


function checkMname(){
     var mname = document.Reg_Form.mname.value;
      var nameRegex = /^[a-zA-Z-' ]*$/;
         if(mname == "")
      {
        document.Reg_Form.mname.focus();
        document.getElementById("errmname").innerHTML = "Mother Name is required, Enter Full Name";
        return false;
      }
      else if(!nameRegex.test(mname))
      {
        document.Reg_Form.mname.focus();
        document.getElementById("errmname").innerHTML = "At least two words and can only contain letters,period,dash";
        return false;
      }
       if(+countWords(mname)<+2){
        document.Reg_Form.mname.focus();
        document.getElementById("errmname").innerHTML = "Mother Name At least two words and can only contain letters,period,dash";

        
        return false;
      }
       document.getElementById("errmname").innerHTML = "";

  }

  function countWords(str) {
    return str.trim().split(/\s+/).length;
  }
   

     function checkEmail(){
      var email = document.Reg_Form.email.value;
     var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
      if(email == "")
      {
        document.Reg_Form.email.focus();
        document.getElementById("erremail").innerHTML = "Email is required";
        return false;
      }
      else if(!emailRegex.test(email))
      {
        document.Reg_Form.email.focus();
        document.getElementById("erremail").innerHTML = "Invalid email format. Format: example@something.com";
        return false;
      }
      document.getElementById("erremail").innerHTML = "";

  }


    function checkAdress(){
     var address = document.Reg_Form.address.value;
     var addressRegex = /^[a-zA-Z0-9-., ?!]{4,}$/;
      if(address == "")
      {
        document.Reg_Form.address.focus();
        document.getElementById("erraddress").innerHTML = "Address is required!!";
        return false;
      }
      else if(!addressRegex.test(address))
      {
        document.Reg_Form.address.focus();
        document.getElementById("erraddress").innerHTML = "Use at least 4 Letter ";
        return false;
      }
  document.getElementById("erraddress").innerHTML = "";
  }

      function checkPassword(){
      var pass = document.Reg_Form.pass.value;
     var passRegex=/[$%@#]/;
     if(pass==''){

      document.getElementById("errpass").innerHTML = "Password can't be blank";

      return false;
    }
    if(!passRegex.test(pass)){
     
        document.getElementById("errpass").innerHTML = "Password must contain 1 special character";
       return false;
    }
    if(pass.length<8){
      document.getElementById("errpass").innerHTML = "Password must contain at least 8 character";
       return false;

    }
   document.getElementById("errpass").innerHTML = "";
  }

   function checkConfirmPassword(){
      var cpass = document.Reg_Form.cpass.value;
        var pass = document.Reg_Form.pass.value;
     //var passRegex=/[$%@#]/;
     if(cpass == "")
      {
        document.Reg_Form.cpass.focus();
        document.getElementById("errcpass").innerHTML = "Confirm Password cannt empty!!";
        return false;
      }
      else if(cpass !=  pass)
      {
       document.Reg_Form.cpass.focus();
       document.getElementById("errcpass").innerHTML = "Both Password must be same";
       return false;
      }
document.getElementById("errcpass").innerHTML = "";
  }
  

   function checkImage()
    {
      var picture = document.Reg_Form.picture.value;
      var file_ext = /(\.jpg|\.jpeg|\.bmp|\.gif|\.png)$/i;
      var size = document.getElementById("image").files[0];

      //Image
      if(picture == "")
      {
        document.Reg_Form.picture.focus();
        document.getElementById("errimg").innerHTML = "Image is required";
        return false;
      }
      else if(!file_ext.exec(picture))
      {
        document.getElementById("errimg").innerHTML = "Extension not allowed, please choose a JPEG or PNG or JPG file.";
        return false;
      }
      else if (size.size > 4194304)
      {
        document.getElementById("errimg").innerHTML = "File size must not be greater than 4 MB";
        return false;
      }
      else
      {
        document.getElementById("errimg").innerHTML = "";
      }
    }

  // function checkImage(){
  //     var image = document.Reg_Form.picture.value;
  //    if(image == "")
  //     {
  //       document.Reg_Form.image.focus();
  //       document.getElementById("errimg").innerHTML = "Select Your Image";
  //       return false;
  //     }

  // }


  //   function checkGender(){
  //    var radiobutton = document.Reg_Form.gender.value;
  //    if(document.Reg_Form.gender[0].checked == false && document.Reg_Form.gender[1].checked == false && document.Reg_Form.gender[2].checked == false)
  //     {
  //       document.Reg_Form.gender.value;
  //       document.getElementById("errgender").innerHTML = "Gender must be selected";
  //       return false;
  //     }
  // }

  // function checkDOB(){
  //      var dob = document.Reg_Form.dob.value;
  //     if(dob == "")
  //     {
  //       document.Reg_Form.dob.focus();
  //       document.getElementById("errdob").innerHTML = "Select your Date Of Birth";
  //       return false;
  //     }
  // }
    function validation()
    {
      // document.getElementById("errname").innerHTML="";
      // document.getElementById("errfname").innerHTML="";
      // document.getElementById("errmname").innerHTML="";
      // document.getElementById("erremail").innerHTML="";
      // document.getElementById("erraddress").innerHTML="";
      // document.getElementById("errpass").innerHTML="";
      // document.getElementById("errcpass").innerHTML="";
      document.getElementById("errimg").innerHTML="";
      document.getElementById("errgender").innerHTML="";
      document.getElementById("errdob").innerHTML="";


      if(checkName()==false){
        return false;
      }

       if(checkFname()==false){
        return false;
      }
      
      if(checkMname()==false){
        return false;
      }
      
       if(checkEmail()==false){
        return false;
      }


       if(checkAdress()==false){
        return false;
      }

      if(checkPassword()==false){
        return false;
      }


      if(checkConfirmPassword()==false){
        return false;
      }

      if(checkImage()==false){
        return false;
      }


      
       if(checkDob()==false){
        return false;
      }

      // if(checkConfirmPassword()==false){
      //   return false;
      // }

        
     // var nameRegex = /^[a-zA-Z-' ]*$/;
      // var fnameRegex = /^[a-zA-Z-. ?!]{5,}$/;
      // var mnameRegex = /^[a-zA-Z-. ?!]{5,}$/;
      // var addressRegex = /^[a-zA-Z0-9-., ?!]{6,}$/;
     // var addressRegex = /^[A-Za-z]+$/;
     // var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
     // var passRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
     // var passRegex=/[$%@#]/;
      
     //  var name = document.Reg_Form.name.value;
     //  var fname = document.Reg_Form.fname.value;
     //  var mname = document.Reg_Form.mname.value;
     //  var address = document.Reg_Form.address.value;
     //  var email = document.Reg_Form.email.value;
     //  var pass = document.Reg_Form.pass.value;
     // // var pass =  document.getElementById("pass").value;
     //  var cpass = document.Reg_Form.cpass.value;
      var radiobutton = document.Reg_Form.gender.value;
     // var dob = document.Reg_Form.dob.value;
     // var image = document.Reg_Form.picture.value;
      var errorflag=0;
      // var x = document.Reg_Form.x.value;
        console.log(countWords(name));
    
   
    
      //Image
      // if(image == "")
      // {
      //   document.Reg_Form.image.focus();
      //   document.getElementById("errimg").innerHTML = "Select Your Image";
      //  // var errorflag=1;
      //   return false;
      // }
      //Gender
      if(document.Reg_Form.gender[0].checked == false && document.Reg_Form.gender[1].checked == false && document.Reg_Form.gender[2].checked == false)
      {
        document.Reg_Form.gender.value;
        document.getElementById("errgender").innerHTML = "Gender must be selected";
        //var errorflag=1;
        return false;
      }
      //Date Of Birth
      // if(dob == "")
      // {
      //   document.Reg_Form.dob.focus();
      //   document.getElementById("errdob").innerHTML = "Select your Date Of Birth(MUST be 18 years old)";
      //   //var errorflag=1;
      //   return false;
      // }

    //   if(errorflag==1){
    //   return false;

    // }
      if(name != ''  && fname  != '' && mname  != '' && pass  != '' && cpass != '' && email != '' && address != '' && image != '' && radiobutton != '' && dob !=  '')
      {
        alert( "Submitting Registerform? ");
         return true;
      }

     
    }
  </script>
   

 </body>
 </html>