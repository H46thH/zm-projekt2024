<?php
require '../Controller/getData.php';
?>
<!DOCTYPE html>
<html lang="de">

<head>
	<link rel="stylesheet" href="../Styling/Css/all.css">
	<title>List</title>
</head>
<body>
<?php
require "nav.php";
?>
<div class="main-wrapper center">
	<div class="search-wrapper">
		<div class="search-bar">
			<div id="select">
				<p id="selectText">All</p>
				<img src="../Public/Images/Icons/arrow.png" alt=""/>
				<ul id='list'>
					<?php
					echo "<li class='li-select'>All</li>";
					foreach ($rows as $row) {
						echo "<li class='li-select'>".$row["name"]."</li>";
					}
					?>
				</ul>

			</div>
			<form role="search" method="post" id="form" class="searchform" action="../Controller/getData.php">
				<input type="search" id="searchResult" name="searchResult"
					   placeholder="Suchen..."
					   aria-label="Suchen">
				<button>
					<svg viewBox="0 0 1024 1024">
						<path class="path1"
							  d="M848.471 928l-263.059-263.059c-48.941 36.706-110.118 55.059-177.412 55.059-171.294 0-312-140.706-312-312s140.706-312 312-312c171.294 0 312 140.706 312 312 0 67.294-24.471 128.471-55.059 177.412l263.059 263.059-79.529 79.529zM189.623 408.078c0 121.364 97.091 218.455 218.455 218.455s218.455-97.091 218.455-218.455c0-121.364-103.159-218.455-218.455-218.455-121.364 0-218.455 97.091-218.455 218.455z"></path>
					</svg>
				</button>
			</form>
		</div>
	</div>
	<div class="products-list-wrapper">
				<?php
				if ($productName->num_rows > 0) {
					while($row = $productName->fetch_assoc()) {
						echo "<div id='" . $row['id'] . "' class='product-item' data-categories='" . $row['categoryName'] . "'>";
						echo "<a href='/Private/detail.php?id={$row['id']}'>";
						echo '<img src="' .$row['image']. '">';
						echo "</a>";
						echo "<div class='product-information'>";
						echo "<h2>".$row["name"]."</h2>";
						echo "<p>".$row["description"]."</p>";
						echo "<br>";
						echo "<p>" . $row["price"] . " €</p>";
						echo "<p style='margin-bottom: 60px'>". $row["first_name"] . " " . $row["last_name"] ." ". $row["review"] . "</p>";
						echo "<a class='product-button product-button-hidden' id='product-button-" . $row['id'] . "' href='/Private/detail.php?id={$row['id']}'>show more</a>";
						echo "</div>";
						echo "</div>";
					}
				}
				?>
		</div>
</div>
</body>
<script src="../Styling/JS/list.js"></script>
</html>