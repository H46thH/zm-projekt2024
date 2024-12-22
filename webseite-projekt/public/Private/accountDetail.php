<?php
require "../Controller/getData.php";
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<link rel="stylesheet" href="../Styling/Css/all.css">
	<title>User</title>
</head>
<body>
<?php
require "nav.php"
?>
<div id="pop-up-message" class="hidden-pop-up pop-up">
	<p>Your purchase was successful!</p>
	<button id="close-alert-button" class="green-button">Close</button>
</div>
<div id= "overlay-pop-up" class="overlay-pop-up hidden-pop-up">

</div>
<div class="main-content grid">


	<div class="main-content-site">
		<div class="main-content-site">
			<div class="main-content-headline" id="1">
				<a>History</a>
			</div>
			<div class="main-content-text hidden-text" id="main-content-text-1">
				<div>
					<button class="accordion" id="1">Bought</button>
					<?php
					echo "<div class='accordion-div' id='accordion-div-1'> ";
					if ($productBought->num_rows > 0) {
						while ($row = $productBought->fetch_assoc()) {
							echo "<li>{$row['name']}</li>";

						}
					} else {
						echo "<p>No Products Bought</p>";
					}
					echo "</div>";
					echo "</div>";

					echo "<div>";
					echo "<button class='accordion' id='2'>Sold</button>";
					echo "<div class='accordion-div' id='accordion-div-2'> ";
					if ($productsSold->num_rows > 0) {
						while ($row = $productsSold->fetch_assoc()) {
							echo "<li>{$row['name']} : <span class='status-display'>{$row['status']}</span>";
							echo "<br>";
							echo "<a href='notificationDetail.php?id={$row['buyer_id']}&status={$row['status']}&product_id={$row['id']}'><button class='button-green'>Update Status</button></a>";
							echo "</li>";
						}
					} else {
						echo "<p>No Products Sold</p>";
					}
					echo "</div>";
					echo "</div>";
					echo "<div>";
					echo "<button class='accordion' id='3'>My Products</button>";
					echo "<div class='accordion-div' id='accordion-div-3'> ";
					if ($myProducts->num_rows > 0) {
						while ($row = $myProducts->fetch_assoc()) {
							echo "<div class=''>";
							echo "<li>{$row['name']}";
							echo "</div>";
						}
					} else {
						echo "<p>No Products Uploaded</p>";
					}
					echo "</div>";
					echo "</div>";
					?>
				</div>
			</div>
		</div>
		<div class="main-content-site">
			<div class="main-content-headline" id="2">
				<a>Add a Product</a>
			</div>
			<div class="main-content-text hidden-text" id="main-content-text-2">
				<div class="main-content-form form-text-hidden" id="product-create-form">
					<form action="../Controller/addData.php" method="post" enctype="multipart/form-data">
						<div class='form-div'>
							<label>Product Name</label>
							<input id="product-name" type="text" name="product-name">
						</div>
						<div class='form-div'>
							<label>Price</label>
							<input id="product-price" type="text" name="product-price">
						</div>
						<div class='form-div'>
							<label>Description</label>
							<input id="product-description" type="text" name="product-description">
						</div>
						<div class='form-div'>
							<label>Category</label>
							<select id="product-category" name="product-category">
								<?php
								foreach ($rows as $row) {
									echo "<option>" . $row["name"] . "</option>";
								}
								?>
							</select>
						</div>
						<div class='form-div'>
							<label>Image</label>
							<input type="file" id="product-image" name="product-image">
						</div>
						<button class="button-white" type="submit">Upload Product</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="../Styling/JS/account.js"></script>
<script src="../Styling/JS/notification.js"></script>

</html>