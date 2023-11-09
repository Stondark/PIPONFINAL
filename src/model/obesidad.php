<?php

require_once "../config/db.php";
class Obesidad{


    public static function getIdObesity(string $tipo){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT * FROM tipos_obesidad WHERE tipo = :tipo");
            $query->execute(["tipo" => $tipo]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }   
    }


}