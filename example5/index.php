<?php
    require('db.php');
    if ($_SESSION['login'] && isset($_GET['fromid']) && isset($_GET['toid']) && isset($_GET['amount'])) {
        $from_id = mysql_real_escape_string($_GET['fromid']);
        $to_id = mysql_real_escape_string($_GET['toid']);
        $amount = mysql_real_escape_string($_GET['amount']);

        $str = "UPDATE accounts SET balance=balance-$amount WHERE userid=$from_id";
        mysql_query($str) or die(mysql_error());
        $str = "UPDATE accounts SET balance=balance+$amount WHERE userid=$to_id";
        mysql_query($str) or die(mysql_error());
    }
    $logged_in = isset($_SESSION['login']);
    $login_str = $logged_in ? 'Log Out' : 'Log In';
?>

<form action="" method="POST">
    <?php if(!$logged_in) { ?>
    <input type="hidden" name="login" value="login" />
    <?php } else { ?>
    <input type="hidden" name="login" value="logout" />
    <?php } ?>
    <input type="submit" value="<?php echo $login_str; ?>" />
</form>

<?php if ($logged_in) { ?>
<p>Logged In!</p>
<p>You are user id 1</p>
<form action="" method="GET">
    <input type="hidden" name="fromid" value="1" />
    Transfer to (user id): <input type="text" name="toid" /><br />
    Transfer amount: <input type="text" name="amount" /><br />
    <input type="submit" /><br />
</form>


<?php } ?>
