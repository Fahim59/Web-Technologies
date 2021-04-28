<?php include "header.php";?>
<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">
<?php include "Sidebar.php";?>

<?php  
require_once '../../../Controller/studentInfo.php';

$student = fetchStudent($_GET['id']);

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../../../CSS/button.css" crossorigin="anonymous">
	<title>Delete Student</title>
	<style>
	.text
    {
        text-align: center;
    }
	</style>
</head>
<body>

	<fieldset style="width: 96%;">
	    <legend class="text"><b>DELETE STUDENT</b></legend>
	    <form action="../../../Controller/deleteStudent.php? id=<?php echo $student['uid'] ?>" method="POST">

        <form>
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td>Name</td>
        <td>:</td>
        <td><input name="name" id="name" type="text" value="<?php echo $student['name']?>"></td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Father Name</td>
        <td>:</td>
        <td><input name="fname" id="fname" type="text" value="<?php echo $student['fname']?>"></td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Mother Name</td>
        <td>:</td>
        <td><input name="mname" id="mname" type="text" value="<?php echo $student['mname']?>"></td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Email</td>
        <td>:</td>
        <td>
          <input name="email" type="text" value="<?php echo $student['email']?>">
        </td>
        <td></td>
        
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Address</td>
        <td>:</td>
        <td>
          <input name="address" type="text" value="<?php echo $student['address']?>">
        </td>
        <td></td>
        
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Gender</td>
        <td>:</td>
        <td>   
          <input name="gender" type="radio" value="Male" <?php if($student['gender']=="Male") echo "checked"; ?>>Male
          <input name="gender" type="radio" value="Female" <?php if($student['gender']=="Female") echo "checked"; ?>>Female
          <input name="gender" type="radio" value="Other" <?php if($student['gender']=="Other") echo "checked"; ?>>Other
        </td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>
      
      <tr>
        <td valign="top">Date of Birth</td>
        <td valign="top">:</td>
        <td>
          <input name="dob" type="text" value="<?php echo $student['dob']?>">
          <br/>
          <font size="2"><i>(dd/mm/yyyy)</i></font>
        </td>
        <td></td>
      </tr>

      <tr>
        <td>Class</td>
        <td>:</td>
        <td>
          <input name="class" type="text" readonly value="<?php echo $student['class']?>">
        </td>
        <td></td>
      </tr>
    </table>
    <hr/>

	    <center><input type="submit" class="button" value="Delete"name="deleteStudent" id="deleteStudent">
	    <button type="submit" class="button3" formaction="searchStudent.php">Back</button>

	</form>
	</fieldset>
</body>
</html>