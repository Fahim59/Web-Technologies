<?php include "header.php";?>
<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">
<?php include "Sidebar.php";?>

<?php  
require_once '../../../Controller/librarianInfo.php';

$librarian = fetchLibrarian($_GET['id']);

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../../../CSS/button.css" crossorigin="anonymous">
	<title>Delete Lbrarian</title>
	<style>
	.text
    {
        text-align: center;
    }
	</style>
</head>
<body>

	<fieldset style="width: 96%;">
	    <legend class="text"><b>DELETE LIBRARIAN</b></legend>
	    <form action="../../../Controller/deleteLibrarian.php? id=<?php echo $librarian['uid'] ?>" method="POST">

    <form>
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td>Name</td>
        <td>:</td>
        <td><input name="name" id="name" type="text" value="<?php echo $librarian['name']?>"></td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Email</td>
        <td>:</td>
        <td>
          <input name="email" type="text" value="<?php echo $librarian['email']?>">
        </td>
        <td></td>
        
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Address</td>
        <td>:</td>
        <td>
          <input name="address" type="text" value="<?php echo $librarian['address']?>">
        </td>
        <td></td>
        
      <tr><td colspan="4"><hr/></td></tr>

      <tr>
        <td>Gender</td>
        <td>:</td>
        <td>   
          <input name="gender" type="radio" value="Male" <?php if($librarian['gender']=="Male") echo "checked"; ?>>Male
          <input name="gender" type="radio" value="Female" <?php if($librarian['gender']=="Female") echo "checked"; ?>>Female
          <input name="gender" type="radio" value="Other" <?php if($librarian['gender']=="Other") echo "checked"; ?>>Other
        </td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>
      
      <tr>
        <td valign="top">Date of Birth</td>
        <td valign="top">:</td>
        <td>
          <input name="dob" type="text" value="<?php echo $librarian['dob']?>">
          <br/>
          <font size="2"><i>(dd/mm/yyyy)</i></font>
        </td>
        <td></td>
      </tr>
    </table>
    <hr/>

	    <center><input type="submit" class="button" value="Delete"name="deleteLibrarian" id="deleteLibrarian">
	    <button type="submit" class="button3" formaction="searchLibrarian.php">Back</button>

		</form>
	</fieldset>
</body>
</html>