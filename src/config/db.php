<?php

class Database{

    private string $host;
    private string $db;
    private string $user;
    private string $password;
    private string $charset;

    public function __construct(){
        $this->host = "localhost";
        $this->db = "pipon";
        $this->user = "root";
        $this->password = "";
        $this->charset = "utf8mb4";
    }

    public function connect():PDO{
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => FALSE
            ];
            
            $pdo = new PDO(
                    $connection,
                    $this->user,
                    $this->password,
                    $options
                    );
            
            return $pdo;

        } catch (Exception $e){
            throw $e;
        }
    }


}