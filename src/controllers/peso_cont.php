<?php

require_once "../model/user.php";
require_once "../model/peso.php";
require_once "../model/user_info.php";

function getImc($height, $weight){
    $height = str_replace(',', '.', $height);
    $height = floatval($height);
    $imc = floatval($weight) / ($height * $height);
    $imc = round($imc, 2);
    return $imc;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    unset($_SESSION['error']);
    $user = new User();
    $pesoEntity = new Peso();
    $userInfoEntity = new UserInfo();

    if (!isset($_SESSION['username']) || !isset($_SESSION['user']['altura'])) {
        $_SESSION['error'] = "No se encontró información del usuario.";
        header("Location: ../views/html/login.php");
        exit();
    }

    if (!isset($_POST["peso"])) {
        $_SESSION['error'] = "Los valores no están completos, por favor validalos.";
        header("Location: ../views/html/dashboard.php");
        exit();
    }

    $peso = $_POST['peso'];

    if($peso <= 0){
        $_SESSION['error'] = "Ingresa un valor válido.";
        header("Location: ../views/html/dashboard.php");
        exit();
    }

    try {
        $username = $_SESSION['username'];
        $userInfo = $user::getInfoUser($username);
        $altura = $_SESSION['user']['altura'];
        $imc = getImc($altura, $peso);
        if(!$userInfo){
            $_SESSION['error'] = "No se encontró información del usuario.";
            header("Location: ../views/html/login.php");
            exit();
        }
        $userId = $userInfo["id"];


        if(!$userInfoEntity::editPeso($userId, $peso)){
            $_SESSION['error'] = "Ocurrió un error actualizando tu peso";
            header("Location: ../views/html/dashboard.php");
            exit();
        }

        
        if(!$userInfoEntity::editImc($userId, $imc)){
            $_SESSION['error'] = "Ocurrió un error actualizando tu IMC";
            header("Location: ../views/html/dashboard.php");
            exit();
        }

        $resultQuery = $pesoEntity::insertPeso($peso, $userId);
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
