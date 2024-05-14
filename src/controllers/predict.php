<?php

require_once "../model/user_info.php";
require_once "../model/user.php";
require_once "../model/obesidad.php";
require_once "../model/peso.php";

function getImc($height, $weight)
{
    $height = floatval(str_replace(",", ".", $height));
    $imc = floatval($weight) / ($height * $height);
    // Redondea el resultado a dos decimales
    $imc = round($imc, 2);
    return $imc;
}

function necessarywater($weight)
{
    $water = floatval($weight) * 35;
    $water = round($water, 2) / 1000;
    return $water;
}
function calcularCaloriasMantenimiento($weight, $height, $age, $female)
{
    $weightcm = floatval($weight);
    $heightcm = floatval($height);
    $agecm = intval($age);
    $femalecm = intval($female);

    if ($femalecm == 1) {
        $caloriesMaintenance = 655 + (9.6 * $weightcm) + (1.8 * $heightcm * 100) - (4.7 * $agecm);
    } else {
        $caloriesMaintenance = 66 + (13.7 * $weightcm) + (5 * $heightcm * 100) - (6.8 * $agecm);
    }
    return $caloriesMaintenance;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    unset($_SESSION['error']);
    $user = new User();
    $infoPredict = new UserInfo();
    $obesity = new Obesidad();
    $pesoEntity = new Peso();
    $json = json_encode($_POST);

    if (!isset($_SESSION['username'])) {
        $_SESSION['error'] = "No se encontró información del usuario.";
        header("Location: ../views/html/login.php");
        exit();
    }

    if (!isset($_POST["Age"]) || !isset($_POST["Height"]) || !isset($_POST["Weight"]) || !isset($_POST["predictionResult"])) {
        $_SESSION['error'] = "Los valores no están completos, por favor validalos.";
        header("Location: ../views/html/login.php");
        exit();
    }

    $username = $_SESSION['username'];
    $age = $_POST["Age"];
    $height = str_replace(",", ".", $_POST["Height"]);
    $weight = $_POST["Weight"];
    if (strlen($height) != 3 && !(strpos($height, ".") || strpos($height, ","))) {
        $_SESSION['error'] = "Tu altura debe coincidir a 0.00";
        header("Location: ../views/html/Encuesta.php");
        exit();
    } elseif (substr($height, 1, 1) !== ".") {
        $firtsNum = substr($height, 0, 1);
        $nemNumber = substr($height, 1);
        $height = $firtsNum . "." . $nemNumber;
    }

    // $predict = $_POST["predictionResult"] ?? 1;
    $predict = 'Normal_Weight';
    $imc = getImc($height, $weight);
    $water = necessarywater($weight);
    $female = $_POST["female"];
    $caloriesMaintenance = calcularCaloriasMantenimiento($weight, $height, $age, $female);
    try {
        $userInfo = $user::getInfoUser($username);
        if (!$userInfo) {
            $_SESSION['error'] = "No se encontró información del usuario.";
            header("Location: ../views/html/login.php");
            exit();
        }

        $userId = $userInfo["id"];
        $idPredict = $obesity::getIdObesity($predict);
        if (!$idPredict) {
            $_SESSION['error'] = "Ocurrió un error intentando obtener tu predicción.";
            header("Location: ../views/html/Encuesta.php");
            exit();
        }
        $idPredict = $idPredict["id"];
        $resultQuery = $infoPredict::insertInfoUser($userId, $age, $imc, $weight, $idPredict, $height, "", $water, $female, $caloriesMaintenance, $json);
        if (!$resultQuery) {
            $_SESSION['error'] = "Ocurrió un error";
            header("Location: ../views/html/Encuesta.php");
            exit();
        }

        if (!$pesoEntity::insertPeso($weight, $userId)) {
            $_SESSION['error'] = "Ocurrió un error";
            header("Location: ../views/html/Encuesta.php");
            exit();
        }

        header("Location: ../views/html/CategoriaPesoIntroduccion.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['error'] = "Ocurrió un error: " . $e->getMessage();
        header("Location: ../views/html/Encuesta.php");
        exit();
    }
}
