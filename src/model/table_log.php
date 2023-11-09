<?php

require_once(__DIR__ . '/../config/db.php');
class Table
{

    public static function getLogTable($id_user)
    {
        try {
            $dbObj = new Database();
            $db = $dbObj->connect();
            $totalResult = [];
            // Tables to get query
            $tablesQuery = [["table" => "agua_persona", "fields" => "cantidad" , "type" => "Agua"], 
                            ["table" => "comida_contador", "fields" => "calorias", "type" => "Comida"], 
                            ["table" => "ejercicio_persona", "fields" => "cantidad", "type" => "Ejercicio"],
                            ["table" => "pasos_persona", "fields" => "cantidad", "type" => "Pasos"],
                            ["table" => "suenio_persona", "fields" => "cantidad", "type" => "Sueño"],
                            ["table" => "log_peso_user", "fields" => "cantidad", "type" => "Peso"]];
            foreach ($tablesQuery as $key => $value) {
                $auxArr = [];
                $query = $db->prepare("SELECT {$value['fields']}, fecha FROM {$value['table']} WHERE id_usuario = :id_user ORDER BY fecha DESC LIMIT 6");
                $query->execute(["id_user" => $id_user]);
                $auxArr["type"] = $value["type"];
                $auxArr["result"] = $query->fetchAll(PDO::FETCH_ASSOC);
                $totalResult[] = $auxArr;
            }
            $last6Records = [];

            foreach ($totalResult as $record) {
                $type = $record["type"];
                $result = $record["result"];
                
                foreach ($result as $entry) {
                    $last6Records[] = [
                        "type" => $type,
                        "fecha" => $entry["fecha"],
                        "cantidad" => isset($entry["cantidad"]) ? $entry["cantidad"] : $entry["calorias"]
                    ];
                }
            }
            
            usort($last6Records, function($a, $b) {
                return strtotime($b['fecha']) - strtotime($a['fecha']);
            });
            
            // Tomar solo los primeros 6 registros
            return array_slice($last6Records, 0, 6);
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
