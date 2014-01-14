<?php
require('../db_pass.php');
$db = mysql_connect("sql.mit.edu", "cliu2014", $sql_pw) or die(mysql_error());
//mysql_query("CREATE DATABASE IF NOT EXISTS '6470-jungle-security'") or die(mysql_error()); // not for scripts
mysql_select_db("cliu2014+6470-jungle-security", $db) or die(mysql_error());
mysql_query("CREATE TABLE IF NOT EXISTS users (username VARCHAR(32) NOT NULL, password CHAR(40) NOT NULL, salt CHAR(32) NOT NULL, UNIQUE(username))") or die(mysql_error());
mysql_query("CREATE TABLE IF NOT EXISTS users_pre_tokens (id VARCHAR(32) NOT NULL, token CHAR(32) NOT NULL, UNIQUE (id))") or die (mysql_error());
mysql_query("CREATE TABLE IF NOT EXISTS user_posts (username VARCHAR(32) NOT NULL, post TEXT)") or die(mysql_error());
mysql_query("CREATE TABLE IF NOT EXISTS user_pwquestion (username VARCHAR(32) NOT NULL, password CHAR(32))") or die(mysql_error());
?>