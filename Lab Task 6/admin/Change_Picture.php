<?php include('../header_footer/headerL.php');?>
<?php include('../header_footer/Adminsidebar.php');?>
<?php include "../database/conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Change Profile Picture</title>
</head>
<style >
		.error
		{
			color: red;
		}
        .text
        {
            text-align: center;
        }
	</style>
<body>

<?php
$img = mysqli_query($conn, "SELECT * FROM admin where uid='".$_SESSION["uid"]."'");
    while ($row = mysqli_fetch_array($img)) 
    {
        $id = "<img src='../image/".$row['picture']."' >";
        //echo $id;
    }
?>

<?php

    $failed = "";

    if(isset($_FILES['image']))
    {
        $file_name = $_FILES['image']['name']; //name of the uploaded file
        $file_size = $_FILES['image']['size']; //size in byte 
        $file_tmp = $_FILES['image']['tmp_name']; //the uploaded file in the temporary directory on the web server.
        $file_type = $_FILES['image']['type']; //the MIME type of the uploaded file

        $target_dir = "../image/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $file_ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(empty($file_ext))
        {
            $failed = "Choose an image first";
        }
        else if($file_ext != "jpg" && $file_ext != "png" && $file_ext != "jpeg")
        {
            $failed = "Extension not allowed, please choose a JPEG or PNG or JPG file.";
        }

        else if (file_exists($target_file))
        {
            $failed = "Sorry, file already exists.";
        }
      
        else if($file_size > 4194304) //Binary Byte
        {
            $failed = "File size must not be greater than 4 MB";
        }
      
        if(empty($failed) == true)
        {
            move_uploaded_file($file_tmp,"../image/".$file_name);
            //echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
        }

        if(isset($_POST["submit"]))
        {
            $sql = "UPDATE admin SET picture ='$file_name' where uid='".$_SESSION["uid"]."'";
    
            if(mysqli_query($conn,$sql))
            {
                echo "Picture Change Successfull!";
            }
        }
    }
?>
<form method="post" action="" enctype="multipart/form-data" style="padding-top: 10px">

<fieldset style="width: 700px; ">
    <legend class="text"><b>PROFILE PICTURE</b></legend>
    <form action="#" method="POST">

        <table>
            <tr>
                <td><img src="../image/profile.png" width="157" height="173"><br></td>
            </tr>

            <tr>
                <td><input name="image" type="file"><span class="error">  <?php echo $failed;?> </span><br></td>
            </tr>

        </table>
        <hr/>
        <center><input type="submit" name="submit" value="Submit" style="width: 60px">
        
    </form>
</fieldset>
</form>

</body>
</html>