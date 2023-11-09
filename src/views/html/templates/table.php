<?php
include_once "../../model/table_log.php";

if (!isset($_SESSION["id"])) {
    session_destroy();
    header("Location: Login.php");
    exit();
}

$id = $_SESSION["id"];

$tableData = Table::getLogTable($id);
$idIconsType = [
    "Agua" => ["icon" => "menu-icon tf-icons bx bx-water", "prefix" => "Litros"],
    "Comida" => ["icon" => "menu-icon tf-icons bx bxs-cookie", "prefix" => "Calorías"],
    "Ejercicio" => ["icon" => "menu-icon tf-icons bx bx-dumbbell", "prefix" => "Horas"],
    "Pasos" => ["icon" => "menu-icon tf-icons bx bx-run", "prefix" => "Pasos"],
    "Sueño" => ["icon" => "menu-icon tf-icons bx bx-bed", "prefix" => "Horas"],
    "Peso" => ["icon" => "menu-icon tf-icons bx bx-body", "prefix" => "Kilos"],
];


?>

<div class="card-body">
    <ul class="p-0 m-0">
        <?php foreach ($tableData as $key => $value) : ?>
            <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                    <i class="<?php echo ($idIconsType[$value["type"]]["icon"])?>"></i>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                        <h6 class="mb-0"><?php echo ($value["type"]) ?></h6>
                    </div>
                    <div class="user-progress d-flex align-items-center gap-1">
                        <span class="badge bg-primary rounded-pill">+<?php echo ($value["cantidad"]) . " " . $idIconsType[$value["type"]]["prefix"]?></span>
                    </div>
                </div>
            </li>
        <?php endforeach ?>

    </ul>
</div>