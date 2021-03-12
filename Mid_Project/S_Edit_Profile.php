<?php include('header_footer/headerL.php');?>
<?php include('header_footer/Adminsidebar.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
</head>
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
  </style>
<body>
<?php

$name = $mname = $fname = $email = $address = $pass = $cpass = $dd = $mm = $yyyy = $gender = $class ="";
$ername = $ermname = $erfname = $eremail = $eradd = $erdob = $ergender = $erpass = $ercpass = $erclass ="";
$error = $message = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      //Name
      if(empty($_POST["name"]))  
      {  
        $ername = "Enter Name";
        //echo "ID or Password can't be empty!";
      }
      else if(preg_match("/^[0-9]/", ($_POST["name"])))
      {
        $ername = "Letters Only";
      } 
      else if(!preg_match("/^[a-zA-Z-. ?!]{2,}$/",($_POST["name"])))
      {
        $ername = "At least two words and can only contain letters,period,dash";
      }
      //Mother Name
      else if(empty($_POST["mname"]))  
      {  
        $ermname = "Enter Mother Name";
        //echo "ID or Password can't be empty!";
      }
      else if(preg_match("/^[0-9]/", ($_POST["mname"])))
      {
        $ermname = "Letters Only";
      } 
      else if(!preg_match("/^[a-zA-Z-. ?!]{2,}$/",($_POST["mname"])))
      {
        $ermname = "At least two words and can only contain letters,period,dash";
      }
      //Father Name
      else if(empty($_POST["fname"]))  
      {  
        $erfname = "Enter Father Name";
        //echo "ID or Password can't be empty!";
      }
      else if(preg_match("/^[0-9]/", ($_POST["fname"])))
      {
        $erfname = "Letters Only";
      } 
      else if(!preg_match("/^[a-zA-Z-. ?!]{2,}$/",($_POST["fname"])))
      {
        $erfname = "At least two words and can only contain letters,period,dash";
      }

      //Email
      else if(empty($_POST["email"]))
      {
        $eremail = "Email is required";
      }
      else if(!filter_var(($_POST["email"]), FILTER_VALIDATE_EMAIL))
      {
        $eremail = "Invalid email format. Format: example@something.com";
      }

      //Date Of Birth
      else if(empty($_POST["dd"]) or empty($_POST["mm"]) or empty($_POST["yyyy"]))
      {
        $erdob = "Fill up all the fields";
      }
      else if( !filter_var(($_POST["dd"]),FILTER_VALIDATE_INT,array('options' => array(
                'min_range' => 1, 
                'max_range' => 31
            )))|!filter_var(($_POST["mm"]),FILTER_VALIDATE_INT,array('options' => array(
                'min_range' => 1, 
                'max_range' => 12
            )))|!filter_var(($_POST["yyyy"]),FILTER_VALIDATE_INT,array('options' => array(
                'min_range' => 1950, 
                'max_range' => 2000
            ))))
      {
        $erdob = "Must be valid numbers(dd:1-31,mm: 1-12,yyyy: 1950-2000)";
      }

      //Gender
      else if(!isset($_POST["gender"]))
      {
        $ergender = "At least one of the Gender must be selected";
      }

      //Address
      else if(empty($_POST["address"]))
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
      else if(empty($_POST["pass"]) && empty($_POST["cpass"]))
      {
        $erpass = "Password can't be empty!";
      }
      else if (strlen($_POST["pass"]) <= 7) 
      {
        $erpass = "Your Password Must Contain At Least 8 Characters!";
      }
      else if(!preg_match("#[a-zA-Z0-9-. ?!]+#",($_POST["pass"]))) 
      {
        $erpass = "Your Password Must Contain At Least one Number or Character!";
      }
      /*else if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pass))*/
      else if(!preg_match('/[$%@#]/', ($_POST["pass"])))
      {
        $erpass = "Your Password Must Contain At Least one special character(@,#,$,%)!";
      }
      else if(($_POST["pass"]) != ($_POST["cpass"]))
      {
        $ercpass = "Password and Confirm password must be same!";
      }
      //Class
      else if(empty($_POST["class"]))  
      {  
        $erclass = "Enter Your Class";
        //echo "ID or Password can't be empty!";
      }
      else if(!filter_var(($_POST["class"]),FILTER_VALIDATE_INT,array('options' => array('min_range' => 6,'max_range' => 10))))
      {
        $erclass = "6 to 10 Only";
      }
    }
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">
  <fieldset>
    <legend class="text"><b>STUDENT PROFILE EDIT</b></legend>
  <form>
    <br/>

    <center><input type="text" name="valueToSearch" placeholder="Enter Student ID">
    <input type="submit" name="search" value="Search"><br><br><hr/>

    <table width="100%" cellpadding="0" cellspacing="0">

      <tr>
        <?php 

        $data = file_get_contents("database/student/data.json");
        $data = json_decode($data, true);
        foreach($data as $row){}
        ?>

        <td>Name</td>
        <td>:</td>
        <td><input name="name" type="text" value="<?php echo $row["name"];?>"></td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Mother Name</td>
        <td>:</td>
        <td>
          <input name="mname" type="text" value="<?php echo $row["mname"];?>">
        </td>
        <td></td>
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Father Name</td>
        <td>:</td>
        <td>
          <input name="fname" type="text" value="<?php echo $row["fname"];?>">
        </td>
        <td></td>
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Email</td>
        <td>:</td>
        <td>
          <input name="email" type="text" value="<?php echo $row["email"];?>">
        </td>
        <td></td>
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Address</td>
        <td>:</td>
        <td>
          <input name="address" type="text" value="<?php echo $row["address"];?>">
        </td>
        <td></td>
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Gender</td>
        <td>:</td>
        <td>   
          <input name="gender" type="radio" checked="checked">Male
          <input name="gender" type="radio" checked="checked"><?php echo $row["gender"];?>
          <input name="gender" type="radio">Other
        </td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td valign="top">Date of Birth</td>
        <td valign="top">:</td>
        <td>
          <input name="dob" type="text" value="<?php echo $row["dd"]."-".$row["mm"]."-".$row["yyyy"];?>">
          <br/>
          <font size="2"><i>(dd/mm/yyyy)</i></font>
        </td>
        <td></td>
      </tr>
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Class</td>
        <td>:</td>
        <td>
          <input name="class" type="text" value="<?php echo $row["class"];?>">
        </td>
        <td></td>
      <td colspan="4"><hr/></td>

    </table>
    <hr/>
    <center><input type="submit" value="Submit">    
  </form>
</fieldset>

</form>
</body>
</html>