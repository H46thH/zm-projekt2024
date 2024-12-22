<?php
require '../Controller/getData.php';
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<link rel="stylesheet" href="../Styling/Css/all.css">
	<title>Detail</title>
</head>

<body>

<?php
require "nav.php";
?>
<div class="main-content">
	<?php

	while ($row = $getProduct->fetch_assoc()) {

		echo "<div class='main-content-image'>";
		echo "<img src='" . $row['image'] . "' height:500px width=500px object-fit='cover'>";
		echo "</div>";
		echo "<div class='main-content-text'>";
		echo "<h2>" . $row['name'] . "</h2>";
		echo "<h4>" . $row['description'] . "</h4>";
		echo "<p> Price: " . $row["price"] . " €</p>";

		echo "<form action='../Controller/addData.php' method='GET'>";
		if (isset($_SESSION['id_person']) && $_SESSION['id_person'] != $row['person_id']) {
			echo "<button class='green-button' type='text' id = '.$id.' name ='id' value=" . $id . ">Add to cart</button>";
		} else if (isset($_SESSION['id_person'])) {
			echo "<p>You own this product</p>";
		} else {
			echo "<a href='Account/account.php' class='green-button' type='text' id = '.$id.' name ='id' value=" . $id . ">Login</button>";
		}
		echo "</form>";
		echo "</div>";
	}
	?>
</div>
</body>
</html>