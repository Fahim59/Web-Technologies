<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">
<?php include "Sidebar.php"; ?>

<?php  
require_once 'controller/productInfo.php';

$products = fetchAllProducts();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Display Products</title>
	<style>
		table, th, td, tr
		{
			border: 2px solid ;
			border-collapse: collapse;
			padding: 2%
		}
	</style>
</head>
<body>
<fieldset style="width: 80%;">
  <legend><b>DISPLAY</b></legend>
<table>
	<thead>
		<tr>
			<th><b>NAME<?php echo '&nbsp&nbsp&nbsp';?></th>
			<th>PROFIT<?php echo '&nbsp&nbsp&nbsp&nbsp';?></th>
			<th colspan="2"></b></th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($products as $i => $product): ?>
			<?php if ($product['display']==1): ?>
			<tr>
				<td><?php echo $product['name'] ?></td>
				<td><?php echo $product['profit'] ?></td>
				<td><a href="editProduct.php?id=<?php echo $product['id']?>">edit<?php echo '&nbsp&nbsp&nbsp';?></a></td>
				<td><a href="deleteProduct.php?id=<?php echo $product['id'] ?>">delete<?php echo '&nbsp&nbsp&nbsp';?></a></td>
			</tr>
			<?php endif ?>
		<?php endforeach; ?>
		
	</tbody>
	
</table>
</fieldset>

</body>
</html>