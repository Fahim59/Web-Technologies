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
  <legend class="legend"><b>ADMINISTRATION</b></legend>

  <p><b><a href="https://www.aiub.edu/Administration/The-Vice-Chancellor" style="width: 100%">The Principal</a>
  <p><b><a href="https://www.aiub.edu/Administration/The-Chairman" style="width: 100%">The Chairman</a>
  <p><b><a href="https://www.aiub.edu/Administration/The-Founders" style="width: 100%">The Founder</a>
  </fieldset>
  <br><br><br><br><br><br><br><br><br>
  
</section>

<footer>
  <pre>Creative International High School</br>408/1,Kuratoli.Khilkhet,Dhaka 1229,Bangldesh</br>info@creative.edu</pre>
</footer>

</body>
</html>
