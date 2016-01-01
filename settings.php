<?php
include('include/function.php');
include('include/config.php');
include('include/db.php');
if ( ! is_admin())
{
	header('Location: '.$config['base_url'].'?msg=Not_Allowed');
	exit;
} 

if (isset($_POST['update']))
{
	$data['site_title'] = strip_tags($_POST['site_title']);
	$data['perpage'] = intval($_POST['perpage']);
	$wr = htmlentities(base64_decode('PD9waHA=')).PHP_EOL;
	foreach($data as $i => $j)
	{
		$wr .= '$config["'.$i.'"] = "'.$j.'";'.PHP_EOL;
	}
	file_put_contents(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'front-end-settings.php', html_entity_decode($wr));
	header('Location: '.$config['base_url'].'dashboard?msg=update_success');
	exit;
	
}
$title = 'Settings';
if (!is_ajax_request()) include('./views/header.php');
include('./views/settings.php');
if (!is_ajax_request()) include('./views/footer.php');

