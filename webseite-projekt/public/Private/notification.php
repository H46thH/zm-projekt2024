<?php
require "../Controller/getData.php"
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<link rel="stylesheet" href="../../Styling/Css/all.css">
	<title>Notifications</title>
</head>

<body>
<?php
require "nav.php";
echo "<div class='main-content main-content-table'>";
echo "<h2>Notifications</h2>";
if ($getAllNotifications->num_rows > 0) {
	while ($row = $getAllNotifications->fetch_assoc()) {
		echo "<div class='table-container'>";
		echo "<div class='notification-image'>";
		echo '<img id="notification-image" src="' . $row['image'] . '">';
		echo "</div>";
		echo "<div class='notifications-text'>";
		echo "<p> This Product has been sold:  " . $row["name"] . "</p>";
		echo "<form method='post' action='notificationDetail.php'>";
		echo "<input type='hidden' name='buyer_id' value='" . $row["buyer_id"] . "'>";
		echo "<input type='hidden' name='status' value='" . $row["status"] . "'>";
		echo "<input type='hidden' name='product_id' value='" . $row["product_id"] . "'>";
		echo "<button class='green-button'>Show more</button>";
		echo "</form>";
		echo "<form method='post' action='../Controller/addData.php'>";
		echo "<button name= 'product_id_seller' value='" . $row['product_id'] . "' class='green-button'>Delete</button>";
		echo "</form>";
		echo "</div>";
		echo "</div>";
	}
}


if ($getAllUpdatedProducts->num_rows > 0) {
	while ($row = $getAllUpdatedProducts->fetch_assoc()) {
		echo "<div class='table-container'>";
		echo "<div class='notification-image'>";
		echo '<img id="notification-image" src="' . $row['image'] . '">';
		echo "</div>";
		echo "<div class='notifications-text'>";
		echo "<p> Status:  <span class='status-display'>" . $row["status"] . "</span></p>";
		echo "</form>";
		echo "<form method='post' action='../Controller/addData.php'>";
		echo "<button name= 'product_id_buyer' value='" . $row['product_id'] . "' class='green-button'>Delete</button>";
		echo "</form>";
		echo "</div>";
		echo "</div>";
	}
}


if ($getAllNotificationsBuyer->num_rows > 0) {
	while ($row = $getAllNotificationsBuyer->fetch_assoc()) {
		echo "<div class='table-container'>";
		echo "<div class='notification-image'>";
		echo '<img id="notification-image" src="' . $row['image'] . '">';
		echo "</div>";
		echo "<div class='notifications-text'>";
		echo "<p> This Product has been updated:  " . $row["name"] . "</p>";
		echo "<p> Status:  <span class='status-display'>" . $row["status"] . "</span></p>";
		if ($row["status"] == 2) {
			echo "<form method='post' action='../Controller/addData.php'>";
			echo "<div class='buyer-status'>";
			echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
			echo "<label>Update Product Status : </label>";

			echo "<button value='3' class='green-button' name='delivered'>Product has arrived</button>";
			echo "<button value='4' class='green-button' name='delivered'>Product hasn't arrived</button>";
			echo "</div>";
			echo "</form>";
		}

		if ($row["status"] == 3 || $row["status"] == 4) {
			echo "<form method='get' action='../Controller/addData.php'>";
			echo "<label>Rate the Sender: </label>";
			echo "<input type='hidden' name='seller_id' value='" . $row["seller_id"] . "'>";
			echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
			echo "<input type='hidden' name='status' value='" . $row["status"] . "'>";
			echo "<div class='rate-seller'>";
			echo "<label for='rating-5'>5</label>";
			echo "<input type='radio' id='rating-5' name='rating' value='5'>";
			echo "<label for='rating-4'>4</label>";
			echo "<input type='radio' id='rating-4' name='rating' value='4'>";
			echo "<label for='rating-3'>3</label>";
			echo "<input type='radio' id='rating-3' name='rating' value='3'>";
			echo "<label for='rating-2'>2</label>";
			echo "<input type='radio' id='rating-2' name='rating' value='2'>";
			echo "<label for='rating-1'>1</label>";
			echo "<input type='radio' id='rating-1' name='rating' value='1'>";
			echo "<button  class='green-button' type='submit'>Rate</button>";
			echo "</div>";
			echo "</form>";
		}
		echo "<form method='post' action='../Controller/addData.php'>";
		echo "<button name= 'product_id_buyer' value='" . $row['product_id'] . "' class='green-button'>Delete</button>";
		echo "</form>";
		echo "</div>";
		echo "</div>";

	}

}

?>
</body>
<script src="../../Styling/JS/notification.js"></script>

</html>
