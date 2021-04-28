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

	<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">
    <tr>
        <td colspan="2" valign="middle" height="60">  
			<table width="100%">
                <tr>
                    <td>
                        <img align="left" height="55" src="../image/logo.png">
                    </td>
                    
                    <td align="right">

                    <br>Logged in as <a href="<?php if($_SESSION["type"]=="a") {echo "Logged_In_Dashboard.php";} else {echo "../Login.php";} ?>"class="one"><?php echo $_SESSION["name"]; ?></a>&nbsp;|
                    <a href="../Logout.php"class="one">Logout</a>
                    
                    </td>
                </tr>
			</table>
        </td>
    </tr>
    <tr>

</body>
</html>