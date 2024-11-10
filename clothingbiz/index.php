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
	<title>Home | Gnarly! Clothing Shop</title>
	<link rel="stylesheet" href="style.css">
	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
		integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- bootsrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- select2 -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<!-- for sweetalert2 and js -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body class="bg-light">
	<!-- main header -->
	<div class="wrapper">
		<nav class="main-header navbar navbar-expand navbar-light" style="background-color: black;">
			<div class="container">
				<!-- left items -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#" role="button">
							<img src="images/g.png" alt="logo" class="card-title card-img-top"
								style="width: 50px; height: 50px;">
						</a>
					</li>
					<li class="nav-item d-none d-sm-inline-block mt-3">
						<a href="index.php" class="nav-link" style="color: #fedd01;">Home</a>
					</li>
					<li class="nav-item d-none d-sm-inline-block mt-3">
						<a href="user.php" class="nav-link" style="color: #fedd01;">View Users</a>
					</li>
					<li class="nav-item d-none d-sm-inline-block mt-3">
						<a href="#" class="nav-link" style="color: #fedd01;">About us</a>
					</li>
				</ul>

				<!-- right side-->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
							data-toggle="dropdown" aria-expanded="false">
							<i class="fas fa-user-circle fa-lg" style="color: #fedd01;"></i>
							<?php if (isset($_SESSION['username'])) { ?>
								<span
									style="color: #fedd01; margin-left: 5px;"><?php echo ($_SESSION['username']); ?></span>
							<?php } ?>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

							<?php if (isset($_SESSION['username'])) { ?>
								<a class="dropdown-item" href="core/handleForms.php?logoutAUser=1"><i
										class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign out</a>
							<?php } else {
								echo "<h1>No user logged in</h1>";
							} ?>
						</div>
					</li>

				</ul>

			</div>
		</nav>
	</div>

	<?php
	if (isset($_SESSION['message'])) {
		echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Welcome!',
            text: '" . $_SESSION['message'] . "',
            confirmButtonColor: 'black',
            confirmButtonText: 'OK',
        });
    </script>";
		unset($_SESSION['message']);
	}
	?>



	<div class="home-page container mt-5">
		<h1 class="text-center">
			Welcome To <span>Gnarly!</span> Clothing Shop!
		</h1>

		<div class="main-card card col-md-8 mx-auto mt-4">
			<div class="card-header" style="background-color: black; color: #fedd01;">
				<h5>Shop Now!</h5>
			</div>
			<div class="card-body">
				<form action="core/handleForms.php" method="POST">
					<div class="mb-3">
						<label for="firstName" class="form-label">First Name</label>
						<input type="text" class="form-control" name="first_name" placeholder="Enter first name"
							required>
					</div>
					<div class="mb-3">
						<label for="lastName" class="form-label">Last Name</label>
						<input type="text" class="form-control" name="last_name" placeholder="Enter last name" required>
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" class="form-control" name="email" placeholder="Enter email">
					</div>
					<div class="mb-3">
						<label for="contactNum" class="form-label">Contact Number</label>
						<input type="text" class="form-control" name="contact_num" placeholder="Enter contact number">
					</div>
					<div class="mb-3">
						<label for="product" class="form-label">Product</label>
						<select class="form-control select2" name="product" required>
							<option value="" disabled selected>Select Product</option>
							<option value="1">Plain White Shirt</option>
							<option value="2">Black Polo Shirt</option>
							<option value="3">White Shirt with G! Logo</option>
						</select>
					</div>

					<div class="mb-3">
						<label for="quantity" class="form-label">Quantity</label>
						<input type="number" class="form-control" name="quantity" min="1" placeholder="Enter Quantity"
							required>
					</div>
					<div class="addButton mt-4 d-grid">
						<input type="submit" class="btn" style="background-color:black; color: #fedd01"
							name="insertCustomerBtn" value="Add Customer">
					</div>
				</form>
			</div>
		</div>

		<?php
		$productNames = [
			1 => 'Plain White Shirt',
			2 => 'Black Polo Shirt',
			3 => 'White Shirt with G! Logo'
		];
		?>

		<?php $getAllCustomers = getAllCustomers($pdo); ?>
		<?php foreach ($getAllCustomers as $row) { ?>
			<div class="info-card card mt-4 mx-auto mb-3" style="width: 100%;">
				<div class="card-body">
					<h5 class="card-title">First Name: <?php echo ($row['first_name']); ?></h5>
					<h5 class="card-title">Last Name: <?php echo ($row['last_name']); ?></h5>
					<h5 class="card-title">Email: <?php echo ($row['email']); ?></h5>
					<h5 class="card-title">Contact Number: <?php echo ($row['contact_num']); ?></h5>
					<h5 class="card-title">Product: <?php echo $productNames[$row['product']]; ?></h5>
					<h5 class="card-title">Quantity: <?php echo ($row['quantity']); ?></h5>
					<h5 class="card-title">Date Added: <?php echo ($row['date_added']); ?></h5>
					<div class="d-flex justify-content-end">
						<a href="vieworders.php?customer_id=<?php echo $row['customer_id']; ?>" class="btn btn-sm me-2"
							style="background-color:black; color: #fedd01">View Orders</a>
						<a href="editcustomer.php?customer_id=<?php echo $row['customer_id']; ?>" class="btn btn-sm me-2"
							style="background-color:black; color: #fedd01">Edit</a>
						<a href="deletecustomer.php?customer_id=<?php echo $row['customer_id']; ?>" class="btn btn-sm"
							style="background-color:black; color: #fedd01">Delete</a>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>




</body>

</html>