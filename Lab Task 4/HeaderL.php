<?php 

$id="Mustafiz";
$pass="admin123@";

session_start();
?>
<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">
    <tr>
        <td colspan="2" valign="middle" height="70">  
			<table width="100%">
                <tr>
                    <td>
                        <img height="55" src="aiub.png">
                    </td>
                    <td align="right">

                    Logged in as <a href="<?php if(isset($_SESSION['id'])) {echo "Logged_In_Dashboard.php";} else { echo "Login.php";} ?>" ><?php echo $_SESSION["id"]; ?></a>&nbsp;|
                        <a href="Logout.php">Logout</a>
                    </td>
                </tr>
			</table>
        </td>
    </tr>
    <tr>