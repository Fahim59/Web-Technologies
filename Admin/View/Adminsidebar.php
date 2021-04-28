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
    a.one:link {color:#ff0000;}
    a.one:visited {color:#0000ff;}
    a.one:hover {color:#DC143C;}
   </style>
</head>
<td width="220" valign="top">

		    <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin Panel</b><b><hr/>

            <ul>
                <li><a href="Logged_In_Dashboard.php" class="one" >Dashboard</a></li>
                <li><a href="Student_Info.php" class="one">Student Info</a></li>
                <li><a href="Teacher_Info.php" class="one">Teacher Info</a></li>
                <li><a href="Librarian_Info.php" class="one">Librarian Info</a></li>
                <li><a href="Add_Subject.php" class="one">Add New Subject</a></li>
                <li><a href="Assign_Teacher.php" class="one">Assign Teacher to Subject</a></li>
                <li><a href="Send_Notice.php" class="one">Send Notice to Teacher</a></li>
                <li><a href="Upload_Notice.php" class="one">Upload Notice</a></li>
                <li><a href="../admin/teacher/searchTeacher.php" class="one">Teacher Profile Update</a></li>
                <li><a href="../admin/student/searchStudent.php" class="one">Student Profile Update</a></li>
                <li><a href="../admin/librarian/searchLibrarian.php" class="one">Librarian Profile Update</a></li>
                <li><a href="Result.php" class="one">Student Result</a></li>
                <li><a href="TeacherAttendence.php" class="one">Teacher Attendence</a></li>
            </ul>

			<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Personal</b><b><hr/>

            <ul>
               
               <li><a href="../admin/searchAdmin.php" class="one">View Profile</a></li>
               <li><a href="../admin/Change_Picture.php" class="one">Change Profile Picture</a></li> 
               <li><a href="Change_Password.php" class="one">Change Password</a></li>
               <li><a href="../Logout.php" class="one">Logout</a></li>
            </ul>
</td>
<td valign="top">
    