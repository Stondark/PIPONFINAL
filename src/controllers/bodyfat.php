<?php

require_once "../model/user_info.php";
require_once "../model/user.php";

function calcularPorcentajeGrasaHombres($circunferenciaCintura, $circunferenciaCuello, $estatura) {
    $porcentajeGrasa = 86.010 * log10($circunferenciaCintura - $circunferenciaCuello) - 70.041 * log10($estatura) + 36.76;
    return $porcentajeGrasa;
}


function calcularPorcentajeGrasaMujeres($circunferenciaCintura, $circunferenciaCadera, $circunferenciaCuello, $estatura) {
    $porcentajeGrasa = 495 / (1.29579 - 0.35004 * log10($circunferenciaCintura + $circunferenciaCadera - $circunferenciaCuello) + 0.22100 * log10($estatura)) - 450;
    $porcentajeGrasa = $porcentajeGrasa * -1;
    return $porcentajeGrasa;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    unset($_SESSION['error']);
    $user = new User();
    $userInfoEntity = new UserInfo();

    if (!isset($_SESSION['username']) || !isset($_SESSION['user']['gender']) || !isset($_SESSION['user']['altura']) ) {
        $_SESSION['error'] = "No se encontró información del usuario.";
        header("Location: ../views/html/login.php");
        exit();
    }

    if (!isset($_POST["cintura"]) || !isset($_POST["cuello"])) {
        $_SESSION['error'] = "Los valores no están completos, por favor validalos.";
        header("Location: ../views/html/Calculo_grasa_corporal.php");
        exit();
    }


    $cintura = $_POST['cintura'];
    $cuello = $_POST['cuello'];
    $genero = $_SESSION['user']['gender'];
    $altura = $_SESSION['user']['altura'] * 100;
    $grasaTotal = 0;
    if(isset($_POST["cadera"]) && $genero == "1"){
        $cadera = $_POST["cadera"];
        $grasaTotal = calcularPorcentajeGrasaMujeres($cintura, $cadera, $cuello, $altura);
    } else {
        $grasaTotal = calcularPorcentajeGrasaHombres($cintura, $cuello, $altura);
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


        $resultQuery = $userInfoEntity::editGrasa($userId, $grasaTotal);
        if(!$resultQuery){
            $_SESSION['error'] = "Ocurrió un error";
            header("Location: ../views/html/Calculo_grasa_corporal.php");
            exit();
        }


        header("Location: ../views/html/Calculo_grasa_corporal.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['error'] = "Ocurrió un error: " . $e->getMessage();
        header("Location: ../views/html/Calculo_grasa_corporal.php");
        exit();
    }
}
