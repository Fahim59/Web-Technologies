<!DOCTYPE html>
<html lang="en">
<head>
<title>Web Layout</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: #666;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}
article {
  float: Center;
  padding: 270px;
  height: 500px; /* only for demonstration, should be removed */
}
/* Clear floats after the columns */
section::after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  background-color: #666;
  padding: 10px;
  text-align: left;
  color: white;
}
section{
    text-align: center;

}
</style>
</head>
<body>

<header>
  <img src="midprojectlogo.jpg" alt="student" width="50" height="60"><br> Welcome to Creative International High School</pre>
</header>

<section>

  <br><br><br><br><br><br><br><br>
 <fieldset class="fieldsett">
  <legend class="legend"><b>ABOUT</b></legend>

  <p><b><a href="https://www.aiub.edu/about/Information" style="width: 100%">Information</a>
  <p><b><a href="https://www.aiub.edu/about/general-information" style="width: 100%">General Information</a>
  <p><b><a href="https://www.aiub.edu/about/Why-Study-Here" style="width: 100%">Why Study Here</a>
  <p><b><a href="https://www.aiub.edu/about/career" style="width: 100%">Career</a>
  </fieldset>
  
  <br><br><br><br><br><br><br>
</section>

<footer>
  <pre>Creative International High School</br>408/1,Kuratoli.Khilkhet,Dhaka 1229,Bangldesh</br>info@creative.edu</pre>
</footer>

</body>
</html>
