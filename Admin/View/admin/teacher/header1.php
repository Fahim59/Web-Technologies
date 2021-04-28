<?php

    session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
</head>
<style>
    a.one:link {color:#ff0000;}
    a.one:visited {color:#0000ff;}
    a.one:hover {color:#DC143C;}
   </style>
<body>

          
	<table width="80%" align="center">

        <td align="right" height="60">

        <img align="left" height="55" src="../../image/logo.png">

        <br>Logged in as <a href="<?php if($_SESSION["type"]=="a") {echo "../Logged_In_Dashboard.php";} else {echo "../../Login.php";} ?>"class="one"><?php echo $_SESSION["name"]; ?></a>&nbsp;|
                    <a href="../../Logout.php"class="one">Logout</a>

        </td>

	</table>

</body>
</html>