<?php include('../header_footer/headerL.php');?>
<?php include('../header_footer/Adminsidebar.php');?>
<?php include ('../database/conn.php');?>

<?php
if($_POST["name"]!="" || $_POST["email"]!="" || $_POST["address"]!=""|| $_POST["gender"]!=""||$_POST["dob"]!="")
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $gender=$_POST["gender"];
    $dob  =$_POST["dob"];

    $sql1 = "UPDATE admin SET name = '".$name."', address = '".$address."', email = '".$email."', gender = '".$gender."', dob = '".$dob."' where uid='".$_SESSION["uid"]."'";

    if(mysqli_query($conn, $sql1))
    {
      echo "Update Successfull";
      header("Location:Edit_Profile.php");
    }
    
    else
    echo "<br/> SQL2 Error".mysqli_error($conn);
    
    mysqli_close($conn);
}
?>