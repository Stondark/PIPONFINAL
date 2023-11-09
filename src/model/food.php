<?php

require_once(__DIR__ . '/../config/db.php');
class Food{

    public static function insertFood($calories, $fat, $carbohydrates, $protein, $id_user){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("INSERT INTO `comida_contador` (`id`, `calorias`, `grasa`, `carbohidratos`, `proteinas`, `fecha`,`id_usuario`) VALUES (NULL, :calorias, :grasa, :carbohidratos, :proteinas, CURRENT_TIMESTAMP(), :id_user);");
            $query->execute(["calorias" => $calories,
                            "grasa" => $fat,
                            "carbohidratos" => $carbohydrates,
                            "proteinas" => $protein,
                            "id_user" => $id_user]);
            return $query;
        } catch (PDOException $e) {
            throw $e;
        } 
    }

    public static function getTotalFood($id_user){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT COALESCE(SUM(`calorias`), 0) AS calorias, COALESCE(SUM(`grasa`), 0) AS grasa, COALESCE(SUM(`carbohidratos`), 0) AS carbohidratos, COALESCE(SUM(`proteinas`), 0) AS proteinas FROM `comida_contador` WHERE `id_usuario` = :id_user AND DATE(`fecha`) = CURDATE();");
            $query->execute(["id_user" => $id_user]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        } 
    }
    
    

}

