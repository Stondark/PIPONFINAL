<?php

require_once(__DIR__ . '/../config/db.php');
class Peso{

    public static function insertPeso($cantidad, $id_user){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("INSERT INTO `log_peso_user` (`id`, `cantidad`, `fecha`, `id_usuario`) VALUES (NULL, :cantidad, CURRENT_TIMESTAMP(), :id_user);");
            $query->execute(["cantidad" => $cantidad,
                            "id_user" => $id_user]);
            return $query;
        } catch (PDOException $e) {
            throw $e;
        } 
    }

    public static function getAllPeso($id_user){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT cantidad, fecha FROM `log_peso_user` WHERE `id_usuario` = :id_user ORDER BY fecha ASC");
            $query->execute(["id_user" => $id_user]);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        } 
    }


    

}

