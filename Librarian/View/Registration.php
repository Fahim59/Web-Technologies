<?php  
 $message = '';  
 $check = 1;  


 $nameErr = $emailErr = $dobErr = $genderErr = $passErr = $cpassErr = $imageErr = $addressErr = "";
 $name = $email = $dd = $mm = $yyyy = $gender = $password = $cpassword = "";

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

  if (empty($_POST["dd"])) {
    $dobErr = "Empty Field";
    $check = 0;
  }else{
    $dd = $_POST["dd"];
    if ($dd<0 || $dd>31){
      $dobErr = "Invalid date ";
      $check = 0;
    }
  }

  if (empty($_POST["mm"])) {
    $dobErr = "Empty Field";
    $check = 0;
  }else{
    $mm = $_POST["mm"];
    if ($mm<0 || $mm>12){
      $dobErr = "Invalid month ";
      $check = 0;
    }
  }
  if (empty($_POST["yyyy"])) {
    $dobErr = "Empty Field";
    $check = 0;
  }else{
    $yyyy = $_POST["yyyy"];
    if ($yyyy<1953 || $yyyy>1998){
      $dobErr = "Year must be between 1953 and 1998";
      $check = 0;
    }
  }  

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
    $check = 0;
  } else {
    $gender = $_POST["gender"];
  }

    if (empty($_POST["password"])) {
      $passErr = "Password is required";
      $check = 0;
    }else {
      $password = $_POST["password"];
      $count = strlen("$password");
      if ((!preg_match("([@#$%])",$password)) || $count < 8 ) {
        $passErr = "Password must not be less than eight characters and  must contain at least one of the special characters (@, #, $, %) ";
        $check = 0;
      }

    }

    if (empty($_POST["cpassword"])) {
      $cpassErr = "Confirm password field is empty";
      $check = 0;
    }else {
      $cpassword = $_POST["cpassword"];
      if(strcmp($password, $cpassword)) {
        $cpassErr = "Must match with password";
        $check = 0;
      }
    }

    if (empty($_POST["address"])) {
      $addressErr = "Address field is empty";
      $check = 0;
    }

    if ($_FILES['picture']['name']=='') {
      $imageErr = "Picture field is empty";
      $check = 0;
    }elseif (isset(($_POST["submit"]))) {
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES["picture"]["name"]);
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $icheck = getimagesize($_FILES["picture"]["tmp_name"]);

      if($icheck == false) {
      $imageErr = "File is not an image.";
      $check = 0;
      }elseif ($_FILES["picture"]["size"] > 4000000) {
      $imageErr = "Picture size should not be more than 4MB. ";
      $check = 0;
      }elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
      $imageErr = "Picture format must be in jpeg or jpg or png. ";
      $check = 0;
      }
      
    }
    
 }

 
 if(isset($_POST["submit"]))  
  {
    if ($check == 1) { 
        $data['uid'] = $_POST['uid'];
        $data['name'] = $_POST['name'];  
        $data['email'] = $_POST["email"];  
        $data['password'] = $_POST["password"];
        $data['address'] = $_POST["address"];
        $data['gender'] = $_POST["gender"];
        $data['dd'] = $_POST["dd"];
        $data['mm'] = $_POST["mm"];
        $data['yyyy'] = $_POST["yyyy"];
        $data['picture'] = basename($_FILES["picture"]["name"]);

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
        
        include '../Controller/DataSave.php';
        if(DataSave($data)) {
          $message = "Data has been saved.";
        }else {
          $message = "Data hasn't saved.";
        }

      }
    } 
include '../Controller/GetUid.php';
$id =  GetUserId();
?> 

 <!DOCTYPE html>
 <html>
 <head>
 <style>
