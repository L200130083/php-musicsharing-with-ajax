<?php
if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}
function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824)
    {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1)
    {
        $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1)
    {
        $bytes = $bytes . ' byte';
    }
    else
    {
        $bytes = '0 bytes';
    }
    
    return $bytes;
}
function dir_walker($dir)
{
    
    $result = array();
    
    $cdir = scandir($dir);
    foreach ($cdir as $key => $value)
    {
        if (!in_array($value, array(
            ".",
            ".."
        )))
        {
            if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
            {
                $result[$value] = dir_walker($dir . DIRECTORY_SEPARATOR . $value);
            }
            else
            {
                $result[] = $value;
            }
        }
    }
    
    return $result;
}
function create_dir($path)
{
    $ch        = '';
    $dir_array = explode('/', $path);
    foreach ($dir_array as $dir)
    {
        if ($dir != '')
            $ch = $ch . $dir . '/';
        if (is_dir($dir))
        {
            chdir($dir);
        }
        else
        {
            //print_r($dir_array);
            if ($dir != '')
            {
                mkdir($dir, 755);
                chdir($dir);
                file_put_contents('index.php', 'Silent & Deadly', LOCK_EX);
            }
        }
    }
    return $ch;
    
}

function recursiveRemoveDirectory($directory)
{
    foreach (glob("{$directory}/*") as $file)
    {
        if (is_dir($file))
        {
            recursiveRemoveDirectory($file);
        }
        else
        {
            unlink($file);
        }
    }
    rmdir($directory);
}
function getDomain($url)
{
    $needles = array(
        'https://www',
        'https://',
        'http://www',
        'http://'
    );
    $res     = str_ireplace($needles, '', $url);
    $res     = explode('/', $res);
    return $res[0];
}
function time_second($secs)
{
    $minutes         = $secs / 60;
    $hours           = $minutes / 60;
    $days            = $hours / 24;
    $weeks           = $days / 7;
    $months          = $weeks / 30;
    $years           = $months / 12;
    $data['seconds'] = $secs % 60;
    $data['minutes'] = $minutes % 60;
    $data['hours']   = $hours % 60;
    $data['days']    = $days % 24;
    return $data;
}
function sql_secure($q)
{
    //fix this one later :P
    return stripslashes($q);
}
function is_logged()
{
    if (session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
    require('./include/config.php');
    if (!isset($_SESSION['logged_in']))
    {
        return FALSE;
    }
    return TRUE;
}
function auto_login()
{
    //very unsecure broo.. ima fix this later
    if (session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
    //require('./include/config.php');
    if (!isset($_COOKIE['username'], $_COOKIE['id']))
        return FALSE;
    $_SESSION['username']  = $_COOKIE['username'];
    $_SESSION['id']        = $_COOKIE['id'];
    $_SESSION['logged_in'] = TRUE;
}
function get_mp3_src($path)
{
    require(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php');
    $rv = str_ireplace('./', $config['base_url'], $path);
    return $rv;
}
function is_ajax_request()
{
    $headers = apache_request_headers();
    return (isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest');
}
function isTheOwner($song_id, $user_id = FALSE)
{
    $user_id = $user_id ? $user_id : $_SESSION['id'];
    if (!class_exists('DB'))
    {
        include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'db.php');
    }
    $conn = new DB();
    $num  = $conn->query("SELECT id FROM songs WHERE id = {$song_id} AND owner = {$user_id}")->num_rows;
    return $num > 0;
    
    
}
function is_admin()
{
    if (!is_logged())
        return FALSE;
    $user_id = intval($_SESSION['id']);
    if (!class_exists('DB'))
    {
        include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'db.php');
    }
    $conn = new DB();
    $num  = $conn->query("SELECT users_group.group_id FROM users_group WHERE users_group.group_id = 1 AND users_group.user_id = {$user_id}");
    return $num->num_rows > 0;
}