<?php
$config['base_url'] = 'http://localhost/kuliah/msc/';
//database setting
$config['db_host'] = "localhost";
$config['db_username'] = "root";
$config['db_password'] ='';
$config['db_name'] = "yogiek";
//uploading
$config['upload_path'] = './uploads/';
$config['upload_allowed_extension'] = array('mp3');
$config['upload_max_size'] = 18874368;
include('front-end-settings.php'); //why? coz this config file will be updated every time the site setting is chaged by administrator


