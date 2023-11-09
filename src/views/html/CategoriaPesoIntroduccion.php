<?php

include_once "../../controllers/obtain_user_info.php";
include_once "../../controllers/session.php";
include_once "../../controllers/predict_form.php";
$tipo = $_SESSION['user']['tipo'];

?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Capacitación Pasos Diarios</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>
 
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php include_once "./templates/aside.php"; ?>
        <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php include_once "./templates/navbar.php"; ?>
          <!-- / Navbar -->
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex align-items-end row">
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <h1 class="card-title">Introducción a mi categoría de peso</h1>
                        <hr class="m-3" />
                        <?php
                        switch ($tipo) {
                            case 'Insufficient_Weight':
                                echo '<p class="mb-1" style="font-size: 18px">Según la encuesta realizada, tu categoría de peso está dentro de: Peso Insuficiente.</p>';
                                echo '<p class="mb-1" style="font-size: 18px">Se refiere a un estado en el que una persona tiene un índice de masa corporal (IMC) significativamente por debajo del rango considerado saludable. Esto puede ser resultado de varios factores, como una dieta deficiente o condiciones médicas subyacentes.</p>';
                                break;
                            case 'Normal_Weight':
                                echo '<p class="mb-1" style="font-size: 18px">Según la encuesta realizada, tu categoría de peso está dentro de: Peso normal</p>';
                                echo '<p class="mb-1" style="font-size: 18px">se considera la gama de peso saludable para la mayoría de las personas. Tener un peso normal implica que tu IMC está dentro de los límites recomendados para tu altura y edad.</p>';
                                break;
                            case 'Obesity_Type_I':
                                echo '<p class="mb-1" style="font-size: 18px">Según la encuesta realizada, tu categoría de peso está dentro de: Obesidad Tipo 1</p>';
                                echo '<p class="mb-1" style="font-size: 18px">se refiere a la obesidad en su etapa inicial. En esta etapa, una persona tiene un IMC elevado pero no necesariamente en niveles extremos. La obesidad puede ser causada por factores genéticos, dietéticos y de estilo de vida.</p>';
                                break;
                            case 'Obesity_Type_II':
                                  echo '<p class="mb-1" style="font-size: 18px">Según la encuesta realizada, tu categoría de peso está dentro de: Obesidad Tipo 2</p>';
                                  echo '<p class="mb-1" style="font-size: 18px">representa un grado más avanzado de obesidad. En esta etapa, una persona tiene un IMC significativamente elevado, lo que aumenta sustancialmente los riesgos para la salud.</p>';
                                  break;
                            case 'Obesity_Type_III':
                                    echo '<p class="mb-1" style="font-size: 18px">Según la encuesta realizada, tu categoría de peso está dentro de: Obesidad Tipo 3</p>';
                                    echo '<p class="mb-1" style="font-size: 18px">también conocida como obesidad mórbida, es la forma más grave de obesidad. En esta etapa, el IMC es extremadamente alto y conlleva un riesgo significativo para la salud.</p>';
                                    break;
                            case 'Overweight_Level_I':
                                      echo '<p class="mb-1" style="font-size: 18px">Según la encuesta realizada, tu categoría de peso está dentro de: Sobre peso nivel 1</p>';
                                      echo '<p class="mb-1" style="font-size: 18px">se refiere a un exceso de peso que está por debajo de la obesidad. Las personas con este nivel de sobrepeso tienen un IMC ligeramente superior al rango saludable.</p>';
                                      break;
                            case 'Overweight_Level_II':
                              echo '<p class="mb-1" style="font-size: 18px">Según la encuesta realizada, tu categoría de peso está dentro de: Sobre peso nivel 2</p>';
                              echo '<p class="mb-1" style="font-size: 18px"> indica un sobrepeso más pronunciado que el nivel I. En esta etapa, el IMC se encuentra en un rango superior al saludable, lo que conlleva un mayor riesgo para la salud.';
                              break;
                        }
                        ?>
                    </div>
                </div>
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <?php
                        switch ($tipo) {
                            case 'Insufficient_Weight':
                                echo '<p class="mb-1" style="font-size: 18px">Tener un peso insuficiente puede llevar a una serie de problemas de salud, como debilidad, fatiga constante, fragilidad ósea, y un sistema inmunológico debilitado. También se pueden experimentar trastornos alimentarios, como la anorexia, que requieren tratamiento médico y psicológico.</p>';
                                break;
                                case 'Normal_Weight':
                                  echo '<p class="mb-1" style="font-size: 18px">Aunque el riesgo de problemas de salud es menor en esta categoría, es importante mantener hábitos de vida saludables. No obstante, las personas con un peso normal aún pueden enfrentar riesgos si no se cuidan adecuadamente, como enfermedades cardiovasculares, diabetes tipo 2 y otros problemas de salud relacionados con la dieta y la falta de ejercicio.</p>';
                                  break;
                              case 'Obesity_Type_I':
                                  echo '<p class="mb-1" style="font-size: 18px">Los riesgos asociados con la obesidad tipo I incluyen un mayor riesgo de enfermedades cardíacas, diabetes tipo 2, hipertensión, apnea del sueño y problemas articulares. Además, puede afectar negativamente la calidad de vida y la salud mental.</p>';
                                  break;
                              case 'Obesity_Type_II':
                                    echo '<p class="mb-1" style="font-size: 18px"> Los riesgos de la obesidad tipo II son más pronunciados e incluyen un mayor riesgo de enfermedades cardiovasculares, diabetes grave, hipertensión, apnea del sueño, enfermedades hepáticas y problemas psicológicos, como la depresión.</p>';
                                    break;
                              case 'Obesity_Type_III':
                                      echo '<p class="mb-1" style="font-size: 18px">La obesidad tipo III aumenta drásticamente el riesgo de enfermedades mortales, como enfermedades cardiovasculares, diabetes severa, problemas respiratorios graves y una reducción significativa de la calidad de vida. Además, las complicaciones médicas son más comunes y graves.</p>';
                                      break;
                              case 'Overweight_Level_I':
                                        echo '<p class="mb-1" style="font-size: 18px"> Aunque el sobrepeso de nivel I no conlleva los mismos riesgos que la obesidad, aún puede aumentar el riesgo de problemas de salud como enfermedades cardíacas, diabetes y ciertos tipos de cáncer.</p>';
                                        break;
                              case 'Overweight_Level_II':
                                echo '<p class="mb-1" style="font-size: 18px">El sobrepeso de nivel II aumenta significativamente el riesgo de enfermedades cardíacas, diabetes tipo 2, hipertensión y otros problemas de salud. También puede afectar la movilidad y la calidad de vida.</p>';
                                break;
                        }
                        ?>
                    </div>
                </div>
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <?php
                        switch ($tipo) {
                            case 'Insufficient_Weight':
                                echo '<p class="mb-1" style="font-size: 18px"> Para abordar este problema, es crucial buscar orientación médica. Un profesional de la salud puede diseñar un plan nutricional adecuado y proporcionar apoyo psicológico si es necesario. Recuperar un peso saludable es esencial para prevenir complicaciones a largo plazo.</p>';
                                break;
                                case 'Normal_Weight':
                                  echo '<p class="mb-1" style="font-size: 18px">Mantener un estilo de vida activo y una alimentación equilibrada es esencial para mantener un peso normal. Esto incluye ejercicio regular y una dieta rica en frutas, verduras y proteínas magras. Realizar chequeos médicos periódicos también es importante para prevenir posibles problemas de salud.</p>';
                                  break;
                              case 'Obesity_Type_I':
                                  echo '<p class="mb-1" style="font-size: 18px"> La gestión de la obesidad tipo I generalmente implica cambios en la dieta, aumento de la actividad física y, en algunos casos, la posibilidad de considerar medicamentos recetados bajo supervisión médica. La atención médica y el apoyo de un nutricionista o un entrenador personal pueden ser beneficiosos.</p>';
                                  break;
                              case 'Obesity_Type_II':
                                    echo '<p class="mb-1" style="font-size: 18px">El manejo de la obesidad tipo II requiere una intervención médica más intensa. Esto puede incluir cambios significativos en la dieta, ejercicio regular y, en algunos casos, cirugía bariátrica. Es fundamental contar con el apoyo de profesionales de la salud y un equipo de atención médica multidisciplinario.</p>';
                                    break;
                              case 'Obesity_Type_III':
                                      echo '<p class="mb-1" style="font-size: 18px"> El tratamiento de la obesidad mórbida requiere una atención médica urgente. Esto puede incluir cirugía bariátrica, seguida de un riguroso seguimiento médico y cambios en el estilo de vida. El apoyo psicológico también es fundamental para abordar los desafíos emocionales asociados.</p>';
                                      break;
                              case 'Overweight_Level_I':
                                        echo '<p class="mb-1" style="font-size: 18px"> Para abordar el sobrepeso de nivel I, es importante adoptar hábitos alimenticios saludables y aumentar la actividad física. Un enfoque en la pérdida de peso gradual y sostenible es clave para reducir los riesgos para la salud.</p>';
                                        break;
                              case 'Overweight_Level_II':
                                echo '<p class="mb-1" style="font-size: 18px">La gestión del sobrepeso de nivel II implica cambios significativos en la dieta, la incorporación de actividad</p>';
                                break;
                        }
                        ?>
                    </div>
                </div>

                
            </div>
            <div class="row">
            </div>
        </div>
    </div>
            
            

            <div class="content-backdrop fade"></div>
            
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
        
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

  

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>