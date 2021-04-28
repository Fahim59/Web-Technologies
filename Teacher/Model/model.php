<?php
 // include( 'conn.php');
	 function db_conn(){
	 	$servername ="localhost";
		$username 	="root";
		$password 	="";
		$dbname 	="school";
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		if(!$conn){
			die("Connection Error!".mysqli_connect_error());
		}

		return $conn;


	 }

	 function login($uid,$pass){
	 		$conn = db_conn();

			  $sql = "SELECT * FROM login where uid='".$uid."' and password='".$pass."' and type='t'";
			$result = mysqli_query($conn, $sql);
			// return $sql;
			// return mysqli_num_rows($result);
			if (mysqli_num_rows($result) > 0) {
			  // output data of each row

			   while($row = mysqli_fetch_assoc($result)) {
			    // echo "id: " . $row["uid"]. " - Name: " . $row["password"]. "<br>";
			      if ($uid==$row["uid"] && $pass==$row["password"])
			                {

			                if($row["status"]=='p'){
			                	return array("status"=>false, "msg"=>'Please activate your account');
			                	// return ['false','Please activate your account'];
			                }
			                else if($row["status"]=='r'){
			                	return array("status"=>false, "msg"=>'your account is rejected');
			                	// return ['false','Please activate your account'];
			                }
			                	
			                 $_SESSION['uid'] = $row["uid"];
			                 // $_SESSION['name'] = $row["name"] ;
			                 if (isset($_POST['remember'])){
									setcookie("userid", $row['uid'], time() + (86400 * 30)); 
									setcookie("password", $row['password'], time() + (86400 * 30)); 
							}
							mysqli_close($conn);
			                return array("status"=>true, "msg"=>'Success');
			                 // return true;
			                
			                }
			            
			            }


			}

			 // else {
			   // $_SESSION['FlashMessage']="User Name or Password is Incorrect";
			   mysqli_close($conn);
			    // echo "<script>alert(Username or Password incorrect!)</script>";
			   return array("status"=>false, "msg"=>'User Name or Password is Incorrect');
			   // return false;
			// }
	}


	function registration(){
			$conn = db_conn();

        $uid=$_POST["uid"];
        $name=$_POST["name"];
        $fname =$_POST["fname"];
        $mname=$_POST["mname"];
        $email=$_POST["email"];
        $pass=$_POST["pass"];
        $cpass=$_POST["cpass"];
        $address=$_POST["address"];
        $gender=$_POST["gender"];
        $dob  =$_POST["dob"];
       // $dob  =$POST['dd']."-".$POST['mm']."-".$POST['yyyy'];
        $image =$_FILES["picture"]["name"];

        $sql2 = "INSERT INTO login VALUES ('".$uid."','".$pass."','t','p')";
      
        $sql1 = "INSERT INTO teacher(uid, name, fname, mname, address, email, gender, dob, balance, picture) VALUES ('".$uid."','".$name."','".$fname."','".$mname."','".$address."','".$email."','".$gender."','".$dob."',0,'".$image."')";

    	$result2 = mysqli_query($conn, $sql2);
    	 $result1 = mysqli_query($conn, $sql1);

			if ($result2) {
			  echo "New record created successfully";
			} else {
			  echo "Error: " . $sql2 . "<br>" .mysqli_error($conn);
			}

			    if ($result1) {
			  echo "New record created successfully";
			} else {
			  echo "Error: " . $sql1 . "<br>" .mysqli_error($conn);
			}

	}


function GetNewUserId()
{

	$conn = db_conn();
    $query = "SELECT uid FROM `login` ORDER BY uid DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
      $lastid = $row['uid'];
    if ($lastid == null)
    {
        return "1000";
    }
    else
    {
        return $lastid + 1;
    }
}


function GetUser()
{

	


    $conn = db_conn();
	$uid=$_SESSION['uid'];
	$query = "SELECT * FROM `teacher` where uid='".$uid."' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    mysqli_close($conn);

    return $row;
    
}

function ViewProfile()
{
	$conn = db_conn();
	$uid=$_SESSION['uid'];
	$query = "SELECT * FROM `teacher` where uid='".$uid."' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    return $row;




}


function EditProfile()
{
	
	$conn = db_conn();
	$uid=$_SESSION['uid'];
	 $image =$_FILES["picture"]["name"];
 
	 // return false;
	
	if( $image!='')
    {
	echo "inside image";
	
	$query = "UPDATE teacher SET name='".$_POST["name"]."', email='".$_POST["email"]."', fname='".$_POST["fname"]."', mname='".$_POST["mname"]."', address='".$_POST["address"]."', gender='".$_POST["gender"]."', picture='". $image."', 
	 dob='".$_POST["dob"]."'  where uid='".$_SESSION["uid"]."'";

	}

	else{
		echo "outside image";
		$query = "UPDATE teacher SET name='".$_POST["name"]."', email='".$_POST["email"]."', fname='".$_POST["fname"]."', mname='".$_POST["mname"]."', address='".$_POST["address"]."', gender='".$_POST["gender"]."',  
	 dob='".$_POST["dob"]."'  where uid='".$_SESSION["uid"]."'";

	}
	// return false;


		


 	   	if(mysqli_query($conn, $query)){
			
			header("Location:ViewProfile.php");
		}else{
			echo "<br/> SQL Error".mysqli_error($conn);
		}

		mysqli_close($conn);
}
		
	


function ChangePassword($oldPass,$newPass){
	$conn = db_conn();
	$uid=$_SESSION['uid'];
	$query = "update `login` set password='".$newPass."' where uid='".$uid."' and password='".$oldPass."'";
	$result = mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

	// return $result;


}

