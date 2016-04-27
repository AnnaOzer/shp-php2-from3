<?php

class DbConnection {

    private $config;
    public $dbh;

    public function __construct()
    {
        $config = new GetConfig;
        $this->config = $config->getConfig();

        $dsn = $this->config['db']['engine'] . ':dbname=' . $this->config['db']['dbname'] . ';host=' . $this->config['db']['host'];
        $this->dbh = new PDO($dsn, $this->config['db']['user'], $this->config['db']['password']);

    }
} 