<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Order | Gnarly! Clothing Shop</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<?php $getOrderByID = getOrderByID($pdo, $_GET['order_id']); ?>
	<h1>Are you sure you want to delete this order?</h1>
	<div class="container" style="border-style: solid; height: 300px;">
		<h2>Order Date: <?php echo $getOrderByID['order_date'] ?></h2>
		<h2>Customer ID: <?php echo $getOrderByID['customer_id'] ?></h2>
		<h2>Date Added: <?php echo $getOrderByID['date_added'] ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form
				action="core/handleForms.php?order_id=<?php echo $_GET['order_id']; ?>&customer_id=<?php echo $_GET['customer_id']; ?>"
				method="POST">
				<input type="submit" name="deleteOrderBtn" value="Delete">
			</form>
		</div>
	</div>
</body>

</html>