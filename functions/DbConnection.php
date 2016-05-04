<?php

class DbConnection {

    protected $pdo;

    static function config()
    {
        return include __DIR__ . "/../config.php";
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

    public function toPrepare($query)
    {
        $statement = $this->pdo->prepare($query);
        $statement->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        return $statement;
    }

    public function toExecute($query, array $parameters = [])
    {
        $statement = $this->toPrepare($query);
        $statement->execute($parameters);
        return $statement;
    }
} 