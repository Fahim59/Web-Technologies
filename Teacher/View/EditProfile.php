<?php include "../Model/model.php"; ?>
<?php include "../Controller/HeaderL.php"; ?>
<?php  include('../Model/Sidebar.php');?>


 <?php 
$name=$fname=$mname=$email=$uname=$address=$pass=$cpass=$dob=$gender = $picture=$image = $uid ="";"";
$ename=$efname=$emname=$eemail=$eimg=$eaddress=$epass=$ecpass=$edob=$egender= $eimg= $eruid = "";
$error=$message = "";
$errorFlag=0;


if($_SERVER["REQUEST_METHOD"] == "POST")
    {



    
      if(empty($_POST["name"]))  
      {  
          $ename = "Please Enter your Name";
          $errorFlag=1;
           
      }
    
       else {
       $name = $_POST["name"];
       $count = str_word_count("$name");
      if ((!preg_match("/^[a-zA-Z-' ]*$/",$name)) || $count < 2 ){
        $ename = "Only letters and white space allowed and contains at least two words";
        $errorFlag=1;
         
       } 
       }

      if(empty($_POST["fname"]))  
      {  
          $efname = "Please Enter your Father Name";
          $errorFlag=1;
            
      }
     
       else {
       $fname = $_POST["fname"];
       $count = str_word_count("$fname");
        if ((!preg_match("/^[a-zA-Z-' ]*$/",$fname)) || $count < 2 ){
        $efname = "Only letters and white space allowed and contains at least two words";
        $errorFlag=1;
          
       } 
       }
      if(empty($_POST["mname"]))  
      {  
          $emname = "Please Enter your Mother Name";
          $errorFlag=1;
           
      }
      
          else {
       $mname = $_POST["mname"];
       $count = str_word_count("$mname");
      if ((!preg_match("/^[a-zA-Z-' ]*$/",$mname)) || $count < 2 ){
        $emname = "Only letters and white space allowed and contains at least two words";
        $errorFlag=1;
          
       } 
       }
      if(empty($_POST["email"]))
      {
          $eemail = "Please Enter your Email Address ";
          $errorFlag=1;
            
      }
      else if(!filter_var(($_POST["email"]), FILTER_VALIDATE_EMAIL))
      {
          $eemail = "Invalid email format";
          $errorFlag=1;
          
      }


      if(empty($_POST["dob"]))
      {
          $edob = "  Please Select ";
          $errorFlag=1;
            
      }
      
     

      if(!isset($_POST["gender"]))
      {
          $egender = "At least one of the Gender must be selected";
          $errorFlag=1;
           
      }

       if(empty($_POST["address"]))
      {
          $eaddress = "Please Enter your Address";
          $errorFlag=1;
         
      }
      

 else if( strlen($_POST["address"])<4)
      {
        
         $eaddress = "AT least 4 letter ";
         $errorFlag=1;
          
      }



      if(!empty($_FILES["picture"]["name"]))
      {
           // Image upload 
    $target_dir = "../Upload/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if file already exists
   /* if (file_exists($target_dir)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }*/
    // Check file size
    if ($_FILES["picture"]["size"] > 4000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats

        if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg")
        {
             if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                        // echo "The file ".$target_dir. basename( $_FILES["picture"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }

        }

        else{
           $eimg = "Enter Image";
        $errorFlag=1;
          
        }
      }
      if($errorFlag==0){
        EditProfile();
        // echo "all okk";
      }

      // else{
        // echo "Error found";
      // }
   

     
      
    

      
 }
   
         
 ?>





<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>

   <style>
       
    
       .error {color: #FF0000;}
    </style>
	
</head>
<body>

<fieldset>
	<?php
		$data=ViewProfile();
		// echo $data['uid'];
	?>
    <legend><b>EDIT PROFILE</b></legend>

<div id="ename" style="color: red;"></div>
	<form method="post" name="Reg_Form"  onsubmit=" return validation();" enctype="multipart/form-data" >
		<br/>
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td>Name :</td>
				<!-- <td>:</td> -->
				<td><input name="name" type="text" onkeyup="checkName()" value="<?php echo $data["name"];?>">
          <span class="error" id="errname"><?php echo $ename;?></span>

        </td>
        <td></td>
         <td></td>


			</tr>		
      <tr><td colspan="4"><hr/></td></tr>

<tr>
  <td>Image :</td>
  <!-- <td>:</td> -->

     <td  align="" width="300px">
          <img width="128"  src="../Upload/<?php echo $data['picture']; ?>"/>
                   
        </td>

        <td colspan="2">
           <span class="error" id="errimg"><?php echo $eimg;?></span>
        </td>
          
      
</tr>
<!-- <tr><td colspan="4"><hr/></td></tr> -->
<tr>
  <td></td>
        
       <td>
        <input type="file" name="picture">   
        </td>
</tr>

			<tr><td colspan="4"><hr/></td></tr>
			<td>Father Name :</td>
				<td><input name="fname" type="text" onkeyup="checkFname()" value="<?php echo $data["fname"];?>">
          <span class="error" id="errfname"><?php echo $efname;?></span>
        </td>
				
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<td>Mother Name :</td>
				<td><input name="mname" type="text" onkeyup="checkMname()" value="<?php echo $data["mname"];?>">
          <span class="error" id="errmname"><?php echo $emname;?></span>
        </td>
				
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Email :</td>
				<!-- <td>:</td> -->
				<td>
					<input name="email" type="text" onkeyup="checkEmail()" value="<?php echo $data["email"];?>">
          <span class="error" id="erremail"><?php echo $eemail;?></span>
				</td>
				
				<td></td>
			

			<tr><td colspan="4"><hr/></td></tr>
			<td>Address:</td>
				<!-- <td>:</td> -->
				<td><input name="address" type="text" onkeyup="checkAdress()" value="<?php echo $data["address"];?>">
          <span class="error"  id="erraddress"><?php echo $eaddress;?></span>
        </td>
				
				<td></td>
			</tr> 	
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Gender :</td>
				<!-- <td>:</td> -->
				<td>   
					<input name="gender" type="radio" value="Male" <?php if($data["gender"]=='Male') echo "checked"; ?>> Male
					<input name="gender" type="radio" value="Female"<?php if($data["gender"]=='Female') echo "checked"; ?>>Female
					<input name="gender" type="radio" value="Other" <?php if($data["gender"]=='Other') echo "checked"; ?>>Other
          
				</td>
				
				<td><span class="error" id="errgender"><?php echo $egender;?></span></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td valign="top">Date of Birth :</td>
				<!-- <td valign="top"></td> -->
				<td>
					<input name="dob" onkeyup="checkDob()" type="date" value="<?php echo $data["dob"];?>">
					<br/>
					<font size="2"><i>(dd/mm/yyyy)</i></font>
          <span class="error"  id="errdob"><?php echo $edob;?></span>
				</td>
				
				<td><input type="submit" value="Submit">  </td>
			</tr>
		</table>
		<hr/>
		<!-- <input type="submit" value="Submit">		 -->
	</form>
</fieldset>



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
        document.getElementById("erraddress").innerHTML = "Use at least 4 Letter";
        return false;
      }
  document.getElementById("erraddress").innerHTML = "";
  }

  function countWords(str) {
    return str.trim().split(/\s+/).length;
  }
   
    function validation()
    {
      document.getElementById("errname").innerHTML="";
      document.getElementById("errfname").innerHTML="";
      document.getElementById("errmname").innerHTML="";
      document.getElementById("erremail").innerHTML="";
      document.getElementById("erraddress").innerHTML="";
      // document.getElementById("errimg").innerHTML="";
      // document.getElementById("errgender").innerHTML="";
      document.getElementById("errdob").innerHTML="";
     
      var nameRegex = /^[a-zA-Z-' ]*$/;
      // var fnameRegex = /^[a-zA-Z-. ?!]{5,}$/;
      // var mnameRegex = /^[a-zA-Z-. ?!]{5,}$/;
      // var addressRegex = /^[a-zA-Z0-9-., ?!]{6,}$/;
      var addressRegex = /^[A-Za-z]+$/;
      var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
     // var passRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
      var passRegex=/[$%@#]/;
      
      var name = document.Reg_Form.name.value;
      var fname = document.Reg_Form.fname.value;
      var mname = document.Reg_Form.mname.value;
      var address = document.Reg_Form.address.value;
      var email = document.Reg_Form.email.value;
    
      var radiobutton = document.Reg_Form.gender.value;
      var dob = document.Reg_Form.dob.value;
      var image = document.Reg_Form.picture.value;
      // var x = document.Reg_Form.x.value;
        console.log(countWords(name));
      //Name
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

       //Father Name
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
       if(+countWords(fname)<+2){
        document.Reg_Form.name.focus();
        document.getElementById("errfname").innerHTML = "Father Name At least two words and can only contain letters,period,dash";

        
        return false;
      }
      //Mother Name
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
        document.Reg_Form.name.focus();
        document.getElementById("errmname").innerHTML = "Mother Name At least two words and can only contain letters,period,dash";

        
        return false;
      }
     
      //Email
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
      
      //Password

     // var pass =  document.getElementById("pass").value;

      
   
    
      //Image
      // if(image == "")
      // {
      //   document.Reg_Form.picture.focus();
      //   document.getElementById("ename").innerHTML = "Select Your Image";
      //   return false;
      // }
      //Gender
      if(document.Reg_Form.gender[0].checked == false && document.Reg_Form.gender[1].checked == false && document.Reg_Form.gender[2].checked == false)
      {
        document.Reg_Form.gender.value;
        document.getElementById("errgender").innerHTML = "Gender must be selected";
        return false;
      }
      //Date Of Birth
      if(checkDob()==false){
        return false;
      }

      
      if(name != '' && mname  != '' && fname  != ''  && email != '' && address != '' && radiobutton != '' && dob !=  '')
      {
        alert( "Submitting Registerform? ");
         return true;
      }

     
    }
  </script>

</body>
</html>