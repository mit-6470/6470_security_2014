<?php
require('../db_pass.php');
$db = mysql_connect("sql.mit.edu", "cliu2014", $sql_pw);
mysql_select_db("cliu2014+6470security") or die(mysql_error());
session_start();
if (isset($_POST['login'])) {
    if ($_POST['login'] == 'login') {
        $_SESSION['login'] = TRUE;
    } else if ($_POST['login'] == 'logout') {
        unset($_SESSION['login']);
    }
}
?>