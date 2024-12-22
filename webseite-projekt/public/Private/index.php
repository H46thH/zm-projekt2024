<?php

require "../Controller/getData.php";

?>

<!DOCTYPE html>
<html lang="de">
<head>
	<link rel="stylesheet" href="/Styling/Css/all.css">
	<title>Startseite</title>
</head>
<body>

<div class="main-container">
	<?php
	require "nav.php";
	?>
	<div class="image-header">
		<div class="image-overlay">
		</div>
		<img src="../Styling/Images/Gemini_Generated_Image_1mmo001mmo001mmo.jpeg">
		<div class="welcome-text">
			<?php
			if (isset($first_name)) {
				echo "<h2>Wilkommen, " . $first_name . "</h2>";
			} else {
				echo "<h2>Wilkommen</h2>";
			}
			?>
		</div>
		<div class="overlay-main-content-wrapper">
			<div>
				<div class="overlay-main-content-left overlay-main-content left">
					<?php
					if ($randomProducts->num_rows > 0) {
						while ($row = $randomProducts->fetch_assoc()) {
							echo "<div class='mySlides'>";
							echo "<a href='detail.php?id={$row['id']}'>";
							echo "<img src='" . $row['image'] . "' height='300px' width='300px')'>";
							echo "</a>";
							echo "</div>";
						}
					}
					?>
				</div>
				<div class="overlay-main-content overlay-main-content-right right">
					<h2>Find whatever you need</h2>
					<a class="dark-green-button" href="list.php?category=All">Show All Products</a>
				</div>
			</div>
			<div class="overlay-main-content-title overlay-main-content">
				<h2>The most popular categories</h2>
			</div>
			<div class=" overlay-main-content overlay-main-content-category-right">
				<div class="overlay-item left">
					<div class=""><img src="../Styling/Images/sofa.jpeg"></div>
					<div class="overlay-item-text" id="1">
						<h3>Furniture</h3>
						<a href="list.php?category=furniture" id="category-1" class="category-hidden overlay-category-button light-green-button">Find Products</a>
					</div>
				</div>
				<div class="overlay-item right">
					<div ><img src="../Styling/Images/shirt.jpeg"></div>
					<div class="overlay-item-text" id="2">
						<h3>Clothes</h3>
						<a href="list.php?category=Clothes" id="category-2" class="category-hidden overlay-category-button light-green-button">Find Products</a>
					</div>
				</div>
				<div class="overlay-item left">
					<div ><img src="../Styling/Images/shoes.jpeg"></div>
					<div class="overlay-item-text" id="3">
						<h3>Shoes</h3>
						<a href="list.php?category=Shoes" id="category-3" class="category-hidden overlay-category-button">Find Products</a>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>
<div class="footer">

</div>
</body>
<script src="../home.js"></script>

</html>