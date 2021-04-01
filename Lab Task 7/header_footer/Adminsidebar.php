<?php

if($_SESSION["type"]!="a")
header("Location:../Login.php");

?>
<head>
    <style>
    a:link 
    {
        text-decoration: none;
    }
   </style>
</head>
<td width="220" valign="top">

		    <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin Panel</b><hr/>

            <ul>
                <li><a href="Logged_In_Dashboard.php" >Dashboard</a></li>
                <li><a href="Student_Info.php" >Student Info</a></li>
                <li><a href="Teacher_Info.php" >Teacher Info</a></li>
                <li><a href="Add_Subject.php" >Add New Subject</a></li>
                <li><a href="Assign_Teacher.php" >Assign Teacher to Subject</a></li>
                <li><a href="Send_Notice.php" >Send Notice to Teacher</a></li>
                <li><a href="Upload_Notice.php" >Upload Notice</a></li>
                <li><a href="../admin/teacher/searchTeacher.php" >Teacher Profile Update</a></li>
                <li><a href="../admin/student/searchStudent.php" >Student Profile Update</a></li>
                <li><a href="../admin/librarian/searchLibrarian.php" >Librarian Profile Update</a></li>
            </ul>

			<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Personal</b><hr/>

            <ul>
               
               <li><a href="../admin/searchAdmin.php" >View Profile</a></li>
               <li><a href="../admin/Change_Picture.php" >Change Profile Picture</a></li> 
               <li><a href="Change_Password.php" >Change Password</a></li>
               <li><a href="../Logout.php" >Logout</a></li>
            </ul>
</td>
<td valign="top">
    