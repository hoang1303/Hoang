<!DOCTYPE html>
<html lang="en">

<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<body>
	<div>
		<h2>This is the product management page</h2>
		<a href='add-edit_product.php' id='icon3'><i class='fas fa-plus fa-2x'></i></a>
	</div>
	<div>
		<form method="post">
			<table border="1 solid black">
				<tr>
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Prices</th>
					<th>Images</th>
					<th>Category Name</th>
					<th colspan="3">Actions</th>
				</tr>

				<?php
				$connect = mysqli_connect('localhost', 'root', '', 'it0601');
				if (!$connect) {
					echo ('Error');
				}
				$sql = " select * from category, products where category.category_id = products.category_id";
				$result = mysqli_query($connect, $sql);
				while ($row_product = mysqli_fetch_array($result)) {
					$product_id = $row_product['product_id'];
					$product_name = $row_product['product_name'];
					$product_price = $row_product['product_price'];
					$product_image = $row_product['product_image'];
					$category_name = $row_product['category_name'];
					?>

					<tr>
						<td>
							<?php echo $product_id ?>
						</td>
						<td>
							<?php echo $product_name ?>
						</td>
						<td>
							<?php echo $product_price ?>
						</td>
						<td><img src='Img/<?php echo $product_image ?> ' style="width:100px"> </td>
						<td>
							<?php echo $category_name ?>
						</td>
						<td><a href="edit_product.php?id=<?php echo "$product_id"; ?>" style="text-decoration: none;">
								Update</a></td>
						<td><a href="?idxoa=<?php echo $product_id ?>" style="text-decoration: none;"> Delete</a></td>
					</tr>
				<?php

				}

				?>
			</table>
			
			<?php

			if (isset($_GET["idxoa"])) {
				$sql = "delete from products where product_id={$_GET["idxoa"]}";
				$result = mysqli_query($connect, $sql);
				if ($result) {
					echo "<script>alert('product has been deleted successfull!')</script>";
					echo "<script>window.open('manage_product.php','_self')</script>";
				} else {
					echo "<script>alert('Error')</script>";
				}
			}
			?>
	</div>
</body>

</html>