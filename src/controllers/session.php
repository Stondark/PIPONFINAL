<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if(!isset($_SESSION["logged"]) || $_SESSION["logged"] === false || !isset($_SESSION["username"])){
    session_destroy();
    header("Location: Login.php");
    exit();
}

$protectedUrls = ["administracion.php", "edit-users.php"];

$route = basename($_SERVER['PHP_SELF']);
if($_SESSION["user"]["rol"] !== 1 && in_array($route, $protectedUrls)){ 
    header("Location: dashboard.php");
    exit();
}


