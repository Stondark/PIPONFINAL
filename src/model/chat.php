<?php

require_once(__DIR__ . '/../config/db.php');
class Chat
{
    public static function saveChat(string $idEmisor, string $idReceptor, string $message)
    {
        try {

            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("INSERT INTO `chat` (`id_chat`, `id_emisor`, `id_receptor`, `message`, `send_message`)
                            VALUES (UUID(), :idEmisor, :idReceptor, :message, current_timestamp())");

            $query->execute([
                "idEmisor" => $idEmisor,
                "idReceptor" => $idReceptor,
                "message" => $message
            ]);

            return $query;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public static function getChat(string $idEmisor, string $idReceptor)
    {
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $query = $db->prepare("SELECT c.message, c.send_message, u1.usuario AS emisor, u2.usuario AS receptor
                                FROM chat c
                                JOIN usuarios u1 ON c.id_emisor = u1.id 
                                JOIN usuarios u2 ON c.id_receptor = u2.id 
                                WHERE (c.id_emisor = :idEmisor AND c.id_receptor = :idReceptor)
                                OR (c.id_emisor = :idReceptor2 AND c.id_receptor = :idEmisor2) ORDER BY c.send_message");

            $query->execute([
                "idEmisor" => $idEmisor,
                "idReceptor" => $idReceptor,
                "idEmisor2" => $idEmisor,
                "idReceptor2" => $idReceptor
            ]);
            // Verificar si la actualización fue exitosa y devolver el resultado
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
