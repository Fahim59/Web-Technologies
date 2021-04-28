<?php include "../headerL.php";?>
<?php include "../Adminsidebar.php";?>
<?php include "../../Model/conn.php"; ?>

<!DOCTYPE html>  
 <html>  
      <head>  
        <title>Attendence Sheet</title>
        <style>
          .text
          {
            text-align: center;
          }
        </style> 
             
      </head>  
      <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">
      <fieldset style="width: 96%;" align="left">
      <legend class="text"><b>TEACHER ATTENDENCE</b></legend> 
        <div class="container" >              
                <div class="table-responsive"> 
                     <table class="table table-bordered">  
                          <tr>  
                              <th>User Id<?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';?></th>
                              <th>Attendence<?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';?></th>
                              <th>Date</th>
                          </tr>  
                          <?php   
                          $data = file_get_contents("data.json");  
                          $data = json_decode($data, true);  
                          foreach($data as $row)  
                          {  
                            echo '<tr>
                               
                            <td>'.$row["user"].'</td>
                            <td>'.$row["type"].'</td>
                            <td>'.$row["dob"].'</td>
                            </tr>';  
                          }  
                          ?>
                     </table>
                </div>
        </div>
      </fieldset>
      <br>
      
      </body>  
 </html>  