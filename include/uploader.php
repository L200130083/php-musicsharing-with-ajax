<?php
isset($config) OR include('./include/config.php');
class Upload
{
    private $error = NULL;
    private $result;
    function __construct()
    {
        GLOBAL $config;
        $this->max_size    = $config['upload_max_size'];
        $this->extension   = $config['upload_allowed_extension'];
        $this->upload_path = $config['upload_path'];
    }
    function do_upload()
    {
        if (!isset($_FILES['mp3']))
        {
            $this->error = 'No FIle Selected!';
            return FALSE;
        }
        $file_name = $_FILES['mp3']['name'];
        $file_size = $_FILES['mp3']['size'];
        $file_tmp  = $_FILES['mp3']['tmp_name'];
        $file_type = $_FILES['mp3']['type'];
        $extension = @end(explode('.', $file_name));
        if (!in_array($extension, $this->extension))
        {
            $this->error = "File Extension Not Allowed";
            return FALSE;
        }
        
        if ($file_size > $this->max_size)
        {
            $this->error = "File Size must be less than $this->max_size Bytes";
            return FALSE;
        }
        if ($this->error != NULL)
        {
            return FALSE;
        }
        move_uploaded_file($file_tmp, $this->upload_path . $file_name);
        $this->result['file_name'] = $file_name;
        //$this->result['file_size'] = $file_size;
        $this->result['file_path'] = $this->upload_path . $file_name;
        return TRUE;
    }
    function errors()
    {
        return $this->error;
    }
    function data()
    {
        return $this->result;
        
    }
}
