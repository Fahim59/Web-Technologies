<?php include "conn.php"; ?>

<style>
    .text
    {
      text-align: center;
    }
    
    body 
    {
      background-image: url("../image/A.gif");
      background-position: 37% 30%;
      background-repeat: no-repeat, repeat; 
    }
    .button
    {
       background-color: #4CAF50; /* Green */
       border: none;
       color: white;
       padding: 5px 10px;
       text-align: center;
       text-decoration: none;
       display: inline-block;
       font-size: 12px;
       margin: 4px 2px;
       cursor: pointer;
    }
    .button2 {background-color: #008CBA;} /* Blue */
    .button3 {background-color: #f44336;} /* Red */ 
    
</style>


<?php
if(!isset($view))
  $view=1;

$sql = "select * from login where type='s'";
$result = mysqli_query($conn, $sql);
  
if(mysqli_num_rows($result)>0){?>
<div id="student">

<fieldset style="width: 96%;">
  <legend class="text"><b>STUDENT INFO</b></legend>
  <center><table class="text" border="1" cellpadding="5" cellspacing="0">
    <tr>
      <td>ID</td><td>Status</td><td>Action</td>
    </tr>
  <?php while($row=mysqli_fetch_assoc($result)){?>
    
    <tr>
    <td><?php echo $row['uid'];?></td> <td><?php echo $row['status'];?></td>
    <td>
    <?php
      if($row['status']=="p")
      {
        echo "<input type='button' class='button' name='' value='Approve' onclick='doapprove(".$row['uid'].",";
        if(isset($_GET['view']) && $_GET['view']== "1"){ echo "1"; }
        else if(isset($_GET['view']) && $_GET['view']== "2"){ echo "2"; }
        else if(isset($_GET['view']) && $_GET['view']== "3"){ echo "3"; }
        else if(isset($_GET['view']) && $_GET['view']== "4"){ echo "4"; }
        else echo "1";
        echo ")'/><input type='button' class='button button3' name='' value='Reject' onclick='doreject(".$row['uid'].",";
        if(isset($_GET['view']) && $_GET['view']== "1"){ echo "1"; }
        else if(isset($_GET['view']) && $_GET['view']== "2"){ echo "2"; }
        else if(isset($_GET['view']) && $_GET['view']== "3"){ echo "3"; }
        else if(isset($_GET['view']) && $_GET['view']== "4"){ echo "4"; }
        else echo "1";
        echo ")'/>";
      }
      else if($row['status']=="a")
      {
        echo "<input type='button' class='button button2' name='' value='Pending' onclick='dopending(".$row['uid'].",";
        if(isset($_GET['view']) && $_GET['view']== "1"){ echo "1"; }
        else if(isset($_GET['view']) && $_GET['view']== "2"){ echo "2"; }
        else if(isset($_GET['view']) && $_GET['view']== "3"){ echo "3"; }
        else if(isset($_GET['view']) && $_GET['view']== "4"){ echo "4"; }
        else echo "1";
        echo ")'/><input type='button' class='button button3'  name='' value='Reject' onclick='doreject(".$row['uid'].",";
        if(isset($_GET['view']) && $_GET['view']== "1"){ echo "1"; }
        else if(isset($_GET['view']) && $_GET['view']== "2"){ echo "2"; }
        else if(isset($_GET['view']) && $_GET['view']== "3"){ echo "3"; }
        else if(isset($_GET['view']) && $_GET['view']== "4"){ echo "4"; }
        else echo "1";
        echo ")'/>";
      }
      else if($row['status']=="r")
      {
        echo "<input type='button' class='button' name='' value='Approve' onclick='doapprove(".$row['uid'].",";
        if(isset($_GET['view']) && $_GET['view']== "1"){ echo "1"; }
        else if(isset($_GET['view']) && $_GET['view']== "2"){ echo "2"; }
        else if(isset($_GET['view']) && $_GET['view']== "3"){ echo "3"; }
        else if(isset($_GET['view']) && $_GET['view']== "4"){ echo "4"; }
        else echo "1";
        echo ")'/><input type='button' class='button button2' name='' value='Pending' onclick='dopending(".$row['uid'].",";
        if(isset($_GET['view']) && $_GET['view']== "1"){ echo "1"; }
        else if(isset($_GET['view']) && $_GET['view']== "2"){ echo "2"; }
        else if(isset($_GET['view']) && $_GET['view']== "3"){ echo "3"; }
        else if(isset($_GET['view']) && $_GET['view']== "4"){ echo "4"; }
        else echo "1";
        echo ")'/>";
      }
    ?></td>
    </tr>
<?php
}
?>
  </table>      
</center>
</div>
<?php
}

mysqli_close($conn);
?>

<script>

  function doapprove(i,j)
  {
    var x=i;
    var v=j;
    var xhttp = new XMLHttpRequest();
    
    xhttp.open("GET", "../admin/student/ApprovedStudent.php?id="+x+"&view="+v, true);
    xhttp.send();

      xhttp.onreadystatechange = function()
      {
          if (this.readyState == 4 && this.status == 200)
          {
           document.getElementById("student").innerHTML = this.responseText;
          }
      };
  }

  function dopending(i,j)
  {
    var x=i;
    var v=j;
    var xhttp = new XMLHttpRequest();
    
    xhttp.open("GET", "../admin/student/PendingStudent.php?id="+x+"&view="+v, true);
    xhttp.send();

      xhttp.onreadystatechange = function()
      {
          if (this.readyState == 4 && this.status == 200)
          {
           document.getElementById("student").innerHTML = this.responseText;
          }
      };
  }
  
  function doreject(i,j)
  {
    var x=i;
    var v=j;
    var xhttp = new XMLHttpRequest();
    
    xhttp.open("GET", "../admin/student/RejectStudent.php?id="+x+"&view="+v, true);
    xhttp.send();

      xhttp.onreadystatechange = function()
      {
          if (this.readyState == 4 && this.status == 200)
          {
           document.getElementById("student").innerHTML = this.responseText;
          }
      };
  }
  
</script>