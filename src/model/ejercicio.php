<?php

require_once(__DIR__ . '/../config/db.php');
class Ejercicio{

    public static function insertExercise($cantidad, $tipo_ejercicio, $id_user){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("INSERT INTO `ejercicio_persona` (`id`, `cantidad`, `fecha`, `id_usuario`, `tipo_ejercicio`) VALUES (NULL, :cantidad, CURRENT_TIMESTAMP(), :id, :ejercicio);");
            $query->execute(["cantidad" => $cantidad,
                            "ejercicio" => $tipo_ejercicio,
                            "id" => $id_user]);
            return $query;
        } catch (PDOException $e) {
            throw $e;
        } 
    }

    public static function getTypeExercise($id){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT * FROM `tipo_ejercicio` WHERE id = :id");
            $query->execute(["id" => $id]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        } 
    }

    public static function getSumExercise($id){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT SUM(cantidad) AS total_ejercicio FROM ejercicio_persona WHERE id_usuario = :id AND DATE(`fecha`) = CURDATE();");
            $query->execute(["id" => $id]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if($result["total_ejercicio"] === null){
                $result["total_ejercicio"] = 0;
            }
            return $result;
        } catch (PDOException $e) {
            throw $e;
        } 
    }

    public static function getAllExercise($id){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT * FROM ejercicio_persona e INNER JOIN tipo_ejercicio t ON t.id = e.tipo_ejercicio WHERE id_usuario = :id AND DATE(`fecha`) = CURDATE();");
            $query->execute(["id" => $id]);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        } 
    }
    
    
}

