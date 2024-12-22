<?php

$conn = new mysqli("db:3306", "db", "db", "db");


$apiUrl = "https://dummyjson.com/products";

$response = file_get_contents($apiUrl);

if ($response === FALSE) {
	die("Fehler beim Abrufen der Daten von der API.");
}
$categoriesArray = [];
$productsArray = [];
$data = json_decode($response, true);
if ($data) {
	foreach ($data as $info) {
		$productArray = [
			["id" => $info['id'], "name" => $info['title'], "description" => $info['description'], "categoryId" => $info['category']['id'], "categoryName" => $info['category']['name'], "price" => $info['price'], "images" => $info['images'][0]],
		];
		array_push($productsArray, $productArray);
	}

}


foreach ($productsArray as $products) {

	foreach ($products as $product) {
		$product = array_unique($product);
		$name = mysqli_real_escape_string($conn, $product['name']);
		$description = mysqli_real_escape_string($conn, $product['description']);
		$image = mysqli_real_escape_string($conn, $product['images']);
		$categoryId = mysqli_real_escape_string($conn, $product['categoryId']);
		$categoryName = mysqli_real_escape_string($conn, $product['categoryName']);
		$price = $product['price'];

		$sql = "INSERT INTO products (name, description, categoryId, categoryName , price, image) VALUES ('$name', '$description', $categoryId, '$categoryName', $price, '$image')";

		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $conn->error;
		}
	}
}





