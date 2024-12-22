<?php
require '../Controller/getData.php';
require 'nav.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<link rel="stylesheet" href="../Styling/Css/all.css">
	<title>Detail</title>
</head>
<body>
<div class="main-content row">
	<div class="main-content-div">
		<?php
		echo "<h2>Shopping Cart</h2>";
		if (isset($getCartItems)) {
			$_SESSION['productIds'] = [];
			while ($row = $getCartItems->fetch_assoc()) {
				$_SESSION['productIds'][] = $row['Id'];
				echo "<div class='image-text'>";
				echo "<div>";
				echo '<img src="' . $row['ProductImage'] . '">';
				echo "</div>";
				echo "<div class='text'>";
				echo "<h4>" . $row['ProductName'] . "</h4>";
				echo "<p class='price'>" . $row['ProductPrice'] . " €</p>";
				echo "<form method='post' action='../Controller/addData.php'>";
				echo "<input type='hidden' name='function' value='delete'>";
				echo "<button class='button-white' value='" . $row['Id'] . "' name='Id'>Remove</button>";
				echo "</form>";
				echo "</div>";
				echo "</div>";
			}
		}
		?>
		<div class="result">
			<p>Total: <span id="result"></span></p>
			<form action="paymentForm.php" method="get">

				<button type="submit"  id="buy-button" class="button-white">Buy</button>
			</form>
		</div>
	</div>
</div>
</body>
<script src="../../Styling/JS/cart.js"></script>
</html>

