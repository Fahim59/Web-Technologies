<?php

$connect = mysqli_connect("localhost", "root", "", "school");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM book 
  WHERE bname LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM book
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
   <table class="w3-table-all w3-hoverable">
      <tr class="w3-blue">
       <th>Book Name</th>
       <th>Book ID</th>
       <th>Author</th>
       <th>Category</th>
       <th>Status</th>
       <th></th>
       <th></th>
      </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["bname"].'</td>
    <td>'.$row["bid"].'</td>
    <td>'.$row["author"].'</td>
    <td>'.$row["category"].'</td>
    <td>'.$row["status"].'</td>
    <td><a href="EditBook.php?bid='.$row["bid"].'">edit</a></td>
    <td><a href="DeleteBook.php?bid='.$row["bid"].'">Delete</a></td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>