<?php

class DbConnection {

    protected $pdo;

    static function config()
    {
        return include __DIR__ . "/../config.php";
    }

    public function pdo() {
        return $this->pdo;
    }

    public function __construct()
    {
        try {
            $config = self::config();
            $dsn = $config['db']['engine'] . ':dbname=' . $config['db']['dbname'] . ';host=' . $config['db']['host'];
            $this->pdo = new PDO($dsn, $config['db']['user'], $config['db']['password']);
        } catch (PDOException $e){
            echo "Error: " . $e->getMessage();
            die;
        }
    }

    public function query($sql, $params=[])
    {
        $sth = $this->pdo->prepare($sql);
        $sth->execute($params);
        return $sth;
    }

}