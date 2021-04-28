<?php 

session_start();
session_destroy();
if (isset($_COOKIE["userid"]) AND isset($_COOKIE["password"])){
		setcookie("userid", '', time() - (3600));
		setcookie("password", '', time() - (3600));
}
echo "<script>location.href='../View/Login.php'</script>";
?>