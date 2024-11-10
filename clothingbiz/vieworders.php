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
	<title>View Orders | Gnarly! Clothing Shop</title>
	<link rel="stylesheet" href="styles.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="mt-4 container">
		<a href="index.php" class="btn mb-3" style="background-color: black; color: yellow;">Return to Home</a>

		<?php
		$customerID = $_GET['customer_id'];
		$getCustomerByID = getCustomerByID($pdo, $customerID);
		$customerOrders = getOrdersByCustomer($pdo, $customerID);
		?>

		<h1 class="text-center">Customer:
			<?php echo ($getCustomerByID['first_name'] . ' ' . $getCustomerByID['last_name']); ?></h1>

		<div class="row">
			<!-- Add New Order Form -->
			<div class="col-md-4">
				<div class="card mt-4">
					<div class="card-header " style="background-color: black; color: yellow;">
						<h2 class="text-center">Add New Order</h2>
					</div>
					<div class="card-body">
						<form action="core/handleForms.php?customer_id=<?php echo $customerID; ?>" method="POST">
							<div class="mb-3">
								<label for="orderDate" class="form-label">Order Date</label>
								<input type="date" name="order_date" class="form-control" required>
							</div>
							<div class="mb-3">
								<label for="product" class="form-label">Product</label>
								<select class="form-control" name="product" required>
									<option value="">Select Product</option>
									<option value="1">Plain White Shirt</option>
									<option value="2">Black Polo Shirt</option>
									<option value="3">White Shirt with G! Logo</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="quantity" class="form-label">Quantity</label>
								<input type="number" name="quantity" class="form-control" min="1" required>
							</div>
							<div>
								<input type="submit" name="insertOrderBtn" class="btn col-md-12"
									style="background-color: black; color: yellow;" value="Add Order">
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Orders Table -->
			<div class="col-md-8">
				<div class="card mt-4 " style="border-color: yellow">
					<div class="card-header" style="background-color: black; color: yellow;">
						<h2 class="text-center">Orders</h2>
					</div>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Order ID</th>
								<th class="text-center">Order Date</th>
								<th class="text-center">Product</th>
								<th>Quantity</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($customerOrders as $order) {
								$productName = getProductNameById($order['product']);
								?>
								<tr>
									<td><?php echo $order['order_id']; ?></td>
									<td class="text-center"><?php echo ($order['order_date']); ?></td>
									<td class="text-center"><?php echo ($productName); ?></td>
									<td><?php echo ($order['quantity']); ?></td>
									<td class="text-center">
										<a href="editorder.php?order_id=<?php echo $order['order_id']; ?>&customer_id=<?php echo $customerID; ?>"
											class="btn btn-sm" style="background-color: black; color: yellow;">Edit</a>
										<a href="deleteorder.php?order_id=<?php echo $order['order_id']; ?>&customer_id=<?php echo $customerID; ?>"
											class="btn btn-sm" style="background-color: black; color: yellow;">Delete</a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>

</html>