.error {color: #FF0000;}
</style>
  <title>Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <script>
    function ValidateRegForm(){
      var name = document.reg.name.value;
      var email = document.reg.email.value;
      var password = document.reg.password.value;
      var cpassword = document.reg.cpassword.value;
      var address = document.reg.address.value;
      var dd = document.reg.dd.value;
      var mm = document.reg.mm.value;
      var yyyy = document.reg.yyyy.value;
      var picture = document.getElementById("picture");

        
      if (name==null || name==""){  
        alert("Name can't be blank");  
        return false;  
      }else if(email==null || email==""){  
        alert("Email can't be blank");  
        return false;  
      }else if(password==null || password==""){  
        alert("Password can't be blank");  
        return false;  
      }else if(cpassword==null || cpassword==""){  
        alert("Confirm Password can't be blank");  
        return false;  
      }else if(address==null || address==""){  
        alert("Address can't be blank");  
        return false;  
      }else if(document.reg.gender[0].checked == false && document.reg.gender[1].checked == false && document.reg.gender[2].checked == false){ 
        alert("Gender can't be blank");  
        return false;  
      }else if(dd==null || dd==""){  
        alert("Day can't be blank");  
        return false;  
      }else if(mm==null || mm==""){  
        alert("Month can't be blank");  
        return false;  
      }else if(yyyy==null || yyyy==""){  
        alert("Year can't be blank");  
        return false;  
      }else if(picture.files.length == 0){  
        alert("Picture field can't be blank");  
        return false;  
      }

    }


    function CheckName() {
      var name = document.reg.name.value;
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
     var email = document.reg.email.value;
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


    function CheckPass() {
      var password = document.reg.password.value;
      var passRe = /[$%@#]/;
      if (document.getElementById("password").value == "") {
          document.getElementById("passErr").innerHTML = "Password can't be blank";
          document.getElementById("passErr").style.color = "red";
          document.getElementById("password").style.borderColor = "red";
      }else if(!passRe.test(password)){
        document.getElementById("passErr").innerHTML = "Password must contain at least one of the special characters (@, #, $, %) ";
        document.getElementById("passErr").style.color = "red";
        document.getElementById("password").style.borderColor = "red";
      }else if(password.length<8){
        document.getElementById("passErr").innerHTML = " Password must not be less than eight characters ";
        document.getElementById("passErr").style.color = "red";
        document.getElementById("password").style.borderColor = "red";
      }else{
        document.getElementById("passErr").innerHTML = "";
        document.getElementById("password").style.borderColor = "black";
      }
    }

    function CheckCpass() {
      var password = document.reg.password.value;
      var cpassword = document.reg.cpassword.value;

      if (document.getElementById("cpassword").value == "") {
          document.getElementById("cpassErr").innerHTML = " Confirm password can't be blank";
          document.getElementById("cpassErr").style.color = "red";
          document.getElementById("cpassword").style.borderColor = "red";
      }else if(cpassword != password){
        document.getElementById("cpassErr").innerHTML = " Must match with password";
        document.getElementById("cpassErr").style.color = "red";
        document.getElementById("cpassword").style.borderColor = "red";
      }else{
        document.getElementById("cpassErr").innerHTML = "";
        document.getElementById("cpassword").style.borderColor = "black";
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

    function CheckDD() {
      var dd = document.reg.dd.value;
      if (document.getElementById("dd").value == "") {
          document.getElementById("dobErr").innerHTML = " Day field is empty";
          document.getElementById("dobErr").style.color = "red";
          document.getElementById("dd").style.borderColor = "red";
      }else if(dd < 1 || dd > 31){
        document.getElementById("dobErr").innerHTML = " Invalid Day";
        document.getElementById("dobErr").style.color = "red";
        document.getElementById("dd").style.borderColor = "red";
      }else{
        document.getElementById("dobErr").innerHTML = "";
        document.getElementById("dd").style.borderColor = "black";
      }
    }

    function CheckMM() {
      var mm = document.reg.mm.value;
      if (document.getElementById("mm").value == "") {
          document.getElementById("dobErr").innerHTML = " Month field is empty";
          document.getElementById("dobErr").style.color = "red";
          document.getElementById("mm").style.borderColor = "red";
      }else if(mm < 1 || mm > 12){
        document.getElementById("dobErr").innerHTML = " Invalid Month";
        document.getElementById("dobErr").style.color = "red";
        document.getElementById("mm").style.borderColor = "red";
      }else{
        document.getElementById("dobErr").innerHTML = "";
        document.getElementById("mm").style.borderColor = "black";
      }
    }

    function CheckYY() {
      var yyyy = document.reg.yyyy.value;
      if (document.getElementById("yyyy").value == "") {
          document.getElementById("dobErr").innerHTML = " Year field is empty";
          document.getElementById("dobErr").style.color = "red";
          document.getElementById("yyyy").style.borderColor = "red";
      }else if(yyyy < 1953 || yyyy > 1998){
        document.getElementById("dobErr").innerHTML = " Year must be between 1953 and 1998";
        document.getElementById("dobErr").style.color = "red";
        document.getElementById("yyyy").style.borderColor = "red";
      }else{
        document.getElementById("dobErr").innerHTML = "";
        document.getElementById("yyyy").style.borderColor = "black";
      }
    }
  </script>
 </head>
 <body>
  <?php include('RHeader.php');?>
  <form method="post" name="reg" action="" enctype="multipart/form-data" onsubmit="ValidateRegForm()">
    <fieldset style="margin-left: 35px">
      <legend><b>REGISTRATION</b></legend>
      <label>User ID: </label>
      <input type="text" name="uid" value="<?php echo $id;?>" readonly><hr>
      <label>Name: </label>
      <input type="text" id="name" name="name" onkeyup="CheckName()" onblur="CheckName()">
      <span class="error" id="nameErr" ><?php echo $nameErr;?></span><hr>
      <label>Email: </label>
      <input type="text" id="email" name="email" onkeyup="CheckMail()" onblur="CheckMail()" size="40">
      <span class="error" id="emailErr" ><?php echo $emailErr;?></span><hr>
      <label>Password: </label>
      <input type="password" id="password" name="password" onkeyup="CheckPass()" onblur="CheckPass()">
      <span class="error" id="passErr" ><?php echo $passErr;?></span><hr>
      <label>Confirm Password: </label>
      <input type="password" id="cpassword" name="cpassword" onkeyup="CheckCpass()" onblur="CheckCpass()">
      <span class="error" id="cpassErr" ><?php echo $cpassErr;?></span><hr>
      <label>Address: </label>
      <input type="text" id="address" name="address" size="80" onkeyup="CheckAdd()" onblur="CheckAdd()">
      <span class="error" id="addressErr" ><?php echo $addressErr;?></span><hr>
      <fieldset>
        <legend>Gender</legend>
        <input type="radio" id="gender" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female">Female
        <input type="radio" id="gender" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Male">Male
        <input type="radio" id="gender" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Other">Other  
        <span class="error" id="genderErr" ><?php echo $genderErr;?></span>
      </fieldset><hr>
      <fieldset>
        <legend>Date of Birth</legend>
        <input type="text" id="dd" name="dd" size="4" onkeyup="CheckDD()" onblur="CheckDD()"> /
        <input type="text" id="mm" name="mm" size="4" onkeyup="CheckMM()" onblur="CheckMM()"> /
        <input type="text" id="yyyy" name="yyyy" size="8" onkeyup="CheckYY()" onblur="CheckYY()">
        (dd /mm/ yyyy)
        <span class="error" id="dobErr" ><?php echo $dobErr;?></span>
      </fieldset><hr>
      <fieldset>
        <legend>Profile Picture</legend>
        <input type="file" id="picture" name="picture">
        <span class="error" id="imageErr"><?php echo $imageErr;?></span><hr>
      </fieldset><hr><br><br>
      <input type="submit" name="submit" value="Submit">
      <input type="reset" name="reset" value="Reset">
    </fieldset><br><br>

    <?php   
      if(isset($message))  
        {  
          echo $message;  
        }
    ?> 
  </form>
 <?php include('Footer.php');?>
 </body>
 </html>