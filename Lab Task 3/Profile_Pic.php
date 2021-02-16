<!DOCTYPE html>
<html>
<style >
		.error
		{
			color: red;
		}
	</style>
<body>

<?php

    $failed = "";

    if(isset($_FILES['image']))
    {
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];

        $target_dir = "picture/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $file_ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if($file_ext != "jpg" && $file_ext != "png" && $file_ext != "jpeg")
        {
            $failed = "Extension not allowed, please choose a JPEG or PNG or JPG file.";
        }

        if (file_exists($target_file))
        {
            $failed = "Sorry, file already exists.";
        }
      
        if($file_size > 4194304) //Binary Byte
        {
            $failed = "File size must not be greater than 4 MB";
        }
      
        if(empty($failed) == true)
        {
            move_uploaded_file($file_tmp,"picture/".$file_name);
            echo "Success";
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<form method="post" action="" enctype="multipart/form-data" style="padding-top: 10px">

<fieldset style="width: 700px; ">
    <legend><b>PROFILE PICTURE</b></legend>
    <form action="#" method="POST">

        <table>

            <tr>
                <td><img src="profile.png" width="157" height="173"><br></td>
            </tr>

            <tr>
                <td><input name="image" type="file"><span class="error">  <?php echo $failed;?> </span><br></td>
            </tr>

        </table>
        <hr/>
        <input type="submit" name="submit" value="Submit" style="width: 60px">
        
    </form>
</fieldset>
</form>

</body>
</html>