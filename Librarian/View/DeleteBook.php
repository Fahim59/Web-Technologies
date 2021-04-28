<?php  

  session_start();
  if (isset($_SESSION['userid'])) 
  {

    include "LoginHeader.php";
    include "Sidebar.php";
  }
  else
  {
    echo '<script>alert("Login First!")</script>';
    echo '<script>location.href="Login.php"</script>';
  }

  require_once '../Controller/BookInfo.php';
  $book = FetchBook($_GET['bid']);
?> 

<!DOCTYPE html>
<html>
<head>
  <title>Delete Book</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
  <form action="../Controller/BookDelete.php?bid=<?php echo $book['bid'] ?>" method="POST">
    <fieldset>
      <legend><b>Delete Book</b></legend><br>
      <label>Book ID: <?php echo $book['bid'];?></label><br>
      <label>Book Name: <?php echo $book['bname'];?></label><br>
      <label>Category: <?php echo $book['category'];?></label><br>
      <label>Author: <?php echo $book['author'];?></label><br>
      <label>Status: <?php echo $book['status'];?></label><br><br>
      <input type="submit" name="delete" value="Delete">

    </fieldset>
    
  </form>

</body>
</html>