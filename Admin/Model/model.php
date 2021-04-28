<?php 
require_once 'dbConnection.php';

function showAllTeachers()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM teacher';
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
function showAllStudents()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM student';
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
function showAllLibrarians()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM librarian';
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

function showTeacher($uid)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM teacher WHERE uid = ?";

    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$uid]);
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}
function showStudent($uid)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM student WHERE uid = ?";

    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$uid]);
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}
function showLibrarian($uid)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM librarian WHERE uid = ?";

    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$uid]);
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function updateTeacher($uid, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE teacher set name = ?, fname = ?, mname = ?, address = ?, email = ?, gender = ?, dob = ? WHERE uid = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['fname'], $data['mname'], $data['address'], $data['email'], $data['gender'], $data['dob'], $uid
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}
function updateStudent($uid, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE student set name = ?, fname = ?, mname = ?, address = ?, email = ?, gender = ?, dob = ?, class = ? WHERE uid = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['fname'], $data['mname'], $data['address'], $data['email'], $data['gender'], $data['dob'], $data['class'], $uid
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}
function updateLibrarian($uid, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE librarian set name = ?, address = ?, email = ?, gender = ?, dob = ? WHERE uid = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['address'], $data['email'], $data['gender'], $data['dob'], $uid
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteTeacher($uid)
{
    $conn = db_conn();
    $selectQuery1 = "DELETE FROM teacher WHERE uid = ?";
    $selectQuery2 = "DELETE FROM login WHERE uid = ?";
    try
    {
        $stmt1 = $conn->prepare($selectQuery1);
        $stmt2 = $conn->prepare($selectQuery2);
        $stmt1->execute([$uid]);
        $stmt2->execute([$uid]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}
function deleteStudent($uid)
{
    $conn = db_conn();
    $selectQuery1 = "DELETE FROM student WHERE uid = ?";
    $selectQuery2 = "DELETE FROM login WHERE uid = ?";
    try
    {
        $stmt1 = $conn->prepare($selectQuery1);
        $stmt2 = $conn->prepare($selectQuery2);
        $stmt1->execute([$uid]);
        $stmt2->execute([$uid]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}
function deleteLibrarian($uid)
{
    $conn = db_conn();
    $selectQuery1 = "DELETE FROM librarian WHERE uid = ?";
    $selectQuery2 = "DELETE FROM login WHERE uid = ?";
    try
    {
        $stmt1 = $conn->prepare($selectQuery1);
        $stmt2 = $conn->prepare($selectQuery2);
        $stmt1->execute([$uid]);
        $stmt2->execute([$uid]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

function searchTeacher($valueToSearch)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM teacher WHERE name LIKE '%".$valueToSearch."%'";
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
function searchStudent($valueToSearch)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM student WHERE name LIKE '%".$valueToSearch."%'";
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
function searchLibrarian($valueToSearch)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM librarian WHERE name LIKE '%".$valueToSearch."%'";
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

function showAllAdmins()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM admin';
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

function showAdmin($uid)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM admin WHERE uid = ?";

    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$uid]);
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function updateAdmin($uid, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE admin set name = ?, email = ?, address = ?, gender = ?, dob = ? WHERE uid = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['email'],$data['address'], $data['gender'], $data['dob'], $uid
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function searchAdmin($valueToSearch)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM admin WHERE name LIKE '%".$valueToSearch."%'";
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

function showAllResults()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM result';
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

function searchResult($valueToSearch)
{
    $conn = db_conn();
    $selectQuery = "SELECT u.name, e.uid, e.class, e.subject, e.mid, e.final, e.mid*0.4 + e.final*0.6 as total FROM result AS e INNER JOIN student AS u ON e.uid = u.uid where e.uid = '".$valueToSearch."'";
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