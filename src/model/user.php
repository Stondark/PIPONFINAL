<?php

require_once(__DIR__ . '/../config/db.php');
class User
{

    public static function existUser(string $username)
    {
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

    public static function existUserMail(string $mail)
    {
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

    public static function getInfoUser(string $username)
    {
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

    public static function getUserById(string $id)
    {
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

    public static function saveUser(string $username, string $hash_password, string $email, int $type, string $id_number = null, int $profession = null)
    {
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();

            // Construir la consulta SQL base
            $sql = "INSERT INTO `usuarios` (`id`, `usuario`, `password`, `email`, `rol`";

            // Si el tipo es 1, agregar los campos adicionales a la consulta
            if ($type == 1) {
                $sql .= ", `id_number`, `id_profession`";
            }

            $sql .= ") VALUES (UUID(), :username, :password, :email, :rol";

            // Si el tipo es 1, agregar los parámetros adicionales a la consulta
            if ($type == 1) {
                $sql .= ", :id_number, :profession";
            }

            $sql .= ")";

            // Preparar y ejecutar la consulta SQL
            $query = $db->prepare($sql);
            $params = [
                "username" => $username,
                "password" => $hash_password,
                "email" => $email,
                "rol" => ($type == 1) ? 3 : 2 // Establecer rol en 3 si el tipo es 1, de lo contrario, dejarlo nulo
            ];

            // Si el tipo es 1, añadir los parámetros adicionales a la matriz de parámetros
            if ($type == 1) {
                $params['id_number'] = $id_number;
                $params['profession'] = $profession;
            }

            $query->execute($params);

            if ($query) {
                $usr = self::getInfoUser($username);
                return $usr["id"];
            }

            return false;
        } catch (PDOException $e) {
            throw $e;
        }
    }



    public static function editUser(string $id, string $newUsername, string $newEmail, string $newRol)
    {
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



    public static function deleteUser(string $id)
    {
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

    public static function comparePassword(string $password, string $hash_password)
    {
        return password_verify($password, $hash_password);
    }

    public static function getHashedPassword(string $password)
    {
        return password_hash($password, PASSWORD_DEFAULT, ["cost" => 10]); // Cost = complejidad
    }

    public static function getAllProfessional(){
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT u.id, u.usuario, u.email, c.nombre FROM usuarios u INNER JOIN profesiones c ON c.id = u.id_profession WHERE u.rol = 3");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }
        
    }
}
