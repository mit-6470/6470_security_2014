<?php
session_start();
require("login_info.php");

// check if already logged in
if (is_logged_in()) {
	header("Location: index.php"); // Redirect if already logged in
	exit(0);
}

$invalid = FALSE;

// check if login attempt
if (isset($_GET["username"]) && isset($_GET["password"])) {
	require("db.php");	// establish DB connection
	$user = $_GET["username"];
	$pass = $_GET["password"];
	$query = "SELECT PASSWORD from users WHERE USERNAME='" . mysql_real_escape_string($user) . "'";
	$result = mysql_query($query, $db) or die(mysql_error());
	$row = mysql_fetch_assoc($result);
	if ($pass == $row["PASSWORD"]) {
		$_SESSION["user"] = mysql_real_escape_string($user);
		if (isset($_GET["remember"])) {
			setcookie("user", mysql_real_escape_string($user), time() + 60*60*24, "/");
		}
		header("Location: index.php");
	} else {
		$invalid = TRUE;
	}
}
?>

<html>
<head><title> Login Page </title> </head>
<body>
	<?php if ($invalid) { ?>
		Invalid username or password
	<?php } ?>
	<!-- not logged in -->
	<form action="<?php $_SERVER['PHP_SELF']?>" method="get">
		Username: <input type="text" name="username" /><br />
		Password: <input type="password" name="password" /><br />
		Remember me <input type="checkbox" name="remember" /><br />
		<input type="submit" />
	</form>
	<br />
	<br />
	<a href="index.php">Home</a><br />
	<a href="register.php">Click here to register</a>
</body>
</html>