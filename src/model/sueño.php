<?php

require_once(__DIR__ . '/../config/db.php');
class Sueño{

    public static function insertSueño($cantidad, $id_user){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("INSERT INTO `suenio_persona` (`id`, `cantidad`, `fecha`, `id_usuario`) VALUES (NULL, :cantidad, CURRENT_TIMESTAMP(), :id_user);");
            $query->execute(["cantidad" => $cantidad,
                            "id_user" => $id_user]);
            return $query;
        } catch (PDOException $e) {
            throw $e;
        } 
    }

    public static function validSueño($id_user){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT cantidad FROM suenio_persona WHERE id_usuario = :id_user");
            $query->execute(["id_user" => $id_user]);
            return $query->rowCount() >= 1;
        } catch (PDOException $e) {
            throw $e;
        } 
    }

    public static function getWeekDream($id_user){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT cantidad FROM suenio_persona WHERE `fecha` >= DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY) AND `fecha` < DATE_ADD(
                    DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY), INTERVAL 1 WEEK) AND `id_usuario` = :id_user;");
            $query->execute(["id_user" => $id_user]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            throw $e;
        } 
    }



    // public static function getTotalFood($id_user){
    //     try {
    //         $dbObj = new Database();
    //         $db = $dbObj->connect();
    //         $query = $db->prepare("SELECT COALESCE(SUM(`calorias`), 0) AS calorias, COALESCE(SUM(`grasa`), 0) AS grasa, COALESCE(SUM(`carbohidratos`), 0) AS carbohidratos, COALESCE(SUM(`proteinas`), 0) AS proteinas FROM `comida_contador` WHERE `id_usuario` = :id_user AND DATE(`fecha`) = CURDATE();");
    //         $query->execute(["id_user" => $id_user]);
    //         return $query->fetch(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         throw $e;
    //     } 
    // }
    
    

}

