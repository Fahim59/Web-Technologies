<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">
<?php include "Sidebar.php"; ?>

<?php

require_once 'controller/productInfo.php';
$valueToSearch='';

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $products  = filterTable($valueToSearch);  
}
else
{
    $products  = fetchAllProducts();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search Product</title>
        <style>
            table, th, td ,tr {
            border: 2px solid ;
            border-collapse: collapse;
            padding: 2%
        }
        </style>
    </head>
    <body>
        
    <form action="searchProduct.php" method="post">
        <fieldset style="width: 80%;">
            <legend><b>SEARCH</b></legend>
            <input type="text" name="valueToSearch" placeholder="Value To Search" value=<?php echo $valueToSearch ?>>
            <input type="submit" name="search" value="Search by Name"><br><br>
            
            <table>
                <thead>
                    <tr>
                        <th><b>NAME<?php echo '&nbsp&nbsp&nbsp';?></th>
                        <th>PROFIT<?php echo '&nbsp&nbsp&nbsp&nbsp';?></th>
                        <th colspan="2"></b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $i => $product): ?>
                        <?php if ($product['display']==1): ?>
                        <tr>
                            <td><?php echo $product['name'] ?></td>
                            <td><?php echo $product['profit'] ?></td>
                            <td><a href="editProduct.php?id=<?php echo $product['id']?>">edit<?php echo '&nbsp&nbsp&nbsp';?></a></td>
                            <td><a href="deleteProduct.php?id=<?php echo $product['id'] ?>">delete<?php echo '&nbsp&nbsp&nbsp';?></a></td>
                        </tr>
                        <?php endif ?>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </fieldset>
        </form>
    </body>
</html>