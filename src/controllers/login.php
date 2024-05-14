<?php

require_once "../model/user.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    unset($_SESSION['error']);
    $user = new User();
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        $_SESSION['error'] = "Alguno de los campos está vacío, por favor llénalos.";
        header("Location: ../views/html/Login.php");
        exit();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        if (!$user::existUser($username)) {
            $_SESSION['error'] = "El usuario no existe, verifique lo datos.";
            header("Location: ../views/html/Login.php");
            exit();
        }

        $userInfo = $user::getInfoUser($username);

        if (!$user::comparePassword($password, $userInfo['password'])) {
            $_SESSION['error'] = "La contraseña es incorrecta";
            header("Location: ../views/html/Login.php");
            exit();
        }
        $_SESSION["username"] = $username;
        $_SESSION["id"] = $userInfo["id"];
        $_SESSION["logged"] = true;

        if($userInfo["rol"] === 3){
            header("Location: ../views/html/pacientes.php");
            exit();
        }

        header("Location: ../views/html/dashboard.php");
        exit();
    } catch (Exception $e) {
        print_r($e);
    }
}
