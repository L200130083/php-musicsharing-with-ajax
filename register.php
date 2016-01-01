<?php session_start();
require('include/config.php');
require('include/db.php');
require('include/function.php');
if (isset($_SESSION['logged_in']))
{
	header('location: '.$config['base_url'].'dashboard');
	exit;
}
if (isset($_POST['submit']))
{
	$username = sql_secure($_POST['username']);
	$password = sql_secure($_POST['password']);
	$email = sql_secure($_POST['email']);
	$db = new DB();
	$sql = $db->query("INSERT INTO users (id, username, password, email) VALUES (NULL, '{$username}', MD5('{$password}'), '{$email}')");
	if (!$sql)
	{
		
		die($db->error);
	}
	else
	{
		if (!$db->query("INSERT INTO users_group (id, user_id, group_id) VALUES (NULL,{$db->insert_id}, 2)"))
		{
			die($db->error);
		}
	}
	header("location: {$config['base_url']}?msg=please_login");
}
