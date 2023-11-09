<?php
require_once "../model/user_info.php";
require_once "../model/user.php";
$userInfo = new UserInfo();
$userEntity = new User();


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$id_user = trim($_SESSION["user"]["id_user"]);

if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET["opt"]) && !empty($_GET["id"])) {

    $option = htmlspecialchars($_GET["opt"]);
    $id = htmlspecialchars($_GET["id"]);
    
    switch ($option) {
        case 'delete':
            try {
                if($id_user === $id){
                    $_SESSION['error'] = "No puedes eliminar tu usuario.";
                    header("Location: ../views/html/administracion.php");
                    exit();
                }

                if(!$userEntity::getUserById($id)){
                    $_SESSION['error'] = "El usuario no existe";
                    header("Location: ../views/html/administracion.php");
                    exit();
                }

                if(!$userEntity::deleteUser($id)){
                    $_SESSION['error'] = "Error al eliminar al usuario";
                    header("Location: ../views/html/administracion.php");
                    exit();
                }

                header("Location: ../views/html/administracion.php");
                exit();

            } catch (\Throwable $th) {
                $_SESSION['error'] = "Ocurrió un error, inténtelo de nuevo.";
                header("Location: ../views/html/administracion.php");
                exit();
            }
            break;

        case 'edit':
            try {
                if(!$userEntity::getUserById($id)){
                    $_SESSION['error'] = "El usuario no existe";
                    header("Location: ../views/html/administracion.php");
                    exit();
                }
                header("Location: ../views/html/edit-users.php?id={$id}");
                exit();

            } catch (\Throwable $th) {
                $_SESSION['error'] = "Ocurrió un error, inténtelo de nuevo.";
                header("Location: ../views/html/administracion.php");
                exit();
            }
            break;
        default:
            # code...
            break;
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submit_edit"])) {
    $camposRequeridos = ["id", "usuario", "email", "role"];

    foreach ($camposRequeridos as $campo) {
        if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
            $_SESSION['error'] = "Hace falta algún valor, llénelos";
            header("Location: ../views/html/administracion.php");
            exit();
        }
    }

    $id = $_POST["id"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $role = $_POST["role"];

    if(!$userEntity::getUserById($id)){
        $_SESSION['error'] = "El usuario no existe";
        header("Location: ../views/html/administracion.php");
        exit();
    }

    if(!$userEntity::editUser($id, $usuario, $email, $role)){
        $_SESSION['error'] = "Error al editar al usuario";
        header("Location: ../views/html/administracion.php");
        exit();
    }

    header("Location: ../views/html/administracion.php");
    exit();

}


