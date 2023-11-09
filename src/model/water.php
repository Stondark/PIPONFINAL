<?php

require_once(__DIR__ . '/../config/db.php');
class Water{

    public static function insertWater($water, $id_user){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("INSERT INTO `agua_persona` (`id`, `cantidad`, `fecha`, `id_usuario`) VALUES (NULL, :water, CURRENT_TIMESTAMP(), :id_user);");
            $query->execute(["water" => $water,
                            "id_user" => $id_user]);
            return $query;
        } catch (PDOException $e) {
            throw $e;
        } 
    }

    public static function getTotalWater($id_user){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT SUM(`cantidad`) AS total_agua_hoy FROM `agua_persona` WHERE `id_usuario` = :id_user AND DATE(`fecha`) = CURDATE();");
            $query->execute(["id_user" => $id_user]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        } 
    }

}

