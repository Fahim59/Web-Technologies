<?php 


session_start();
if(!isset($_SESSION['uid'])){
    header("location:Login.php");
}
?>
<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">
    <tr>
        <td colspan="2" valign="middle" height="70">  
			<table width="100%">
                <tr>
                    <td>
                        <img height="100" src="../Upload/aiub.jpg">
                    </td>
                    <td align="right">

                    Logged in as <a href="<?php if(isset($_SESSION['uid']))
                     {
                        echo "Dashboard.php";
                    }
                         else { echo "Login.php";} ?>" >
                         <?php $user =GetUser();  ?>
                    <?php echo $user['name']; ?>
                        
                    </a>&nbsp;|
                        <a href="../Controller/LogoutController.php">Logout</a>

                        
                         
                    </td>
                </tr>
			</table>
        </td>
    </tr>
    <tr>