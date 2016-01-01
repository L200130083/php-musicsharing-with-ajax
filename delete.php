<?php
include('include/function.php');
include('include/db.php');
include('include/config.php');
if (! is_logged())
{
	header("location: {$config['base_url']}");
	exit;
}
$id = $_GET['id'];
$db = new DB();
$db->query("DELETE FROM songs WHERE id='{$id}'");
@unlink(base64_decode($_GET['path']));
if (!is_ajax_request())
{
	$res = $db->query("SELECT * FROM songs ORDER BY id DESC");
	($res) OR die($db->error);
	include('./views/home.php');
}
else
{
	header("Location: {$config['base_url']}dashboard?msg=delete_success");
}

$db->close();