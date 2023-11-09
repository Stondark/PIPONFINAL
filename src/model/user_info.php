<?php

require_once(__DIR__ . '/../config/db.php');
class UserInfo{

    public static function validInfoUser($id_username){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT * FROM usuarios_info WHERE id_user = :id");
            $query->execute(["id" => $id_username]);
            return $query->rowCount() >= 1;
        } catch (PDOException $e) {
            throw $e;
        }   
    }

    public static function insertInfoUser($id_username, $age, $imc, $peso, $id_obesidad, $altura, $porcentaje_grasa, $agua_necesaria,$female,$caloriesMaintenance){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("INSERT INTO `usuarios_info` (`id`, `id_user`, `edad`, `imc`, `peso`, `id_obesidad`, `altura`, `porcentaje_grasa`, `agua_necesaria`,`gender`,`calorias_necesarias`)
                                VALUES (NULL, :id, :age, :imc, :peso, :id_obesidad, :altura, :porcentaje_grasa, :agua_necesaria, :genero, :caloriasmantenimiento);");
            $query->execute(["id" => $id_username,
                            "age" => $age,
                            "imc" => $imc,
                            "peso" => $peso,
                            "id_obesidad" => $id_obesidad,
                            "altura" => $altura,
                            "porcentaje_grasa" => $porcentaje_grasa,
                            "agua_necesaria" => $agua_necesaria,
                            "genero" => $female,
                            "caloriasmantenimiento" => $caloriesMaintenance]);
            return $query;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public static function getAllInfoById(string $id){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT ui.*, u.email, u.rol, ob.tipo FROM usuarios u LEFT JOIN usuarios_info ui ON ui.id_user = u.id LEFT JOIN tipos_obesidad ob ON ui.id_obesidad = ob.id 
                                WHERE u.id = :id");
            $query->execute(["id" => $id]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }   
    }

    public static function getAllInfoUsers(){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT u.id, u.email, r.type, u.usuario FROM usuarios u LEFT JOIN rol_users r ON u.rol = r.id");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }        
    }

    public static function editPeso(string $id, string $peso) {
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("UPDATE `usuarios_info` SET `peso` = :peso WHERE `id_user` = :id_user");

            $query->execute([
                "peso" => $peso,
                "id_user" => $id
            ]);
            // Verificar si la actualización fue exitosa y devolver el resultado
            return $query->rowCount() > 0;
        } catch (PDOException $e) {
            throw $e;

        }
    }

    public static function editGrasa(string $id, string $grasa) {
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("UPDATE `usuarios_info` SET `porcentaje_grasa` = :grasa WHERE `id_user` = :id_user");

            $query->execute([
                "grasa" => $grasa,
                "id_user" => $id
            ]);
            // Verificar si la actualización fue exitosa y devolver el resultado
            return $query->rowCount() > 0;
        } catch (PDOException $e) {
            throw $e;

        }
    }

    
    public static function editImc(string $id, string $imc) {
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("UPDATE `usuarios_info` SET `imc` = :imc WHERE `id_user` = :id_user");

            $query->execute([
                "imc" => $imc,
                "id_user" => $id
            ]);
            // Verificar si la actualización fue exitosa y devolver el resultado
            return $query->rowCount() > 0;
        } catch (PDOException $e) {
            throw $e;

        }
    }


}

