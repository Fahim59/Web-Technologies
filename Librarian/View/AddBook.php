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


 $bnameErr = $bidErr = $authorErr = $categoryErr = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["bname"])) {
    $bnameErr = "Book name is required";
    $check = 0;
  }

  if (empty($_POST["author"])) {
    $authorErr = "Author name is required";
    $check = 0;
  }

  if (empty($_POST["category"])) {
    $categoryErr = "Book category is required";
    $check = 0;
  }

 }

 
 if(isset($_POST["submit"]))  
  {
    if ($check == 1) { 
        $data['bid'] = $_POST["bid"];
        $data['bname'] = $_POST['bname'];    
        $data['author'] = $_POST["author"];
        $data['category'] = $_POST["category"];
        $data['status'] = "a";
        include '../Controller/BookSave.php';
        if(BookSave($data)) {
          $message = "Book has been saved.";
        }else {
          $message = "Book hasn't saved.";
        }

      }
    }

include '../Controller/GetBid.php';
$id =  GetBookId(); 

?> 

 <!DOCTYPE html>
 <html>
 <head>
  <title>Add Book</title>
 <style>
.error {color: #FF0000;}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<script>
  
  function ValidateAddBookForm() {
    var book = document.addbook.bname.value;
    var author = document.addbook.author.value;
    var category = document.getElementById("category");
    var check = category.options[category.selectedIndex].value;

    if (book==null || book==""){  
        alert("Book Name can't be blank");  
        return false;  
    }else if(author==null || author==""){  
        alert("Author name can't be blank");  
        return false;  
    }else if(check==0){  
        alert("Select a book category!");  
        return false;  
    }
  }

  function CheckName() {
    if (document.getElementById("bname").value == "") {
          document.getElementById("bnameErr").innerHTML = "Book name can't be blank";
          document.getElementById("bnameErr").style.color = "red";
          document.getElementById("bname").style.borderColor = "red";
      }else{
          document.getElementById("bnameErr").innerHTML = "";
        document.getElementById("bname").style.borderColor = "black";
      }
  }

  function CheckAuthor() {
    if (document.getElementById("author").value == "") {
          document.getElementById("authorErr").innerHTML = "Author name can't be blank";
          document.getElementById("authorErr").style.color = "red";
          document.getElementById("author").style.borderColor = "red";
      }else{
          document.getElementById("authorErr").innerHTML = "";
        document.getElementById("author").style.borderColor = "black";
      }
  }
</script>
 </head>
 <body>
  <form method="post" name="addbook" enctype="multipart/form-data" onsubmit="ValidateAddBookForm()">
    <fieldset>
      <legend><b>Add Book</b></legend>
      <label>Book Id: </label>
      <input type="text" name="bid" value="<?php echo $id;?>" readonly><hr>
      <label>Book Name: </label>
      <input type="text" name="bname" id="bname" onkeyup="CheckName()" onblur="CheckName()">
      <span class="error" id="bnameErr"><?php echo $bnameErr;?></span><hr>
      <label>Author Name: </label>
      <input type="text" name="author" id="author" onkeyup="CheckAuthor()" onblur="CheckAuthor()">
      <span class="error" id="authorErr"><?php echo $authorErr;?></span><hr>
      <label>Category: </label>
      <select name = "category" id="category">
        <option ></option>  
        <option value="History">History</option>
        <option value="Science">Science</option>  
        <option value="Technology">Technology</option>
        <option value="Religious">Religious</option>    
        <option value="Literature">Literature</option>  
        <option value="Fantasy">Fantasy</option>
        <option value="Biography">Biography</option>  
        <option value="Poetry">Poetry</option>
      </select>
      <span class="error"><?php echo $categoryErr;?></span><hr>
      </fieldset><hr><br><br>
      <input type="submit" name="submit" value="Submit">
      <input type="reset" name="reset" value="Reset">
    </fieldset><br><br>

    <?php   
      if(isset($message))  
        {  
          echo $message;  
        }
    ?> 
  </form>
 </body>
 </html>