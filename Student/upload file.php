<?php  include('database.php');  ?>


<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>upload file</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: #666;
  padding: 30px;
  text-align: Center;
  font-size: 35px;
  color: white;
}
article {
  float: Center;
  padding: 270px;
  text-align: Center;
  height: 300px; /* only for demonstration, should be removed */
}
/* Clear floats after the columns */
section::after {
  content: "";
  display: table;
  text-align: Center;
  clear: both;
}

/* Style the footer */
footer {
  background-color: #666;
  padding: 10px;
  text-align: left;
  color: white;
}

}
</style>
</head>
<body>

<header>
  <img src="midprojectlogo.jpg" alt="student" width="50" height="60"> Upload File
</header>

<section>
<?php 
$localhost = "localhost"; #localhost
$dbusername = "root"; #username of phpmyadmin
$dbpassword = "";  #password of phpmyadmin
$dbname = "webtech";  #database name
 
#connection string
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
 
if (isset($_POST["submit"]))
 {
    $uid = $picture = "";
     
    #file name with a random number so that similar dont get replaced
     $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
    
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
   
    #upload directory path
    $uploads_dir = 'images';
    #TO move the uploaded file to specific location
    move_uploaded_file($uid, $uploads_dir.'/'.$pname);
 
    #sql query to insert into database
    $sql = "INSERT into student(uid,picture) VALUES('$uid','$picture')";
 
    if(mysqli_query($conn,$sql)){
 
    echo "File Sucessfully uploaded";
    }
    else{
        echo "Error";
    }
}
 
 
?>
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Upload File to Studentnote</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
               <br><br>                
                <form method="post" enctype="multipart/form-data">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />
                        <label>UID</label>
                        <input type="text" name="uid"><br>
                        <label>File Upload</label><input type="File" name="file">
                        <input type="submit" name="submit">                    
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  
</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
</section>

<footer>
  <pre>Creative International High School</br>408/1,Kuratoli.Khilkhet,Dhaka 1229,Bangldesh</br>info@creative.edu</pre>
</footer>

</body>
</html>
