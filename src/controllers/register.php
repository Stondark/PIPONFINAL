<?php

require_once "../model/user.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    unset($_SESSION['error']);
    $user = new User();

    if (isset($_GET["opt"])) {

        $option = $_GET["opt"];
        if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['email'])) {
            $_SESSION['error'] = "Alguno de los campos está vacío, por favor llénalos.";
            header("Location: ../views/html/login.php");
            exit();
        }

        $username = $_POST['username'];
        $password = $_POST['password'];
        $mail = $_POST['email'];
        try {
            if ($user::existUser($username)) {
                $_SESSION['error'] = "El usuario con este nickname ya existe.";
                header("Location: ../views/html/Registro.php");
                exit();
            }

            if ($user::existUserMail($mail)) {
                $_SESSION['error'] = "El correo ingresado ya existe.";
                header("Location: ../views/html/Registro.php");
                exit();
            }

            if ($option === "register") {

                $hash_password = $user::getHashedPassword($password);

                $resultRegister = $user::saveUser($username, $hash_password, $mail);
                if (!$resultRegister) {
                    $_SESSION['error'] = "Hubo un error en la inserción.";
                    header("Location: ../views/html/Registro.php");
                    exit();
                }
                
                $_SESSION["username"] = $username;
                $_SESSION["id"] = $resultRegister;
                $_SESSION["logged"] = true;
                header("Location: ../views/html/Encuesta.php");
                exit();
            } 
        } catch (Exception $e) {
            $_SESSION['error'] = "Ocurrió un error: " . $e->getMessage();
            exit();
        }
    }
}
