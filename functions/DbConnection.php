<?php

class DbConnection {

    private $config;
    public $dbh;

    public function query($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $sth->execute($params);
        return $sth->fetchAll();
    }

    public function queryOne($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $sth->execute($params);
        return $sth->fetch();
    }

    public function queryExec($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function __construct()
    {
        $config = new GetConfig;
        $this->config = $config->getConfig();

        $dsn = $this->config['db']['engine'] . ':dbname=' . $this->config['db']['dbname'] . ';host=' . $this->config['db']['host'];
        $this->dbh = new PDO($dsn, $this->config['db']['user'], $this->config['db']['password']);

    }
} 