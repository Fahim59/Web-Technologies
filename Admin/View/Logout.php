<?php

	session_start();
	session_destroy();
	setcookie("uid", "", time() - (86400 * 30), "/");
	setcookie("type", "", time() - (86400 * 30), "/");
	header("Location:Login.php");
?>