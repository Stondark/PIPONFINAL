<?php

require_once "../model/food.php";
require_once "../model/sueño.php";
require_once "../model/peso.php";

$foodEntity = new Food();
$sueñoEntity = new Sueño();
$pesoEntity = new Peso();


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION["user"]["id_user"])){
    echo(json_encode(["error" => "fail to get id"]));
    exit();
}
$id_user = $_SESSION["user"]["id_user"];

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["info"])) {

    $option = htmlspecialchars($_GET["info"]);

    try {
        switch ($option) {
            case 'nutrients':
                echo(json_encode($foodEntity::getTotalFood($id_user)));
                break;
            case 'sleep':
                echo(json_encode($sueñoEntity::getWeekDream($id_user)));
                break;
            case 'weight':
                echo(json_encode($pesoEntity::getAllPeso($id_user)));
                break;
            default:
                break;
        }
    } catch (\Throwable $th) {
        //throw $th;
    }


}