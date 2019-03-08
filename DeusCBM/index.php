
<!DOCTYPE html>
<html>
<head>
	<title>DeusCBM</title>
</head>
<body>

	<form action="includes/signup.inc.php" method="POST">
	<input type="text" name="first" placeholder="First name">
	<br>
	<input type="text" name="last" placeholder="Last name">
	<br>
	<input type="text" name="uid" placeholder="Username">
	<br>
	<input type="text" name="mail" placeholder="E-mail">
	<br>
	<input type="password" name="pwd" placeholder="Password">
	<br>
	<input type="password" name="pwdr" placeholder="Repeat password">
	<br>
	<button type="submit" name="sub">Register</button>
	</form>

<?php
	$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	if (strpos($fullUrl, "error=emptyfields")){
		echo '<p> Fill all the fields! </p>';
	}
	else if (strpos($fullUrl, "error=invalidemail")){
		echo '<p> Wrong email adress! </p>';
	}
	else if (strpos($fullUrl, "error=name")){
		echo '<p> Name does not include numbers or other symbols! </p>';
	}
	else if (strpos($fullUrl, "error=pwdmatch")){
		echo '<p> Passwords does not match! </p>';
	}
	else if (strpos($fullUrl, "error=mysqli")){
		echo '<p> Server error! </p>';
	}
	else if (strpos($fullUrl, "error=mysqlierror")){
		echo '<p> Server error! </p>';
	}
	else if (strpos($fullUrl, "signup=success")){
		echo '<p> Successfully signed up! </p>';
	}
?>
</body>
</html>