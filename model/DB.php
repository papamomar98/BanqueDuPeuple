<?php

class DB
{
    protected $db;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $mysqluser = 'root';
        $mysqlpassword = '';
        $dsn = 'mysql:host=localhost;dbname=banquedusenegal';
        try {
            $this->db = new PDO($dsn, $mysqluser, $mysqlpassword);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
}


?>