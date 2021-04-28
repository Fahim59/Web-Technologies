<?php  include('../Model/model.php');?>
<?php include "../Controller/HeaderL.php"; ?>
<?php  include('../Model/Sidebar.php');?>
<?php include('../Controller/GradeController.php');?>

<!DOCTYPE html>
<html>
<head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <style>
 
         .errorBox
         {
         color:#F00;
         }
      }


  </style>
 
  <title>Upload Marks</title>
   
</head>
<body>

 
<fieldset>
    <legend><b>SUBJECTS & RESULTS</b></legend>
  <form action="#" method="POST" name="Submit_Grade" onsubmit=" return GradeVal();">
    <br/>
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td>Class</td>
        <td>:</td>
        <td>
          <select name = "class" id="class" onchange="showsubjectcombo(this)">
          <option value="" >Select</option>
          <option value="classsix" >6</option>
          <option value="classseven" >7</option>
          <option value="classeight" >8</option>
          <option value="classnine" >9</option>
          <option value="classten" >10</option>
          </select>
        </td>
        
        <td><div class="errorBox" id="classErr"><?php echo $eclass; ?></div></td>
        <td></td>
         <td></td>
        
      </tr>   
      <tr><td colspan="6"><hr/></td></tr>
      <tr>
        <td>Subjects</td>
        <td>:</td>
        <td>
        <div id="subject"></div> 
        </td>
        <!-- <td></td> -->
        <td><div class="errorBox" id="subjectErr"><?php echo $esubject; ?></div></td>
         <td></td>
          <td></td>
      </tr>   
      <tr><td colspan="6"><hr/></td></tr>
      <tr>
        <td>Student Id</td>
        <td>:</td>
        <td>
        <div id="sid"></div>
        </td>
        <!-- <td></td> -->
        <td><div class="errorBox" id="sidErr"><?php echo $esid; ?></div></td>
         <td></td>
          <td></td>
      </tr>   
      <tr><td colspan="6"><hr/></td></tr>
      <tr>
        <td>Midterm Mark</td>
        <td>:</td>
        <td> <input id="Mark1" name="mid" type="number" min="0" max="100" onkeyup="MarkVal()"></td>
        <td><div id="marksErr"></div></td>
        <td>Total Marks:100 Pass Marks:50</td>
           <td><div id="marksErr"></div></td>
      </tr>   
      <tr><td colspan="6"><hr/></td></tr>
      <tr>
        <td>Finalterm Mark</td>
        <td>:</td>
        <td><input id="Mark2" name="final"  type="number" min="0" max="100" onkeyup="MarkVal()"></td>
          <td><div id="marksErr"></div></td>
        <td>Total Marks:100 Pass Marks:50</td>
            
      </tr>   
      <tr><td colspan="6"><hr/></td></tr>
    </table>
    
    <input type="submit" value="Save">    
  </form>
</fieldset>



<script>
  function resetVal(){
   // # = id, . = class
    $('#Mark1').val(null);
    $('#Mark2').val(null);
    $('#subject').html('');
    $('#sid').html('');


  }

  function MarkVal(){
     var mid = document.getElementById('Mark1').value;
     var final = document.getElementById('Mark2').value;

  }



  function GradeVal(){ 

    var clss=document.Submit_Grade.class.value;
    var mid = document.getElementById('Mark1').value;
    var final = document.getElementById('Mark2').value;
    
    
    

      if (clss==null || clss==""){  
        // alert("Class can't be blank"); 
        document.getElementById("classErr").innerHTML = "Class Must be selected"; 
        document.getElementById("classErr").style.color = "red";
        return false;  
      }

      try{
      var subject=document.Submit_Grade.subject.value;  
    }
    catch{
      document.getElementById("subjectErr").innerHTML = "Subject Must be selected"; 
        document.getElementById("subjectErr").style.color = "red";
        return false;  
    }
    if(mid=="" && final==""){
      document.getElementById("marksErr").innerHTML = "Mark cant be empty"; 
        document.getElementById("marksErr").style.color = "red";

      return false;
    }

       try{
      var sid=document.Submit_Grade.sid.value;  
    }
    catch{
      document.getElementById("sidErr").innerHTML = "SID Must be selected"; 
        document.getElementById("sidErr").style.color = "red";
        return false;  
    }

    }

  

function showsubjectcombo(i){
    resetVal();
    var clas = document.getElementById('class').value;
    document.getElementById("classErr").innerHTML = "";
  
    
    var xhttp = new XMLHttpRequest();
    
    xhttp.open("GET", "../Controller/allsubjectbyclass.php?class="+clas, true);
    xhttp.send();

      xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            
           document.getElementById('subject').innerHTML = this.responseText;

          }
      };
      if(clas!=""){
        
    var xhttp1 = new XMLHttpRequest();
    
    xhttp1.open("GET", "../Controller/idbyclass.php?class="+clas, true);
    xhttp1.send();

      xhttp1.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
           document.getElementById('sid').innerHTML = this.responseText;

          }
      };

      }   
}
 


function getStudentMark(){

 var student_class=document.Submit_Grade.class.value;
 var subject=document.Submit_Grade.subject.value;
 var sid=document.Submit_Grade.sid.value;

  $.ajax({

        url: '../Controller/GetStudentMarkController.php',
        data: {'student_class' : student_class,'subject':subject,'sid':sid},
        method: 'POST',
        cache: false,
        success: function(result) {
          // alert(result);
          // console.log(result);
          obj=JSON.parse(result);
          $('#Mark1').val(obj['mid']);
          $('#Mark2').val(obj['final']);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          if(jqXHR.status == '500') {
            alert('Internal server error: 500');
          } else {
            alert('Unexpected error');
          }
        }
});

}

  </script>