<?php
$host="localhost"; // Host name 
$dbusername="root"; // Mysql username 
$dbpassword=""; // Mysql password 
$db_name="webtech"; // Database name 

// Connect to server and select databse.
$db= mysqli_connect("$host", "$dbusername", "$dbpassword","webtech")or die("cannot connect"); 


?>