<?php include "../headerL.php";?>
<?php include "../Adminsidebar.php";?>
<!DOCTYPE html>
<html>
<head>
  <style>
      label
      {
        display: inline-block;
        width: 20%;
        padding: 1%; 
      }
      hr
      {
        style="border: 0.01px solid;
      }
    .text
    {
      text-align: center;
    }
  </style>
<script>
function showUser(str)
{
  if (str=="")
  {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();

  xmlhttp.onreadystatechange=function()
  {
    if (this.readyState==4 && this.status==200)
    {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","teacher/TInfo.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<form>
  <fieldset style="width: 96%;" align="left">
  <legend class="text"><b>VIEW ASSIGNED TEACHERS</b></legend>

<center><select name="users" onchange="showUser(this.value)">
<option value="">Select a Subject:</option>
<option value="Bangla">Bangla</option>
<option value="English for Today">English for Today</option>
<option value="Mathematics">Mathematics</option>
<option value="Science">Science</option>
<option value="Agriculture Studies">Agriculture Studies</option>
<option value="Physical Education and Health">Physical Education and Health</option>
<option value="Work and Life Oriented Education">Work and Life Oriented Education</option>
<option value="General Math">General Math</option>
<option value="Physics">Physics</option>
<option value="Botany">Botany</option>
<option value="Higher Math">Higher Math</option>
<option value="Chemistry">Chemistry</option>
<option value="Zoology">Zoology</option>

</select>
<br><br><div id="txtHint"></div>
</fieldset>
</form>
<br>

</body>
</html>