<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Encuesta predicción peso</title>

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
<?php include_once "../../controllers/valid_predict.php"; ?>
<?php if (session_status() == PHP_SESSION_NONE){session_start();}?>
              
  <!-- Content -->
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
            <h4 class="mb-2">¡Hagamos una pequeña encuesta!</h4>
            <p class="mb-4">Vamos a predecir tu categoría de peso </p>

            <form id="formEncuesta" class="mb-3" action="/pipon\src\controllers\predict.php" method="POST">
              <div class="mb-3">
                <label for="MTRANS_Automobile" class="form-label">¿Te movilizas mucho en automovil?</label>
                <input type="text" class="form-control" id="MTRANS_Automobile" name="MTRANS_Automobile" placeholder="1: Sí 0: No" step="1" min="0" max="1" autofocus />
              </div>
              <div class="mb-3">
                <label for="MTRANS_Bike" class="form-label">¿Te movilizas mucho usando bicicleta?</label>
                <input type="text" class="form-control" id="MTRANS_Bike" name="MTRANS_Bike" step="1" min="0" max="1" placeholder="1: Sí 0: No" />
              </div>
              <div class="mb-3">
                <label for="MTRANS_Motorbike" class="form-label">¿Te movilizas mucho usando moto?</label>
                <input type="text" class="form-control" id="MTRANS_Motorbike" name="MTRANS_Motorbike" step="1" min="0" max="1" placeholder="1: Sí 0: No" />
              </div>
              <div class="mb-3">
                <label for="MTRANS_Public_Transportation" class="form-label">¿Te movilizas mucho usando transporte público?</label>
                <input type="number" class="form-control" id="MTRANS_Public_Transportation" name="MTRANS_Public_Transportation" step="1" min="0" max="1" placeholder="1: Sí 0: No" required />
              </div>
              <div class="mb-3">
                <label for="MTRANS_Walking" class="form-label">¿Te movilizas mucho caminando?:</label>
                <input type="number" class="form-control" id="MTRANS_Walking" name="MTRANS_Walking" step="1" min="0" max="1" placeholder="1: Sí 0: No" required />
              </div>
              <div class="mb-3">
                <label for="Female" class="form-label">¿Eres hombre o mujer?</label>
                <input type="number" class="form-control" id="Female" name="female" step="1" min="0" max="1" placeholder="1: Mujer 0: Hombre" required />
              </div>
              <div class="mb-3">
                <label for="Age" class="form-label">¿Cuál es tu edad?:</label>
                <input type="number" class="form-control" id="Age" name="Age" step="0.01" placeholder="Edad" required />
              </div>
              <div class="mb-3">
                <label for="Height" class="form-label">¿Cuál es tu altura?:</label>
                <input type="number" class="form-control" id="Height" name="Height" step="0.01" placeholder="Ejemplo: 1.60" required />
              </div>
              <div class="mb-3">
                <label for="Weight" class="form-label">¿Cuál es tu peso?:</label>
                <input type="number" class="form-control" id="Weight" name="Weight" step="0.01" required placeholder="Peso en kg" />
              </div>
              <div class="mb-3">
                <label for="Family_History_Overweight" class="form-label">¿Tienes familiares con sobrepeso?:</label>
                <input type="number" class="form-control" id="Family_History_Overweight" name="family_history_overweight" step="1" min="0" max="1" placeholder="1: Sí 0: No" required />
              </div>
              <div class="mb-3">
                <label for="FAVC" class="form-label">¿Consume frecuentemente comidas altas en calorías</label>
                <input type="number" class="form-control" id="FAVC" name="FAVC" step="1" min="0" max="1" placeholder="1: Sí 0: No" required />
              </div>
              <div class="mb-3">
                <label for="FCVC" class="form-label">¿Consumes vegetales en sus comidas?</label>
                <input type="number" class="form-control" id="FCVC" name="FCVC" step="1" min="0" max="2" required placeholder="0:Nunca, 1:A veces, 2:Siempre" />
              </div>
              <div class="mb-3">
                <label for="NCP" class="form-label">¿Cuantas comidas principales tiene al día?</label>
                <input type="number" class="form-control" id="NCP" name="NCP" step="1" min="0" max="2" required placeholder="0: Entre 1-2, 1: Tres comidas, 2: mas de 3 " />
              </div>
              <div class="mb-3">
                <label for="CAEC" class="form-label">¿Consume alimentos entre las comidas principales?</label>
                <input type="number" class="form-control" id="CAEC" name="CAEC" step="1" min="0" max="3" placeholder="0: No, 1: Poco, 2: Muy frecuente, 3: Siempre" required />
              </div>
              <div class="mb-3">
                <label for="SMOKE" class="form-label">¿Fuma?</label>
                <input type="number" class="form-control" id="SMOKE" name="SMOKE" step="1" min="0" max="1" placeholder="1: Sí 0: No" required />
              </div>
              <div class="mb-3">
                <label for="CH2O" class="form-label">¿Cuántos litros de agua consume al día?:</label>
                <input type="number" class="form-control" id="CH2O" name="CH2O" step="1" min="0" max="2" required placeholder="0: Menos de 1L, 1: De 1L a 2L, 2: Mas de 2L" />
              </div>
              <div class="mb-3">
                <label for="SCC" class="form-label">¿Calcula o monitorea sus calorías consumidas?</label>
                <input type="number" class="form-control" id="SCC" name="SCC" step="1" min="0" max="1" placeholder="1: Sí, 0: No" required />
              </div>
              <div class="mb-3">
                <label for="FAF" class="form-label">¿Qué tanta actividad física realiza?:</label>
                <input type="number" class="form-control" id="FAF" name="FAF" step="1" min="0" max="3" placeholder="0: Nada, 1: 1-2 días, 2: 3-4 días, 3: 4-5 días" />
              </div>
              <div class="mb-3">
                <label for="TUE" class="form-label">Qué tanto tiempo usa dispositivos tecnológicos?</label>
                <input type="number" class="form-control" id="TUE" name="TUE" step="1" min="0" max="2" required placeholder="0: 1-2 horas, 1: 3-5 horas, 2: más de 5 horas" />
              </div>
              <div class="mb-3">
                <label for="CALC" class="form-label">¿Qué tan seguido consume alcohol?</label>
                <input type="number" class="form-control" id="CALC" name="CALC" step="1" min="0" max="3" placeholder="0: Nunca, 1: Poco, 2: Frecuente, 3: Mucho" required />
              </div>
              <div class="mb-3">
                <input type="hidden" id="predictionResult" name="predictionResult" value="" />

              </div>
              <!-- Botón de realizar predicción con JavaScript -->
              <button class="btn btn-primary d-grid w-100" type="button" id="predictButton">Registrarse</button>
              <!-- Resultado de la predicción (se mostrará con JavaScript) -->
              <p class="text-center" id="result"></p>
              <?php
              
              if (isset($_SESSION["error"])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION["error"] . '</div>';
                unset($_SESSION['error']);
              }
              ?>
            </form>
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
  <script src="../assets/js/ModeloIAAPI.js"></script>
  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>