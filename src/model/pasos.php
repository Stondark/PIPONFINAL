<?php

require_once(__DIR__ . '/../config/db.php');
class Pasos{
    public static int $pasosMeta = 10000;

    public static function insertPasos($pasos, $id_user){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("INSERT INTO `pasos_persona` (`id`, `cantidad`, `fecha`, `id_usuario`) VALUES (NULL, :pasos, CURRENT_TIMESTAMP(), :id_user);");
            $query->execute(["pasos" => $pasos,
                            "id_user" => $id_user]);
            return $query;
        } catch (PDOException $e) {
            throw $e->getMessage();
        } 
    }

    public static function getTotalPasos($id_user){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT SUM(`cantidad`) AS total_pasos_hoy FROM `pasos_persona` WHERE `id_usuario` = :id_user AND DATE(`fecha`) = CURDATE();");
            $query->execute(["id_user" => $id_user]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e->getMessage();
        } 
    }

}

