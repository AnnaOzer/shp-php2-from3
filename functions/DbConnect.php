<?php

require_once __DIR__ . '/Getconfig.php';

class DbConnect
{
    protected $config;

    public function __construct()
    {
        $getConfig = new GetConfig;
        $this->config = $getConfig->getConfig();
    }
}

$connection = new DbConnect();
var_dump($connection);