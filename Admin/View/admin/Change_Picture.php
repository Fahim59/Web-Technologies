<?php include "../headerL.php";?>
<?php include "../Adminsidebar.php";?>
<?php include "../../Model/conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../../CSS/button.css" crossorigin="anonymous">
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
    #errorBox
    {
        color:#F00;
    }
	</style>

    <script type="text/javascript">

    function submit1()
    {
      var image = document.Change_Picture.image.value;
      var file_ext = /(\.jpg|\.jpeg|\.bmp|\.gif|\.png)$/i;
      var size = document.getElementById("image").files[0];

      //Image
      if(image == "")
      {
        document.Change_Picture.image.focus();
        document.getElementById("errorBox").innerHTML = "Image is required";
        return false;
      }
      else if(!file_ext.exec(image))
      {
        document.getElementById("errorBox").innerHTML = "Extension not allowed, please choose a JPEG or PNG or JPG file.";
        return false;
      }
      else if (size.size > 4194304)
      {
        document.getElementById("errorBox").innerHTML = "File size must not be greater than 4 MB";
        return false;
      }
    }
  </script>
<body>

<?php
$img = mysqli_query($conn, "SELECT * FROM admin where uid='".$_SESSION["uid"]."'");
    while ($row = mysqli_fetch_array($img)) 
    {
        $id = "<img src='../image/".$row['picture']."' height='150' width='150'>";
        //echo '<img src='../image/".$row['picture']."' height="130" width="150">';
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
            if(isset($_POST["submit"]))
            {
                $sql = "UPDATE admin SET picture ='$file_name' where uid='".$_SESSION["uid"]."'";
    
                if(mysqli_query($conn,$sql))
                {
                    echo "Picture Change Successfull!";
                }
            }
        }
    }
?>
<form name="Change_Picture" method="post" action="" enctype="multipart/form-data" style="padding-top: 10px">

<fieldset style="width: 700px; ">
    <legend class="text"><b>PROFILE PICTURE</b></legend>
    <form action="#" method="POST">

        <table>
            <tr>
                <?php
                    $img = mysqli_query($conn, "SELECT * FROM admin where uid='".$_SESSION["uid"]."'");
                    while ($row = mysqli_fetch_array($img)) 
                    {
                        $id = "<img src='../image/".$row['picture']."' height='150' width='150'>";
                        echo $id;
                    }
                ?>
            </tr>

            <tr>
                <td><input name="image" id="image" onkeyup="submit1()" onblur="submit1()" type="file"><span class="error">  <?php echo $failed;?> </span><br></td><div id="errorBox"></div>
            </tr>

        </table>
        <hr/>
        <center><input type="submit" class="button3" name="submit" value="Submit" onClick="return submit1();" style="width: 60px">
        <button type="submit" class="button3" formaction="Logged_In_Dashboard.php">Back</button>
    </form>
</fieldset>
</form>

</body>
</html>