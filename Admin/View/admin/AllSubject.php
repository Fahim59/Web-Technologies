<?php include "../../Model/conn.php"; ?>
<?php
  
  $sql = "SELECT DISTINCT subject FROM allsubjects;";
  
  $result = mysqli_query($conn, $sql);
  
  if(mysqli_num_rows($result)>0)
  {
    ?>
    <select name = "scombo">

    <?php while($row=mysqli_fetch_assoc($result))
    {
    ?>
        <option value="<?php echo $row['subject'];?>"><?php echo $row['subject'];?></option>
    <?php 
    } 
    ?> 
    </select>
  
    <?php
  }
  else
  {
    echo "No Approved Teacher Available!";
  }

  mysqli_close($conn);
?>