<?php 

require_once 'db_connect.php';

function UserId()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $query = "SELECT uid FROM `login` ORDER BY uid DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $lastid = $row['uid'];
    if ($lastid == null) {
        return "1000";
    }else{
        
        return $lastid + 1;
    }
}

function BookId()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $query = "SELECT bid FROM `book` ORDER BY bid DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $lastbid = $row['bid'];
    if ($lastbid == null) {
        return "100";
    }else{
        
        return $lastbid + 1;
    }
}

function IssueID()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $query = "SELECT id FROM `issuebook` ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $lastbid = $row['id'];
    if ($lastbid == null) {
        return "1";
    }else{
        
        return $lastbid + 1;
    }
}

function AddIntoLogin($login)
{
    $conn = db_conn();
    $selectQuery = "INSERT into login (uid, password, type, status)
VALUES (:uid, :password, :type, :status)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':uid' => $login['uid'],
            ':password' => $login['password'],
            ':type' => $login['type'],
            ':status' => $login['status']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
}

function AddIntoLibrarian($librarian)
{
    $conn = db_conn();
    $selectQuery = "INSERT into librarian (uid, name, email, dob, address, gender, picture)
VALUES (:uid, :name, :email, :dob, :address, :gender, :picture)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':uid' => $librarian['uid'],
            ':name' => $librarian['name'],
            ':email' => $librarian['email'],
            ':dob' => $librarian['dob'],
            ':address' => $librarian['address'],
            ':gender' => $librarian['gender'],
            ':picture' => $librarian['picture']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
}

function AddBook($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into book (bid, bname, author, category, status)
VALUES (:bid, :bname, :author, :category, :status)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':bid' => $data['bid'],
            ':bname' => $data['bname'],
            ':author' => $data['author'],
            ':category' => $data['category'],
            ':status' => $data['status']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
}

function IssueBook($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into issuebook (id, bid, uid, issuedate, duedate)
VALUES (:id, :bid, :uid, :idate, :ddate)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':id' => $data['id'],
            ':bid' => $data['bid'],
            ':uid' => $data['uid'],
            ':idate' => $data['idate'],
            ':ddate' => $data['ddate'],
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $selectQuery = "UPDATE book SET status = ? WHERE bid = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['status'], $data['bid']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
}

function Logins($userid, $pass)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $query = "SELECT * FROM `login` WHERE uid ='$userid' && password ='$pass'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    return $row;
}

function View($id)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $query = "SELECT * FROM `librarian` WHERE uid ='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    return $row;
}

function DataUpdate($data){
    $conn = db_conn();
    $selectQuery = "UPDATE librarian set name = ?, email = ?, dob = ?, address = ?, gender = ? where uid = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['email'], $data['dob'], $data['address'], $data['gender'], $data['uid']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function PictureUpdate($data){
    $conn = db_conn();
    $selectQuery = "UPDATE librarian set picture = ? where uid = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['picture'], $data['uid']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
}

function PassUpdate($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE login set password = ? where uid = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['password'], $data['uid']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
}

function ViewLogin($id)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $query = "SELECT * FROM `login` WHERE uid ='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    return $row;
}

function ShowAllBooks(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `book`';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function ShowBook($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `book` where bid = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function SearchBook($bname){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `book` WHERE bname LIKE '%$bname%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function UpdateBook($data){
    $conn = db_conn();
    $selectQuery = "UPDATE book SET bname = ?, author = ?, category = ? WHERE bid = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['bname'], $data['author'], $data['category'], $data['bid']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function DeleteBooks($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `book` WHERE bid = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

function GetBalance($uid){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `student` where uid = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$uid]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function IssueDetails($id){
      $conn = db_conn();
    $selectQuery = "SELECT * FROM `issuebook` where id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function ReturnBook($uid, $bid, $status, $id, $ret, $fine, $balance)
{
    $conn = db_conn();
    
    $selectQuery = "UPDATE `book` SET status = ? WHERE bid = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$status, $bid]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }

    $selectQuery = "UPDATE `issuebook` SET returndate = ?, fine = ? WHERE id = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$ret, $fine, $id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }

    $selectQuery = "UPDATE `student` SET balance = ? WHERE uid = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$balance, $uid]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }

    
    $conn = null;
}

function Balance($uid, $balance)
{
    $conn = db_conn();
    
    
    $selectQuery = "UPDATE `student` SET balance = ? WHERE uid = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$balance, $uid]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }

    
    $conn = null;
}