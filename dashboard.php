<?php
include('include/function.php');
include('include/config.php');
include('include/uploader.php');
include('include/db.php');
include('include/pagination.php');
error_reporting(E_ALL);
if (! is_logged())
{
	header("location: {$config['base_url']}");
	exit;
}
$db = new DB();
if (isset($_POST['submit']))
{
	$up = new Upload();
	if ($up->do_upload())
	{
		$data = $up->data();
		$sess_id = intval($_SESSION['id']);
		$i_title = $db->escape_string($_POST['title']);
		$i_artist = $db->escape_string($_POST['artist']);
		$path = $db->escape_string($data['file_path']);
		$sql = "INSERT INTO songs (`title`, `artist`, `path`, `owner`) VALUES ('{$i_title}','{$i_artist}','{$path}',{$sess_id});";
		
		if ( ! $db->query($sql))
		{
			die( $db->error );
		}
	}
	elseif(isset($_POST['url']) AND !empty($_POST['url']))
	{
		$sess_id = intval($_SESSION['id']);
		$i_title = $db->escape_string($_POST['title']);
		$i_artist = $db->escape_string($_POST['artist']);
		$sql = "INSERT INTO songs (`title`, `artist`, `path`, `owner`) VALUES ('{$i_title}','{$i_artist}','{$db->escape_string($_POST['url'])}',{$sess_id});";
		
		if ( ! $db->query($sql))
		{
			die( $db->error );
		}
	}
	else
	{
		echo $up->errors();
		exit;
	}
}
?>
<?php
if (is_admin())
{
	$res = $db->query("SELECT songs.* , users.username as 'username' FROM songs, users WHERE users.id = songs.owner");
}
else
{
	$res = $db->query("SELECT songs.* , users.username as 'username' FROM songs, users WHERE users.id = songs.owner AND songs.owner = {$_SESSION['id']} ORDER BY id DESC");
}
($res) OR die($db->error);

$pagina = new Pagination($config['base_url'].'dashboard', $res->num_rows, $config['perpage']);
$pagina = $pagina->get();


if (is_admin())
{
	//$res = $db->query("SELECT * FROM songs ORDER BY id DESC");
	$res = $db->query("SELECT songs.* , users.username as 'username' FROM songs, users WHERE users.id = songs.owner ORDER BY songs.id DESC LIMIT {$pagina['perpage']} OFFSET {$pagina['offset']}");
}
else
{
	//$res = $db->query("SELECT * FROM songs WHERE owner = {$_SESSION['id']} ORDER BY id DESC");
	$res = $db->query("SELECT songs.* , users.username as 'username' FROM songs, users WHERE users.id = songs.owner AND songs.owner = {$_SESSION['id']} ORDER BY id DESC LIMIT {$pagina['perpage']} OFFSET {$pagina['offset']}");
}



$title = "Dashboard";
if (!is_ajax_request()) include('./views/header.php');
include('./views/dashboard.php');
include('./views/home.php');
if (!is_ajax_request()) include('./views/footer.php');
$db->close();
?>