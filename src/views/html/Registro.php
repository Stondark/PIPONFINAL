<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Registro</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
</head>

<body>
  <!-- Content -->

  <?php

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  ?>

  <style>
    .hidden {
      display: none;
    }
  </style>

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
                <img src="../assets/img/icons/pipon.png" alt="">
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">¡Hora de despegar tu salud! 🚀</h4>
            <p class="mb-4">Crea tu cuenta y comencemos a cuidarnos</p>

            <form id="formAuthentication" class="mb-3" action="../../controllers/register.php?opt=register" method="POST">
              <div class="mb-3">
                <label for="username" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="username" Required name="username" placeholder="Ingresa tu nombre de usuario" autofocus />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Ingresa tu email" />
              </div>
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Contraseña</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" required class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <input class="form-check-input" type="checkbox" value="" id="medicoCheck" name="medicoCheck">
                <label class="form-check-label" for="medicoCheck" name="medicoCheck">
                  ¿Médico especialista?
                </label>
              </div>
              <div class="mb-3" id="idnumberContainer">
                <label for="idnumber" class="form-label">Número de identificación</label>
                <input type="number" class="form-control" id="idnumber" required name="idnumber" placeholder="Ingresa tu número de identificación"  />
              </div>
              <div class="mb-3" id="profesionContainer">
                <label for="profesion" class="form-label">Profesión</label>
                <select class="form-select" id="profesion" name="profesion" required >
                  <option value="">Selecciona tu profesión</option>
                  <option value="1">Médico general</option>
                  <option value="2">Nutricionista</option>
                  <option value="3">Psicólogo deportivo</option>
                  <option value="4">Entrenador físico</option>
                </select>
              </div>

              <?php

              if (isset($_SESSION["error"])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION["error"] . '</div>';
                unset($_SESSION['error']);
              }
              ?>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100">Continuar</button>
              </div>


            </form>

            <p class="text-center">
              <span>¿Ya tenías una cuenta?</span>
              <a href="Login.php">
                <span>Ingresa</span>
              </a>
            </p>
          </div>
        </div>
        <!-- Register Card -->
      </div>
    </div>
  </div>

  <!-- / Content -->



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
  <script src="../assets/js/register.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>