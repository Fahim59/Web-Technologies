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
  text-align: left;
  font-size: 35px;
  color: white;
}
article {
  float: Center;
  padding: 270px;
  height: 300px; /* only for demonstration, should be removed */
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

}
</style>
</head>
<body>

<header>
  <img src="midprojectlogo.jpg" alt="student" width="50" height="60"> Welcome to Creative International High School............................<a href="">Home</a>|<a href="http://localhost/php/login.php">Login</a>|<a href="">Registration</a> </pre>
</header>

<section>
<pre>                                                                                        <a href="http://localhost/phhp/academic.php"><b>Academics</b></a>|<a href="http://localhost/phhp/about.php"><b>About</b></a>|<a href="http://localhost/phhp/admission.php"><b>Admission</b></a>|<a href="http://localhost/phhp/administration.php"><b>Administration</b></a></br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </br> </pre> 
  
</section>

<footer>
  <pre>Creative International High School</br>408/1,Kuratoli.Khilkhet,Dhaka 1229,Bangldesh</br>info@creative.edu</pre>
</footer>

</body>
</html>
