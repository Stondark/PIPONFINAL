<?php

require_once(__DIR__ . '/../config/db.php');
class User{

    public static function existUser(string $username){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT usuario FROM usuarios WHERE usuario = :usuario");
            $query->execute(["usuario" => $username]);
            return $query->rowCount() >= 1;
        } catch (PDOException $e) {
            throw $e;
        }   
    }

    public static function existUserMail(string $mail){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT email FROM usuarios WHERE email = :email");
            $query->execute(["email" => $mail]);
            return $query->rowCount() >= 1;
        } catch (PDOException $e) {
            throw $e;
        }   
    }

    public static function getInfoUser(string $username){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
            $query->execute(["usuario" => $username]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }   
    }

    public static function getUserById(string $id){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT u.id, u.email, r.type, u.usuario, u.rol FROM usuarios u LEFT JOIN rol_users r ON u.rol = r.id WHERE u.id = :id");
            $query->execute(["id" => $id]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }   
    }

    public static function saveUser(string $username, string $hash_password, string $email){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("INSERT INTO `usuarios` (`id`, `usuario`, `password`, `email`) VALUES (UUID(), :username, :password, :email)");
            $query->execute(["username" => $username,
                            "password" => $hash_password,
                            "email" => $email]);
            if($query){
                $usr = self::getInfoUser($username);
                return $usr["id"];
            }

            return false;

        } catch (PDOException $e) {
            throw $e;
        }   
    }

    public static function editUser(string $id, string $newUsername, string $newEmail, string $newRol) {
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("UPDATE `usuarios` SET `usuario` = :newUsername, `email` = :newEmail, `rol` = :newRol WHERE `id` = :id");

            $query->execute([
                "newUsername" => $newUsername,
                "newEmail" => $newEmail,
                "newRol" => $newRol,
                "id" => $id
            ]);
            // Verificar si la actualización fue exitosa y devolver el resultado
            return $query->rowCount() > 0;
        } catch (PDOException $e) {
            throw $e;
        }
    }



    public static function deleteUser(string $id){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("DELETE FROM usuarios WHERE id = :id");
            $query->execute(["id" => $id]);
            return $query;
        } catch (PDOException $e) {
            throw $e;
        }   
    }

    public static function comparePassword(string $password, string $hash_password){
        return password_verify($password, $hash_password);
    }

    public static function getHashedPassword(string $password){ 
        return password_hash($password, PASSWORD_DEFAULT, ["cost" => 10]); // Cost = complejidad 
    }


}