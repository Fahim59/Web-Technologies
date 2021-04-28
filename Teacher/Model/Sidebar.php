<?php
		header("Login.php");
?>
<head>
    <style>
    a:link 
    {
        text-decoration: none;
    }
    ul
    {
      list-style-type: none;
      margin: 0;
      padding: 0;
      width: 200px;
      /*background-color: #f1f1f1;*/*/
    }
    li a
    {
      display: block;
      color: #000;
      padding: 8px 16px;
      text-decoration: none;
    }
    li a:hover
    {
      background-color: green;
      color: white;
    }
   </style>
</head>
<td width="190" valign="top">
			<b>&nbsp;Teacher Panel</b><hr/>
			
            <ul>
                <li><a href="Dashboard.php" >Dashboard</a></li>
                <li><a href="Grade.php" >Subjects & Results</a></li>
                <li><a href="upload_note.php" >Upload Note</a></li>
                <li><a href="send_notice.php" >Send Notice</a></li>
                <li><a href="notification.php" >Notification</a></li>
                <li><a href="BorrowBook.php" >Borrow Book List</a></li>
                </ul> 
            <b>&nbsp;Personal</b><hr/>
            <ul>
                 <li><a href="ViewProfile.php" >View Profile</a></li>
                <li><a href="EditProfile.php" >Edit Profile</a></li>
                <!-- <li><a href="PictureUpload.php" >Change Profile Picture</a></li> -->
                <li><a href="ChangePassword.php" >Change Password</a></li>
			        	<li><a href="../Controller/LogoutController.php" >Logout</a></li>
            </ul> 
			
</td>
<td valign="top">
    