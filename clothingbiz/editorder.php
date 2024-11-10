<?php
require_once 'core/models.php';
require_once 'core/handleForms.php';

if (!isset($_SESSION['username'])) {
	header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Order | Gnarly! Clothing Shop</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<a href="vieworders.php?customer_id=<?php echo $_GET['customer_id']; ?>">
		View Customer Orders</a>
	<h1>Edit the Order!</h1>
	<?php
	$getOrderByID = getOrderByID($pdo, $_GET['order_id']);
	?>
	<form
		action="core/handleForms.php?order_id=<?php echo $_GET['order_id']; ?>&customer_id=<?php echo $_GET['customer_id']; ?>"
		method="POST">
		<p>
			<label for="order_id">Product ID</label>
			<input type="text" name="product" value="<?php echo $getOrderByID['order_id']; ?>">
		</p>
		<p>
			<label for="order_date">Order Date</label>
			<input type="date" name="order_date" value="<?php echo $getOrderByID['order_date']; ?>">
		</p>
		<p>
			<label for="quantity">Quantity</label>
			<input type="number" name="quantity" value="<?php echo $getOrderByID['quantity']; ?>">
		</p>

		<p>
			<input type="submit" name="editOrderBtn" value="Update Order">
		</p>
	</form>
</body>

</html>