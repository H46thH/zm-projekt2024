<?php
session_start();
$servername = "db:3306";
$username = "db";
$password = "db";
$dbname = "db";

try {
	$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM person WHERE email = :email LIMIT 1";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['email' => $email]);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);

	$isPasswordValid = password_verify($password, $user['password']);

	if ($user && $isPasswordValid) {
		$_SESSION['email'] = $user['email'];
		$_SESSION['first_name'] = $user['first_name'];
		$_SESSION['id_person'] = $user['id_person'];
		var_dump($_SESSION);

		header("Location: ../index.php");
		exit;

	} else {
		echo "Invalid email or password!";
	}

}

