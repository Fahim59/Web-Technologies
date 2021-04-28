<?php  include('../Model/model.php');?>
<?php include "../Controller/HeaderL.php"; ?>
<?php  include('../Model/Sidebar.php');?>
<?php include('../Controller/SendNoticeController.php');?>



<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
 
      label
      {
        display: inline-block;
        width: 20%;
        padding: 1%; 
     }
         .errorBox
         {
         color:#F00;
         }
      }


  </style>




  <title>Upload Notes</title>
   
</head>
<body>
  <?php
  if(isset($_SESSION['message']))
  echo $_SESSION['message'];
 unset($_SESSION['message']);

  ?>

<fieldset>
    <legend><b>Send Notice</b></legend>
  <form action=""  method="POST" name="Send_Notice" onsubmit=" return noticeVal();"  >
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td>Class</td>
        <td>:</td>
        <td>
          <select name="class" id="class" onchange="showsubjectcombo(this)" >
            <option value="" >Select</option>
          <option value="classsix" >6</option>
          <option value="classseven" >7</option>
          <option value="classeight" >8</option>
          <option value="classnine" >9</option>
          <option value="classten" >10</option>
          </select>
        </td>
        <td></td>
        <td><div class="errorBox" id="classErr"><?php echo $eclass; ?></div></td>
      </tr>   
      <tr><td colspan="5"><hr/></td></tr>
      
        <tr>
        <td>Subjects</td>
        <td>:</td>
        <td>
          <div id="subject"></div> 
        </td>
        <td></td>
          <td><div class="errorBox" id="subjectErr"><?php echo $esubject; ?></div></td>
        <td></td>
      </tr>   
        
      <tr><td colspan="5"><hr/></td></tr>
      <tr>
        <td>Title</td>
        <td>:</td>
        <td><input name="title" type="text " id="title" onkeyup="checkTitle()" onblur="checkTitle()"></td>
        <td></td>
        <td><div class="errorBox" id="titleErr"><?php echo $etitle; ?></div></td>
        
      </tr>   
      <tr><td colspan="5"><hr/></td></tr>
      <tr>
        <td>Notice</td>
        <td>:</td>
        <td> <textarea name="notice"  rows="5" id="notice" onkeyup="checkNotice()" onblur="checkNotice()"></textarea></td>
        <td></td>
        <td><div class="errorBox" id="noticeErr"><?php echo $enmessage; ?></div></td>
        
      </tr>   
      <tr><td colspan="5"><hr/></td></tr>
    </table>
    
    <input type="submit" name="submit" value="Submit">
    <input type="reset">
  </form>
</fieldset>


<script >
  function showsubjectcombo(x){
    var data=$(x).val();
     document.getElementById("classErr").innerHTML = "";
    
    $.ajax({

        url: '../Controller/UploadNoticeController.php',
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
 
     function noticeVal(){  
      var title=document.Send_Notice.title.value;
      var notice=document.Send_Notice.notice.value;
      var clss=document.Send_Notice.class.value;
       //var subject=document.Send_Notice.subject.value;

    

       
       if (clss==null || clss==""){  
        // alert("Class can't be blank"); 
        document.getElementById("classErr").innerHTML = "Class Must be selected"; 
        document.getElementById("classErr").style.color = "red";
        return false;  
      }

         try{
      var subject=document.Send_Notice.subject.value;  
    }
     catch{
      document.getElementById("subjectErr").innerHTML = "Subject Must be selected"; 
        document.getElementById("subjectErr").style.color = "red";
        return false;  
    }
        
      if (title==null || title==""){  
         document.getElementById("titleErr").innerHTML = "Title can't be blank";
        return false;  
      }else if(title.length<3){  
        // alert("Title must be at least 3 characters long."); 
         document.getElementById("titleErr").innerHTML = "Title must be at least 3 characters long.";
        return false;  
      } 
      else if (notice==null || notice==""){  
         document.getElementById("noticeErr").innerHTML = "Notice can't be blank";
        // alert("Notice can't be blank");  
        return false;  
      }else if(notice.length<5){  
        document.getElementById("noticeErr").innerHTML = "Notice must be at least 5 characters long.";
        // alert("Title must be at least 5 characters long.");  
        return false;  
      } 

      return true;
    }
    function checkEmpty() {
        if (document.Send_Notice.title.value = "") {
          alert("Title can't be blank");
            return false;  
        }
        if (document.Send_Notice.notice.value = "") {
          alert("Notice can't be blank");
            return false;  
        }
      }  
  
         function checkTitle(){
          if (document.getElementById("title").value == "") {
          document.getElementById("titleErr").innerHTML = "Title can't be blank";
          document.getElementById("titleErr").style.color = "red";
          document.getElementById("title").style.borderColor = "red";
      }else if(document.getElementById("title").value.length<3){
          document.getElementById("title").style.borderColor = "red";
          document.getElementById("titleErr").style.color = "red";
        document.getElementById("titleErr").innerHTML = "Title must be at least 3 characters long.";
      }
      else{
        document.getElementById("titleErr").innerHTML = "";
          document.getElementById("titleErr").style.color = "red";
        document.getElementById("title").style.borderColor = "black";
      }
        }

        function checkNotice(){
          if (document.getElementById("notice").value == "") {
          document.getElementById("noticeErr").innerHTML = "Notice can't be blank";
          document.getElementById("noticeErr").style.color = "red";
          document.getElementById("notice").style.borderColor = "red";
      }else if(document.getElementById("notice").value.length<5){
          document.getElementById("notice").style.borderColor = "red";
          document.getElementById("noticeErr").style.color = "red";
        document.getElementById("noticeErr").innerHTML = "Notice must be at least 5 characters long.";
      }
      else{
        document.getElementById("noticeErr").innerHTML = "";
          document.getElementById("noticeErr").style.color = "red";
        document.getElementById("notice").style.borderColor = "black";
      }
        }
      
</script> 

  </body>
</html>