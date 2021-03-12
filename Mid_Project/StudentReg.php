<?php include('header_footer/header1.php');?>
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
$ername = $ermname = $erfname = $eremail = $eradd = $erdob = $ergender = $erpass = $ercpass = $erclass = "";
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
      else
      {
        if(file_exists('database/student/data.json'))
        {  
          $current_data = file_get_contents('database/student/data.json');  
          $array_data = json_decode($current_data, true);  
          $extra = array(  
            'name'            =>     $_POST['name'],
            'mname'           =>     $_POST['mname'],
            'fname'           =>     $_POST['fname'],
            'email'           =>     $_POST['email'],
            'address'         =>     $_POST['address'],
            'gender'          =>     $_POST["gender"],
            'class'           =>     $_POST['class'],
            'dd'              =>     $_POST["dd"],
            'mm'              =>     $_POST["mm"],
            'yyyy'            =>     $_POST["yyyy"]);

          $array_data[] = $extra;
          $final_data = json_encode($array_data);

          if(file_put_contents('database/student/data.json', $final_data))
          {  
            echo "Successfully Registered";
          }
        }
        else  
        {  
          echo "JSON File not exits";
        }
      }
    }
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">
  <fieldset style="width: 1000px;" align="left">
  
  <legend class="text"><b>STUDENT REGISTRATION</b></legend>
  
  <label for="name" >Name<span class="error">* </label>
  <input type="text" name="name" value="<?php echo $name;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ername;?> </span><br>
  <hr>

  <label for="mname" >Mother Name<span class="error">* </label>
  <input type="text" name="mname" value="<?php echo $mname;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ermname;?> </span><br>
  <hr>

  <label for="fname" >Father Name<span class="error">* </label>
  <input type="text" name="fname" value="<?php echo $fname;?>" ><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erfname;?> </span><br>
  <hr>

  <label for="email" >Email<span class="error">* </label>
  <input type="text" name="email" value="<?php echo $email;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eremail;?></span><br>
  <hr>

  <label for="id" >Address<span class="error">* </label>
  <input type="text" name="address" value="<?php echo $address;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $eradd;?></span><br>
  <hr>

  <label for="pass" >Password<span class="error">* </label>
  <input type="password" name="pass" value="<?php echo $pass;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erpass;?></span><br>
  <hr>

  <label for="cpass" >Confirm Password<span class="error">* </label>
  <input type="password" name="cpass" value="<?php echo $cpass;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ercpass;?></span><br>
  <hr>

  <label for="class" >Class<span class="error">* </label>
  <input type="text" name="class" value="<?php echo $class;?>"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erclass;?></span><br>
  <hr>
  
  <fieldset style="width: 1000px; ">
  <legend><b>Gender</b></legend>
  <input  type="radio" name="gender"<?php if(isset($gender) && $gender=="male") echo "checked";?> value="Male">Male

  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female">Female  

  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Other">Other 
  <br>  
  <span class="error"><?php echo "&nbsp&nbsp"?><?php echo $ergender;?></span >   

  </fieldset>

  <fieldset style="width: 1000px; ">
  <legend><b>Date of Birth</legend>
  <table>

  <tr>
    <td><input type="text" name="dd" style="width: 40px" value="<?php echo $dd;?>"></td>
    <td>/</td>
    <td><input type="text" name="mm" style="width: 40px" value="<?php echo $mm;?>"></td>
    <td>/</td>
    <td><input type="text" name="yyyy" style="width: 40px;" value="<?php echo $yyyy;?>"></td>

    <th style="font-weight: normal;"><label for="dd" >dd/</label></th>
    <th style="font-weight: normal;"><label for="mm" >mm/</label></th>
    <th style="font-weight: normal;"><label for="yyyy">yyyy</label></th>

    <td style="padding-left: 10px"><span class="error"><?php echo "&nbsp&nbsp"?><?php echo $erdob;?></span></td>
  </tr>

  </table>
  </fieldset>
  <hr>

  <center><input type="submit" name="submit" value="Submit" style="width: 60px"><span class="error"><?php echo $error;?>
  <form action="Registration.php">
  <input type="reset" name="reset" value="Reset" style="width: 60px"><span class="error"><?php echo $message;?>
  <br/><br>
  <center>Already Register? <a href="Login.php">Login</a></center>
  </form>
</fieldset>

</form>
</body>
</html>