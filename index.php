<?php
error_reporting(E_ALL);
include('include/function.php');
include('include/config.php');
include('include/uploader.php');
include('include/db.php');
include('include/pagination.php');
if (session_status() == PHP_SESSION_NONE)
{
	session_start();
}
$db = new DB();
$title = 'Home';
$res = $db->query("SELECT * FROM songs ORDER BY id DESC");
($res) OR die($db->error);

$pagina = new Pagination($config['base_url'], $res->num_rows);
$pagina = $pagina->get();

$res = $db->query("SELECT songs.* , users.username as 'username' FROM songs, users WHERE users.id = songs.owner ORDER BY songs.id DESC LIMIT {$pagina['perpage']} OFFSET {$pagina['offset']}");
if (!is_ajax_request()) include('./views/header.php'); //if this file is requested by ajax, the header and footer will not included
include('./views/home.php');
if (!is_ajax_request()) include('./views/footer.php');



