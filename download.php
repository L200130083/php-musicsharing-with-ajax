<?php
include('include/function.php');
if (isset($_GET['path']))
{
	$dl = base64_decode($_GET['path']);
	if (file_exists($dl) OR is_dir($dl))
	{
		$file_url = $dl;
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
		readfile($file_url); // do the double-download-dance (dirty but worky)
	}
	die('404 FILE NOT FOUND ERROR');
}
die('ACCESS DENIED!!');
?>