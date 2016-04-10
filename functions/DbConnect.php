<?php

require_once __DIR__ . '/Getconfig.php';

class DbConnect
{
    private $config;

    public function dbQuery($sql)
    {
        $res = mysql_query($sql);
        if(!$res) {
            echo mysql_error();
            return [];
        }
        $ret = [];
        while ($row = mysql_fetch_assoc($res))
        {
            $ret[] = $row;
        }
        return $ret;
    }

    public function dbQueryOne($sql)
    {
        return $this->dbQuery($sql)[0];
    }

    public function dbExec($sql)
    {
        $res = mysql_query($sql);
        if(false === $res) {
            return false;
        }
        return true;
    }


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

