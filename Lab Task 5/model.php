<?php 
require_once 'dbConnection.php';

function addProduct($data)
{
	$conn = db_conn();
    $selectQuery = "INSERT INTO info (name, bprice, sprice,display) VALUES(:name, :bprice, :sprice, :display)";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name'   => $data['name'],
        	':bprice' => $data['bprice'],
        	':sprice' => $data['sprice'],
            ':display' => $data['display'],
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function showAllProducts()
{
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM vinfo';
    try
    {
        $stmt = $conn->query($selectQuery);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showProduct($id)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM info WHERE id = ?";

    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function updateProduct($id, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE info set name = ?, bprice = ?, sprice = ?, display= ? WHERE id = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['bprice'],$data['sprice'],$data['display'], $id
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteProduct($id)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM info WHERE id = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

function searchProduct($valueToSearch)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM vinfo WHERE name LIKE '%".$valueToSearch."%'";
    try
    {
        $stmt = $conn->query($selectQuery);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
?>