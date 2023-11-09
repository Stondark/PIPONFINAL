<?php

require_once("../../model/user.php");
require_once("../../model/user_info.php");
require_once("../../model/pasos.php");
require_once("../../model/water.php");
require_once("../../model/food.php");
require_once("../../model/ejercicio.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$user = new User();
$infoPredict = new UserInfo();
$pasosEntity = new Pasos();
$waterEntity = new Water();
$foodEntity = new Food();
$ejercicioEntity = new Ejercicio();

if (!isset($_SESSION["id"])) {
    session_destroy();
    header("Location: Login.php");
    exit();
}

$id = $_SESSION["id"];

$userInfo = $infoPredict::getAllInfoById($id);
if(!$userInfo){
    session_destroy();
    header("Location: Login.php");
    exit();
}

$_SESSION["user"] = $userInfo;
if(isset($userInfo["id_user"])){
    try {
        // Obtener información de los pasos
        $infoPasos = Pasos::getTotalPasos($userInfo["id_user"]);
        $pasosRestantes = Pasos::$pasosMeta - $infoPasos["total_pasos_hoy"];
        $porcentajeRestante = ($infoPasos["total_pasos_hoy"] / Pasos::$pasosMeta) * 100;
        $infoPasos["pasos_restantes_hoy"] = $pasosRestantes;
        $infoPasos["pasos_porcentaje_hoy"] = $porcentajeRestante;
        $_SESSION["user"] = array_merge_recursive($_SESSION["user"], $infoPasos);

        // Obtenemos información de los nutrientes
        $infoFood = Food::getTotalFood($userInfo["id_user"]);
        $_SESSION["user"] = array_merge_recursive($_SESSION["user"], $infoFood);

        // Obtenemos información de los ejercicios
        // $infoEjercicio = Ejercicio::getAllExercise($userInfo["id_user"]);
        $infoEjercicio = Ejercicio::getSumExercise($userInfo["id_user"]);
        $_SESSION["user"] = array_merge_recursive($_SESSION["user"], $infoEjercicio);

        // Obtener información del agua
        $infoWater = Water::getTotalWater($userInfo["id_user"]);
        $aguaRestante = $_SESSION["user"]["agua_necesaria"] - $infoWater["total_agua_hoy"];
        $porcentajeAguaRestante = ( $infoWater["total_agua_hoy"] / $_SESSION["user"]["agua_necesaria"]) * 100;
        $infoWater["agua_restante_hoy"] = number_format($aguaRestante, 2);
        $infoWater["agua_porcentaje_hoy"] = $porcentajeAguaRestante;
        $_SESSION["user"] = array_merge_recursive($_SESSION["user"], $infoWater);
    } catch (Exception $e) {
        var_dump("Ocurrió un error en la ejecución de la aplicación", $e);
    }

}

?>