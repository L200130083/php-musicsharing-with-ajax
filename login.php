<?php session_start();
require('include/config.php');
require('include/db.php');
require('include/function.php');

if (isset($_GET['logout']))
{
	$_SESSION = array();
	session_unset();
	session_destroy();
	header('location: '.$config['base_url']);
	exit;
	
}
$cookie_match = isset($_COOKIE['username']) ? ((isset($_SESSION['username'])) ? $_SESSION['username'] == $_COOKIE['username'] : FALSE ): FALSE;
//echo $_SESSION['username'];
if ($cookie_match)
{
	header('location: '.$config['base_url'].'dashboard');
	exit;
}
if (isset($_POST['submit']))
{
	$username = sql_secure($_POST['username']);
	$password = sql_secure($_POST['password']);
	$db = new DB();
	$sql = $db->query("SELECT * FROM users WHERE username='{$username}' AND password=MD5('{$password}');");
	if (!$sql)
	{
		die($db->error);
	}
	$data = $sql->fetch_array();
	$db->close();
	if (sizeof($data) === 0)
	{
		$error = 'Username Or Password Invalid';
	}
	else
	{

		setcookie('username', $data['username'], time() + (86400 * 30), "/"); // 86400 = 1 day
		setcookie('id', $data['id'], time() + (86400 * 30), "/"); // 86400 = 1 day
		//setcookie('username', $data['username']); // 86400 = 1 day
		
		$_SESSION['logged_in'] = TRUE;
		$_SESSION['id'] = $data['id'];
		$_SESSION['username'] = $data['username'];
		header("location: {$config['base_url']}dashboard");
		exit;
	}
	header("location: {$config['base_url']}?msg=login_failed");
}
