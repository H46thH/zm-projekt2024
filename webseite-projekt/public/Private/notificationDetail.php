<?php
require "../Controller/getData.php";
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<link rel="stylesheet" href="../../Styling/Css/all.css">
	<title>Product Update</title>
</head>
<body>

<?php
require "nav.php";
$servername = "db:3306";
$username = "db";
$password = "db";
$dbname = "db";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["buyer_id"])) {
	$buyer_id = $_POST["buyer_id"];
	$product_id = $_POST["product_id"];
	$status = $_POST["status"];

} else if (isset($_GET['id'])) {
	$buyer_id = $_GET['id'];
	$product_id = $_GET["product_id"];
	$status = $_GET["status"];

}
$getDataFromBuyerSql = "SELECT * FROM person WHERE person.id_person = $buyer_id;";
$getDataFromBuyer = $conn->query($getDataFromBuyerSql);

echo "<div class='main-content row'>";
echo "<div class='main-content-div status-div'>";
while ($row = $getDataFromBuyer->fetch_assoc()) {
	echo "<p>  <span>First Name:</span> " . $row["first_name"] . "</p>";
	echo "<p> <span>Last Name: </span> " . $row["last_name"] . "</p>";
	echo "<p> <span>Address: </span>" . $row["address"] . "</p>";
	echo "<p><span> City: </span>" . $row["town"] . "</p>";
	echo "<p><span> City: </span>" . $row["area_code"] . "</p>";
	echo "<br>";
	echo "<p> <span>Status:</span>  <span class='status-display'>" . $status . "</span></p>";
	echo "<form method='post' action='../Controller/addData.php'>";
	echo "<input type='hidden' name ='product_id' value='" . $product_id . "'>";
	echo "<input type='hidden' name ='buyer_id' value='" . $buyer_id . "'>";
	echo "<p><span>Set Status:</span></p>";
	echo "<div class='status-button-wrapper'>";
	echo "<button name='status' id='preparing' value='1' onclick='updateStatus(this.value)' class='green-button'>In Preparation</button>";
	echo "<button name='status' id='send' value='2' onclick='updateStatus(this.value)' class='green-button'>Sent</button>";
	echo "</div>";
	echo "</form>";
}
echo "</div>";
echo "</div>";
?>
</body>
<script src="../../Styling/JS/notification.js"></script>
</html>