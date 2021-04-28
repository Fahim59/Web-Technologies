<?php 

$server = "localhost";
$dbuser = "root";
$dbpass = "";
$database = "webtech";

$conn = mysqli_connect($server, $dbuser, $dbpass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

$base_url = "http://localhost/File%20Upload%20&%20Download%20Using%20PHP%20&%20MySQL/source%20file/"; // Website url

?>