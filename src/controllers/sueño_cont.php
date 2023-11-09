<?php

require_once "../model/user_info.php";
require_once "../model/sueño.php";
require_once "../model/user.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    unset($_SESSION['error']);
    $user = new User();
    $sueñoEntity = new Sueño();

    if (!isset($_SESSION['username'])) {
        $_SESSION['error'] = "No se encontró información del usuario.";
        header("Location: ../views/html/login.php");
        exit();
    }

    if (!isset($_POST["sueño"])) {
        $_SESSION['error'] = "Los valores no están completos, por favor validalos.";
        header("Location: ../views/html/dashboard.php");
        exit();
    }

    $sueño = $_POST['sueño'];

    if($sueño <= 0){
        $_SESSION['error'] = "Ingresa un valor válido.";
        header("Location: ../views/html/dashboard.php");
        exit();
    }

    try {
        $username = $_SESSION['username'];
        $userInfo = $user::getInfoUser($username);
        if(!$userInfo){
            $_SESSION['error'] = "No se encontró información del usuario.";
            header("Location: ../views/html/login.php");
            exit();
        }
        $userId = $userInfo["id"];

        // // if($sueñoEntity::validSueño($userId)){
        // //     $_SESSION['error'] = "Ya ingresaste tus horas de sueño hoy.";
        // //     header("Location: ../views/html/dashboard.php");
        // //     exit();
        // // }

        $resultQuery = $sueñoEntity::insertSueño($sueño, $userId);
        if(!$resultQuery){
            $_SESSION['error'] = "Ocurrió un error";
            header("Location: ../views/html/dashboard.php.php");
            exit();
        }


        header("Location: ../views/html/dashboard.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['error'] = "Ocurrió un error: " . $e->getMessage();
        header("Location: ../views/html/dashboard.php");
        exit();
    }
}
