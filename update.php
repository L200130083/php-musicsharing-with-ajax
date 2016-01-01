<?php
include('include/function.php');
include('include/config.php');
include('include/db.php');
if (! is_logged() OR ! isset($_GET['id']))
{
	header("location: {$config['base_url']}");
	exit;
}
$db = new DB();
if (isset($_POST['update']))
{
	$id = $db->escape_string($_POST['id']);
	$title =$db->escape_string($_POST['title']);
	$artist = $db->escape_string($_POST['artist']);
	$url = $db->escape_string( $_POST['url']);
	$db->query("UPDATE songs SET title='{$title}', artist='{$artist}', path='{$url}' WHERE id={$id}");
	header('Location: '.$config['base_url'].'dashboard?msg=update_success');
	exit;
	
}
$db = new DB();
$row = $db->query("SELECT * FROM songs WHERE id={$_GET['id']}");
$row = $row->fetch_array();
$title = 'Update '.$row['title'];
if (!is_ajax_request()) include('./views/header.php');
include('./views/update.php');
if (!is_ajax_request()) include('./views/footer.php');
$db->close();