<!DOCTYPE html>
<html>
<head>
  <style >
    .error
    {
      color: red;
    }
  </style>
</head>
<body>

<?php
$error = '';
$message = '';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      //Name
      if(empty($_POST["name"]))  
      {  
        $error = "<label class='text-danger'>Enter Name</label>";  
      }
      else if(preg_match("/^[0-9]/", ($_POST["name"])))
      {
        $error = "<label class='text-danger'>Letters Only</label>";
      } 
      else if(!preg_match("/^[a-zA-Z-. ?!]{2,}$/",($_POST["name"])))
      {
        $error = "<label class='text-danger'>At least two words and can only contain letters,period,dash</label>";
      }

      //Email
      else if(empty($_POST["email"]))
      {
        $error = "<label class='text-danger'>Email is required</label>";
      }
      else if(!filter_var(($_POST["email"]), FILTER_VALIDATE_EMAIL))
      {
        $error = "<label class='text-danger'>Invalid email format. Format: example@something.com</label>";
      }

      //Date Of Birth
      else if(empty($_POST["dd"]) or empty($_POST["mm"]) or empty($_POST["yyyy"]))
      {
        $error = "<label class='text-danger'>Fill up all the fields</label>";
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
        $error = "<label class='text-danger'>Must be valid numbers(dd:1-31,mm: 1-12,yyyy: 1950-2000)</label>";
      }

      //Gender
      else if(!isset($_POST["gender"]))
      {
        $error = "<label class='text-danger'>At least one of the Gender must be selected</label>";
      }

      //User Name && Password
      else if(empty($_POST["id"]))
      {
        $error = "<label class='text-danger'>Username is requied</label>";
      }
      else if(empty($_POST["pass"]) && empty($_POST["cpass"]))
      {
        $error = "<label class='text-danger'>Password can't be empty!</label>";
      }
      else if(!preg_match("/^[a-zA-Z0-9-. ?!]{2,}$/",($_POST["id"])))
      {
        $error = "<label class='text-danger'>At least two characters and can only contain alpha numeric characters,letters,period,dash</label>";
      }

      else if (strlen($_POST["pass"]) <= 7) 
      {
        $error = "<label class='text-danger'>Your Password Must Contain At Least 8 Characters!</label>";
      }
      else if(!preg_match("#[a-zA-Z0-9-. ?!]+#",($_POST["pass"]))) 
      {
        $error = "<label class='text-danger'>Your Password Must Contain At Least one Number or Character!</label>";
      }
      /*else if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pass))*/
      else if(!preg_match('/[$%@#]/', ($_POST["pass"])))
      {
        $error = "<label class='text-danger'>Your Password Must Contain At Least one special character(@,#,$,%)!</label>";
      }
      else if(($_POST["pass"]) != ($_POST["cpass"]))
      {
        $error = "<label class='text-danger'>Password and Confirm password must be same!</label>";
      }
      else
      {
        if(file_exists('data.json'))
        {  
          $current_data = file_get_contents('data.json');  
          $array_data = json_decode($current_data, true);  
          $extra = array(  
            'name'            =>     $_POST['name'],
            'email'           =>     $_POST['email'],
            'id'              =>     $_POST['id'],
            'pass'            =>     $_POST['pass'],
            'cpass'           =>     $_POST['cpass'],
            'gender'          =>     $_POST["gender"],
            'dd'              =>     $_POST["dd"],
            'mm'              =>     $_POST["mm"],
            'yyyy'            =>     $_POST["yyyy"]);

          $array_data[] = $extra;
          $final_data = json_encode($array_data);

          if(file_put_contents('data.json', $final_data))
          {  
            $message = "<label class='text-success'>File Appended Successfully</p>";
          }
        }
        else  
        {  
          $error = 'JSON File not exits';
        }
      }
    }
?>

<!DOCTYPE html>
  <html>
      <head>
           <title>Append Data to JSON File using PHP</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      </head>

  <body>
    <br/>
      <div class="container" style="width:500px;">
          <h3 align="">REGISTRATION</h3>
          <form method="post">

<?php                    
  if(isset($error))
  {
    echo $error;
  }
?>

<br />  
<label>Name</label>  
<input type="text" name="name" class="form-control" /><br />  
<label>Email</label>  
<input type="text" name="email" class="form-control" /><br />  
<label>User Name</label>  
<input type="text" name="id" class="form-control" /><br />
<label>Password</label>  
<input type="text" name="pass" class="form-control" /><br />
<label>Confirm Password</label>  
<input type="text" name="cpass" class="form-control" /><br /> 

<label>Gender</label> <br />
<input  type="radio" name="gender"<?php if(isset($gender) && $gender=="male") echo "checked";?> value="Male">Male

<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female">Female  

<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Other">Other

</br></br>

<label>Date Of Birth</label>
<table>
<tr style="text-align: center;">
  <th style="font-weight: normal;"><label for="dd" >dd</label></th>
  <th></th>
  <th style="font-weight: normal;"><label for="mm" >mm</label></th>
  <th></th>
  <th style="font-weight: normal;"><label for="yyyy" >yyyy</label></th>
  <th></th>
</tr>

<tr>
<td><input type="text" name="dd" style="width: 50px"></td>
<td>/</td>
<td><input type="text" name="mm" style="width: 50px"></td>
<td>/</td>
<td><input type="text" name="yyyy" style="width: 50px;"></td>
</tr>

</table>
</br>

<input type="submit" name="submit" value="Submit" class="btn btn-info">
<input type="reset" name="reset" value="Reset" class="btn btn-info" /><br />
<?php  
if(isset($message))  
{  
  echo $message;  
}  
?> 
</form>
</div>
</body>
</html>