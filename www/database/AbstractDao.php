<?php


abstract class AbstractDao
{
    private $host = "mysql:3306";
    private $db_name = "docker";
    private $username = "docker";
    private $password = "docker";
    public $conn;

    // get the Database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name. ";charset=UTF8", $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        //echo "Connected successfully";
        return $this->conn;
    }
}