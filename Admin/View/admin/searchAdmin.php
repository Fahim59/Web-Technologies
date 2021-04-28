<?php include "header/header1.php";?>
<table width="80%" align="center" >

<?php include "header/Sidebar.php";?>

<?php

require_once '../../Controller/adminInfo.php';
$valueToSearch='';

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $admins  = filterTable($valueToSearch);  
}
else
{
    $admins  = fetchAllAdmins();
}
?>

<!DOCTYPE html>
<html>
    <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../../CSS/button.css" crossorigin="anonymous">
        <title>Search Teacher</title>
        <style>
        table, th, td ,tr 
        {
            border: 2px solid ;
            border-collapse: collapse;
            padding: 1.3%
        }
        .text
        {
            text-align: center;
        }
        </style>
    </head>
    <body>
        
    <form action="searchAdmin.php" method="post">
        <fieldset style="width: 96%;">
            <legend class="text"><b>ADMIN PROFILE</b></legend>
            <center><input class="text" type="text" name="valueToSearch" placeholder="Value To Search" value=<?php echo $valueToSearch ?>>
            <input type="submit" class="button3" name="search" value="Search by Name"><br><br>
            
            <table>
                <thead>
                    <tr>
                        <th><b>Name</th>
                        <th><b>Address</th>
                        <th>Email<?php echo '&nbsp&nbsp&nbsp&nbsp';?></th>
                        <th>Gender<?php echo '&nbsp&nbsp&nbsp&nbsp';?></th>
                        <th><b>Date Of Birth<?php echo '&nbsp&nbsp';?></th>
                        
                        <th colspan="2"></b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admins as $i => $admin): ?>
                        <tr>
                            <td><?php echo $admin['name'] ?></td>
                            <td><?php echo $admin['address'] ?></td>
                            <td><?php echo $admin['email'] ?><?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp';?></td>
                            <td><?php echo $admin['gender'] ?></td>
                            <td><?php echo $admin['dob'] ?></td>
                            
                            <td><a href="editAdmin.php?id=<?php echo $admin['uid']?>">Edit<?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';?></a></td>
                            
                        </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
            <br>
            <button type="submit" class="button3" formaction="Logged_In_Dashboard.php">Back</button>
        </fieldset>
        </form>
    </body>
</html>