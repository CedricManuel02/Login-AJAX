<?php

class DatabaseConnection
{
    private $connection;
    private $host;
    private $username;
    private $password;
    private $database;

    public function __construct($host, $username, $password, $database)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->connect();
    }

    public function connect(){
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if(!$this->connection) {
            throw new Exception("Could not connect to database" . mysqli_connect_error());
        }
    }
    public function getConnection(){
        return $this->connection;
    }

}
