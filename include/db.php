<?php
isset($config) OR include('config.php');
class DB extends mysqli
{
	function __construct()
	{
		GLOBAL $config;
		$this->servername = $config['db_host'];
		$this->username = $config['db_username'];
		$this->password = $config['db_password'];
		$this->dbname = $config['db_name'];
		parent::__construct($this->servername, $this->username, $this->password, $this->dbname);
	}
}