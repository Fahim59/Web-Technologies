<?php include "header1.php";?>
<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">
<?php include "Sidebar.php";?>

<?php

require_once '../../../Controller/librarianInfo.php';
$valueToSearch='';

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $librarians  = filterTable($valueToSearch);  
}
else
{
    $librarians  = fetchAllLibrarians();
}
?>

<!DOCTYPE html>
<html>
    <head>
          <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../../../CSS/button.css" crossorigin="anonymous">
        <title>Search Librarian</title>
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

    <form action="searchLibrarian.php" method="post">
        <fieldset style="width: 96%;">
            <legend class="text"><b>SEARCH LIBRARIAN</b></legend>
            <center><input class="text" type="text" name="valueToSearch" placeholder="Value To Search" value=<?php echo $valueToSearch ?>>
            <input type="submit" class="button3" name="search" value="Search by Name"><br><br>
            
            <table>
                <thead>
                    <tr>
                        <th><b>Name</th>
                        <th><b>Address</th>
                        <th>Email<?php echo '&nbsp&nbsp&nbsp&nbsp';?></th>
                        <th>Gender<?php echo '&nbsp&nbsp&nbsp&nbsp';?></th>
                        <th><b>Date Of Birth</th>
                        <th colspan="2"></b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($librarians as $i => $librarian): ?>
                        <tr>
                            <td><?php echo $librarian['name'] ?></td>
                            <td><?php echo $librarian['address'] ?></td>
                            <td><?php echo $librarian['email'] ?><?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp';?></td>
                            <td><?php echo $librarian['gender'] ?></td>
                            <td><?php echo $librarian['dob'] ?></td>
                            
                            <td><a href="editLibrarian.php?id=<?php echo $librarian['uid']?>" style="color:#008000;">Edit<?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp';?></a></td>

                            <td><a href="deleteLibrarian.php?id=<?php echo $librarian['uid'] ?>" style="color:red;">Delete<?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp';?></a></td>
                            
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