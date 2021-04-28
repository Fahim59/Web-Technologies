<?php include "../Model/model.php"; ?>
<?php include "../Controller/HeaderL.php"; ?>
<?php  include('../Model/Sidebar.php');?>
<?php include "../Controller/uploadN.php"; ?>


<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <!--  <style>
      label
      {
        display: inline-block;
        width: 20%;
        padding: 1%; 
      }
  </style> -->
  <title>Upload Notes</title>
   
</head>
<body>
  <?php
  if(isset($_SESSION['message']))
  echo $_SESSION['message'];
 unset($_SESSION['message']);

  ?>

 

 
<fieldset>
    <legend><b>UPLOAD NOTE</b></legend>
 <form  method="POST" name="Send_Note" onsubmit="return noteVal();" enctype="multipart/form-data" >
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td>Class</td>
        <td>:</td>
        <td>
          <select name="class" id="class" onchange="showsubjectcombo(this)" >
          <option value="">Select</option>
          <option value="classsix" >6</option>
          <option value="classseven" >7</option>
          <option value="classeight" >8</option>
          <option value="classnine" >9</option>
          <option value="classten" >10</option>
          </select>
        </td>
         <td><div id="classErr"></div></td>
        <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>
      
        <tr>
        <td>Subjects</td>
        <td>:</td>
        <td>
          <div id="subject"></div> 
        </td>
        <!-- <td></td> -->
        <td><div id="subjectErr"></div></td>
           <td></td>
      </tr>   
        
      <tr><td colspan="4"><hr/></td></tr>
      <tr>
        <td>File</td>
        <td>:</td>
        <td><input type="file" name="myfile"   /><br/></td>
      
        <td><div id="fileErr"></div></td>
          <td></td>
      </tr>   
      <tr><td colspan="4"><hr/></td></tr>
    </table>
    <input type="submit" value="Upload">    
  </form>
</fieldset>

<script >
  function showsubjectcombo(x){
    var data=$(x).val();
    
    $.ajax({

        url: '../Controller/UploadNoteController.php',
        data: {'data' : data},
        method: 'POST',
        cache: false,
        success: function(result) {
          // alert(result);
          // console.log(result);
          $('#subject').html(result);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          if(jqXHR.status == '500') {
            alert('Internal server error: 500');
          } else {
            alert('Unexpected error');
          }
        }
})


  }

  function noteVal(){ 
     document.getElementById("classErr").innerHTML ="";

  	var clss=document.Send_Note.class.value;
    
  	
  	var myfile=document.Send_Note.myfile.value;

  	  if (clss==null || clss==""){  
        // alert("Class can't be blank"); 
        document.getElementById("classErr").innerHTML = "Class Must be selected"; 
        document.getElementById("classErr").style.color = "red";
        return false;  
      }

      try{
      var subject=document.Send_Note.subject.value;  
    }
    catch{
      document.getElementById("subjectErr").innerHTML = "Subject Must be selected"; 
        document.getElementById("subjectErr").style.color = "red";
        return false;  
    }

      if (subject==null || subject==""){  
        // alert("Class can't be blank"); 
        document.getElementById("subjectErr").innerHTML = "Subject Must be selected"; 
        document.getElementById("subjectErr").style.color = "red";
        return false;  
      }

      if (myfile==null || myfile==""){  
        // alert("Class can't be blank"); 
        document.getElementById("fileErr").innerHTML = "File Must be selected"; 
        document.getElementById("fileErr").style.color = "red";
        return false;  
      }
    }
</script>

  </body>
</html>