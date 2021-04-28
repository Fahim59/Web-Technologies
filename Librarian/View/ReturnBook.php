<?php
	session_start();
	if (isset($_SESSION['userid'])) 
	{

		include "LoginHeader.php";
		include "Sidebar.php";
	}
	else
	{
    echo '<script>alert("Login First!")</script>';
    echo '<script>location.href="Login.php"</script>';
	}

 
 $check = 1;

 $bidErr = $uidErr = $idErr = $rdateErr = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["bid"])) {
    $bidErr = "Book id is required";
    $check = 0;
  }

  if (empty($_POST["uid"])) {
    $uidErr = "User id is required";
    $check = 0;
  }

   if (empty($_POST["id"])) {
    $idErr = "Issue id is required";
    $check = 0;
  }

  if (empty($_POST["rdate"])) {
    $rdateErr = "Return date is required";
    $check = 0;
  }

 }

 if(isset($_POST["submit"]))  
  {
    if ($check == 1) { 
        $data['bid'] = $_POST["bid"];
        $data['uid'] = $_POST['uid'];
        $data['id'] = $_POST['id'];    
        $data['rdate'] = $_POST["rdate"];
        $data['status'] = "a";

        include '../Controller/Return.php';
        BookReturn($data);

      }
    }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Return Book</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  	<style>
		.error {color: #FF0000;}
	</style>

    <script>
    
    function ValidateReturnForm() {
      var bid = document.returnbook.bid.value;
      var uid = document.returnbook.uid.value;
      var id = document.returnbook.id.value;
      var rdate = document.returnbook.rdate.value;

      if (bid==null || bid==""){  
        alert("Book ID can't be blank");  
        return false;  
      }else if(uid==null || uid==""){  
          alert("User ID can't be blank");  
          return false;  
      }else if(id==null || id==""){  
          alert("Issue ID can't be blank");  
          return false;  
      }else if(rdate==null || rdate==""){  
          alert("Return date can't be blank");  
          return false;  
      }
    }

    function CheckBID() {
      if (document.getElementById("bid").value == "") {
          document.getElementById("bidErr").innerHTML = "Book ID can't be blank";
          document.getElementById("bidErr").style.color = "red";
          document.getElementById("bid").style.borderColor = "red";
      }else{
        document.getElementById("bidErr").innerHTML = "";
        document.getElementById("bid").style.borderColor = "black";
      }
    }

    function CheckUID() {
      if (document.getElementById("uid").value == "") {
          document.getElementById("uidErr").innerHTML = "User ID can't be blank";
          document.getElementById("uidErr").style.color = "red";
          document.getElementById("uid").style.borderColor = "red";
      }else{
        document.getElementById("uidErr").innerHTML = "";
        document.getElementById("uid").style.borderColor = "black";
      }
    }

    function CheckID() {
      if (document.getElementById("id").value == "") {
          document.getElementById("idErr").innerHTML = "Issue ID can't be blank";
          document.getElementById("idErr").style.color = "red";
          document.getElementById("id").style.borderColor = "red";
      }else{
        document.getElementById("idErr").innerHTML = "";
        document.getElementById("id").style.borderColor = "black";
      }
    }
  </script>
</head>
<body>
	<form method="post" enctype="multipart/form-data" name="returnbook" onsubmit="ValidateReturnForm()">
		<fieldset>
			<legend><b>RETURN BOOKS</b></legend>
			<label>Book ID:</label>
      		<input type="text" name="bid" id="bid" onkeyup="CheckBID()" onblur="CheckBID()">
      		<span class="error" id="bidErr"><?php echo $bidErr;?></span><hr>
      		<label>User ID:</label>
      		<input type="text" name="uid" id="uid" onkeyup="CheckUID()" onblur="CheckUID()">
      		<span class="error" id="uidErr"><?php echo $uidErr;?></span><hr>
      		<label>Issue ID:</label>
      		<input type="text" name="id" id="id" onkeyup="CheckID()" onblur="CheckID()">
      		<span class="error" id="idErr"><?php echo $idErr;?></span><hr>
      		<label>Return Date:</label>
      		<input type="Date" name="rdate" id="rdate">
      		<span class="error" id="rdateErr"><?php echo $rdateErr;?></span><hr><br>
      		<input type="submit" name="submit" value="Submit">
      		<input type="reset" name="reset" value="Reset">

		</fieldset>
    </form>
</body>
</html>