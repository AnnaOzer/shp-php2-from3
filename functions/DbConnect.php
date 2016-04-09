<?php

require_once __DIR__ . '/Getconfig.php';

class DbConnect
{
    protected $config;

    public function __construct()
    {
        $getConfig = new GetConfig;
        $this->config = $getConfig->getConfig();
        if(!mysql_connect(
            $this->config['db']['host'],
            $this->config['db']['user'],
            $this->config['db']['root']
        )) {
            die('Could not connect: ' . mysql_error());
        };
        if(!mysql_select_db($this->config['db']['dbname'])){
            die('Could not connect to ' . $this->config['db']['dbname'] .  '  ' . mysql_error());
        };

    }
}

$connection = new DbConnect();
var_dump($connection);