<?php
	require('../db_pass.php'); // contains the database password
	$db = mysql_connect('sql.mit.edu', 'cliu2014', $sql_pw);
	mysql_select_db('cliu2014+6470-message-board', $db) or die(mysql_error());
?>