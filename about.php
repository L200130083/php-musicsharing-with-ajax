<?php
include('include/config.php');
include('include/function.php');
$title = 'About';
if (!is_ajax_request()) include('./views/header.php');
include('./views/about.php');
if (!is_ajax_request()) include('./views/footer.php');