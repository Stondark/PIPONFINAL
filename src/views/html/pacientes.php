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
  <?php include_once "../../model/user_info.php";
  include_once "../../model/table_log.php";
  $usersEntitys = new UserInfo();
  $dataUsers = $usersEntitys::getAllInfoPacientes();
  ?>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php include_once "./templates/aside.php";
        $idIconsType = ["Agua" => ["icon" => "menu-icon tf-icons bx bx-water", "prefix" => "Litros"], "Comida" => ["icon" => "menu-icon tf-icons bx bxs-cookie", "prefix" => "Calorías"], "Ejercicio" => ["icon" => "menu-icon tf-icons bx bx-dumbbell", "prefix" => "Horas"], "Pasos" => ["icon" => "menu-icon tf-icons bx bx-run", "prefix" => "Pasos"], "Sueño" => ["icon" => "menu-icon tf-icons bx bx-bed", "prefix" => "Horas"], "Peso" => ["icon" => "menu-icon tf-icons bx bx-body", "prefix" => "Kilos"],];
        ?>
        <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php include_once "./templates/navbar.php"; ?>
          <!-- / Navbar -->
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Bootstrap Table -->
              <div class="card">
                
                <h5 class="card-header">Usuarios</h5>
                <?php
                if (isset($_SESSION["error"])) {
                  echo '<div class="alert alert-danger" role="alert">' . $_SESSION["error"] . '</div>';
                  unset($_SESSION['error']);
                }
                ?>
         <div class="table-responsive text-nowrap">
    <table class="table">
        <thead>
            <tr>
                <th>Nombre usuario</th>
                <th>Correo</th>
                <th>Tipo obesidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <?php foreach ($dataUsers as $value) : ?>
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $value["usuario"] ?></strong></td>
                    <td><?php echo $value["email"] ?></td>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo ($value["tipo"] ?? 'Aún no realiza encuesta') ?></strong></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $value["id"]; ?>">
                            Ver Detalles
                        </button>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal_<?php echo $value["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detalles del Usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <?php
                            $tableData = Table::getLogTable($value["id"]);
                            if (count($tableData) != 0) : ?>
                              <p> <b>Nombre:</b> <span><?php echo $value["usuario"]; ?></span></p>
                              <p> <b>Correo:</b> <span><?php echo $value["email"]; ?></span></p>
                              <div class="card-body">
                                  <ul class="p-0 m-0">
                                      <?php foreach ($tableData as $key => $value) : ?>
                                          <li class="d-flex mb-4 pb-1">
                                              <div class="avatar flex-shrink-0 me-3">
                                                  <i class="<?php echo ($idIconsType[$value["type"]]["icon"]) ?>"></i>
                                              </div>
                                              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                  <div class="me-2">
                                                      <h6 class="mb-0"><?php echo ($value["type"]) ?></h6>
                                                  </div>
                                                  <div class="user-progress d-flex align-items-center gap-1">
                                                      <span class="badge bg-primary rounded-pill">+<?php echo ($value["cantidad"]) . " " . $idIconsType[$value["type"]]["prefix"] ?></span>
                                                  </div>
                                              </div>
                                          </li>
                                      <?php endforeach ?>
                                  </ul>
                              </div>
                          <?php else : ?>
                              <div class="card-body">
                                <p><b>Nombre:</b>  <span><?php echo $value["usuario"]; ?></span></p>
                                <p><b>Correo:</b><span><?php echo $value["email"]; ?></span></p>
                                <p>No hay datos disponibles.</p>
                              </div>
                          <?php endif; ?>
                          
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endforeach ?>
        </tbody>
    </table>
</div>
              </div>
              <!--/ Basic Bootstrap Table -->
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