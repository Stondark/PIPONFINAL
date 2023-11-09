<?php

require_once "../model/user_info.php";
require_once "../model/water.php";
require_once "../model/user.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    unset($_SESSION['error']);
    $user = new User();
    $waterEntity = new water();

    if (!isset($_SESSION['username'])) {
        $_SESSION['error'] = "No se encontró información del usuario.";
        header("Location: ../views/html/login.php");
        exit();
    }

    if (!isset($_POST["waterLt"])) {
        $_SESSION['error'] = "Los valores no están completos, por favor validalos.";
        header("Location: ../views/html/Meta_De_Agua.php");
        exit();
    }

    $water = $_POST['waterLt'];

    try {
        $username = $_SESSION['username'];
        $userInfo = $user::getInfoUser($username);
        if(!$userInfo){
            $_SESSION['error'] = "No se encontró información del usuario.";
            header("Location: ../views/html/login.php");
            exit();
        }
        $userId = $userInfo["id"];
        $water = str_replace(",", ".", $water,);
        $resultQuery = $waterEntity::insertWater($water, $userId);
        if(!$resultQuery){
            $_SESSION['error'] = "Ocurrió un error";
            header("Location: ../views/html/Meta_De_Agua.php");
            exit();
        }


        header("Location: ../views/html/Meta_De_Agua.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['error'] = "Ocurrió un error: " . $e->getMessage();
        header("Location: ../views/html/Meta_De_Agua.php");
        exit();
    }
}
