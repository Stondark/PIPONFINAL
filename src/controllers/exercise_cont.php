<?php

require_once "../model/user_info.php";
require_once "../model/ejercicio.php";
require_once "../model/user.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    unset($_SESSION['error']);
    $user = new User();
    $ejercicioEntity = new Ejercicio();

    if (!isset($_SESSION['username'])) {
        $_SESSION['error'] = "No se encontró información del usuario.";
        header("Location: ../views/html/login.php");
        exit();
    }

    if (!isset($_POST["horas"]) && !isset($_POST["ejercicio"])) {
        $_SESSION['error'] = "Los valores no están completos, por favor validalos.";
        header("Location: ../views/html/Horas_Entrenamiento.php");
        exit();
    }

    $exercise = $_POST['ejercicio'];
    $horas = $_POST['horas'];

    if($horas == 0 || $exercise == 0){
        $_SESSION['error'] = "El valor no puede ser '0'.";
        header("Location: ../views/html/Horas_Entrenamiento.php");
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

        if(!$ejercicioEntity::getTypeExercise($exercise)){
            $_SESSION['error'] = "No se encontró el tipo de ejercicio.";
            header("Location: ../views/html/Horas_Entrenamiento.php");
            exit();
        }


        $userId = $userInfo["id"];
        $resultQuery = $ejercicioEntity::insertExercise($horas, $exercise, $userId);

        if(!$resultQuery){
            $_SESSION['error'] = "Ocurrió un error";
            header("Location: ../views/html/Horas_Entrenamiento.php");
            exit();
        }
        header("Location: ../views/html/Horas_Entrenamiento.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['error'] = "Ocurrió un error: " . $e->getMessage();
        header("Location: ../views/html/Horas_Entrenamiento.php");
        exit();
    }
}
