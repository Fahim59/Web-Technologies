<?php include "header.php";?>
<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">
<?php include "Sidebar.php";?>

<?php  
require_once '../../../Controller/teacherInfo.php';

$teacher = fetchTeacher($_GET['id']);

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../../../CSS/button.css" crossorigin="anonymous">
	<title>Delete Teacher</title>
	<style>
	.text
    {
        text-align: center;
    }
	</style>
</head>
<body>

	<fieldset style="width: 96%;">
	    <legend class="text"><b>DELETE TEACHER</b></legend>
	    <form action="../../../Controller/deleteTeacher.php? id=<?php echo $teacher['uid'] ?>" method="POST">

    <form>
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td>Name</td>
        <td>:</td>
        <td><input name="name" id="name" type="text" value="<?php echo $teacher['name']?>"></td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Father Name</td>
        <td>:</td>
        <td><input name="fname" id="fname" type="text" value="<?php echo $teacher['fname']?>"></td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Mother Name</td>
        <td>:</td>
        <td><input name="mname" id="mname" type="text" value="<?php echo $teacher['mname']?>"></td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Email</td>
        <td>:</td>
        <td>
          <input name="email" type="text" value="<?php echo $teacher['email']?>">
        </td>
        <td></td>
        
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Address</td>
        <td>:</td>
        <td>
          <input name="address" type="text" value="<?php echo $teacher['address']?>">
        </td>
        <td></td>
        
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Gender</td>
        <td>:</td>
        <td>   
          <input name="gender" type="radio" value="Male" <?php if($teacher['gender']=="Male") echo "checked"; ?>>Male
          <input name="gender" type="radio" value="Female" <?php if($teacher['gender']=="Female") echo "checked"; ?>>Female
          <input name="gender" type="radio" value="Other" <?php if($teacher['gender']=="Other") echo "checked"; ?>>Other
        </td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>
      
      <tr>
        <td valign="top">Date of Birth</td>
        <td valign="top">:</td>
        <td>
          <input name="dob" type="text" value="<?php echo $teacher['dob']?>">
          <br/>
          <font size="2"><i>(dd/mm/yyyy)</i></font>
        </td>
        <td></td>
      </tr>
    </table>
    <hr/>

	    <center><input type="submit" class="button" value="Delete" name="deleteTeacher" id="deleteTeacher">
	    <button type="submit" class="button3" formaction="searchTeacher.php">Back</button>

		</form>
	</fieldset>
</body>
</html>