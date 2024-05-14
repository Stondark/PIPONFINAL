<?php
include_once "../../controllers/predict_form.php";
include_once "../../controllers/obtain_user_info.php";
include_once "../../controllers/session.php";

?>
<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img height="43" width="130" src="../assets/img/icons/pipon.png" alt="">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>


    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <?php if ($_SESSION["user"]["rol"] === 3) : ?>
            <li class="menu-item">
                <a href="pacientes.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                    <div data-i18n="Analytics">Pacientes</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="contacto_pacientes.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-conversation"></i>
                    <div data-i18n="Analytics">Contactar pacientes</div>
                </a>
            </li>
        <?php endif; ?>


        <?php if ($_SESSION["user"]["rol"] !== 3) : ?>
            <li class="menu-item">
                <a href="dashboard.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>
            <!-- Layouts -->
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-cookie"></i>
                    <div data-i18n="Layouts">Alimentación</div>

                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="Nutrientes.php" class="menu-link">
                            <div data-i18n="Without menu">Registrar consumo alimenticio</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="Meta_De_Agua.php" class="menu-link">
                            <div data-i18n="Without navbar">Registrar consumo agua</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-dumbbell"></i>


                    <div data-i18n="Layouts">Ejercicio</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="Horas_Entrenamiento.php" class="menu-link">
                            <div data-i18n="Without menu">Registrar horas entrenamiento</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="Meta_De_Pasos.php" class="menu-link">
                            <div data-i18n="Without navbar">Registrar pasos</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-book-heart"></i>
                    <div data-i18n="Layouts">Manual de enseñanza</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="TutorialAgua.php" class="menu-link">
                            <div data-i18n="Without menu">¿Por qué y cómo monitorear mi ingesta de agua?</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="TutorialHorasEntrenamiento.php" class="menu-link">
                            <div data-i18n="Without navbar">¿Por qué y cómo monitorear mis entrenamientos?</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="TutorialPasos.php" class="menu-link">
                            <div data-i18n="Without navbar">¿Por qué y cómo monitorear monitorear mis pasos?</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="TutorialPorcentajeGrasa.php" class="menu-link">
                            <div data-i18n="Without navbar">¿Por qué y cómo monitorear mi porcentaje de grasa?</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="TutorialPeso.php" class="menu-link">
                            <div data-i18n="Without navbar">¿Por qué y cómo monitorear mi peso corporal?</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="profesionales.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-conversation"></i>
                    <div data-i18n="Analytics">Contacta un profesional</div>
                </a>
            </li>
        <?php endif; ?>

        <?php
        if ($_SESSION["user"]["rol"] === 1) {
            echo "<li class='menu-item'>
            <a href='administracion.php' class='menu-link'>
                <i class='menu-icon tf-icons bx bx-home-circle'></i>
                <div data-i18n='Analytics'>Administración</div>
            </a>
        </li>";
        }
        ?>
    </ul>
</aside>
<!-- / Menu -->