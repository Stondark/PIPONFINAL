<!DOCTYPE html>
<?php
if (!isset($_GET["id"]) || empty($_GET["id"])) {
  header("Location= dashboard.php");
  exit();
}


include_once "../../model/user.php";
$userLog = new User();

$userData = $userLog::getUserById($_GET["id"]);
if (!$userData) {
  $_SESSION['error'] = "Error obteniendo la información del usuario";
  header("Location: ../html/administracion.php");
  exit();
}



?>
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

    <title>Ingresar agua</title>

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
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Layout Demo -->
              <form action="../../controllers/users.php" method="post">
              <div class="d-flex align-items-end row">
                      <div class="card text-center mb-3">
                        <div class="card-body">
                          <h2 class="card-title"> <span class="text-muted fw-light">Editar información de </span> <?php echo $userData["usuario"]; ?> </h2>
                          <input name="usuario" type="text" class="form-control" placeholder="Nombre de usuario" value="<?php echo $userData["usuario"]; ?>">
                          <input name="email" type="email" class="form-control" placeholder="Correo electrónico" value="<?php echo $userData["email"]; ?>">
                          <input name="id" type="hidden" class="form-control" value="<?php echo $userData["id"]; ?>">
                          <select class="form-select" aria-label="Default select example" name="role">
                            <option selected value="<?php echo $userData["rol"] ?>"><?php echo $userData["type"]; ?></option>
                            <?php if ($userData["rol"] === 1) : ?>
                            <option value="2">Usuario</option>
                            <?php elseif ($userData["rol"] === 2) : ?>
                            <option value="1">Administrador</option>
                            <?php endif ?>
                          </select>
                      </div>
                      <div class="mt-3">
                        <!-- Button trigger modal -->
                        <button
                          type="submit"
                          class="btn btn-primary"
                          name="submit_edit"
                        >
                        Editar
                        </button>
                          
                        </div>
                    </div>
                    
              </div> 
              
              </form>
              <!--/ Layout Demo -->
            </div>
            <!--Footer -->
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