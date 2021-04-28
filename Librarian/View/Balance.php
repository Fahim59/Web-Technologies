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


 $uidErr = $amountErr = $amount = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["uid"])) {
    $uidErr = "User id is required";
    $check = 0;
  }

  if (empty($_POST["amount"])) {
    $amountErr = "Amount is required";
    $check = 0;
  }else{
    $amount = $_POST['amount'];
    if ($amount < 1) {
       $amountErr = "Amount must be greater than zero";
       $check = 0;
    }
  }


 }

 
 if(isset($_POST["submit"]))  
  {
    if ($check == 1) { 
        $data['uid'] = $_POST['uid'];
        $data['amount'] = $_POST['amount'];

        include '../Controller/Recharge.php';
        if(Recharge($data)) {
          $message = "Recharge Successfull!";
        }else {
          $message = "Recharge Failed!";
        }

      }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Balance Recharge</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <style>
		.error {color: #FF0000;}
	</style>

    <script>
    
    function ValidateBalanceForm() {
      var uid = document.balance.uid.value;
      var amount = document.balance.amount.value;

      if(uid==null || uid==""){  
          alert("User ID can't be blank");  
          return false;  
      }else if(amount==null || amount==""){  
          alert("Amount can't be blank");  
          return false;  
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

      function CheckAm() {
       var amount = document.balance.amount.value; 
      if (document.getElementById("amount").value == "") {
          document.getElementById("amountErr").innerHTML = " Amount can't be blank";
          document.getElementById("amountErr").style.color = "red";
          document.getElementById("amount").style.borderColor = "red";
      }else if(amount<1){
        document.getElementById("amountErr").innerHTML = " Amount must be greater than zero ";
        document.getElementById("amountErr").style.color = "red";
        document.getElementById("amount").style.borderColor = "red";
      }else{
        document.getElementById("amountErr").innerHTML = "";
        document.getElementById("amount").style.borderColor = "black";
      }
    }
  </script>
</head>
<body>
	<form method="post" enctype="multipart/form-data" name="balance" onsubmit="ValidateBalanceForm()">
		<fieldset>
			<legend><b>Balance Recharge</b></legend>
      		<label>User ID:</label>
      		<input type="text" name="uid" id="uid" onkeyup="CheckUID()" onblur="CheckUID()">
      		<span class="error" id="uidErr"><?php echo $uidErr;?></span><hr>
      		<label>Amount:</label>
      		<input type="text" name="amount" id="amount" onkeyup="CheckAm()" onblur="CheckAm()">
      		<span class="error" id="amountErr"><?php echo $amountErr;?></span><hr><br>
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