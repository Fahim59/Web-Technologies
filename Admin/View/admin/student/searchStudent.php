<?php include "header1.php";?>
<table width="81.3%" align="center" cellspacing="0" cellpadding="10" border="1">
<?php include "Sidebar.php";?>

<?php

require_once '../../../Controller/studentInfo.php';
$valueToSearch='';

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $students  = filterTable($valueToSearch);  
}
else
{
    $students  = fetchAllStudents();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../../../CSS/button.css" crossorigin="anonymous">
        <title>Search Student</title>
        <style>
            table, th, td ,tr 
            {
                border: 2px solid ;
                border-collapse: collapse;
                padding: 1%
            }
            .text
            {
                text-align: center;
            }
        </style>
    </head>
    <body>

    <form action="searchStudent.php" method="post">
        <fieldset style="width: 96%;">
            <legend class="text"><b>SEARCH STUDENT</b></legend>
            <center><input class="text" type="text" name="valueToSearch" placeholder="Value To Search" value=<?php echo $valueToSearch ?>>
            <input type="submit" class="button3" name="search" value="Search by Name"><br><br>
            
            <table>
                <thead>
                    <tr>
                        <th><b>Name</th>
                        <th><b>Father Name</th>
                        <th><b>Mother Name</th>
                        <th><b>Address</th>
                        <th>Email</th>
                        <th>Gender<?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';?></th>
                        <th><b>Date Of Birth<?php echo '&nbsp&nbsp';?></th>
                        <th><b>Class<?php echo '&nbsp&nbsp&nbsp';?></th>
                        <th colspan="2"></b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $i => $student): ?>
                        <tr>
                            <td><?php echo $student['name'] ?></td>
                            <td><?php echo $student['fname'] ?></td>
                            <td><?php echo $student['mname'] ?></td>
                            <td><?php echo $student['address'] ?></td>
                            <td><?php echo $student['email'] ?><?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp';?></td>
                            <td><?php echo $student['gender'] ?></td>
                            <td><?php echo $student['dob'] ?></td>
                            <td><?php echo $student['class'] ?></td>
                            
                            <td><a href="editStudent.php?id=<?php echo $student['uid']?>" style="color:#008000;">Edit<?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp';?></a></td>

                            <td><a href="deleteStudent.php?id=<?php echo $student['uid'] ?>" style="color:red;">Delete<?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp';?></a></td>
                            
                        </tr>
                        <?php endforeach; ?>
                </tbody>

            </table>
            <br>
            <button type="submit" class="button3" formaction="../Logged_In_Dashboard.php">Back</button>
        </fieldset>
        </form>
    </body>
</html>