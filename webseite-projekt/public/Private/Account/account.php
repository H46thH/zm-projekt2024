<!DOCTYPE html>
<html lang="de">

<head>
	<link rel="stylesheet" href="../../Styling/Css/all.css">

	<title>Account</title>
</head>

<body>
<div class="main-content row">
	<div id="account-button-wrapper">
		<button onclick="registerClicked()" id="account-button">Register</button>
	</div>
		<div id="login-form-container">
			<form method="POST" id="login-form" action="login.php" data-text="Login">
				<div class='form-div'>
				<input type="email" name="email" placeholder="Email" required><br>
				</div>
				<div class='form-div'>
				<input type="password" name="password" placeholder="Password" required><br>
				</div>

				<button class="button-white" type="submit">Login</button>
			</form>
		</div>
		<div id="register-form-container">
			<form method="POST" action="register.php" id="register-form" class="hidden" data-text="Register">
				<div class='form-div'>
				<input type="text" name="first_name" placeholder="First Name" required>
				</div>
				<div class='form-div'>
				<input type="text" name="last_name" placeholder="Last Name" required>
				</div>
				<div class='form-div'>
				<input type="email" name="email" placeholder="Email" required>
				</div>
				<div class='form-div'>
				<input type="password" name="password" placeholder="Password" required>
				</div>
				<button class="button-white" type="submit">Register</button>
			</form>
	</div>
</div>
</body>
<script src="../../Styling/JS/account.js"></script>
</html>