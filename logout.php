<?php
require('include/config.php');
require('include/function.php');
is_logged() OR header('location: '.$config['base_url']);
$_SESSION = array();
session_unset();
session_destroy();
if (isset($_COOKIE['username'])) {
    unset($_COOKIE['username']);
    unset($_COOKIE['id']);
    setcookie('username', null, -1, '/');
    setcookie('id', null, -1, '/');
}
header('location: '.$config['base_url']);
exit;
?>
	
