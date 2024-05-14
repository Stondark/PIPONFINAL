<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION["logged"]) || $_SESSION["logged"] === false || !isset($_SESSION["username"])) {
    session_destroy();
    header("Location: Login.php");
    exit();
}

$currentRol = $_SESSION["user"]["rol"];
$protectedUrls = ["administracion.php", "edit-users.php"];
$professionaUrls = ["pacientes.php"];
$notProfessionalsUrl = ["Nutrientes.php", "Meta_De_Agua.php", "Horas_Entrenamiento.php", "Meta_De_Pasos.php", "dashboard.php"];

$route = basename($_SERVER['PHP_SELF']);
if ($currentRol !== 1 && in_array($route, $protectedUrls)) {
    header("Location: dashboard.php");
    exit();
}

if ($currentRol !== 3 && in_array($route, $professionaUrls)) {
    header("Location: dashboard.php");
    exit();
}

if ($currentRol === 3 && in_array($route, $notProfessionalsUrl)) {
    header("Location: pacientes.php");
    exit();
}
