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
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM person WHERE email = :email LIMIT 1";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['email' => $email]);
	$existingUser = $stmt->fetch();

	if ($existingUser) {
		echo "This email is already registered!";
	} else {
		$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
		$sql = "INSERT INTO person (first_name, email, password, last_name, review) VALUES (:first_name, :email, :password, :last_name, 3)";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([
			'first_name' => $first_name,
			'email' => $email,
			'last_name' => $last_name,
			'password' => $hashedPassword
		]);
		$_SESSION['email'] = $email;
		$_SESSION['first_name'] = $first_name;
		$_SESSION['last_name'] = $last_name;
		$_SESSION['id_person'] = $idPerson;
		session_start();
		header("Location: account.php");
	}
}
?>
