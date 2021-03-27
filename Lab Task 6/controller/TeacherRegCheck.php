<?php include('../header_footer/header1.php');?>
<?php include ('../database/conn.php');?>

<?php
$failed = "";
  if(isset($_POST['submit']))
  {
    $filename = $_FILES['myfile']['name'];
    $file_size = $_FILES['myfile']['size'];
    $fileUploadPath = "../image/";
    $file_ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($file_ext != "jpg" && $file_ext != "png" && $file_ext != "jpeg")
    {
      $failed = "Extension not allowed, please choose a JPEG or PNG or JPG file.";
    }
  
    if (file_exists($fileUploadPath))
    {
      //$fileUploadPath = "image/".$filename."_1";
      //$filename = $filename."_1";
      $failed = "Sorry, file already exists.";
    }
    if($file_size > 4194304) //Binary Byte
    {
      $failed = "File size must not be greater than 4 MB";
    }
  
    /*if(move_uploaded_file($_FILES['myfile']['tmp_name'], $fileUploadPath))
    {
      echo "Upload Success";
    }
    else
    {
      echo "Upload error";
    }*/
    if(empty($failed) == true)
    {
      move_uploaded_file($file_tmp,"../image/".$file_name);
      echo "Success";
    }
  }
?>

<?php

if ($_POST["uid"]!=""  ||$_POST["name"]!=""  ||  $_POST["pass"]!="" || $_POST["email"]!="" || $_POST["fname"]!="" || $_POST["mname"]!="" || $_POST["address"]!=""|| $_POST["gender"]!=""|| $_POST["dob"]!=""|| $_POST["myfile"]!="")
{
    $uid=$_POST["uid"];
    $name=$_POST["name"];
    $pass=$_POST["pass"];
    $email=$_POST["email"];
    $fname =$_POST["fname"];
    $mname=$_POST["mname"];
    $address=$_POST["address"];
    $gender=$_POST["gender"];
    $dob  =$_POST["dob"];
    $image = $_POST["image"];

    $sql1 = "INSERT INTO login VALUES ('".$uid."','".$pass."','l','p')";
      
    $sql2 = "INSERT INTO teacher(uid, name, fname, mname, address, email, gender, dob, balance, picture) VALUES ('".$uid."','".$name."','".$fname."','".$mname."','".$address."','".$email."','".$gender."','".$dob."',0,'".$image."')";

    mysqli_query($conn, $sql1);
    /*if(mysqli_query($conn, $sql1))
    echo "Teacher Registration Successfull, Your Id Is :".$uid;
    else
    echo "<br/> SQL2 Error".mysqli_error($conn);*/

    if(mysqli_query($conn, $sql2))
    echo "Registration Successfull, Your Id Is :".$uid;
    else
    echo "<br/> SQL2 Error".mysqli_error($conn);
    
    mysqli_close($conn);
}
else
  echo " Please Selects All Field <b>";

?>
<center><a href="../TeacherReg.php">Back</a></center>
