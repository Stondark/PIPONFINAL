<?php

require_once "../model/user_info.php";
require_once "../model/food.php";
require_once "../model/user.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    unset($_SESSION['error']);
    $user = new User();
    $foodEntity = new Food();

    if (!isset($_SESSION['username'])) {
        $_SESSION['error'] = "No se encontró información del usuario.";
        header("Location: ../views/html/login.php");
        exit();
    }

    if (!isset($_POST["calories"]) || !isset($_POST["total_fat"]) || !isset($_POST["carbohydrate"]) || !isset($_POST["protein"])) {
        $_SESSION['error'] = "Los valores no están completos, por favor validalos.";
        header("Location: ../views/html/Nutrientes.php");
        exit();
    }

    $calories = $_POST['calories'];
    $fat = $_POST['total_fat'];
    $carbohydrate = $_POST['carbohydrate'];
    $protein = $_POST['protein'];

    try {
        $username = $_SESSION['username'];
        $userInfo = $user::getInfoUser($username);
        if(!$userInfo){
            $_SESSION['error'] = "No se encontró información del usuario.";
            header("Location: ../views/html/login.php");
            exit();
        }
        $userId = $userInfo["id"];
        $resultQuery = $foodEntity::insertFood($calories, $fat, $carbohydrate, $protein, $userId);
        if(!$resultQuery){
            $_SESSION['error'] = "Ocurrió un error";
            header("Location: ../views/html/Nutrientes.php");
            exit();
        }


        header("Location: ../views/html/Nutrientes.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['error'] = "Ocurrió un error: " . $e->getMessage();
        header("Location: ../views/html/Nutrientes.php");
        exit();
    }
}
