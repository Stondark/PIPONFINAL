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

    <title>Dashboard</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

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

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

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
          <!-- Content wrapper --

          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <?php echo "<h5 class='card-title text-primary'>¡Hola! {$_SESSION['username']}! 🎉</h5>"; ?>
                          <p class="mb-4">
                            Revisa el <span class="fw-bold">dashboard</span> completo y descubre cómo nuestra web app es capaz de ayudarte a llegar a tus metas
                          </p>                          
                                                <!-- Alerta error -->
                      <?php
                      if (isset($_SESSION["error"]) && !empty($_SESSION["error"])) {
                        echo '<div class="alert alert-danger" role="alert">
                        '.$_SESSION["error"].'
                      </div>';
                        unset($_SESSION['error']);
                      }
                      ?>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/img/illustrations/man-with-laptop-light.png"
                            height="170"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/clock-eight.svg"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                            
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="Horas_Entrenamiento.php">Registrar horas</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Horas de entrenamiento</span>
                          <?php echo "<h3 class='card-title mb-2'>{$_SESSION['user']['total_ejercicio']}</h3>"; ?>                         
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/percentage.svg"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt6"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                              <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="/pipon/src/views/html/Calculo_grasa_corporal.php">Realizar cálculo</a>
                              </div>
                            </div>
                          </div>
                          <span>Porcentaje de grasa corporal</span>
                          <?php
                          if ($_SESSION['user']['porcentaje_grasa'] == "0" || $_SESSION['user']['porcentaje_grasa'] == NULL) {
                            echo "<div class='alert alert-danger' role='alert' style='padding:0 !important;'>¡Realiza la encuesta!</div>";
                          } else {
                            echo "<h3 class='card-title text-nowrap mb-1'>{$_SESSION['user']['porcentaje_grasa']}</h3>";
                          }
                          ?> 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-8">

                        <h5 class="card-header m-0 me-2 pb-3">Evolución de peso</h5>
                        <div id="incomeChart"></div>
                      </div>
                      <div class="col-md-4">
                        
                        <div class="card-body">
                        <div class="dropdown">
                  
                            <button
                                class="btn p-0 float-end" 
                                type="button"
                                id="cardOpt4"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                            <a class="dropdown-item" href="#" id="registrarPesoButton">Registrar peso</a>
                            </div>
                        </div>
                          <div class="text-center">
                            <img src="../assets/img/illustrations/bmi.png" height="250" alt="View Badge User" data-app-dark-img="illustrations/bmi.png" data-app-light-img="illustrations/bmi.png">
                          </div>
                          
                          <div class="d-flex px-xxl-4 px-lg-2 justify-content-between">
                            
                            <div class="d-flex">
                              <div class="me-2">
                              </div>
                              <div class="d-flex flex-column">
                                <small>Calorias necesarias:</small>
                                <?php echo "<h6 class='mb-0'>{$_SESSION['user']['calorias_necesarias']}</h6>"; ?>
                              </div>
                            </div>
                            <div class="d-flex">
                              <div class="me-2">
                              </div>
                              <div class="d-flex flex-column">
                                <small>IMC ACTUAL:</small>
                                <?php echo "<h6 class='mb-0'>{$_SESSION['user']['imc']}</h6>"; ?>
                              </div>
                            </div></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="../assets/img/icons/unicons/rotate-360.svg" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt4"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                <a class="dropdown-item" href="Meta_De_Pasos.php">Registrar pasos</a>
                                
                              </div>
                            </div>
                          </div>
                          <span class="d-block mb-1">Pasos diarios faltantes</span>
                          <?php
                          if ($_SESSION['user']['pasos_restantes_hoy'] < 0) {
                            echo "<div class='alert alert-success' role='alert' style='padding:0 !important;'>¡Completaste la meta!</div>";
                          } else {
                            echo "<h3 class='card-title text-nowrap mb-2'>{$_SESSION['user']['pasos_restantes_hoy']}</h3>";
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="../assets/img/icons/unicons/glass.svg" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt1"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                <a class="dropdown-item" href="Meta_De_Agua.php">Registrar toma de agua</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Litros diarios de agua faltantes</span>
                          <?php
                          if ($_SESSION['user']['agua_restante_hoy'] <= 0) {
                            echo "<div class='alert alert-success' role='alert' style='padding:0 !important;'>¡Completaste la meta!</div>";
                          } else {
                            echo "<h3 class='card-title text-nowrap mb-2'>{$_SESSION['user']['agua_restante_hoy']} L</h3>";
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                    <!-- </div>
    <div class="row"> -->
                    <div class="col-11 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column ">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                
                                <h5 class="text-nowrap mb-2">Patrón de sueño</h5>
                                
                              </div>
                              <div class="mt-sm-auto">
                                <small class="fw-semibold"
                                  ><i class="mb-0"></i> Recuerda dormir 42 horas semanales mínimo</small
                                >

                              </div>
                            </div>
                            
                            <div id="profileReportChart"></div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt4"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                              <a class="dropdown-item" href="#" id="registrarSuenoButton">Registrar sueño</a>
                                
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- Order Statistics -->
                <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Consumo alimenticio y macronutrientes</h5>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="orederStatistics"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                          <a class="dropdown-item" href="Nutrientes.php">Registrar</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                          <?php echo "<h2 class='mb-2'>{$_SESSION['user']['calorias']}</h2>"; ?>
                          <span>Calorías consumidas</span>
                        </div>
                        <div id="alert-consume" class='alert alert-danger' role='alert' style='padding:0 !important;'>¡Recuerda registrar tu consumo!</div>
                        <div id="orderStatisticsChart"></div>
                      </div>
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary"
                              ><i class='bx bx-body'></i>
                            </span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Grasas</h6>
                            </div>
                            <div class="user-progress">
                              <?php echo "<small class='fw-semibold'>{$_SESSION['user']['grasa']}</small>"; ?>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-success">
                            <i class='bx bxs-bowl-rice' ></i>
                            </span>
                          </div>
                          
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Carbohidratos</h6></div>
                            <div class="user-progress">
                              <?php echo "<small class='fw-semibold'>{$_SESSION['user']['carbohidratos']}</small>"; ?>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-info">
                            <i class='bx bx-cheese'></i>
                            </span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Proteinas</h6>
                            </div>
                            <div class="user-progress">
                              <?php echo "<small class='fw-semibold'>{$_SESSION['user']['proteinas']}</small>"; ?>
                            </div>
                          </div>
                        </li>
                        
                      </ul>
                    </div>
                  </div>
                </div>
                

                <!-- Transactions -->
                <div class="col-md-6 col-lg-4 order-2 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Últimas actividades realizadas</h5>
                    </div>
                    <?php include_once "./templates/table.php"; ?>
                  </div>
                </div>
                <!--/ Transactions -->

                <!--/ Order Statistics -->

                <!-- Expense Overview -->
                <div class="col-md-6 col-lg-4 order-1 mb-4">
                  <div class="card h-100">
                    <div class="card-header">
                    <h5 class="card-title m-0 me-0">Recomendaciones</h5>
                  </div>
                  <?php include_once "./templates/sliders.php"; ?>

                  </div>
                </div> 
                <!--/ Expense Overview -->
              </div>
            </div>

            <!-- Modal peso -->
            <script>
  document.addEventListener("DOMContentLoaded", function () {
    const registrarPesoButton = document.getElementById("registrarPesoButton");
    const modalCenter = new bootstrap.Modal(document.getElementById("modalCenter"));

    registrarPesoButton.addEventListener("click", function () {
      modalCenter.show();
    });
  });
</script>

            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">¡Cuentanos!</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                              <form action="../../controllers/peso_cont.php" method="post">
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">¡Escríbelo en kg!</label>
                                    <input
                                      type="text"
                                      id="nameWithTitle"
                                      class="form-control"
                                      placeholder="Kg de peso"
                                      name="peso"
                                    />
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Cerrar
                                </button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
            <!-- / Moda peso -->
            <!-- / Modal sueño -->
            <!-- Modal -->
            <script>
  document.addEventListener("DOMContentLoaded", function () {
    const registrarSuenoButton = document.getElementById("registrarSuenoButton");
    const modalSueno = new bootstrap.Modal(document.getElementById("modalSueno"));
    

    registrarSuenoButton.addEventListener("click", function () {
      modalSueno.show();
    });
  });
</script>


                    <!-- Modal para registrar el sueño -->
        <div class="modal fade" id="modalSueno" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
          
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">¡Cuentanos cuánto dormiste hoy!</h5>

                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              
              <div class="modal-body">
              <form action="../../controllers/sueño_cont.php" method="post">
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Dinos las horas que dormiste</label>
                                    <input
                                      type="number"
                                      id="nameWithTitle"
                                      class="form-control"
                                      placeholder="Horas de sueño el día de hoy"
                                      name="sueño"
                                    />
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Cerrar
                                </button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </div>
            </form>
          </div>
        </div>
            <!-- / Content -->
            <!-- Footer -->
            <!-- / Footer -->
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>