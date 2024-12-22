<?php
session_start();
$servername = "db:3306";
$username = "db";
$password = "db";
$dbname = "db";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['status'])) {
	$status = $_POST['status'];
	$product_id = $_POST['product_id'];
	$buyer_id = $_POST['buyer_id'];
	echo $status;
	echo $product_id;
	$addStatus = "UPDATE notifications SET status = $status WHERE product_id = $product_id";
	$conn->query($addStatus);

	header("Location: ../Private/notificationDetail.php?id=$buyer_id&product_id=$product_id&status=$status");
}

if (isset($_POST['delivered'])) {
	$delivered = $_POST['delivered'];
	$product_id = $_POST['product_id'];
	$updateStatus = "UPDATE notifications SET status = $delivered WHERE product_id = $product_id";
	$conn->query($updateStatus);
	header("Location: ../Private/notification.php");
}
if (isset($_GET['rating'])) {
	$rating = $_GET['rating'];
	$seller_id = $_GET['seller_id'];
	$status = $_GET['status'];
	$product_id = $_GET['product_id'];
	$getPersonRatingSql = "SELECT * FROM person WHERE id_person = $seller_id";
	$getPersonRating = $conn->query($getPersonRatingSql);
	while ($row = $getPersonRating->fetch_assoc()) {
		$review = $row['review'];
	}
	if ($status == 3){
		echo $status;
		$statusNumber = 5;
	}elseif ($status == 4){
		$statusNumber = 6;
	}



	$result = (($review + $rating) / 2);
	$updateReview = "UPDATE person SET review = $result Where id_person = $seller_id";
	$conn->query($updateReview);
	$updateStatus = "UPDATE notifications SET status = $statusNumber WHERE product_id = $product_id";
	$conn->query($updateStatus);
	header("Location: ../Private/notification.php?");

}

if (isset($_POST['product_id_seller'])) {
	$product_id = $_POST['product_id_seller'];
	$addSeen = "UPDATE notifications SET seller_seen = 1 WHERE product_id = $product_id";
	$conn->query($addSeen);
	header("Location: ../Private/notification.php");
}

if (isset($_POST['product_id_buyer'])) {
	$product_id = $_POST['product_id_buyer'];
	$addSeen = "UPDATE notifications SET buyer_seen = 1 WHERE product_id = $product_id";
	$conn->query($addSeen);
	header("Location: ../Private/notification.php");
}

if (isset($_POST['function'])) {
	$action = $_POST['function'];
	$idPerson = $_SESSION['id_person'];

	if ($action === "delete") {
		$idProduct = $_POST['Id'];
		delete($idProduct, $idPerson);
	}
	if ($action === "addToPerson") {
		$lastName = $_POST['lastName'];
		$address = $_POST['address'];
		$town = $_POST['town'];
		$areaCode = $_POST['areaCode'];
		$payment = $_POST['payment'];

		addToPerson($lastName, $address, $town, $areaCode, $payment, $idPerson);
	}

}

function addToPerson($lastName, $address, $town, $areaCode, $payment, $idPerson)
{
	$servername = "db:3306";
	$username = "db";
	$password = "db";
	$dbname = "db";
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "UPDATE person SET 
    last_name = '$lastName', 
    address = '$address', 
    town = '$town', 
    area_code = $areaCode, 
    payment_form = $payment 
    WHERE id_person = $idPerson";
	$conn->query($sql);

	if (isset($_SESSION['productIds'])) {
		$productIds = $_SESSION['productIds'];
		foreach ($productIds as $value) {
			print_r($value);
			print_r('|');
			print_r($idPerson);
			print_r('|');
			$sqlAddToHistory = "INSERT INTO history (user_id, product_id, sold) VALUES ($idPerson, $value, 1)";
			$conn->query($sqlAddToHistory);
			$sqlDeleteProductsFromCart = "DELETE FROM cart where productId = $value AND user_id = $idPerson";
			$conn->query($sqlDeleteProductsFromCart);
			$sqlgetSellerId = "SELECT person_id AS SellerId FROM products WHERE id = $value";
			$result = $conn->query($sqlgetSellerId);
			if ($row = $result->fetch_assoc()) {
				$sellerId = $row['SellerId'];
				$sqlAddToNotification = "INSERT INTO notifications (seller_id, buyer_id, product_id, sold, buyer_seen, seller_seen) VALUES ($sellerId, $idPerson, $value, 1, 0, 0)";
				$conn->query($sqlAddToNotification);
			}
			$sqlSetProject = "UPDATE products SET buyer_id = $idPerson, status_product = 1 WHERE id = $value";
			$conn->query($sqlSetProject);
			echo $value;
			echo $idPerson;
		}
	}

	header("Location: ../Private/accountDetail.php?success=success");
}

function delete($id, $idPerson)
{
	echo "hallo";
	$servername = "db:3306";
	$username = "db";
	$password = "db";
	$dbname = "db";
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "DELETE FROM cart WHERE productId = $id and user_id = $idPerson";
	$conn->query($sql);
	header("Location: ../Private/cart.php");
}

if (isset($_SESSION['id_person'])) {

	$id = $_SESSION['id_person'];

	if (isset($_GET['id'])) {
		$productId = $_GET['id'];

		$sql = "INSERT INTO cart(productId, user_id) VALUES($productId, $id)";
		$conn->query($sql);

		header("Location: ../Private/cart.php");
	}
}

if (isset($_POST['product-name']) && isset($_POST['product-price']) && isset($_POST['product-description'])) {

	$name = $_POST['product-name'];
	$price = $_POST['product-price'];
	$description = $_POST['product-description'];
	$categoryName = $_POST['product-category'];
	$image = $_FILES['product-image'];

	$query = "SELECT category.id AS ID FROM category JOIN products ON products.categoryId = category.id WHERE products.categoryName = '$categoryName' LIMIT 1";
	$getCategoryId = $conn->query($query);
	while ($row = $getCategoryId->fetch_assoc()) {
		$categoryId = $row['ID'];
	}


	$uploadDir = '../Styling/Images/uploads/';
	$uploadFile = $uploadDir . basename($image['name']);
	move_uploaded_file($image['tmp_name'], $uploadFile);

	move_uploaded_file($_FILES['product-image']['tmp_name'], $uploadFile);

	if (isset($_SESSION['id_person'])) {
		$id = $_SESSION['id_person'];
	}
	$sql = "INSERT INTO products (name, description, categoryId, categoryName , price, image, person_id, buyer_id, status_product) 
        VALUES ('$name', '$description', $categoryId, '$categoryName', $price, '../Styling/Images/uploads/{$image['name']}', $id, 0, 0)";
	$conn->query($sql);

	header("Location: ../Private/list.php?category=$categoryName");
}