function NoticeFromAdmin(){
	$conn = db_conn();
	$uid =$_SESSION['uid'];
    $query = "select * from teachernotice where uid='".$uid."'";
	$result = mysqli_query($conn, $query);
	return $result;

	// return $result;


}

   function StudentResult($uid,$class,$subject,$mid,$final){
   	 if($class=="classsix")
			$class = 6;
		else if($class=="classseven")
		    $class = 7;
		else if($class=="classeight")
			$class = 8;
		else if($class=="classnine")
			$class = 9;
		else if($class=="classten")
			$class = 10;


	if($mid==""){$mid='null';}
	if($final==""){$final='null';}
	$conn = db_conn();
    $tid =$_SESSION['uid'];

    $query1="delete from result where uid='".$uid."'  and class=".$class." and subject='".$subject."' ";
    // return $query1;
    mysqli_query($conn, $query1);

    $query = "INSERT INTO `result`( `uid`, `class`, `subject`, `mid`, `final`, `tid`) 
    VALUES ('".$uid."',".$class.",'".$subject."',".$mid.",".$final.",'".$tid."')";
	$result = mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

    // return $query;


}

 function StudentNoteSend($myfile,$class,$subject){
 	$conn = db_conn();
 	$uid =$_SESSION['uid'];

 	// if(isset($_POST['class'])){
		//  if($_POST['class']=="classsix")
		// 	$class = 6;
		// else if($_POST['class']=="classseven")
		// 	$class = 7;
		// else if($_POST['class']=="classeight")
		// 	$class = 8;
		// else if($_POST['class']=="classnine")
		// 	$class = 9;
		// else if($_POST['class']=="classten")
		// 	$class = 10;
	
 	// }
 	
 	   if($class=="classsix")
			$class = 6;
		else if($class=="classseven")
		    $class = 7;
		else if($class=="classeight")
			$class = 8;
		else if($class=="classnine")
			$class = 9;
		else if($class=="classten")
			$class = 10;

     $query = "INSERT INTO `studentnote`( `uid`, `subject`, `class`, `note`) 
     VALUES ('".$uid."','".$subject."',".$class.",'".$myfile."')";
 	
 	$result = mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);

 	// return $result;


 }


 function StudentNoticeSend($class,$subject,$title,$notice)
 
 	{
 	$conn = db_conn();
 	$uid =$_SESSION['uid'];

 //  	if(isset($_POST['class'])){
	// 	 if($_POST['class']=="classsix")
	// 		$class = 6;
	// 	else if($_POST['class']=="classseven")
	// 		$class = 7;
	// 	else if($_POST['class']=="classeight")
	// 		$class = 8;
	// 	else if($_POST['class']=="classnine")
	// 		$class = 9;
	// 	else if($_POST['class']=="classten")
	// 		$class = 10;
	// }

     if($class=="classsix")
			$class = 6;
		else if($class=="classseven")
		    $class = 7;
		else if($class=="classeight")
			$class = 8;
		else if($class=="classnine")
			$class = 9;
		else if($class=="classten")
			$class = 10;

 
 	
     $query = "INSERT INTO `studentnotice`( `uid`, `subject`, `class`, `title`,`notice`) 
     VALUES ('".$uid."','".$subject."','".$class."','".$title."','".$notice."')";
 	$result = mysqli_query($conn, $query);
	
	// return $query;

	return mysqli_affected_rows($conn);

 	return $result;


 }




function GetSubForClass($class){

	$conn = db_conn();
	$uid =$_SESSION['uid'];
	if($class!=""){
		  $query = "select * from ".$class." where uid='".$uid."'";
	$result = mysqli_query($conn, $query);
	// return mysqli_affected_rows($conn);
	// return $query;

	$view=" <select name='subject' id='subject' required>";
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
			$view.="<option value='".$row['subject']."'>".$row['subject']."</option>";
		}
	}
	else {
		//$view.="<option value=''>You are not assign any Subject</option>";
		return "You are not assign any Subject";
	}

		$view.="</select>";

		return $view;
	}
  

}

function GetStudentByClass($class){
	$conn = db_conn();
 	$uid =$_SESSION['uid'];

  	
		 if($class=="classsix")
			$cl = 6;
		else if($class=="classseven")
			$cl = 7;
		else if($class=="classeight")
			$cl = 8;
		else if($class=="classnine")
			$cl = 9;
		else if($class=="classten")
			$cl = 10;


		$query = "select * from student where class='".$cl."'";
		$result = mysqli_query($conn, $query);
		$view=" <select name='sid' id='student' onchange='getStudentMark()' required> <option value='0'>Select Student</option>";
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
			$view.="<option value='".$row['uid']."'>".$row['uid']."</option>";
		}
	}
	else {
		return "No Student in this class";
	}

		$view.="</select>";

		return $view;
	}



function GetStudentMark($sid,$class,$subject){
	$conn = db_conn();
	 if($class=="classsix")
			$cl = 6;
		else if($class=="classseven")
			$cl = 7;
		else if($class=="classeight")
			$cl = 8;
		else if($class=="classnine")
			$cl = 9;
		else if($class=="classten")
			$cl = 10;



	$query = "select * from result where class='".$cl."' and uid='".$sid."' and subject='".$subject. "' order by id desc limit 1";
	$result = mysqli_query($conn, $query);
	// return $query;
	if (mysqli_num_rows($result)>0){

			   while($row = mysqli_fetch_assoc($result)) {
			    // echo "id: " . $row["uid"]. " - Name: " . $row["password"]. "<br>";
			    	$arr = array('mid' => $row["mid"], 'final' => $row["final"]);
			  

			    }
			}
	else{
		$arr = array('mid' => null, 'final' =>null);

	}
	
	mysqli_close($conn);
					
	return json_encode($arr);


}


	

	// return $cl;


// }




?>