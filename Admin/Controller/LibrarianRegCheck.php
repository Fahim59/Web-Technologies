<?php

function db_conn()
{
    $servername ="localhost";
    $username   ="root";
    $password   ="";
    $dbname     ="school";
        
    $conn = mysqli_connect($servername, $username, $password, $dbname);
        
    if(!$conn)
    {
        die("Connection Error!".mysqli_connect_error());
    }
    return $conn;
}

function registration()
{
    $conn = db_conn();

    $uid=$_POST["uid"];
    $name=$_POST["name"];
    $pass=$_POST["pass"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $gender=$_POST["radiobutton"];
    $dob  =$_POST["dob"];
    $image = $_FILES["picture"]["name"];

    $sql1 = "INSERT INTO login VALUES ('".$uid."','".$pass."','l','p')";
      
    $sql2 = "INSERT INTO librarian(uid, name, address, email, gender, dob, picture) VALUES ('".$uid."','".$name."','".$address."','".$email."','".$gender."','".$dob."','".$image."')";

    mysqli_query($conn, $sql1);

    /*if(mysqli_query($conn, $sql1))
    echo "Student Registration Successfull, Your Id Is :".$uid;
    else
    echo "<br/> SQL2 Error".mysqli_error($conn);*/

    if(mysqli_query($conn, $sql2))
    {
        echo "Registration Successfull, Your Id Is :".$uid;
    }
    
    else
    echo "<br/> SQL2 Error".mysqli_error($conn);
    
    mysqli_close($conn);
}

?>