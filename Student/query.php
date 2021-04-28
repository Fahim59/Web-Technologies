<?php
  $connect = mysqli_connect("localhost", "root", "", "webtech");
  if (isset($_POST['query'])) {
    $search_query = $_POST['query'];
    
  
    $query = "SELECT * FROM result WHERE uid LIKE '$search_query%'";
    $result = mysqli_query($connect, $query);
  if (mysqli_num_rows($result) > 0) {
   while ($result_row = mysqli_fetch_array($result)) {
    echo $result_row['uid']."<br/>";
  }
} else {
  echo "<p style='color:red'>User not found...</p>";
}
}
?>