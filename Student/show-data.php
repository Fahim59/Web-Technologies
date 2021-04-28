<?php
include("database.php");
$fetchData= fetch_data($conn);
show_data($fetchData);
// fetch query
function fetch_data($conn){
  $query="SELECT * from student ORDER BY id DESC";
  $exec=mysqli_query($conn, $query);
  if(mysqli_num_rows($exec)>0){
    $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;  
        
  }else{
    return $row=[];
  }
}
function show_data($fetchData){
 echo '<table border="1">
        <tr>
            <th>UID</th>
            <th>Name</th>
            <th>Father Name</th>
            <th>Mother Name</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Class</th>
            <th>Address</th>
            <th>Email</th>
            <th>Picture</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>';
 if(count($fetchData)>0){
      $sn=1;
      foreach($fetchData as $data){ 
  echo "<tr>
          <td>".$data['uid']."</td>
          <td>".$data['name']."</td>
          <td>".$data['fname']."</td>
          <td>".$data['mname']."</td>
          <td>".$data['dob']."</td>
          <td>".$data['gender']."</td>
          <td>".$data['class']."</td>
          <td>".$data['address']."</td>
          <td>".$data['email']."</td>
          <td>".$data['picture']."</td>
          <td><a href='javascript:void(0)' onclick='editData(".$data['id'].")'>Edit</a></td>
          <td><a href='javascript:void(0)' onclick='deleteData(".$data['id'].")'>Delete</a></td>   </tr>";
       
  $sn++; 
     }
}else{
     
  echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>"; 
}
  echo "</table>";
}
