<?php

require_once "../model/user_info.php";
require_once "../model/pasos.php";
require_once "../model/user.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    unset($_SESSION['error']);
    $user = new User();
    $pasosEntity = new Pasos();

    if (!isset($_SESSION['username'])) {
        $_SESSION['error'] = "No se encontró información del usuario.";
        header("Location: ../views/html/login.php");
        exit();
    }

    if (!isset($_POST["pasos"])) {
        $_SESSION['error'] = "Los valores no están completos, por favor validalos.";
        header("Location: ../views/html/Meta_De_Pasos.php");
        exit();
    }

    $pasos = $_POST['pasos'];

    try {
        $username = $_SESSION['username'];
        $userInfo = $user::getInfoUser($username);
        if(!$userInfo){
            $_SESSION['error'] = "No se encontró información del usuario.";
            header("Location: ../views/html/login.php");
            exit();
        }
        $userId = $userInfo["id"];
        $resultQuery = $pasosEntity::insertPasos($pasos, $userId);
        if(!$resultQuery){
            $_SESSION['error'] = "Ocurrió un error";
            header("Location: ../views/html/Meta_De_Pasos.php.php");
            exit();
        }

        header("Location: ../views/html/Meta_De_Pasos.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['error'] = "Ocurrió un error: " . $e->getMessage();
        header("Location: ../views/html/Meta_De_Pasos.php");
        exit();
    }
}
