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


	$message = '';  
 	$check = 1;  


 $bidErr = $uidErr = $idateErr = $ddateErr = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["bid"])) {
    $bidErr = "Book id is required";
    $check = 0;
  }

  if (empty($_POST["uid"])) {
    $uidErr = "User id is required";
    $check = 0;
  }

  if (empty($_POST["idate"])) {
    $idateErr = "Issue date is required";
    $check = 0;
  }

  if (empty($_POST["ddate"])) {
    $ddateErr = "Due date is required";
    $check = 0;
  }

 }

 
 if(isset($_POST["submit"]))  
  {
    if ($check == 1) {
        $data['id'] = $_POST["id"];
        $data['bid'] = $_POST["bid"];
        $data['uid'] = $_POST['uid'];    
        $data['idate'] = $_POST["idate"];
        $data['ddate'] = $_POST["ddate"];
        $data['status'] = "n/a";

        include '../Controller/Issue.php';
        if(BookIssue($data)) {
          $message = "Book has been issued.";
        }else {
          $message = "Book hasn't issued.";
        }

      }
    }

    include '../Controller/IssueID.php';
    $id = GetID();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Issue Book</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <style>
		.error {color: #FF0000;}
	</style>

  <script>
    
    function ValidateIssueForm() {
      var bid = document.issuebook.bid.value;
      var uid = document.issuebook.uid.value;
      var idate = document.issuebook.idate.value;
      var ddate = document.issuebook.ddate.value;

      if (bid==null || bid==""){  
        alert("Book ID can't be blank");  
        return false;  
      }else if(uid==null || uid==""){  
          alert("User ID can't be blank");  
          return false;  
      }else if(idate==null || idate==""){  
          alert("Issue date can't be blank");  
          return false;  
      }else if(ddate==null || ddate==""){  
          alert("Due date can't be blank");  
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
  </script>
</head>
<body>
	<form method="post" enctype="multipart/form-data" name="issuebook" onsubmit="ValidateIssueForm()">
		<fieldset>
			<legend><b>ISSUE BOOKS</b></legend>
          <label>Issue Id: </label>
          <input type="text" name="id" value="<?php echo $id;?>" readonly><hr>
			    <label>Book ID:</label>
      		<input type="text" name="bid" id="bid" onkeyup="CheckBID()" onblur="CheckBID()">
      		<span class="error" id="bidErr"><?php echo $bidErr;?></span><hr>
      		<label>User ID:</label>
      		<input type="text" name="uid" id="uid" onkeyup="CheckUID()" onblur="CheckUID()">
      		<span class="error" id="uidErr"><?php echo $uidErr;?></span><hr>
      		<label>Issue Date:</label>
      		<input type="Date" name="idate" id="idate">
      		<span class="error" id="idateErr"><?php echo $idateErr;?></span><hr>
      		<label>Due Date:</label>
      		<input type="Date" name="ddate" id="ddate">
      		<span class="error" id="ddateErr"><?php echo $ddateErr;?></span><hr><br>
      		<input type="submit" name="submit" value="Submit">
      		<input type="reset" name="reset" value="Reset">

		</fieldset>

		<?php   
      if(isset($message))  
        {  
          echo $message;  
        }
    ?> 
    </form>
</body>
</html>