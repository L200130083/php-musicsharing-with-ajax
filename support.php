<?php
include('include/function.php');
include('include/config.php');
$title= "Contact";
if (!is_ajax_request()) include('./views/header.php');
include('./views/support.php');
if (!is_ajax_request()) include('./views/footer.php');