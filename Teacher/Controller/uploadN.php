<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$target_dir = "../Upload/";
$target_file = $target_dir . basename($_FILES["myfile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["myfile"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image. ";
    $uploadOk = 0;
  }
}
// echo $_FILES["myfile"]["size"] ;
if ($_FILES["myfile"]["size"] > 4097152) {
  echo "Picture size must not be more than 4MB. ";
  $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "txt" && $imageFileType != "pdf") {
  echo "File format must be in jpeg or jpg or png or txt or pdf. ";
  $uploadOk = 0;
}
if($_POST['class']==""){
  echo "Class Can't be empty ";
  $uploadOk = 0;
}
if(isset($_POST['subject'])){
  if($_POST['subject']==""){
  echo "subject Can't be empty ";
  $uploadOk = 0;
}
}
else{
  echo "subject Can't be empty ";
  $uploadOk = 0;
}


if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {
  if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
   
    if (StudentNoteSend($_FILES["myfile"]["name"],$_POST['class'],$_POST['subject']))
    {
       echo "The file ". htmlspecialchars( basename( $_FILES["myfile"]["name"])). " has been uploaded. ";

    }
  } else {
    echo "Sorry, there was an error uploading your file. ";
  }
}



}
?>

  