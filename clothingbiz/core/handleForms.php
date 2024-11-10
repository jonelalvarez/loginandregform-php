<?php

require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertCustomerBtn'])) {
	$query = insertCustomer($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['contact_num'], $_POST['product'], $_POST['quantity']);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Customer insertion failed";
	}
}


if (isset($_POST['editCustomerBtn'])) {
	$query = updateCustomer($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['contact_num'], $_POST['product'], $_GET['customer_id']);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Customer update failed";
	}
}



//if (isset($_POST['deleteCustomerBtn'])) {
//	$query = deleteCustomer($pdo, $_GET['customer_id']);
//
//	if ($query) {
//		header("Location: ../index.php");
//	} else {
//		echo "Customer deletion failed";
//	}
//}

if (isset($_POST['deleteCustomerBtn'])) {
	$customerID = $_GET['customer_id'];

	$deleteOrders = deleteOrdersByCustomer($pdo, $customerID);

	$query = deleteCustomer($pdo, $customerID);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Customer deletion failed";
	}
}



//if (isset($_POST['insertOrderBtn'])) {
//	$customerID = $_GET['customer_id'];
//	$orderDate = $_POST['order_date'];
//	$productID = $_POST['product_id'];
//	$quantity = $_POST['quantity'];
//	
//	$query = insertOrder($pdo, $customerID, $orderDate, $productID, $quantity);
//
//	if ($query) {
//		header("Location: ../vieworders.php?customer_id=" . $customerID);
//	} else {
//		echo "Order insertion failed";
//	}
//}

if (isset($_POST['insertOrderBtn'])) {
	$customer_id = $_GET['customer_id'];
	$order_date = $_POST['order_date'];
	$product_id = $_POST['product'];
	$quantity = $_POST['quantity'];

	$query = insertOrder($pdo, $customer_id, $order_date, $product_id, $quantity);

	if ($query) {
		header("Location: ../vieworders.php?customer_id=" . $customer_id);
	} else {
		echo "Order insertion failed";
	}
}





if (isset($_POST['editOrderBtn'])) {
	$query = updateOrder($pdo, $_POST['order_date'], $_POST['quantity'], $_GET['order_id']);

	if ($query) {
		header("Location: ../vieworders.php?customer_id=" . $_GET['customer_id']);
	} else {
		echo "Order update failed";
	}
}





if (isset($_POST['deleteOrderBtn'])) {
	$query = deleteOrder($pdo, $_GET['order_id']);

	if ($query) {
		header("Location: ../vieworders.php?customer_id=" . $_GET['customer_id']);
	} else {
		echo "Order deletion failed";
	}
}

// LOG IN HANDLES
if (isset($_POST['registerUserBtn'])) {

	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	$email = $_POST['email'];

	if (!empty($username) && !empty($password) && !empty($email)) {

		$insertQuery = insertNewUser($pdo, $username, $password, $email);

		if ($insertQuery) {
			header("Location: ../login.php");
		} else {
			header("Location: ../register.php");
		}
	} else {
		$_SESSION['message'] = "Please make sure the input fields 
		are not empty for registration!";

		header("Location: ../login.php");
	}

}



if (isset($_POST['loginUserBtn'])) {

	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	if (!empty($username) && !empty($password)) {
		$loginQuery = loginUser($pdo, $username, $password);

		if ($loginQuery) {
			header("Location: ../index.php");
			exit();
		} else {
			header("Location: ../login.php");
			exit();
		}
	} else {
		$_SESSION['message'] = "Please make sure the input fields are not empty for the login!";
		header("Location: ../login.php");
		exit();
	}
}




if (isset($_GET['logoutAUser'])) {
	unset($_SESSION['username']);
	header('Location: ../login.php');
}

// edit user

if (isset($_POST['editUserBtn'])) {
	$author = $_SESSION['username'];
	$query = updateUser($pdo, $_POST['username'], $_POST['email'], $_GET['user_id'], $author);

	if ($query) {
		header("Location: ../user.php?user_id=" . $_GET['user_id']);
	} else {
		echo "User update failed";
	}
}

// delete user

if (isset($_POST['deleteUserBtn'])) {
	$query = deleteUser($pdo, $_GET['user_id']);

	if ($query) {
		header("Location: ../user.php");
	} else {
		echo "Order deletion failed";
	}
}



?>