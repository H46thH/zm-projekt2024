<?php
require "../Controller/getData.php";
require "nav.php";
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<link rel="stylesheet" href="../../Styling/Css/all.css">
	<title>Payment</title>
</head>

<body>
<div class="main-content row">
	<form action="../Controller/addData.php" method="post">
		<?php
		while ($row = $getAllInfo->fetch_assoc()) {

			echo "<div class='main-content-form'>";
			echo "<div class='form-div'>";
			echo "<label>Name</label>";
			echo "<input type='text' name='firstName' value='" . $row['first_name'] . "'>";
			echo "</div>";
			echo "<div class='form-div'>";
			echo "<label>Last Name</label>";
			if ($row['last_name']) {
				echo "<input type='text' name='lastName' value='" . $row['last_name'] . "'>";
			} else {
				echo "<input type='text' name='lastName'>";
			}
			echo "</div>";
			echo "<div class='form-div'>";
			echo "<label>Address</label>";
			if ($row['address']) {
				echo "<input type='text' name='address' value='" . $row['address'] . "'>";
			} else {
				echo "<input type='text' name='address'>";
			}
			echo "</div>";
			echo "<div class='form-div'>";
			echo "<label>City</label>";
			if ($row['town']) {
				echo "<input type='text' name='town' value='" . $row['town'] . "'>";
			} else {
				echo "<input type='text' name='town'>";
			}
			echo "</div>";
			echo "<div class='form-div'>";
			echo "<label>Area Code</label>";
			if ($row['area_code']) {
				echo "<input type='text' name='areaCode' value='" . $row['area_code'] . "'>";
			} else {
				echo "<input type='text' name='areaCode'>";
			}
			echo "</div>";
			echo "<div class='form-payment form-div'>";
			echo "<label>Payment Method</label>";
			echo "<div>";
			echo "<input name='payment' type='radio' id='paypal' value='1' " . ($row['payment_form'] == 1 ? "checked" : "") . ">";
			echo "<label for='paypal'> Paypal</label>";
			echo "<div>";
			echo "<input name='payment' type='radio' id='debitCard' value='2' " . ($row['payment_form'] == 2 ? "checked" : "") . ">";
			echo "<label for='paypal'> Debit Card</label>";
			echo "<input type='hidden' name='function' value='addToPerson'>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "<button  class='green-button' type='submit'>Buy</button>";


		}
		?>
	</form>
</div>
</body>
</html>
