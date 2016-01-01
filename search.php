<?php
isset($_GET['s']) OR die('NULL');
include('include/function.php');
include('include/config.php');
include('include/uploader.php');
include('include/db.php');
include('include/pagination.php');
$squery = $_GET['s'];
$db = new DB();
$title = 'Home';
$res = $db->query("SELECT songs.* , users.username as 'username' FROM songs, users WHERE users.id = songs.owner AND (artist LIKE '%{$squery}%' OR title LIKE '%{$squery}%') ORDER BY id DESC");
($res) OR die($db->error);

$pagina = new Pagination($config['base_url']."search?s={$squery}", $res->num_rows, 5);
$pagina = $pagina->get();


$res = $db->query("SELECT songs.* , users.username as 'username' FROM songs, users WHERE users.id = songs.owner AND (artist LIKE '%{$squery}%' OR title LIKE '%{$squery}%') ORDER BY id DESC LIMIT {$pagina['perpage']} OFFSET {$pagina['offset']}");

if (!is_ajax_request()) include('./views/header.php');
include('./views/home.php');
if (!is_ajax_request()) include('./views/footer.php');
$db->close();