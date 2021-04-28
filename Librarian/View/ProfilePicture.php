<?php
    session_start();
    if (isset($_SESSION['userid'])) 
    {

        include "LoginHeader.php";
        include "Sidebar.php";
    }
    else
    {
    echo '<script>alert("Login First!")</script>';
    echo '<script>location.href="Login.php"</script>';
    }

    $imageErr = "";
    $check = 1;

     if ($_SERVER["REQUEST_METHOD"] == "POST"){

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


    if(isset($_POST["submit"])){
        if ($check == 1) {
        $data['uid'] = $rows['uid'];
        $data['picture'] = basename($_FILES["picture"]["name"]);

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);

        include '../Controller/ProfilePictureChange.php';
        PictureChange($data);
        header('location:ProfilePicture.php');
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Profile Picture</title>
    <style>
    .error {color: #FF0000;}
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script>
      
      function ValidatePicForm() {
        var picture = document.getElementById("picture");
        if(picture.files.length == 0){  
        alert("Picture field can't be blank");  
        return false;  
      }
      }
    </script>
</head>
<body>
<fieldset>
    <legend><b>PROFILE PICTURE</b></legend>
    <form method="post" name="picform"  enctype="multipart/form-data" onsubmit="ValidatePicForm()">

        <table>

            <tr>
                <td><img src="uploads/<?php echo $rows["picture"] ?>" alt="<?php echo $rows["name"] ?>" width="250" height="300"><br></td>
            </tr>

            <tr>
                <td><input name="picture" id="picture" type="file"><span class="error"></span><br>
                <span class="error"><?php echo $imageErr;?></span>
                </td>
            </tr>

        </table>
        <hr/>
        <input type="submit" name="submit" value="Change" style="width: 100px">
        
    </form>
</fieldset>

</body>
</html>