<?php

require_once "../model/chat.php";
require_once "../model/user.php";

$chat = new Chat();


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["user"]["id_user"]) || !isset($_SESSION["id"])) {
    echo (json_encode(["error" => "fail to get id"]));
    exit();
}

$id_user = $_SESSION["user"]["id_user"] ?? $_SESSION["id"];

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["opt"]) && isset($_GET["receptor"])) {
    try {
        $currentProfessional = $_GET["receptor"];
        $professionalEntity = User::getUserById($currentProfessional);
        if (!$professionalEntity) {
            echo json_encode(["success" => false, "message" => 'No existe un usuario con el id']);
            return;
        }
        switch ($_GET["opt"]) {
            case 'view':
                echo json_encode(["success" => true, "data" => $chat::getChat($id_user, $currentProfessional)]);
                break;
            default:
                # code...
                break;
        }
    } catch (Exception $e) {
        var_dump($e);
    }

    return;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET["receptor"])) {
    try {
        $receptor = $_GET["receptor"];
        $userEntity = User::getUserById($receptor);
        if (!$userEntity) {
            echo json_encode(["success" => false, "message" => 'No existe un usuario con el id']);
            return;
        }

        if (!isset($_POST["message"]) || is_null($_POST["message"]) || empty($_POST["message"])) {
            echo json_encode(["success" => false, "message" => 'Ingrese un mensaje']);
            return;
        }

        $message = htmlspecialchars(trim($_POST["message"]));

        $chat::saveChat($id_user, $receptor, $message);
    } catch (Exception $e) {
        var_dump($e);
    }
}
