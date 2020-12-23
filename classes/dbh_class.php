<?php

class Dbh
{
    private $host = 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $dbname = 'websitedb';


    protected function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // $pdo = new PDO($dsn, $this->user,$this->pwd);
        try {
            $pdo = new PDO($dsn, $this->user,$this->pwd);
       } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
       }
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
