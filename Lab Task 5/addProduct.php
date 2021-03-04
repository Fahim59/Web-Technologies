<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">
<?php include "Sidebar.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
</head>
<body>

 <form action="controller/addProduct.php" method="POST" enctype="multipart/form-data">

  <fieldset style="width: 80%;">
    <legend><b>ADD PRODUCTS</b></legend>
    <label for="name">Name</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="bprice">Buying Price</label><br>
    <input type="text" id="bprice" name="bprice"><br>
    <label for="sprice">Selling price</label><br>
    <input type="text" id="sprice" name="sprice"><br>
    <hr>
    <input type="checkbox" id="display" name="display" value="1" >
    <label for="display">Display</label><br>
    <hr>
    <input type="submit" name = "addProduct" value="Save">

  </fieldset>
</form> 

</body>
</html>
