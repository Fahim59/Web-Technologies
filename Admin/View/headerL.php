<?php include ('../../Model/conn.php');?>
<?php
    session_start();
    
    if(isset($_COOKIE['uid']) && isset($_COOKIE['type']))
    {
        $_SESSION['uid']=$_COOKIE['uid'];
        $_SESSION['type']=$_COOKIE['type'];
    }
    
    if(isset($_SESSION['uid']) && isset($_SESSION['type']))
    {
        $qid = $_SESSION['uid'];
        if($_SESSION['type']=="s")
        {
            $sql = "select * from student where uid='".$qid."'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_assoc($result))
                {
                    $_SESSION["name"]=$row['name'];
                    $_SESSION["password"]=$row['password'];
                    $_SESSION["class"]=$row['class'];
                    $_SESSION["email"]=$row['email'];
                    $_SESSION["fathername"]=$row['fathername'];
                    $_SESSION["mothername"]=$row['mothername'];
                    $_SESSION["address"]=$row['address'];
                    $_SESSION["gender"]=$row['gender'];
                    $_SESSION["dob"]=$row['dob'];
                    $_SESSION["picture"]=$row['picture'];
                    $_SESSION["balance"]=$row['balance'];
                }   
            }
            else
                header("Location:../Login.php");
        }
        
        else if($_SESSION['type']=="t")
        {
            $sql = "select * from teacher where uid='".$qid."'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_assoc($result))
                {
                    $_SESSION["name"]=$row['name'];
                    //$_SESSION["password"]=$row['password'];
                    $_SESSION["email"]=$row['email'];
                    $_SESSION["fathername"]=$row['fathername'];
                    $_SESSION["mothername"]=$row['mothername'];
                    $_SESSION["address"]=$row['address'];
                    $_SESSION["gender"]=$row['gender'];
                    $_SESSION["dob"]=$row['dob'];
                    $_SESSION["picture"]=$row['picture'];
                    $_SESSION["balance"]=$row['balance'];
                }   
            }
            else
                header("Location:../Login.php");
        }

        else if($_SESSION['type']=="l")
        {
            $sql = "select * from librarian where uid='".$qid."'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_assoc($result))
                {
                    $_SESSION["name"]=$row['name'];
                    //$_SESSION["password"]=$row['password'];
                    $_SESSION["email"]=$row['email'];
                    $_SESSION["address"]=$row['address'];
                    $_SESSION["gender"]=$row['gender'];
                    $_SESSION["dob"]=$row['dob'];
                }   
            }
            else
                header("Location:../Login.php");
        }
        
        else if($_SESSION['type']=="a")
        {
            $sql = "select * from admin where uid='".$qid."'";
            $sql1 = "select * from login where uid='".$qid."'";

            $result = mysqli_query($conn, $sql);
            $result1 = mysqli_query($conn, $sql1);

            if(mysqli_num_rows($result1)>0)
            {
                while($row=mysqli_fetch_assoc($result1))
                {
                    $_SESSION["pass"]=$row['password'];
                }   
            }

            if(mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_assoc($result))
                {
                    $_SESSION["uid"]=$row['uid'];
                    $_SESSION["name"]=$row['name'];
                    //$_SESSION["pass"]=$row['password'];
                    $_SESSION["email"]=$row['email'];
                    //$_SESSION["status"]=$row['status'];
                    $_SESSION["address"]=$row['address'];
                    $_SESSION["gender"]=$row['gender'];
                    $_SESSION["dob"]=$row['dob'];
                }   
            }
            else
                header("Location:../Login.php");
        }
        mysqli_close($conn);
    }
    else
        header("Location:../Login.php");
?>

<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">
    <style>
    a.one:link {color:#ff0000;}
    a.one:visited {color:#0000ff;}
    a.one:hover {color:#DC143C;}
   </style>

    <tr>
        <td colspan="2" valign="middle" height="70">  
            <table width="100%">
                <tr>
                    <td>
                        <img height="55" src="../image/logo.png">
                    </td>
                    
                    <td align="right">

                    Logged in as <a href="<?php if($_SESSION["type"]=="a") {echo "Logged_In_Dashboard.php";} else {echo "Login.php";} ?>" class="one"><?php echo $_SESSION["name"]; ?></a>&nbsp;|
                    <a href="../Logout.php"class="one">Logout</a>
                    
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>