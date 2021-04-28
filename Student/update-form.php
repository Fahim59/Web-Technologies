<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>
<!--====form section start====-->
<div class="user-detail">
    <h2>Update User Data</h2>
    <p id="msg"></p>
    <form id="updateForm" method="POST">
      <input type="hidden" name="uid" id="updateuid">
          <label>Name</label>
          <input type="text" placeholder="Enter Full Name" name="name" required><br>
          <label>Father Name</label>
          <input type="text" placeholder="Enter Father Name" name="fname" required><br>
          <label>Mother Name</label>
          <input type="text" placeholder="Enter Mother Name" name="mname" required><br>
          <label>dob</label>
          <input type="date" placeholder="Enter Date of Birth" name="dob" required><br>
          <label>Gender</label>
          <input type="radio" name="gender" value="Female" required>Female
          <input type="radio" name="gender" value="male" required>Male
          <input type="radio" name="gender" value="others" required>Others<br>
          <label>Class</label>
          <input type="text" placeholder="Enter Class among 6-10 " name="class" required><br>
          <label>Address</label>
          <input type="text" placeholder="Enter Address" name="address" required><br>
          <label>Email</label>
          <input type="email" placeholder="Enter Email" name="email" required><br>
          <label>Picture</label>
          <input type="file"  name="picture" required><br>
          <button type="submit" name="update">Submit</button>
    </form>
        </div>
</div>
</body>
</html>