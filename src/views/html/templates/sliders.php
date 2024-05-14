<?php

include_once "../../controllers/predict_form.php";
include_once "../../controllers/obtain_user_info.php";
include_once "../../controllers/session.php";

$tipo = $_SESSION['user']['tipo'];

$tipo_to_images = array(
    'Insufficient_Weight' => array(
        '../assets/img/elements/Peso_Insuficiente_1.jpg',
        '../assets/img/elements/Peso_Insuficiente_2.jpg',
        '../assets/img/elements/Peso_Insuficiente_3.jpg',
    ),
    'Normal_Weight' => array(
        '../assets/img/elements/Peso_Normal_1.jpg',
        '../assets/img/elements/Peso_Normal_2.jpg',
        '../assets/img/elements/Peso_Normal_3.jpg',
    ),
    'Obesity_Type_I' => array(
        '../assets/img/elements/1.jpg',
        '../assets/img/elements/2.jpg',
        '../assets/img/elements/3.jpg',
    ),
    'Obesity_Type_II' => array(
        '../assets/img/elements/Obesidad1_Tipo_1.jpg',
        '../assets/img/elements/Obesidad1_Tipo_2.jpg',
        '../assets/img/elements/Obesidad1_Tipo_3.jpg',
    ),
    'Obesity_Type_III' => array(
        '../assets/img/elements/Obesidad2_Tipo_1.jpg',
        '../assets/img/elements/Obesidad2_Tipo_2.jpg',
        '../assets/img/elements/Obesidad2_Tipo_3.jpg',
    ),
    'Overweight_Level_I' => array(
        '../assets/img/elements/Obesidad3_Tipo_1.jpg',
        '../assets/img/elements/Obesidad3_Tipo_2.jpg',
        '../assets/img/elements/Obesidad3_Tipo_3.jpg',
    ),
    'Overweight_Level_II' => array(
        '../assets/img/elements/SobrePeso1_1.jpg',
        '../assets/img/elements/SobrePeso1_2.jpg',
        '../assets/img/elements/21.jpg',
    ),
);

// Obtener las rutas de las imágenes correspondientes al tipo actual
$images = isset($tipo_to_images[$tipo]) ? $tipo_to_images[$tipo] : array();
?>


<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php for ($i = 0; $i < 3; $i++): ?>
            <div class="carousel-item <?php echo ($i === 0) ? 'active' : ''; ?>">
                <img class="d-block w-100" src="<?php echo isset($images[$i]) ? $images[$i] : ''; ?>" alt="Slide <?php echo $i + 1; ?>" />
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
        <?php endfor; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" ariahidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>