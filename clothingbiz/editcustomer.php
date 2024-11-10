<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>

<?php
$customerID = $_GET['customer_id'];
$getCustomerByID = getCustomerByID($pdo, $customerID);
$currentProduct = $getCustomerByID['product'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Customer Details | Gnarly! Clothing Shop</title>
	<link rel="stylesheet" href="styles.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
	<?php $getUserByID = getCustomerByID($pdo, $_GET['customer_id']); ?>

	<h1>Edit Customer Details</h1>
	<form action="core/handleForms.php?customer_id=<?php echo $customerID; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label>
			<input type="text" name="first_name" value="<?php echo ($getCustomerByID['first_name']); ?>" required>
		</p>
		<p>
			<label for="lastName">Last Name</label>
			<input type="text" name="last_name" value="<?php echo ($getCustomerByID['last_name']); ?>" required>
		</p>
		<p>
			<label for="email">Email</label>
			<input type="email" name="email" value="<?php echo ($getCustomerByID['email']); ?>" required>
		</p>
		<p>
			<label for="contactNum">Contact Number</label>
			<input type="text" name="contact_num" value="<?php echo ($getCustomerByID['contact_num']); ?>" required>
		</p>
		<p>
			<label for="product">Product</label>
			<select class="form-control select2" name="product" required>
				<option value="1" <?php echo ($currentProduct == 1) ? 'selected' : ''; ?>>Plain White Shirt</option>
				<option value="2" <?php echo ($currentProduct == 2) ? 'selected' : ''; ?>>Black Polo Shirt</option>
				<option value="3" <?php echo ($currentProduct == 3) ? 'selected' : ''; ?>>White Shirt with G! Logo
				</option>
			</select>
		</p>
		<p>
			<input type="submit" name="editCustomerBtn" value="Update Customer">
		</p>
	</form>
</body>

</html>