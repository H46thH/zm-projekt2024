<?php


$rows = [];
if ($category->num_rows > 0) {
	while ($row = $category->fetch_assoc()) {
		$rows[] = $row;
	}
}
if (isset($_SESSION['first_name'])) {
	$first_name = $_SESSION['first_name'];
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<link rel="stylesheet" href="../Styling/Css/nav.css">
</head>
<body>
<nav>
	<div class="nav-menu-wrapper">
		<div class="nav-menu-container">
			<div class="nav-menu-search">
				<a href="index.php">
					<img src="/Styling/Images/logoNew2.png" width="75" height="75" style="object-fit: scale-down">
				</a>

				<form action="../Controller/getData.php" method="POST" id="nav-search-form" class="home-search">
					<input type="search" id="nav-search-input" name="searchResult"
						   placeholder="Suchen..."
						   aria-label="Suchen">
				</form>

			</div>
			<div class="nav-menu-category">
				<form action="list.php" method="get" id="searchCategoryForm">
					<?php
					foreach ($rows as $row) {
						echo "<button type='text' name='category' id='" . $row["name"] . "' class='category-button' value='" . $row["name"] . "'>" . $row["name"] . "</button>";
					}
					?>
				</form>
			</div>

			<div class="nav-menu-links">
				<?php
				if (isset($first_name)) {
					echo '<a href="notification.php"><img src="/Styling/Images/Icons/appointment-reminders.png" width="20" height="20"></a>';
					echo '<a href="cart.php"><img src="/Styling/Images/Icons/shopping-cart-xxl.png" width="20" height="20"></a>';
				} else {
					echo '<a href="Account/account.php"><img src="/Styling/Images/Icons/appointment-reminders.png" width="20" height="20"></a>';
					echo '<a href="Account/account.php"><img src="/Styling/Images/Icons/shopping-cart-xxl.png" width="20" height="20"></a>';
				}
				?>

				<a href="" id="login-link">
					<img src="/Styling/Images/Icons/user.png" width="20" height="20">
					<?php
					if (isset($first_name)) {
						echo "<a href='accountDetail.php' id='login-text'>$first_name</a>";
					}
					?>
				</a>
				<div id="login-drop-down">
					<?php
					if (isset($first_name)) {
						echo '<a href="Account/logout.php">Logout</a>';
						echo '<a href="accountDetail.php">Account</a>';
					} else {
						echo '<a href="Account/account.php">Login</a>';
					}
					?>
				</div>
			</div>

		</div>
	</div>
</nav>
</body>
</html>