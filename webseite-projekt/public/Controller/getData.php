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

$categorySql = "SELECT name FROM category";
$category = $conn->query($categorySql);

$productNameSql = "SELECT * FROM `products`, person WHERE person.id_person = products.person_id";
$productName = $conn->query($productNameSql);

$randomProductsSql = "SELECT * FROM products";
$randomProducts = $conn->query($randomProductsSql);

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$getProductByIdSql = "SELECT * FROM products where id = $id";
	$getProduct = $conn->query($getProductByIdSql);
}

if (isset($_SESSION['id_person'])) {
	$userId = $_SESSION['id_person'];
	$sql = "SELECT products.id AS Id , products.name AS ProductName, products.image AS ProductImage, COUNT(*) AS ProductCount, products.price AS ProductPrice FROM cart JOIN products ON cart.productId = products.id WHERE  user_id = $userId GROUP BY products.name";
	$getCartItems = $conn->query($sql);

	$productSoldSql = "SELECT DISTINCT products.* , notifications.status, notifications.buyer_id FROM products JOIN notifications ON notifications.product_id = products.id WHERE notifications.seller_id = $userId";
	$productsSold = $conn->query($productSoldSql);

	$myProductsSql = "SELECT * FROM products  WHERE person_id = $userId AND status_product = 0";
	$myProducts = $conn->query($myProductsSql);

	$productBoughtSql = "SELECT DISTINCT products.*  FROM products JOIN history ON history.product_id = products.id WHERE history.user_id = $userId";
	$productBought = $conn->query($productBoughtSql);

	$getAllInfoSql = "SELECT *  FROM person WHERE id_person = $userId";
	$getAllInfo = $conn->query($getAllInfoSql);
	$getAllNotificationsSql = "SELECT * FROM products JOIN notifications ON products.id = notifications.product_id WHERE notifications.seller_id = $userId AND seller_seen = 0";
	$getAllNotifications = $conn->query($getAllNotificationsSql);

	$getAllUpdatedProductsSql = "SELECT * FROM products JOIN notifications ON products.id = notifications.product_id WHERE notifications.seller_id = $userId AND notifications.status >= 3 AND seller_seen = 0";
	$getAllUpdatedProducts = $conn->query($getAllUpdatedProductsSql);


	$getAllNotificationsBuyerSql = "SELECT * FROM `notifications` JOIN products on products.id = notifications.product_id WHERE notifications.buyer_id = $userId AND notifications.status != 0 AND buyer_seen = 0";
	$getAllNotificationsBuyer = $conn->query($getAllNotificationsBuyerSql);
}

if (isset($_POST["buyer_id"])) {
	$buyer_id = $_POST["buyer_id"];
	$product_id = $_POST["product_id"];
	$status = $_POST["status"];
	$getDataFromBuyerSql = "SELECT * FROM person WHERE person.id_person = $buyer_id;";
	$getDataFromBuyer = $conn->query($getDataFromBuyerSql);
} else if (isset($_GET['id']) && isset($_GET['productId'])) {
	$buyer_id = $_GET['id'];
	$product_id = $_GET["productId"];
	$status = $_GET["status"];
	$getDataFromBuyerSql = "SELECT * FROM person WHERE person.id_person = $buyer_id;";
	$getDataFromBuyer = $conn->query($getDataFromBuyerSql);
}


if (isset($_POST["searchResult"])) {
	$searchResult = $_POST["searchResult"];
	echo $searchResult;
	$searchProductNameSql = "SELECT id FROM `products` WHERE name LIKE '%$searchResult%' OR description LIKE '%$searchResult%'";
	$searchProductName = $conn->query($searchProductNameSql);
	if ($searchProductName && $searchProductName->num_rows > 0) {
		$ids = [];
		while ($row = $searchProductName->fetch_assoc()) {
			$ids[] = $row['id'];
		}
		$idString = implode(',', $ids);
		header("Location: /Private/list.php?products=" . $idString);
	} else {
		header("Location: /Private/list.php?error=noresults");
	}
}

?>