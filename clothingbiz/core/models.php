<?php
require_once 'dbConfig.php';
//function insertCustomer($pdo, $first_name, $last_name, $email, $contact_num, $product, $quantity) {
//    $sql = "INSERT INTO customers (first_name, last_name, email, contact_num, product, quantity) VALUES (?, ?, ?, ?, ?, ?)";
//    $stmt = $pdo->prepare($sql);
//    $executeQuery = $stmt->execute([$first_name, $last_name, $email, $contact_num, $product, $quantity]);

//    if ($executeQuery) {
//		return true;
//	}
//}
function insertCustomer($pdo, $first_name, $last_name, $email, $contact_num, $product, $quantity)
{
	$sql = "INSERT INTO customers (first_name, last_name, email, contact_num, product, quantity) VALUES (?, ?, ?, ?, ?, ?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $email, $contact_num, $product, $quantity]);

	if ($executeQuery) {
		$customer_id = $pdo->lastInsertId();

		insertOrder($pdo, $customer_id, date("Y-m-d"), $product, $quantity);
		return true;
	}
	return false;
}



function updateCustomer($pdo, $first_name, $last_name, $email, $contact_num, $product, $customer_id)
{
	$sql = "UPDATE customers
            SET first_name = ?, last_name = ?, email = ?, contact_num = ?, product = ?
            WHERE customer_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $email, $contact_num, $product, $customer_id]);

	if ($executeQuery) {
		return true;
	}
}

function deleteCustomer($pdo, $customer_id)
{
	$sql = "DELETE FROM customers WHERE customer_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$customer_id]);

	if ($executeQuery) {
		return true;
	}
}
function deleteOrdersByCustomer($pdo, $customer_id)
{
	$sql = "DELETE FROM orders WHERE customer_id = ?";
	$stmt = $pdo->prepare($sql);
	return $stmt->execute([$customer_id]);
}

function getAllCustomers($pdo)
{
	$sql = "SELECT * FROM customers";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();


	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getCustomerByID($pdo, $customer_id)
{
	$sql = "SELECT * FROM customers WHERE customer_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$customer_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}




//function insertOrder($pdo, $customer_id, $order_date, $product, $quantity) {
//  $sql = "INSERT INTO orders (customer_id, order_date, product, quantity) VALUES (?, ?, ?, ?)";
//  $stmt = $pdo->prepare($sql);
//  $executeQuery = $stmt->execute([$customer_id, $order_date, $product, $quantity]);
//  if ($executeQuery) {
//		return true;
//	}
// }
function insertOrder($pdo, $customer_id, $order_date, $product, $quantity)
{
	$sql = "INSERT INTO orders (customer_id, order_date, product, quantity) VALUES (?, ?, ?, ?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$customer_id, $order_date, $product, $quantity]);

	return $executeQuery;
}


function getOrdersByCustomer($pdo, $customer_id)
{
	$sql = "SELECT * FROM orders WHERE customer_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$customer_id]);

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getOrderByID($pdo, $order_id)
{
	$sql = "SELECT * FROM orders WHERE order_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$order_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateOrder($pdo, $order_date, $quantity, $order_id)
{
	$sql = "UPDATE orders
            SET order_date = ?, quantity = ?
            WHERE order_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$order_date, $quantity, $order_id]);

	return $executeQuery;
}


function deleteOrder($pdo, $order_id)
{
	$sql = "DELETE FROM orders WHERE order_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$order_id]);

	if ($executeQuery) {
		return true;
	}
}

function getProductNameById($product)
{
	$productNames = [
		1 => 'Plain White Shirt',
		2 => 'Black Polo Shirt',
		3 => 'White Shirt with G! Logo'
	];

	return isset($productNames[$product]) ? $productNames[$product] : 'Unknown Product';
}


// LOG IN FUNCTIONS

function insertNewUser($pdo, $username, $password, $email)
{

	$checkUserSql = "SELECT * FROM user_passwords WHERE username = ?";
	$checkUserSqlStmt = $pdo->prepare($checkUserSql);
	$checkUserSqlStmt->execute([$username]);

	if ($checkUserSqlStmt->rowCount() == 0) {

		$sql = "INSERT INTO user_passwords (username,password,email) VALUES(?,?,?)";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$username, $password, $email]);

		if ($executeQuery) {
			$_SESSION['message'] = "User successfully inserted, you can now log in.";
			return true;
		} else {
			$_SESSION['message'] = "An error occured from the query";
		}

	} else {
		$_SESSION['message2'] = "User already exists";
	}


}



function loginUser($pdo, $username, $password)
{
	$sql = "SELECT * FROM user_passwords WHERE username=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$username]);

	if ($stmt->rowCount() == 1) {
		$userInfoRow = $stmt->fetch();
		$usernameFromDB = $userInfoRow['username'];
		$passwordFromDB = $userInfoRow['password'];

		if ($password == $passwordFromDB) {
			$_SESSION['username'] = $usernameFromDB;
			$_SESSION['message'] = "Login successful!";
			return true;
		} else {
			$_SESSION['message'] = "Password is invalid, but user exists";
		}
	}


	if ($stmt->rowCount() == 0) {
		$_SESSION['message2'] = "Username doesn't exist from the database. You may consider registration first";
	}

}

function getAllUsers($pdo)
{
	$sql = "SELECT * FROM user_passwords";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}

}

function getUserByID($pdo, $user_id)
{
	$sql = "SELECT * FROM user_passwords WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$user_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}


function updateUser($pdo, $username, $email, $user_id, $author)
{
	$sql = "UPDATE user_passwords
            SET username = ?, email = ?, author = ?, last_modified = NOW()
            WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$username, $email, $author, $user_id]);

	if ($executeQuery) {
		$_SESSION['message'] = "User updated successfully!";
		return true;
	} else {
		$_SESSION['message'] = "An error occured from the query";
	}

	return $executeQuery;
}


function deleteUser($pdo, $user_id)
{
	$sql = "DELETE FROM user_passwords WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$user_id]);

	if ($executeQuery) {
		$_SESSION['message'] = "User deleted successfully!";
		return true;
	}
}
?>
