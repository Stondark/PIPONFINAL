<?php

require_once("../../model/user.php");
require_once("../../model/user_info.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$user = new User();
$infoPredict = new UserInfo();

if (!isset($_SESSION["username"]) || !isset($_SESSION["id"])) {
    session_destroy();
    header("Location: Login.php");
    exit();
}

$id = $_SESSION["id"];

$userInfo = $user::getUserById($id);
if(!$userInfo){
    session_destroy();
    header("Location: Login.php");
    exit();
}
if(!$infoPredict::validInfoUser($userInfo["id"])){
    header("Location: Encuesta.php");
    exit();
}

?>