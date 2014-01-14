<?php
	require('db.php');

	if (empty($_GET['username'])) {
		echo "Invalid params";
		exit;
	}
	if (substr($_GET['username'], 0, 2) != 'me') {
		echo "Stop trying to hack things!";
		exit;
	}

	$query = "SELECT * FROM user_pwquestion WHERE username='{$_GET['username']}'";
	$result = mysql_query($query, $db) or die(mysql_error());

	while($row = mysql_fetch_assoc($result)) {
		var_dump($row);
	}
?>
