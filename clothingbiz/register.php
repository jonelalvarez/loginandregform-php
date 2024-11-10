<?php
require_once 'core/models.php';
require_once 'core/handleForms.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register | Gnarly! Clothing Shop</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<!-- <style>
		body {
		font-family: "Arial";
		}
		input {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
			border:1px solid black;
		}

	</style> -->
</head>

<body>
	<div class="reg-page">


		<div class="card text-center col-md-4 mx-auto">
			<div class="card-body">

				<h2 class="card-title" name="header">Register now <span style="color: #fedd01;">dudez!</span></h2>

				<img src="images/adduserIcon.png" alt="user" class="card-title card-img-top mt-3"
					style="width: 70px; height: 70px;">
				<form action="core/handleForms.php" method="POST">

					<div class="col-md-12 mx-auto mt-3">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" placeholder="Enter username">
					</div>

					<div class="col-md-12 mx-auto mt-3">
						<label for="username">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Enter password">
					</div>
					<div class="col-md-12 mx-auto mt-3">
						<label for="email">Email</label>
						<input type="text" class="form-control" name="email" placeholder="Enter email">
					</div>
					<div class="col-md-12 mt-3">
						<input type="submit" class="btn w-50" name="registerUserBtn" value="Create Account">
					</div>


			</div>
			<div class="card-footer col-md-12 mx-auto">
				<p>Need an account? <a href="login.php">Back to login</a> G!</p>
				<p><?php if (isset($_SESSION['message'])) { ?>
					<p class="mt-0" style="color: red; "><?php echo $_SESSION['message']; ?></p>
				<?php }
				unset($_SESSION['message']); ?></p>
			</div>
		</div>
	</div>



	</form>
</body>

</html>